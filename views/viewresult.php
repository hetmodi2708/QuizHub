<!DOCTYPE html>
<html>

    <head>
        <title>View Results</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            .button-grp{
                display: inline;
                position: absolute;
                right: 0;
                margin-right: 15px;
            }
            .button-container {
                text-align: center;
                background-color: #bc6c25;
                color: #e5e4e2;
                margin: 15px;
                border: 2px solid #A2ADD0;
            }
            .table-custom {
                background-color: #e5e4e2;
            }
            .table-custom th, .table-custom td {
                color: #053c6b; 
                text-align: center; 
            }
            .table-custom thead {
                background-color: #bc6c25; 
            }
            .table-custom .detail-text {
                color: #A2ADD0; 
            }
            .table-custom tbody tr:nth-child(odd) {
                background-color: #E1E5EA; 
            }
            h2.results-header {
                text-align: center;
                margin-top: 20px;
                color: #333F48; 
            }
        </style>
    </head>


    <body>
        <div class="body-container">
            <form id="viewresultform" method='POST' action='../controllers/controller.php'>
                        <input type="hidden" name="page" value="user">
                        <input type="hidden" name="command" value="viewresult">
            </form>
            <form id="dashboardform" method='POST' action='../controllers/controller.php'>
                        <input type="hidden" name="page" value="userheader">
                        <input type="hidden" name="command" value="userdashboard">
            </form>
            <form id="logoutform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="userheader">
                    <input type="hidden" name="command" value="logout">
            </form>
            <div class="header">
                
                <div class="main-header row">
                    <div class="col-sm-12 col-md-3 col-lg-4"><p>QuizHub</p></div>
                    <div class="col-md-6 col-lg-5 d-none d-md-block"></div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <button type="button" class="btn button-container btn-lg" id="userdash" >
                            Dashboard
                        </button>
                        <button type="button" class="btn button-container btn-lg" id="logoutbutton" >
                            Log Out
                        </button>
                    </div>
                </div>
            </div>
            
            <h2 class="results-header">Results</h2>

            <div class=" jumbotron vertical-center align-middle justify-content-center " style="background-color: #e5e4e2; width: 80%; margin-left: 10%; margin-right: 10%;" id="quizcontainer"></div>

        </div>
            <iframe src="../views/footer.php" frameborder="0" style="position: absolute;  width: 100%; height: 80px; background-color: #e5e4e2;"></iframe>
    </body>


    <script> 
        document.addEventListener("DOMContentLoaded", function(){
            var formData = $("#viewresultform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) { 
                    $("#quizcontainer").html(response); 
                },
            });
        })

        $("#userdash").click(function(){
            $("#dashboardform").submit();
        });

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

