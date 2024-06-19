<?php

    $conn = mysqli_connect('localhost', 'w3hmodi', 'w3hmodi136', 'C354_w3hmodi');

    function loginverification($username, $password){
        global $conn;
        $query = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            return true;
        } else{
            return false;
        }
    }

    function signupverification($name, $email, $password ){
        global $conn;
        $query = "SELECT * FROM Users WHERE Username = '$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            return false;
        } else{
            $query = "INSERT INTO Users (Id, Name, Username, Password, Role) VALUES (null, '$name', '$email', '$password', 'User')";
            $result = mysqli_query($conn, $query);
            if($result)
                return true;
            else
                return false;
        }
    }

    function getAuthenticatedUserRole($username){
        global $conn;
        $query = "SELECT Role from Users where Username = '$username'";
        $result = mysqli_query($conn, $query);
        $role = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
            $role[$i++] = $row;
        $roles = json_encode($role);
        return $roles;
    }

    function addQuiz($name, $level, $username){
        global $conn;
        $query1 = "SELECT Id FROM Users where Username = '$username'";
        $result = mysqli_query($conn, $query1);
        $id = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
            $id[$i++] = $row;
        $userid = $id[0]['Id'];
        $query = "INSERT INTO Quiz (Id, Name, Level, CreatedBy) VALUES (null, '$name', '$level', $userid)";
        $result = mysqli_query($conn, $query);
        if($result){
            $last_id = mysqli_insert_id($conn);
            return $last_id;
        }
        else
            return false;
    }

    function addQuizQuestions($quizdata, $quizId){
        global $conn;
        foreach($quizdata as $index => $qd){

            $q = $qd['question'];
            $o1 = $qd['options'][0];
            $o2 = $qd['options'][1];
            $o3 = $qd['options'][2];
            $o4 = $qd['options'][3];
            $co = $qd['correctOption'];
            $query = "INSERT INTO QuizData (Qid, QuizId, Question, OptionA, OptionB, OptionC, OptionD, CorrectOption) VALUES (null, $quizId, '$q', '$o1', '$o2', '$o3', '$o4', '$co')";
            $result = mysqli_query($conn, $query);
            if(!$result){
                return false;
            }
        }
        return true;
    }

    function getAllQuizes(){
        global $conn;
        $query = "SELECT Id, Name, Level FROM Quiz";
        $result = mysqli_query($conn, $query);
        $quizzes = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $quizzes[$i++] = $row;
        }
        if(mysqli_num_rows($result) >= 1){
            return ($quizzes);
        }
    }

    function getQuizData($quizId){
        global $conn;
        $query = "SELECT QId, Question, OptionA, OptionB, OptionC, OptionD, CorrectOption FROM QuizData WHERE QuizId = $quizId";
        $result = mysqli_query($conn, $query);
        $qdata = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $qdata[$i++] = $row;
        }
        return ($qdata);
    }

    function getQuizInfo($quizId){
        global $conn;
        $query = "SELECT Name, Level FROM Quiz WHERE Id = $quizId";
        $result = mysqli_query($conn, $query);
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data = $row;
        }
        return $data;
    }

    function searchQuizzes($inputQuiz){
        global $conn;
        $sql = "SELECT Id, Name, Level FROM Quiz where Name like '%$inputQuiz%'";
        $result = mysqli_query($conn, $sql);
        $quizzes = array();
        $i = 0;
        if(mysqli_num_rows($result) <= 0){
            return $quizzes;
        }
        while($row = mysqli_fetch_assoc($result)){
            $quizzes[$i++] = $row;
        }
        return $quizzes;
    }

    function filterQuizzes($inputQuizLevel){
        global $conn;
        $sql = "SELECT Id, Name, Level FROM Quiz where Level = '$inputQuizLevel'";
        $result = mysqli_query($conn, $sql);
        $quizzes = array();
        $i = 0;
        if(mysqli_num_rows($result) <= 0){
            return $quizzes;
        }
        while($row = mysqli_fetch_assoc($result)){
            $quizzes[$i++] = $row;
        }
        return $quizzes;
    }

    function submitQuiz($quizdata, $username, $obtainedmarks){
        global $conn;
        $query1 = "SELECT Id FROM Users where Username = '$username'";
        $result = mysqli_query($conn, $query1);
        $id = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
            $id[$i++] = $row;
        $userid = (int)$id[0]['Id'];
        $currentQuizId = 0;
        foreach($quizdata as $index => $qd){
            $currentQuizId = (int)$qd['quizId'];
            $quizId = $qd['quizId'];
            $qId = $qd['qid'];
            $subopt = $qd['submittedoption'];
            $coropt = $qd['correctOption'];
            $sql = "INSERT INTO UserQuizData (QuizId, UserId, QId, SelectedOption, CorrectOption) VALUES ($quizId, $userid, $qId, '$subopt', '$coropt') ";
            $result = mysqli_query($conn, $sql);
            if(!$result)
                return false;
        }
        
        $sql1 = "INSERT INTO UserScore (UserId, QuizId, ObtainedMarks, TotalMarks) VALUES ($userid, $currentQuizId, $obtainedmarks ,10)";
        $result1 = mysqli_query($conn, $sql1);
        if($result && $result1)
            return true;
        else
            return false;
    }

    function checkSubmittedQuiz($quizId, $username){
        global $conn;
        $query1 = "SELECT Id FROM Users where Username = '$username'";
        $result = mysqli_query($conn, $query1);
        $id = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
            $id[$i++] = $row;
        $userid = $id[0]['Id'];

        $query = "SELECT QuizId, UserId, QId, SelectedOption, CorrectOption FROM UserQuizData WHERE QuizId = $quizId AND UserId = $userid";
        $result1 = mysqli_query($conn, $query);
        $userData = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result1)){
            $userData[$i++] = $row;
        }
        return $userData;
    }

    function addOrRemoveFavoriteQuizzes($username, $quizid){
        global $conn;
        $query1 = "SELECT Id FROM Users where Username = '$username'";
        $result1 = mysqli_query($conn, $query1);
        $id = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result1))
            $id[$i++] = $row;
        $userid = $id[0]['Id'];

        $query = "SELECT UserId FROM FavoriteQuizzes WHERE UserId = $userid AND QuizId = $quizid";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $query2 = "DELETE FROM FavoriteQuizzes WHERE UserId = $userid AND QuizId = $quizid";
            $result2 = mysqli_query($conn, $query2);
            if($result2)
                return true;
            else
                return false;
        }else{
            $query3 = "INSERT INTO FavoriteQuizzes (UserId, QuizId) VALUES ($userid, $quizid)";
            $result3 = mysqli_query($conn, $query3);
            if($result3)
                return true;
            else
                return false;
        }
    }

    function getFavoriteQuizzes($username){
        global $conn;
        $query = "SELECT f.QuizId FROM FavoriteQuizzes f JOIN Users u ON f.UserId = u.Id WHERE u.Username = '$username'";
        $result = mysqli_query($conn, $query);
        $favquizzes = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $favquizzes[$i++] = $row;
        }
        return $favquizzes;
    }
    
    function getFavoriteQuizInfo($username){
        global $conn;
        $query = "SELECT q.Id, q.Name, q.Level FROM Quiz q JOIN FavoriteQuizzes fq ON q.Id = fq.QuizId JOIN Users u ON fq.UserId = u.Id WHERE u.Username = '$username'";
        $result = mysqli_query($conn, $query);
        
        $favquizzes = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $favquizzes[$i++] = $row;
        }
        return $favquizzes;
    }

    function getResults($username){
        global $conn;
        $query = "SELECT s.QuizId, s.ObtainedMarks, q.Name, q.Level FROM UserScore s JOIN Users u ON s.UserId = u.Id JOIN Quiz q ON s.QuizId = q.Id WHERE u.Username = '$username'";
        $result = mysqli_query($conn, $query);
        
        $score = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $score[$i++] = $row;
        }
        return $score;
    }

    function getACcountDetails($username){
        global $conn;
        $query = "SELECT Id, Name, Username, Password FROM Users WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $user[$i++] = $row;
        }
        return $user;
    }

    function editProfileAndPassword($profiledata){
        global $conn;
        $username;
        $userpassword;
        $name;
        $userid;
        foreach($profiledata as $index => $pd){
            $username = $pd['username'];
            $userpassword = $pd['password'];
            $name = $pd['name'];
            $userid = $pd['userId'];
        }
        $query = "UPDATE Users SET Name = '$name', Username = '$username', Password = '$userpassword' WHERE Id = $userid";
        $result = mysqli_query($conn, $query);
        if($result)
            return true;
        else
            return false;
    }

    function editProfile($profiledata){
        global $conn;
        $username;
        $name;
        $userid;
        foreach($profiledata as $index => $pd){
            $username = $pd['username'];
            $name = $pd['name'];
            $userid = $pd['userId'];
        }
        $query = "UPDATE Users SET Name = '$name', Username = '$username' WHERE Id = $userid";
        $result = mysqli_query($conn, $query);
        if($result)
            return true;
        else
            return false;
    }

    function deleteProfile($username){
        global $conn;
        $query1 = "SELECT Id, Role FROM Users WHERE Username = '$username'";
        $result = mysqli_query($conn, $query1);
        $id = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $id[$i++] = $row;
        }
        $uid = (int) $id[0]['Id'];
        if($id[0]['Role'] == 'User'){
            $query2 = "DELETE FROM UserScore WHERE UserId = $uid";
            $result2 = mysqli_query($conn, $query2);
            $query3 = "DELETE FROM UserQuizData WHERE UserId = $uid";
            $result3 = mysqli_query($conn, $query3);
            $query4 = "DELETE FROM FavoriteQuizzes WHERE UserId = $uid";
            $result4 = mysqli_query($conn, $query4);
            $query5 = "DELETE FROM Users WHERE Id = $uid";
            $result5 = mysqli_query($conn, $query5);
            if(!$result2 || !$result3 || !$result4 || !$result5 ){
                return false;
            }else{
                return true;
            }
        }else if($id[0]['Role'] == 'Admin'){
            $query1 = "DELETE FROM Users WHERE Id = $uid";
            $result1 = mysqli_query($conn, $query1);
            if(!$result1 ){
                return false;
            }else{
                return true;
            }
        }
    }
?>