<!DOCTYPE html>
<html>

    <head>
        <title>Update Profile</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            html, body{
                height: 100%;
                margin: 0;
            }
            .body-container {
                background-color: #e5e4e2;
                position: relative;
                padding-bottom: 80px;
                min-height: calc(100% - 80px);
            }
            .main-header{
                position: relative;
                background-color: #053c6b;
                color: #e5e4e2;
                margin: 0;
                width: 100%;
            }
            .main-header p{
                display: inline;
                margin-left: 15px;
                font-size: 3.5em;
            }
            .button-container {
                text-align: center;
                background-color: #bc6c25;
                color: #e5e4e2;
                margin: 15px;
                border: 2px solid #A2ADD0;
            }
            .button-container button, .button-container span{
                color: #e5e4e2;
                font-size: calc(12px + 0.8vw);
                
            }
            .card-header {
                background-color: #053c6b; 
                color: #e5e4e2; 
            }
            .card-body {
                background-color: #e5e4e2;
            }
            .btn-primary {
                background-color: #bc6c25;
                border-color: #bc6c25; 
            }
            .form-control {
                border-color: #A2ADD0; 
            }
            .form-label {
                color: #053c6b; 
            }
            
        </style>
    </head>


    <body>
    <div class="body-container">
            <div class="header">
                    <form id="logoutform" method='POST' action='../controllers/controller.php'>
                            <input type="hidden" name="page" value="adminheader">
                            <input type="hidden" name="command" value="logout">
                    </form>
                    <form id="admindashboardform" method='POST' action='../controllers/controller.php'>
                            <input type="hidden" name="page" value="adminheader">
                            <input type="hidden" name="command" value="admindashboard">
                    </form>
                    <div class="main-header row">
                        <div class="col-sm-12 col-md-3 col-lg-4"><p>QuizHub</p></div>
                        <div class="col-md-6 col-lg-5 d-none d-md-block"></div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <button type="button" class="btn button-container btn-lg" id="admindashboardbutton" >
                                Dashboard
                            </button>
                            <button type="button" class="btn button-container btn-lg" id="logoutbutton" >
                                Log Out
                            </button>
                        </div>
                    </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                UPDATE PROFILE
                            </div>
                            <div class="card-body" id='updateprofileform'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="../views/footer.php" frameborder="0" style="position: absolute;  width: 100%; height: 80px; background-color: #e5e4e2; "></iframe>
    </body>


    <script>

        document.addEventListener("DOMContentLoaded", function(){
            
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: {
                    page: 'admin',
                    command: 'updateprofile',
                },
                success: function(response) { 
                    $("#updateprofileform").html(response); 
                },
            });
        })

        $(document).on('click', '#editprofilesubmitbutton', function(){
            
            var formData = $("#editprofileform").serialize();
            
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) {
                    alert(response);
                },
                error: function(response){
                    alert(reponse);
                }
            });
        })

        $(document).on('click', '#editpasswordsubmitbutton', function(){
            
            $('#password').prop('disabled', false);
            $('#confirm-password').prop('disabled', false);
            $('#editprofilesubmitbutton').attr('id', 'editprofilewithpasswordsubmitbutton');
        })

        $(document).on('click', '#editprofilewithpasswordsubmitbutton', function(){
            $('#editcommand').val("editprofilewithpasswordsubmit");
            var formData = $("#editprofileform").serialize();
            
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) {
                    if(response == 'Profile Updated successfully'){
                        alert(response);
                        $('#password').prop('disabled', true);
                        $('#confirm-password').prop('disabled', true);
                        $('#editpasswordsubmitbutton').attr('disabled', true);
                    }else{
                        alert(response);
                    }
                },
                error: function(response){
                    alert(reponse);
                }
            });
        })
        

        $("#admindashboardbutton").click(function(){
            $("#admindashboardform").submit();
        })

        $("#logoutbutton").click(function(){
            $("#logoutform").submit();
        })

        var timer = setTimeout(timeout, 60 * 10 * 1000);
        window.addEventListener('mousemove', event_listener_mousemove);
        function event_listener_mousemove(){
            clearTimeout(timer);
            timer = setTimeout(timeout, 60 * 10 * 1000);
        }
        function timeout(){
            clearTimeout(timer);
            window.removeEventListener('mousemove', event_listener_mousemove);
            $("#logoutform").submit();
        }
    </script>

</html>