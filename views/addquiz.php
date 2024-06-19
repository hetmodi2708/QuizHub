<!DOCTYPE html>
<html>

    <head>
        <title>Create Quiz</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
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

            <div>
                <div class="btn-group button-container dropdown-button-container" style="float: left;">
                        <div class="dropdown">
                            <span >Quiz<span>
                            <button class="btn dropdown-toggle dropdown_button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Choose Subject
                            </button>
                            <ul class="dropdown-menu dropdown-menu-subject">
                                <a class="dropdown-item dropdown-item-subject" href="#">Java</a >
                                <a class="dropdown-item dropdown-item-subject" href="#">JavaScript</a >
                                <a class="dropdown-item dropdown-item-subject" href="#">Python</a >
                                <a class="dropdown-item dropdown-item-subject" href="#">AI</a >
                                <a class="dropdown-item dropdown-item-subject" href="#">C</a >
                                <a class="dropdown-item dropdown-item-subject" href="#">C++</a >
                                
                            </ul>
                        </div>
                </div>

                <div class="btn-group button-container dropdown-button-container" style="float: right; margin-right: 10%;">
                    <div class="dropdown">
                        <span >Level<span>
                        <button class="btn dropdown-toggle dropdown_button_level" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Choose Level
                        </button>
                        <ul class="dropdown-menu dropdown-menu-level">
                            <a class="dropdown-item dropdown-item-level" href="#">Beginner</a>
                            <a class="dropdown-item dropdown-item-level" href="#">Intermediate</a>
                            <a class="dropdown-item dropdown-item-level" href="#">Expert</a>                            
                        </ul>
                    </div>
                </div>

                <div style="clear: both;"></div>
            </div>
           
            <div class="question_div">
                <form method="post" action='../controllers/controller.php' id="addquizform">
                    <input type="hidden" name="page" value="admin">
                    <input type="hidden" name="command" value="addquiz">
                    <input type="hidden" name="level" id="quizlevel">
                    <input type="hidden" name="quizname" id="quizname">
                    <div class="container" >
                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[0][text]" style="font-size:18px;" class="col-form-label">Question 1</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[0][text]" id="question[0][text]" class="form-control" placeholder="Enter question #1">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[0][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[0][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[0][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[0][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>


                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[1][text]" style="font-size:18px;" class="col-form-label">Question 2</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[1][text]" id="question[1][text]" class="form-control" placeholder="Enter question #2">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[1][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[1][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[1][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[1][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[1][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[1][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[1][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[1][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[2][text]" style="font-size:18px;" class="col-form-label">Question 3</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[2][text]" id="question[2][text]" class="form-control" placeholder="Enter question #3">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[2][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[2][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[2][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[2][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[2][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[2][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[2][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[2][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[3][text]" style="font-size:18px;" class="col-form-label">Question 4</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[3][text]" id="question[3][text]" class="form-control" placeholder="Enter question #4">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[3][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[3][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[3][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[3][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[3][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[3][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[3][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[3][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[4][text]" style="font-size:18px;" class="col-form-label">Question 5</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[4][text]" id="question[4][text]" class="form-control" placeholder="Enter question #5">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[4][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[4][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[4][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[4][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[4][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[4][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[4][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[4][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[5][text]" style="font-size:18px;" class="col-form-label">Question 6</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[5][text]" id="question[5][text]" class="form-control" placeholder="Enter question #6">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[5][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[5][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[5][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[5][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[5][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[5][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[5][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[5][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[6][text]" style="font-size:18px;" class="col-form-label">Question 7</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[6][text]" id="question[6][text]" class="form-control" placeholder="Enter question #7">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[6][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[6][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[6][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[6][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[6][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[6][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[6][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[6][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[7][text]" style="font-size:18px;" class="col-form-label">Question 8</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[7][text]" id="question[7][text]" class="form-control" placeholder="Enter question #8">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[7][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[7][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[7][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[7][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[7][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[7][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[7][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[7][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[8][text]" style="font-size:18px;" class="col-form-label">Question 9</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[8][text]" id="question[8][text]" class="form-control" placeholder="Enter question #9">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[8][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[8][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[8][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[8][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[8][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[8][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[8][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[8][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>
                            </div>
                        </div>

                        <div class="question_container">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="question[9][text]" style="font-size:18px;" class="col-form-label">Question 10</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="question[9][text]" id="question[9][text]" class="form-control" placeholder="Enter question #10">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[9][correctOption]" value="a" aria-label="Option (a)">
                                    </div>
                                </div>
                                <input type="text" name="questions[9][options][]" class="form-control" placeholder="Enter option (a)"><div class="w-100"></div>
                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[9][correctOption]" value="b" aria-label="Option (b)">
                                    </div>
                                </div>
                                <input type="text" name="questions[9][options][]" class="form-control" placeholder="Enter option (b)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[9][correctOption]" value="c" aria-label="Option (c)">
                                    </div>
                                </div>
                                <input type="text" name="questions[9][options][]" class="form-control" placeholder="Enter option (c)"><div class="w-100"></div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="questions[9][correctOption]" value="d" aria-label="Option (d)">
                                    </div>
                                </div>
                                <input type="text" name="questions[9][options][]" class="form-control" placeholder="Enter option (d)"><div class="w-100"></div>     
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" id="addquizsubmitbutton">Add Quiz</button>
                </form>
            </div>
            

            <iframe src="../views/footer.php" frameborder="0" style="width: 100%; height: 80px; background-color: #e5e4e2;"></iframe>
        </div>
    </body>


    <script>
        $("#admindashboardbutton").click(function(){
            $("#admindashboardform").submit();
        })

        $("#logoutbutton").click(function(){
            $("#logoutform").submit();
        })



        $(function(){
            $(".dropdown-menu-subject a").click(function(){
                
                $("#quizname").val($(this).text());
                $(".dropdown_button").text($(this).text());
                $(".dropdown_button").val($(this).text());
            })
        })

        $(function(){
            $(".dropdown-menu-level a").click(function(){
                
                $("#quizlevel").val($(this).text());
                $(".dropdown_button_level").text($(this).text());
                $(".dropdown_button_level").val($(this).text());
            })
        })

  
        $("#addquizsubmitbutton").click(function(e){
            e.preventDefault(); 
    
            let isValid = true;
            let unansweredQuestions = [];

            $('.question_container').each(function(index, container) {
                let question = $(container).find('input[type="text"]').first().val();
                let options = $(container).find('input[type="text"]').slice(1);
                let correctOption = $(container).find('input[type="radio"]:checked');

                if (!question) {
                    isValid = false;
                    unansweredQuestions.push(index + 1);
                    $(container).find('input[type="text"]').first().css('border', '2px solid red');
                } else {
                    $(container).find('input[type="text"]').first().css('border', '');
                }

                options.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).css('border', '2px solid red');
                    } else {
                        $(this).css('border', '');
                    }
                });

                if (correctOption.length === 0) {
                    isValid = false;
                    $(container).find('.input-group-text').css('border', '2px solid red');
                } else {
                    $(container).find('.input-group-text').css('border', '');
                }
            });

            if (isValid) {
                var formData = $("#addquizform").serialize(); 
                $.ajax({
                    type: "POST",
                    url: $('#addquizform').attr('action'), 
                    data: formData,
                    success: function(response) {
                        alert("Quiz successfully added!");
                    },
                    error:  function(xhr, status, error) {
                        alert("An error occurred: " + xhr.responseText);
                    }
                });
            } else {
                let message = "Please complete all questions";
                if (unansweredQuestions.length > 0) {
                    message += " (missing data for question(s): " + unansweredQuestions.join(", ") + ")";
                }
                alert(message);
            }
        });


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