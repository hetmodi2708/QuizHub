<!DOCTYPE html>
<html>

    <head>
        <title>QuizHub Dashboard</title>
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
                margin: 10px;
                border: 2px solid #A2ADD0;
            }
            
        </style>
    </head>


    <body>
        <div class="body-container">
            <form id="dashboardform" method='POST' action='../controllers/controller.php'>
                        <input type="hidden" name="page" value="user">
                        <input type="hidden" name="command" value="getallquizzes">
            </form>
            <form id="logoutform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="userheader">
                    <input type="hidden" name="command" value="logout">
            </form>
            <form id="favoritequizform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="user" id="pagevalue">
                    <input type="hidden" name="command" value="getfavoritequizzes" id="commandvalue">
            </form>
            <form id="viewresultform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="user" >
                    <input type="hidden" name="command" value="result" >
            </form>
            <form id="updateprofileform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="user" >
                    <input type="hidden" name="command" value="updateprofilebutton" >
            </form>
            <form id="deleteprofileform" method='POST' action='../controllers/controller.php'>
                    <input type="hidden" name="page" value="user" >
                    <input type="hidden" name="command" value="deleteprofile" >
            </form>
            <div class="header">
                <div class="main-header row">
                    <div class="col-sm-12 col-md-3 col-lg-4"><p>QuizHub</p></div>
                    <div class="col-md-6 col-lg-5 d-none d-md-block"></div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <button type="button" class="btn button-container btn-lg " id="favoritequizbutton">
                            Favorites
                        </button>
                        <button type="button" class="btn button-container btn-lg " id="logoutbutton">
                            Log Out
                        </button>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-light" style="background-color: #e5e4e2 ">
                <div class="container-fluid row">
                        <button class="navbar-toggler col-sm-6 col-md-3 col-lg-2" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" style="width: 18%; height: auto; border: none; background-color: #e5e4e2; padding: 0; background-color: transparent;" id="menu-button">
                            <img class="navbar-toggler-icon" src="../components/interface.png" style="width: 60%; max-width: 60px; height: auto"/> 
                        </button>
                        <div class="col-sm-6 col-md-9 col-lg-5" style="width: 60%;">
                            <form class="form-inline my-2 my-lg-0" style="display: inline-block; vertical-align: top; margin-right: 10px;" id="searchquizform">
                                <input type="hidden" name="page" value="user">
                                <input type="hidden" name="command" value="searchquiz">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search by Name" aria-label="Search" name="inputterm">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="searchbutton">Search</button>
                            </form>

                            <div class="dropdown" style="display: inline-block; vertical-align: top;">
                                <button class="btn button-container dropdown-toggle dropdown_button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filter (by difficulty level)
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <span class="dropdown-item">Beginner</span>
                                    <span class="dropdown-item">Intermediate</span>
                                    <span class="dropdown-item">Expert</span>
                                </div>
                                <form class="form-inline my-2 my-lg-0" style="display: inline-block; vertical-align: top; margin-right: 10px;" id="filterquizform">
                                    <input type="hidden" name="page" value="user">
                                    <input type="hidden" name="command" value="filterquiz">
                                    <input type="hidden" name="inputlevel" class="inputlevel" value="">
                                </form>
                            </div>
                        </div>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03" >
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="width:20%;">
                            <li class="nav-item">
                                    <div style="background-color: #053c6b "> <button type='button' style="color: #e5e4e2; background-color: #053c6b; border: 0; " id='viewresults'>View Results </button> </div>
                                </li>
                                <li class="nav-item active">
                                    <div style="background-color: #053c6b "> <button type='button' style="color: #e5e4e2; background-color: #053c6b; border: 0; " id='updateprofile'>Update Profile </button> </div>
                                </li>
                                <li class="nav-item">
                                    <div style="background-color: #053c6b "> <button type='button' style="color: #e5e4e2; background-color: #053c6b; border: 0; " id='deleteprofile'>Delete Profile </button> </div>
                                </li>
                            </ul>
                        </div>
                </div>
            </nav>

            <div class=" jumbotron vertical-center align-middle justify-content-center " style="background-color: #e5e4e2; width: 80%; margin-left: 10%; margin-right: 10%;" id="quizcontainer"></div>

            <div class="modal fade" id="deleteProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #F0F0F0;">
                    <div class="modal-header" style="background-color: #333F48; color: #e5e4e2;">
                        <h5 class="modal-title" id="deleteProfileModalLabel">Confirm Profile Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #e5e4e2;">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: #F0F0F0; color: #333F48;">
                        Are you sure you want to delete your profile? All data related to your user profile will be permanently deleted. This action cannot be undone.
                    </div>
                    <div class="modal-footer" style="background-color: #E1E5EA;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteProfile">Delete Profile</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
            <iframe src="../views/footer.php" frameborder="0" style="position: absolute; width: 100%; height: 80px; background-color: #e5e4e2;"></iframe>
    </body>


    <script> 
        document.addEventListener("DOMContentLoaded", function(){
            var formData = $("#dashboardform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) { 
                    $("#quizcontainer").html(response); 
                },
            });
        })

        
        document.addEventListener("DOMContentLoaded", function(){
            var formData = $("#quiz-btn").serialize();
            
            $("#takequizsubmitbutton").click(function(){
                
                $.ajax({
                    type: "POST",
                    url: "../controllers/controller.php",
                    data: formData,
                    success: function(response) {
                    }
                });
            })
        })

       $("#viewresults").click(function(){
            $("#viewresultform").submit();
       })

       $("#updateprofile").click(function(){
            $("#updateprofileform").submit();
       })

       $('#deleteprofile').click(function(){
            $('#deleteProfileModal').modal('show');
        });
        $('.close').click(function(){
            $('#deleteProfileModal').modal('hide');
        });

        $('.btn-secondary').click(function(){
            $('#deleteProfileModal').modal('hide');
        });
        $('#confirmDeleteProfile').click(function(){
            
            $("#deleteprofileform").submit();
        });

        $(document).on('click', '.savefavoritebutton', function() {
            var quizId = $(this).data('quiz-id'); 
            var imgId = 'bookmark-icon-' + quizId;
            var img = $('#' + imgId); 
            


            var imgSrc = img.html();
            if (imgSrc.includes('unbookmark.jpg')) {
                img.html('<img src="../components/bookmark.jpg" style="width: 40%;" alt="save as favorite">');
            } else {
                img.html('<img src="../components/unbookmark.jpg" style="width: 40%;" alt="save as favorite">');
            }

            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: {
                    page: 'user',
                    command: 'addorremovefavoritequizzes',
                    quizid: quizId,
                },
                error: function(error) {
                    alert("There was an error! Try again!");
                }
            });
        });

        $("#searchbutton").click(function(){
            var formData = $("#searchquizform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response){
                    $("#quizcontainer").html(response); 
                }
            });
        })

        $("#favoritequizbutton").click(favoritebuttonclick);

        $("#userdash").click(dashboardbuttonclick);

        function dashboardbuttonclick(){
            $(this).val("Favorites");
            $(this).text("Favorites");
            $(this).attr("id", "favoritequizbutton");
            var formData = $("#dashboardform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) { 
                    $("#quizcontainer").html(response); 
                },
            });
            $('#favoritequizbutton').click(favoritebuttonclick);
        }

        function favoritebuttonclick(){
            $(this).val("Dashboard");
            $(this).text("Dashboard");
            $(this).attr("id", "userdash");
            var formData = $("#favoritequizform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response) { 
                    $("#quizcontainer").html(response); 
                },
            });
            $('#userdash').click(dashboardbuttonclick);
        }

        $("#logoutbutton").click(function(){
            $("#logoutform").submit();
        })

        
        $(".dropdown-menu span").click(function(){
            $(".dropdown_button").text($(this).text());
            $(".dropdown_button").val($(this).text());
            $(".inputlevel").val($(this).text());
            var formData = $("#filterquizform").serialize();
            $.ajax({
                type: "POST",
                url: "../controllers/controller.php",
                data: formData,
                success: function(response){
                    $("#quizcontainer").html(response); 
                },
                error: function(err){
                    alert("Error!");
                }
            });
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

