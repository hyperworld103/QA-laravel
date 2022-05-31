    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>   
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="../assets/node_modules/tinymce/tinymce.min.js"></script>
    <script src="../assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="dist/js/pages/jasny-bootstrap.js"></script>
    <script src="../assets/node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="../assets/node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="../assets/node_modules/dropzone-master/dist/dropzone.js"></script>
    
    <script src="../assets/node_modules/datatables/datatables.min.js"></script>
    <script src="../assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="dist/js/pages/toastr.js"></script>

    

    <!--Custom JavaScript -->
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

    <script>
    $(document).ready(function() {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 200,
                plugins: [
                    "advlist autolink lists charmap print preview",
                    "searchreplace wordcount visualchars fullscreen insertdatetime",
                    "save contextmenu directionality emoticons paste textcolor"
                ],
                toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>