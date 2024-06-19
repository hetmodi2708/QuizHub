<!DOCTYPE html>
<html>
  <head>
      <title>QuizHub</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      .body-container {
        background-color: #e5e4e2;
      }
      .header {
        background-color: #053c6b;
        color: #e5e4e2;
        text-align: center;
      }
      .header p {
        font-size: 3.5em;
      }
      .main {
        position: relative;
        color: #053c6b;
        background: rgba(255, 255, 255, 0.5);
        background-blend-mode: lighten;
        background-image: url("../components/bg-img-1.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        height: 60vh;
      }
      .main p {
        text-align: center;
        padding-top: 20vh;
        font-size: 2.5em;
      }
      .button-container {
        text-align: center;
        background-color: #bc6c25;
        color: #e5e4e2;
      }
      .row-container {
        margin-top: 20px;
        color: #e5e4e2;
      }
      .col-container {
        margin-top: 20px;
        background-color: #053c6b;
        color: #e5e4e2;
        margin-left: 10px;
      }
      .cont {
        background-color: #b7e0f2;
        margin-top: 20px;
      }
      .footer {
        text-align: center;
        background-color: #053c6b;
        color: #e5e4e2;
        margin-top: 20px;
        font-size: medium;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="body-container">
      <div class="header">
        <p>QuizHub</p>
      </div>
      <div class="main">
        <p>QuizHub is a platform for creating and taking quizzes.</p>
        <p>
          <button
            type="button"
            class="btn button-container btn-lg"
            id="signupbutton"
          >
            Sign Up
          </button>
          <button
            type="button"
            class="btn button-container btn-lg"
            id="loginbutton"
          >
            Log In
          </button>
        </p>
      </div>
      <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color: #2a425f; color: #e5e4e2">

            <div class="modal-header">
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                style="color: #f3f1ee"
              >
                &times;
              </button>
              <h4 class="modal-title" style="text-align: center">Sign Up</h4>
            </div>
            <div class="modal-body">
              <form method='POST' action='../controllers/controller.php' id='signup-form'>
                <input type="hidden" name="page" value="index" />
                <input type="hidden" name="command" value="signup" />
                <label for="name">Name:</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  style="width: 30%; display: inline; margin-left: 20%"
                />
                <br><br>
                
                <label for="email">Email:</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter email (this will be your username)"
                  style="width: 30%; display: inline; margin-left: 20%;"
                />
                <?php if (!empty($error_msg_username_signup)) echo $error_msg_username_signup; ?><br><br>
                <label for="password">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  style="width: 30%; display: inline; margin-left: 15%;"
                />
                <?php if (!empty($error_msg_password_signup)) echo $error_msg_password_signup; ?><br><br>
                <label for="confirm-password">Confirm Password:</label>
                <input
                  type="password"
                  class="form-control"
                  id="confirm-password"
                  name="confirm-password"
                  style="width: 30%; display: inline; margin-left: 5%;"
                />
                <?php if (!empty($error_msg_password_signup)) echo $error_msg_password_signup; ?><br><br>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary" id="signup-submit">Sign Up</button>
            </div>
          </div>
        <!-- </div> -->
    </div>
      </div>
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color: #2a425f; color: #e5e4e2">
            <div class="modal-header">
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                style="color: #f3f1ee"
              >
                &times;
              </button>
              <h4 class="modal-title" style="text-align: center">Log In</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="../controllers/controller.php" id="login-form">
                <input type="hidden" name="page" value="index" />
                <input type="hidden" name="command" value="login" />
                <label for="username">Username:</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter username (email)"
                  style="width: 30%; display: inline; margin-left: 20%"
                />
                
                <?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br><br>
                <label for="password">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  id="login-password"
                  name="login-password"
                  style="width: 30%; display: inline; margin-left: 20%"
                />
                
                <?php if (!empty($error_msg_password)) echo $error_msg_password; ?><br><br>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary" id="login-submit">Log In</button>
            </div>
          </div>
        </div>
      </div>
      <div class="container cont">
        <div class="row row-container">
          <div
            class="col-md-12 col-container"
            style="text-align: center; margin: 0%"
          >
            <h1>Features</h1>
          </div>
        </div>
        <div class="row row-container">
          <div class="col-sm-1 col-md-1" style="margin: 0%; width: 0"></div>
          <div
            class="col-sm-3 col-md-3 col-container"
            style="text-align: center"
          >
            <h2>Quiz Creation</h2>
            <p>
              Create quizzes with multiple choice questions and share them with
              your friends.
            </p>
          </div>
          <div class="col-sm-1 col-md-1" style="margin: 0%"></div>
          <div
            class="col-sm-3 col-md-3 col-container"
            style="text-align: center"
          >
            <h2>Quiz Taking</h2>
            <p>
              Take quizzes created by your friends and see how you compare to
              them.
            </p>
          </div>
          <div class="col-sm-1 col-md-1" style="margin: 0%"></div>
          <div
            class="col-sm-3 col-md-3 col-container"
            style="text-align: center; margin-right: 0%"
          >
            <h2>Leaderboard</h2>
            <p>
              See how you compare to your friends and other users on the
              leaderboard.
            </p>
          </div>
        </div>
      </div>
      <div class="footer">
        <p>&copy; 2024 QuizHub</p>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function () {
      $("#login-form")[0].reset();
      $("#signup-form")[0].reset();

      $("#signupbutton").click(function () {
        $("#signup-modal").modal().show();
      });
      
      $("#loginbutton").click(function () {
        $("#login-modal").modal().show();
      });
    });

    $("#signup-submit").click(function() {
      $("#signup-form").submit();
      $("#signup-form")[0].reset();
    })

    $("#login-submit").click(function() {
      $("#login-form").submit();
      $("#login-form")[0].reset();
    })
  </script>
  <script>
        function show_login(){
          $("#login-modal").modal().show();
        }
        function show_signup(){
          $("#signup-modal").modal().show();
        }
        <?php
            if(isset($display_modal_window)){
              if($display_modal_window == "none") ;
              elseif($display_modal_window == "LogIn")
                echo 'show_login();';
              elseif($display_modal_window == "SignUp") 
                echo 'show_signup();';
            }
        ?>
</script>

</html>
