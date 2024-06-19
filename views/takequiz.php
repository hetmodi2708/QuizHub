<!DOCTYPE html>
<html>

    <head>
        <title>View/Submit Quiz</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        


        <style>
            .body-container {
                background-color: #e5e4e2;
                position: relative;
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
            .dropdown-button-container{
                margin-left: 5%; margin-top: 3%;
            }
            .button-container button, .button-container span{
                color: #e5e4e2;
                font-size: calc(12px + 0.8vw);
            }
            .question_div{
                margin-top: 20px;
                text-align: center;
            }

            .question_container{
                margin-bottom: 20px;
            }
            
        </style>
    </head>


    <body>
        <div class="body-container">
            <form id="takequizform" method='POST' action='../controllers/controller.php'>
                <input type="hidden" name="page" value="user">
                <input type="hidden" name="command" value="takequiz">
            </form>
            <div class="header">
                    <form id="logoutform" method='POST' action='../controllers/controller.php'>
                            <input type="hidden" name="page" value="userheader">
                            <input type="hidden" name="command" value="logout">
                    </form>
                    <form id="userdashboardform" method='POST' action='../controllers/controller.php'>
                            <input type="hidden" name="page" value="userheader">
                            <input type="hidden" name="command" value="userdashboard">
                    </form>
                    <div class="main-header row">
                        <div class="col-sm-12 col-md-3 col-lg-4"><p>QuizHub</p></div>
                        <div class="col-md-6 col-lg-5 d-none d-md-block"></div>
                        <div class="col-sm-6 col-md-3 col-lg-3">    
                            <button type="button" class="btn button-container btn-lg" id="userdashboardbutton" >
                                Dashboard
                            </button>
                            <button type="button" class="btn button-container btn-lg" id="logoutbutton" >
                                Log Out
                            </button>
                        </div>
                    </div>
            </div>

            
            <div id="maincontainer">
            </div>

            <iframe src="../views/footer.php" frameborder="0" style="width: 100%; height: 80px; background-color: #e5e4e2;"></iframe>
        </div>
    </body>


    <script>
        $("#userdashboardbutton").click(function(){
            $("#userdashboardform").submit();
        })

        $("#logoutbutton").click(function(){
            $("#logoutform").submit();
        })

        document.addEventListener("DOMContentLoaded", function(){
            var formData = $("#takequizform").serialize();
            
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) {
                    $("#maincontainer").html(response); 
                },
            });
        })

        window.onload = function() {
            $("#submitquizbutton").click(function(event) {
                event.preventDefault(); 
                let allQuestionsAnswered = true;
                $('.question_container').each(function(index) {
                    if ($(this).find('input[type="radio"]:checked').length === 0) {
                        allQuestionsAnswered = false;
                        $(this).css('border', '2px solid red');
                        $(this).find('.input-group-text').css('background-color', 'lightcoral');
                    } else {
                        $(this).css('border', '');
                        $(this).find('.input-group-text').css('background-color', '');
                    }
                });

                if (!allQuestionsAnswered) {
                    alert("Please answer all questions before submitting the quiz.");
                } else {
                    var formData = $("#submitquizform").serialize();
                    $.ajax({
                        type: "POST",
                        url: "../controllers/controller.php",
                        data: formData,
                        success: function(response) {
                            alert("Quiz submitted successfully.");
                            $("#maincontainer").html(response); 
                        },
                        error: function(response) {
                            alert("An error occurred while submitting the quiz.");
                        }
                    });
                }
            });
        };

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