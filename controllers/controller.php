<?php
    if (empty($_POST['page']) ) {  
        $display_modal_window = 'none';  
        include ('../views/index.php');
        exit();
    }

    require('../model/model.php');  

    function adminDashboardOverview($quizzes){
        $str = "";
        $i = 0;
        
        for($i = 0; $i < count($quizzes); $i++){
            if($i == 0){
                $str .= "<div class='row' style='margin-left: auto; '>";
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='admin'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                $str .= "<button type='buton' id='viewquizsubmitbutton'  class='btn btn-primary'>View Quiz</button>";
                //$str .= "<div class='row'> <div class='col-8'><button type='button' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button></div> <button type='button' id='savefavoritebutton' class='btn col-4 savefavoritebutton' data-quiz-id='bookmark-icon-" . $quizzes[$i]["Id"] . "'><img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>";
                $str .= "</div> </div></form> </div>";
            }
            else if($i != 0 && $i % 3 == 0){
                $str .= "</div>";
                $str .= "<div class='row' style='margin-left: auto; '>";
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='admin'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                $str .=  "<button type='buton' id='viewquizsubmitbutton'  class='btn btn-primary'>View Quiz</button>";
               // $str .= "<div class='row'> <div class='col-8'><button type='button' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button></div> <button type='button' id='savefavoritebutton' class='btn col-4 savefavoritebutton' data-quiz-id='bookmark-icon-" . $quizzes[$i]["Id"] . "'><img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>";
                $str .= "</div> </div> </form> </div>";
                
            } else{
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='admin'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                $str .=  "<button type='buton' id='viewquizsubmitbutton'  class='btn btn-primary'>View Quiz</button>";
                //$str .=  "<div class='row'> <div class='col-8'><button type='button' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button></div> <button type='button' id='savefavoritebutton' class='btn col-4 savefavoritebutton' data-quiz-id='bookmark-icon-" . $quizzes[$i]["Id"] . "'><img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>";
                $str .= "</div> </div> </form> </div>";
            }

        }
        return $str;
    }

    function userDashboardOverview($quizzes){
        $str = "";
        $i = 0;
        $favQuizzes = getFavoriteQuizzes($_SESSION['username']);
        $quizIds = array_column($favQuizzes, 'QuizId');
        
        for($i = 0; $i < count($quizzes); $i++){
            if($i == 0){
                $str .= "<div class='row ' style='margin-left: auto; '>";
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='user'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                
                $str .= "<div class='row'> <div class='col-8'><button type='buton' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button></div> <button type='button' data-quiz-id='". $quizzes[$i]["Id"] ."' class='btn col-4 savefavoritebutton' id='bookmark-icon-" . $quizzes[$i]["Id"] . "'>";
                $str .= in_array($quizzes[$i]["Id"], $quizIds) ?  "<img src='../components/bookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>" : "<img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>";
                $str .= "</div> </div></form> </div>";
            }
            else if($i != 0 && $i % 3 == 0){
                $str .= "</div>";
                $str .= "<div class='row ' style='margin-left: auto; '>";
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='user'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                
                $str .= "<div class='row'> <div class='col-8'><button type='buton' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button></div> <button type='button' data-quiz-id='". $quizzes[$i]["Id"] ."' class='btn col-4 savefavoritebutton' id='bookmark-icon-" . $quizzes[$i]["Id"] . "'>";
                $str .= in_array($quizzes[$i]["Id"], $quizIds) ?  "<img src='../components/bookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>" : "<img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'></button> </div>";
                $str .= "</div> </div> </form> </div>";
                
            } else{
                $str .= "<form method='post' action='../controllers/controller.php' id='quiz-btn'> <input type='hidden' name='page' value='user'> <input type='hidden' name='command' value='quizbuttonclick'>";
                $str .= "<input type='hidden' name='quizid' value='". $quizzes[$i]["Id"] ."'>";
                $str .= "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-12'><div class='card' style='width: 18rem; margin-bottom: 15px'> <img class='card-img-top' src='../components/" . $quizzes[$i]["Name"] . ".jpg' alt='Card image cap'> <div class='card-body' style='text-align:center; background-color: #053c6b; color: #e5e4e2;'> <h5 class='card-title'> Quiz ". $quizzes[$i]["Name"] ."</h5>";
                $str .= "<p class='card-text'> Level: " . $quizzes[$i]["Level"] ."</p>";
                $str .=  "     <div class='row'> ";
                $str .= "         <div class='col-8'>";
                $str.="                <button type='buton' id='takequizsubmitbutton'  class='btn btn-primary'>Take Quiz</button>";
                $str.="            </div>";
                $str.="            <button type='button' data-quiz-id='". $quizzes[$i]["Id"] ."' class='btn col-4 savefavoritebutton' id='bookmark-icon-" . $quizzes[$i]["Id"] . "'>";
                $str.=in_array($quizzes[$i]["Id"], $quizIds) ?  "<img src='../components/bookmark.jpg' style='width: 40%;' alt='save as favorite'>" : "                <img src='../components/unbookmark.jpg' style='width: 40%;' alt='save as favorite'>";
                $str.="            </button> ";
                $str.="        </div>";

                $str .= "</div> </div> </form> </div>";
            }

        }
        return $str;
    }

    function updateProfile($user, $role){
        $str =  "<form method='post' id='editprofileform' class='form-container'>";
                $str .= "   <input type='hidden' name='page' value='". $role ."'>";
                $str .= "   <input type='hidden' name='command' value='editprofilesubmit' id='editcommand'>";
                $str .= "   <input type='hidden' name='userid' value=". $user[0]["Id"] .">";
                $str .= "   <div class='form-group'>";
                $str .= "       <label for='email'>EMAIL</label>";
                $str .= "       <input type='text' class='form-control' name='email' id='email' value=" . $user[0]["Username"] . ">";
                $str .= "   </div>";
                $str .= "   <div class='form-group'>";
                $str .= "       <label for='name'>NAME</label>";
                $str .= "       <input type='text' class='form-control' name='name' id='name' value=" . $user[0]["Name"] .">";
                $str .= "   </div>";
                $str .= "   <div class='form-group'>";
                $str .= "       <label for='password'>PASSWORD</label>";
                $str .= "       <input type='password' class='form-control' name='password' id='password' value='Enter new password' disabled>";
                $str .= "   </div>";
                $str .= "   <div class='form-group'>";
                $str .= "       <label for='confirm-password'>CONFIRM PASSWORD</label>";
                $str .= "       <input type='password' class='form-control' name='confirm-password' id='confirm-password' value='Enter new password' disabled>";
                $str .= "   </div>";
                $str .= "   <button type='button' class='btn btn-primary btn-block' id='editprofilesubmitbutton'>EDIT PROFILE</button>";
                $str .= "   <button type='button' class='btn btn-primary btn-block' id='editpasswordsubmitbutton'>EDIT PASSWORD</button>";
                $str .= "</form>";
                echo $str;
    }

    if ($_POST['page'] == 'index')
    {
        $command = $_POST['command'];
        switch($command) {
            case 'login':  
                $hashed_password = hash("SHA256", $_POST['login-password']);
                
                if (empty($_POST['username']) || $hashed_password == 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855' || !loginverification($_POST['username'], $hashed_password)) {
                    $error_msg_username = '* Wrong username, or';
                    $error_msg_password = '* Wrong password';
                    $display_modal_window = 'LogIn';
                    include('../views/index.php');  
                } else{
                    session_start();
                    $name = "username";
                    $_SESSION[$name] = $_POST['username'];
                    $role_user_or_admin = json_decode(getAuthenticatedUserRole($_POST['username']), true);
                    if($role_user_or_admin[0]["Role"] == 'Admin')
                        include ('../views/admindashboard.php');  
                    else if($role_user_or_admin[0]["Role"] == 'User')
                        include ('../views/dashboard.php'); 
                    else
                        include ('../views/index.php');
                }
                exit();
            case 'signup':
                $hashed_password = hash("SHA256", $_POST['password']);
                $str = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                $hashed_confirm_password = hash("SHA256", $_POST['confirm-password']);
                $name_regex = '/^[a-zA-Z]+[a-zA-z ]*$/';
                if($hashed_password != $hashed_confirm_password){
                    $error_msg_password_signup = '* Passwords do not match';
                    $display_modal_window = 'SignUp';
                    include('../views/index.php');
                   
                } else if(!preg_match($name_regex, $_POST['name']) || empty($_POST['email']) ||  $hashed_password == 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855' ||  !preg_match($str, $_POST['email']) || !signupverification($_POST['name'], $_POST['email'], $hashed_password) ){
                    $error_msg_password_signup = '* invalid password';
                    $error_msg_username_signup = '* invalid or already exist username(email), or';
                    $display_modal_window = 'SignUp';
                    include('../views/index.php');
                } else{
                    $display_modal_window = 'LogIn';
                    include('../views/index.php');
                }
                exit();
            default:
                exit();
           
        }
    }

    else if($_POST['page'] == 'adminheader'){
        session_start();
        if(!isset($_SESSION['username'])){
            include('../views/index.php');
            exit();
        }
        $role = json_decode(getAuthenticatedUserRole($_SESSION['username']), true);
        if($role[0]['Role'] != 'Admin'){
            include('../views/index.php');
            exit();
        }
        switch ($_POST['command']){
            case 'addquiz':
                include('../views/addquiz.php');
                exit();
            
            case 'logout':
                session_unset();
                session_destroy();
                include('../views/index.php');
                exit();
            
            case 'admindashboard':
                include('../views/admindashboard.php');
                exit();

            default:
                include('../views/index.php');
                exit();
                
        }


    }

    else if($_POST['page'] == 'userheader'){
        session_start();
        if(!isset($_SESSION['username'])){
            include('../views/index.php');
            exit();
        }
        $role = json_decode(getAuthenticatedUserRole($_SESSION['username']), true);
        if($role[0]['Role'] != 'User'){
            include('../views/index.php');
            exit();
        }
        switch ($_POST['command']){
            case 'getfavoritequizzes':
                exit();
            
            case 'logout':
                session_unset();
                session_destroy();
                include('../views/index.php');
                exit();
            
            case 'userdashboard':
                include('../views/dashboard.php');
                exit();

            default:
                include('../views/index.php');
                exit();
                
        }


    }

    else if($_POST['page'] == 'admin'){
        session_start();
        if(!isset($_SESSION['username'])){
            include('../views/index.php');
            exit();
        }
        $role = json_decode(getAuthenticatedUserRole($_SESSION['username']), true);
        if($role[0]['Role'] != 'Admin'){
            include('../views/index.php');
            exit();
        }
        switch($_POST['command']){
            case 'addquiz':
                $username = $_SESSION['username'];
                $result = addQuiz($_POST['quizname'], $_POST['level'], $username);
                if(!$result){
                    echo "There was an error adding quiz! Please try again later!";
                    exit();
                }
                $quizdata = [];
                for($x = 0; $x < 10; $x++){
                    $questionText = $_POST['question'][$x]['text']; 
                    $options = $_POST['questions'][$x]['options']; 
                    $correctOptionIndex = $_POST['questions'][$x]['correctOption']; 
                    $quizData[] = [
                        'question' => $questionText,
                        'options' => $options,
                        'correctOption' => $correctOptionIndex,
                    ];
                }
                $result1 = addQuizQuestions($quizData, $result);
                if($result1){
                    echo "Quiz added successfully";
                    exit();
                }else{
                    echo "There was an error adding quiz! Please try again later!";
                    exit();
                }

            case 'getallquizzes':
                $res = getAllQuizes();
                if(empty($res)){
                    exit();
                }
                $str = adminDashboardOverview($res);
                echo $str;
                exit();
                
            case 'quizbuttonclick':
                $_SESSION['id'] = $_POST['quizid'];
                include('../views/viewquiz.php');
                exit();

            case 'viewquiz':
                $qdata = getQuizData( $_SESSION['id']);
                $data = getQuizInfo($_SESSION['id']);
                $str = "";

                $str .= "<div> <div class='btn-group button-container dropdown-button-container' style='float: left;'>";
                $str .= "<div> <span id='subject'>Subject " . $data["Name"] . "</span>";
                $str .= "</div> </div>";

                $str .= "<div class='btn-group button-container dropdown-button-container' style='float: right; margin-right: 10%;'>";
                $str .= "<div> <span id='level'>Level " . $data["Level"] . "</span>";
                $str .= "</div> </div>";

                $str .= "<div style='clear: both'></div> </div>";

                $str .= "<div class='question_div'> <div class='container'>";
                if(empty($qdata)){
                    exit();
                }
                $a = ["a", "b", "c", "d"];
                
                for($i = 0; $i < count($qdata); $i++){
                    $str .= "<div class='question_container'>";
                    $str .= "<div class='row g-2 align-items-center'>";
                    $str .= "<div class='col-3'>";
                    $str .= "<label for='question[" . $i ."][text]' style='font-size:18px;' class='col-form-label'>Question " . ($i+1) . "</label> </div>";
                    $str .= "<div class='col-9'> <p style='background-color: white;'>" . $qdata[$i]["Question"] ."</p> </div> </div>";
                    $str .= "<div class='input-group'>";
                    $qdata[$i]["CorrectOption"] == $a[0] ? $str .= "<p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" : $str .= "<p style='margin-left: 15px; background-color: white; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                    $qdata[$i]["CorrectOption"] == $a[1] ? $str .= " <p  style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>" : $str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>"; 
                    $qdata[$i]["CorrectOption"] == $a[2] ? $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>" : $str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                    $qdata[$i]["CorrectOption"] == $a[3] ? $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>" : $str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                    $str .= "</div> </div>";
                }
                $str .= "</div> </div> ";
                echo $str;
                exit();

            case 'searchquiz':
                if(!empty($_POST['inputterm'])){
                    $quizzes = searchQuizzes($_POST['inputterm']);
                    $str = "";
                    if(isset($quizzes)){
                        $str .= adminDashboardOverview($quizzes);
                    }
                    echo $str;
                    exit();
                }else{
                    $res = getAllQuizes();
                    if(empty($res)){
                        exit();
                    }
                    $str = adminDashboardOverview($res);
                    echo $str;
                    exit();
                }

            case 'filterquiz':
                if(!empty($_POST['inputlevel'])){
                    $quizzes = filterQuizzes($_POST['inputlevel']);
                    $str = "";
                    if(isset($quizzes)){
                        $str .= adminDashboardOverview($quizzes);
                    }
                    echo $str;
                    exit();
                }else{
                    $res = getAllQuizes();
                    if(empty($res)){
                        exit();
                    }
                    $str = adminDashboardOverview($res);
                    echo $str;
                    exit();
                }
            
                case 'updateprofilebutton':
                    include('../views/adminupdateprofile.php');
                    exit();
    
                case 'updateprofile':
                    $username = $_SESSION['username'];
                    $user = getACcountDetails($username);
                    
                    $str = updateProfile($user, "admin");
                    echo $str;
                    exit();
    
                    case 'editprofilewithpasswordsubmit':
                        $hashed_password = hash("SHA256", $_POST['admin-password']);
                        $str = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                        $hashed_confirm_password = hash("SHA256", $_POST['admin-confirm-password']);
                        if($hashed_password != $hashed_confirm_password){
                            echo "Insert same values for password and confrim password";
                            exit();
                        } 
                        $userdetails[] = [
                            'userId' => (int) $_POST['userid'],
                            'username' => $_POST['email'],
                            'name' => $_POST['name'],
                            'password' => $hashed_password,
                        ];
                        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['admin-password']) || !editProfileAndPassword($userdetails)){
                            echo "There was an error while updating your profile! Please try again later with correct values";
                        } else{
                            $_SESSION['username'] = $_POST['email'];
                            echo "Profile Updated successfully";
                        }
                        exit();
        
                    case 'editprofilesubmit':
                        $userdetails[] = [
                            'userId' => (int) $_POST['userid'],
                            'username' => $_POST['email'],
                            'name' => $_POST['name'],
                        ];
                        if(empty($_POST['name']) || empty($_POST['email']) || !editProfile($userdetails)){
                            echo "There was an error while updating your profile! Please try again later with correct values";
                        } else{
                            $_SESSION['username'] = $_POST['email'];
                            echo "Profile Updated successfully";
                        }
                        exit();
    
                case 'deleteprofile':
                    $username = $_SESSION['username'];
                    $result = deleteProfile($username);
                    if($result){
                        session_unset();
                        session_destroy();
                        include('../views/index.php');
                        exit();
                    }else{
                        echo "There was an error while deleting the profile! Please try again later!";
                        exit();
                    }
    
                default:
                    include('../views/index.php');
                    exit();
        }

        
    }

    else if($_POST['page'] == 'user'){
        session_start();
        if(!isset($_SESSION['username'])){
            include('../views/index.php');
            exit();
        }
        $role = json_decode(getAuthenticatedUserRole($_SESSION['username']), true);
        if($role[0]['Role'] != 'User'){
            include('../views/index.php');
            exit();
        }
        switch($_POST['command']){
            case 'getallquizzes':
                $res = getAllQuizes();
                if(empty($res)){
                    exit();
                }
                $str = userDashboardOverview($res);
                echo $str;
                exit();
                
            case 'quizbuttonclick':
                $_SESSION['id'] = $_POST['quizid'];
                include('../views/takequiz.php');
                exit();

            case 'takequiz':
                $qdata = getQuizData( $_SESSION['id']);
                $data = getQuizInfo($_SESSION['id']);
                $str = "";
                $userdata = checkSubmittedQuiz($_SESSION['id'], $_SESSION['username'] );
                if($userdata){
                    $submittedOptions = array();
                    $i = 0;
                    for($j = 0; $j < 10; $j++){
                       
                        $submittedOptions[$i++] = $userdata[$j]['SelectedOption'];
                        
                    }

                    $str .= "<div> <div class='btn-group button-container dropdown-button-container' style='float: left;'>";
                    $str .= "<div> <span id='subject'>Subject " . $data["Name"] . "</span>";
                    $str .= "</div> </div>";
    
                    $str .= "<div class='btn-group button-container dropdown-button-container' style='float: right; margin-right: 10%;'>";
                    $str .= "<div> <span id='level'>Level " . $data["Level"] . "</span>";
                    $str .= "</div> </div>";
    
                    $str .= "<div style='clear: both'></div> </div>";
    
                    $str .= "<div class='question_div'> <div class='container'>";
                    if(empty($qdata)){
                        exit();
                    }
                    $a = ["a", "b", "c", "d"];
                    
                    for($i = 0; $i < count($qdata); $i++){
                        $str .= "<div class='question_container'>";
                        $str .= "<div class='row g-2 align-items-center'>";
                        $str .= "<div class='col-3'>";
                        $str .= "<label for='question[" . $i ."][text]' style='font-size:18px;' class='col-form-label'>Question " . ($i+1) . "</label> </div>";
                        $str .= "<div class='col-9'> <p style='background-color: white;'>" . $qdata[$i]["Question"] ."</p> </div> </div>";
                        $str .= "<div class='input-group'>";
                        if( $submittedOptions[$i] == $a[0] && $qdata[$i]["CorrectOption"] == $a[0]){
                            $str .= "<p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                        }else if($submittedOptions[$i] == $a[0] && $qdata[$i]["CorrectOption"] != $a[0]){
                            $str .= "<p style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                        } else if($submittedOptions[$i] != $a[0]){
                            $str .= "<p style='margin-left: 15px; background-color: white; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                        }
                        
                        if($submittedOptions[$i] == $a[1] && $qdata[$i]["CorrectOption"] == $a[1]) $str .= " <p  style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>" ;
                        else if($submittedOptions[$i] == $a[1] && $qdata[$i]["CorrectOption"] != $a[1]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>";
                        else if($submittedOptions[$i] != $a[1])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>";
                        if($submittedOptions[$i] == $a[2] && $qdata[$i]["CorrectOption"] == $a[2]) $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>" ;
                        else if($submittedOptions[$i] == $a[2] && $qdata[$i]["CorrectOption"] != $a[2]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                        else if($submittedOptions[$i] != $a[2])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                        if($submittedOptions[$i] == $a[3] && $qdata[$i]["CorrectOption"] == $a[3]) $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                        else if($submittedOptions[$i] == $a[3] && $qdata[$i]["CorrectOption"] != $a[3]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                        else if($submittedOptions[$i] != $a[3])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                        $str .= "</div> </div>";
                    }
                    $str .= "</div> </div> ";
    
                    echo $str;
                    exit();
                }
                else{
                    

                    $str .= "<div> <div class='btn-group button-container dropdown-button-container' style='float: left;'>";
                    $str .= "<div> <span id='subject'>Subject " . $data["Name"] . "</span>";
                    $str .= "</div> </div>";

                    $str .= "<div class='btn-group button-container dropdown-button-container' style='float: right; margin-right: 10%;'>";
                    $str .= "<div> <span id='level'>Level " . $data["Level"] . "</span>";
                    $str .= "</div> </div>";

                    $str .= "<div style='clear: both'></div> </div>";

                    $str .= "<div class='question_div'> <form method='post'  id='submitquizform'>";
                    $str .= "<input type='hidden' name='page' value='user'>";
                    $str .= "<input type='hidden' name='command' value='submitquiz'>";
                    $str .= " <div class='container'>";
                    if(empty($qdata)){
                        exit();
                    }
                    $a = ["a", "b", "c", "d"];
                    
                    for($i = 0; $i < count($qdata); $i++){
                        $str .= "<div class='question_container'>";
                        $str .= "<div class='row g-2 align-items-center'>";
                        $str .= "<div class='col-3'>";
                        $str .= "<label for='question[" . $i ."][text]' style='font-size:18px;' class='col-form-label'>Question " . ($i+1) . "</label> </div>";
                        $str .= "<div class='col-9'> <p style='background-color: white;'>" . $qdata[$i]["Question"] ."</p> </div> </div>";
                        $str .= "<div class='input-group'>";
                        $str .= "<div class='input-group-prepend'> <div class='input-group-text'> <input type='radio' name='questions[" . $i . "][option]' value='a' aria-label='Option (a)'> </div> </div>";
                        $str .= "<p style='margin-left: 15px; background-color: white; width:90%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                        $str .= "<div class='input-group-prepend'> <div class='input-group-text'> <input type='radio' name='questions[" . $i . "][option]' value='b' aria-label='Option (b)'> </div> </div>";
                        $str .= " <p  style='margin-left: 15px; background-color: white ; width:90%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>";
                        $str .= "<div class='input-group-prepend'> <div class='input-group-text'> <input type='radio' name='questions[" . $i . "][option]' value='c' aria-label='Option (c)'> </div> </div>"; 
                        $str .= " <p  style='margin-left: 15px; background-color: white ; width:90%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                        $str .= "<div class='input-group-prepend'> <div class='input-group-text'> <input type='radio' name='questions[" . $i . "][option]' value='d' aria-label='Option (d)'> </div> </div>";
                        $str .= " <p  style='margin-left: 15px; background-color: white ; width:90%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                        $str .= "</div> </div>";
                    }
                    $str .= "</div>";
                    $str .= "<button type='button' class='btn btn-primary' id='submitquizbutton'>Submit Quiz</button> </form> </div> ";
                    echo $str;
                    exit();
                }

            case 'submitquiz':
                $qdata = getQuizData( $_SESSION['id']);
                $data = getQuizInfo($_SESSION['id']);

                $submittedOptions = array();
                $quizdata = [];
                $i = 0;
                $count = 0;
                for($j = 0; $j < 10; $j++){
                    $qid = $qdata[$j]["QId"];
                    $submittedOption = $_POST['questions'][$j]['option']; 
                    $correctOption = $qdata[$j]["CorrectOption"];
                    if($submittedOption == $correctOption) $count++;
                    $submittedOptions[$i++] = $_POST['questions'][$j]['option'];
                    $quizdata[] = [
                        'quizId' => $_SESSION['id'],
                        'qid' => $qid,
                        'submittedoption' => $submittedOption,
                        'correctOption' => $correctOption,
                    ];
                }

                $result = submitQuiz($quizdata, $_SESSION['username'], $count);
                if(!$result){
                    echo "Something went wrong!";
                    exit();
                }
                $str = "";

                $str .= "<div> <div class='btn-group button-container dropdown-button-container' style='float: left;'>";
                $str .= "<div> <span id='subject'>Subject " . $data["Name"] . "</span>";
                $str .= "</div> </div>";

                $str .= "<div class='btn-group button-container dropdown-button-container' style='float: right; margin-right: 10%;'>";
                $str .= "<div> <span id='level'>Level " . $data["Level"] . "</span>";
                $str .= "</div> </div>";

                $str .= "<div style='clear: both'></div> </div>";

                $str .= "<div class='question_div'> <div class='container'>";
                if(empty($qdata)){
                    exit();
                }
                $a = ["a", "b", "c", "d"];
                
                for($i = 0; $i < count($qdata); $i++){
                    $str .= "<div class='question_container'>";
                    $str .= "<div class='row g-2 align-items-center'>";
                    $str .= "<div class='col-3'>";
                    $str .= "<label for='question[" . $i ."][text]' style='font-size:18px;' class='col-form-label'>Question " . ($i+1) . "</label> </div>";
                    $str .= "<div class='col-9'> <p style='background-color: white;'>" . $qdata[$i]["Question"] ."</p> </div> </div>";
                    $str .= "<div class='input-group'>";
                    if( $submittedOptions[$i] == $a[0] && $qdata[$i]["CorrectOption"] == $a[0]){
                        $str .= "<p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                    }else if($submittedOptions[$i] == $a[0] && $qdata[$i]["CorrectOption"] != $a[0]){
                        $str .= "<p style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                    } else if($submittedOptions[$i] != $a[0]){
                        $str .= "<p style='margin-left: 15px; background-color: white; width:100%'>" . $qdata[$i]["OptionA"] . "</p> <div class='w-100'></div>" ;
                    }
                    
                    if($submittedOptions[$i] == $a[1] && $qdata[$i]["CorrectOption"] == $a[1]) $str .= " <p  style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>" ;
                    else if($submittedOptions[$i] == $a[1] && $qdata[$i]["CorrectOption"] != $a[1]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>";
                    else if($submittedOptions[$i] != $a[1])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionB"] . "</p> <div class='w-100'></div>";
                    if($submittedOptions[$i] == $a[2] && $qdata[$i]["CorrectOption"] == $a[2]) $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>" ;
                    else if($submittedOptions[$i] == $a[2] && $qdata[$i]["CorrectOption"] != $a[2]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                    else if($submittedOptions[$i] != $a[2])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionC"] . "</p> <div class='w-100'></div>";
                    if($submittedOptions[$i] == $a[3] && $qdata[$i]["CorrectOption"] == $a[3]) $str .= " <p style='margin-left: 15px; background-color: #c5ebce; color: #333F48 ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                    else if($submittedOptions[$i] == $a[3] && $qdata[$i]["CorrectOption"] != $a[3]) $str .= " <p  style='margin-left: 15px; background-color: red; color: #e5e4e2; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                    else if($submittedOptions[$i] != $a[3])$str .= " <p  style='margin-left: 15px; background-color: white ; width:100%'>" . $qdata[$i]["OptionD"] . "</p> <div class='w-100'></div>";
                    $str .= "</div> </div>";
                }
                $str .= "</div> </div> ";

                echo $str;
                exit();

            case 'addorremovefavoritequizzes':
                $quizId = $_POST['quizid'];
                $username = $_SESSION['username'];
                $result = addOrRemoveFavoriteQuizzes($username, $quizId);
                if($result){
                    return true;
                }else{
                    return false;
                }
            
            case 'getfavoritequizzes':
                $username = $_SESSION['username'];
                $res = getFavoriteQuizInfo($username);
                if(empty($res)){
                    exit();
                }
                $str = userDashboardOverview($res);
                echo $str;
                exit();
                

            case 'searchquiz':
                if(!empty($_POST['inputterm'])){
                    $quizzes = searchQuizzes($_POST['inputterm']);
                    $str = "";
                    if(isset($quizzes)){
                        $str .= userDashboardOverview($quizzes);
                    }
                    echo $str;
                    exit();
                }else{
                    $res = getAllQuizes();
                    if(empty($res)){
                        exit();
                    }
                    $str = userDashboardOverview($res);
                    echo $str;
                    exit();
                }

            case 'filterquiz':
                if(!empty($_POST['inputlevel'])){
                    $quizzes = filterQuizzes($_POST['inputlevel']);
                    $str = "";
                    if(isset($quizzes)){
                        $str .= userDashboardOverview($quizzes);
                    }
                    echo $str;
                    exit();
                }else{
                    $res = getAllQuizes();
                    if(empty($res)){
                        exit();
                    }
                    $str = userDashboardOverview($res);
                    echo $str;
                    exit();
                }

            case 'result':
                include('../views/viewresult.php');
                exit();

            case 'viewresult':
                $username = $_SESSION['username'];
                $scoredata = getResults($username);
                $str = "<table class='table table-custom'>
                            <thead>
                                <tr>
                                    <th scope='col'>Quiz Name</th>
                                    <th scope='col'>Level</th>
                                    <th scope='col'>Obtained Marks</th>
                                    <th scope='col'>Total Marks</th>
                                </tr>
                            </thead>
                            <tbody>'";
                foreach ($scoredata as $row) {
                    $str .= "<tr> <td>".($row['Name'])."</td> <td>".($row['Level'])."</td> <td>".($row['ObtainedMarks']).'</td> <td>10</td> </tr>';
                }
                $str .= "</tbody></table>";
                echo $str;
                exit();
            
            case 'updateprofilebutton':
                include('../views/updateprofile.php');
                exit();

            case 'updateprofile':
                $username = $_SESSION['username'];
                $user = getACcountDetails($username);
                
                $str = updateProfile($user, "user");
                echo $str;
                exit();

            case 'editprofilewithpasswordsubmit':
                $hashed_password = hash("SHA256", $_POST['password']);
                $str = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                $hashed_confirm_password = hash("SHA256", $_POST['confirm-password']);
                if($hashed_password != $hashed_confirm_password){
                    echo "Insert same values for password and confrim password";
                    exit();
                } 
                $userdetails[] = [
                    'userId' => (int) $_POST['userid'],
                    'username' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => $hashed_password,
                ];
                if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || !editProfileAndPassword($userdetails)){
                    echo "There was an error while updating your profile! Please try again later with correct values";
                } else{
                    $_SESSION['username'] = $_POST['email'];
                    echo "Profile Updated successfully";
                }
                exit();

            case 'editprofilesubmit':
                $userdetails[] = [
                    'userId' => (int) $_POST['userid'],
                    'username' => $_POST['email'],
                    'name' => $_POST['name'],
                ];
                if(empty($_POST['name']) || empty($_POST['email']) || !editProfile($userdetails)){
                    echo "There was an error while updating your profile! Please try again later with correct values";
                } else{
                    $_SESSION['username'] = $_POST['email'];
                    echo "Profile Updated successfully";
                }
                exit();

            case 'deleteprofile':
                $username = $_SESSION['username'];
                $result = deleteProfile($username);
                if($result){
                    session_unset();
                    session_destroy();
                    include('../views/index.php');
                    exit();
                }else{
                    echo "There was an error while deleting the profile! Please try again later!";
                    exit();
                }
            default:
                include('../views/index.php');
                exit();

        }

    }


?>  

