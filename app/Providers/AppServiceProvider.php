<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Answers;
use App\Models\Questions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $answers = Answers::where('read', '0')->orderBy('id', 'DESC')->get();
            $questions_list = Questions::orderBy('id', 'DESC')->get();
            return $view->with(['answers' => $answers, 'questions_list' => $questions_list]);
        });
    }
}
