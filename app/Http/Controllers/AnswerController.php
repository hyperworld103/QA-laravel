<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;
use App\Models\UploadFiles;
use App\Models\Answers;
use App\Models\Subjects;
use App\Models\AnswerFile;

class AnswerController extends Controller
{
    public function Index(Request $request) {
        $q_id = $request->id;
        $question_data = Questions::where('id', $q_id)->first();
        $question_file =DB::table('upload_files')->where('q_id', $q_id)->get();
        $answers = Answers::where('q_id', $q_id)->get();
        
       
        if(!isset($question_file)) {
            $question_file = "";
        }
    
        return view('answers')->with([
            'q_data' => $question_data,
            'q_file' => $question_file,
            'a_data' => $answers
            
        ]);
    }

    public function ShowAnswer(Request $request) {
        $id = $request->id;
        $answer_data = Answers::where('q_id', $id)->get();
        $question_data = Questions::where('id', $id)->first();
        $question_files = UploadFiles::where('q_id', $id)->get();

        return view('answerslist')->with([
            'question' => $question_data,
            'showanswer' => $answer_data,
            'question_files' => $question_files
        ]);
        
    }

    public function EachAnswerShow(Request $request) {
        $a_id = $request->id;
        
        $answers = Answers::where('id', $a_id)->get();
       
        return view('alert-show-answers')->with([
            'answers' => $answers
        ]);
    }

    public function AnswerState(Request $request) {
        $statu = $request->state;
        $id = $request->id;
      
        $res = Answers::where('id', $id)->update(array('read' => $statu));
        
        return response()->json(['data' => '1']);
    }

   

    public function ReplyAnswers(Request $request) {
        $u_id = \Auth::user()->id;
        $s_id = $request->id;
        $subject = Subjects::where('id', $s_id)->first();
        $questions = Questions::where('s_id', $s_id)->orderBy('id', 'DESC')->get();
        $answers = Answers::where('s_id', $s_id)->where('u_id', $u_id)->orderBy('id', 'DESC')->get();
        
        $str_answers = str_replace('<br>', ' ', $answers);
      
        return view('solution-post')->with([
            'subject' => $subject,
            'questions' => $questions,
            'replyanswers' => $answers
        ]);
    }


    public function AnswersList(Request $request) {
        $q_id = $request->q_id;
        $answerslist = Answers::where('q_id', $q_id)->get();
    
        return response()->json(['data' => $answerslist]);
    }


    public function ReplyAnswer(Request $request) {
        $q_id = $request->id;
        $question =Questions::where('id', $q_id)->get();
        $attampt = UploadFiles::where('q_id', $q_id)->get();
        
        return response()->json(['data' => $question, 'attampt' => $attampt]);
    }

    public function UploadFile(Request $request) {
        $target_dir = 'upload/answers_file/';
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $rand = rand();
        $fileName = explode('.',$imageName);
        $firstName = $fileName[0].$rand;
        $secondName = $fileName[1];
        if($secondName == 'png' ||$secondName == 'jpg' || $secondName == "pdf" || $secondName == "doc" || $secondName == "docx") {
            $newName = $firstName.'.'.$secondName;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . $newName;
           
            $msg = "";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $msg = "Successfully uploaded";
            } else {
            $msg = "Error while uploading";
            }
            echo $msg;
        }
    }

    public function SendAnswer(Request $request) {
        $q_id = $request->id;
        $res = Questions::where('id', $q_id)->update(['statu' => "1"]);
        $answer = $request->answer;
        $user_id = \Auth::user()->id;
        $s_id = Questions::where('id', $q_id)->first()->s_id;
        $unselect = "0";
        $unread = "0";

        $res = Answers::create([
            'u_id'=>$user_id, 'q_id'=>$q_id, 's_id'=>$s_id, 'answers'=>$answer, 'select' => $unselect, 'read' => $unread
        ]);

        $source_dir = 'upload/answers_file/';
        $target_dir = 'storage/answers_file/';
 
        if (!is_dir($target_dir)) {
          if (!mkdir($target_dir, 0777, true)) {
            echo 'fail';
            exit;
          }
        }

        foreach (scandir($source_dir) as $key => $file) {
          if ($file == '.' || $file == '..')
            continue;
          copy($source_dir . $file, $target_dir . $file);
          unlink($source_dir . $file);
          $uploadFile = $target_dir . $file;
          $a_id = $res->id;
          $res_1 = AnswerFile::create([
                'a_id'=>$a_id, 'file_path'=>$uploadFile, 'file_name'=>$file
          ]);
          
        }
        return response()->json(['data' => '1']);
    }

    public function DetailAnswer(Request $request) {
        $a_id = $request->id;
   
        $answer = Answers::where('id', $a_id)->first();
        $answer_file = AnswerFile::where('a_id', $a_id)->get();
        $question_id = $answer->q_id;
        $question = Questions::where('id', $question_id)->first();
        return response()->json([
            'data'=>$answer,
            'question'=>$question,
            'answer_file'=> $answer_file
        ]);
    }

    public function RemoveAnswer(Request $request) {
        $a_id =$request->id;
        $q_id = Answers::where('id', $a_id)->first()->q_id;

        $res_del= AnswerFile::where('a_id', $a_id)->delete();
        $res_1 = Questions::where('id', $q_id)->update(['statu'=>'0']);
        $res = Answers::find($a_id)->delete();
        
        if($res == true && $res_1 == true) {
            return response()->json(['data' => 'removed']);
        }

    }
}
