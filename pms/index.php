<?php
session_start();
?>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Patient Management System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!--start header-->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    Patient Management System
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right text-uppercase">
                    <li class="active"><a href="/pms">Home</a></li>
                    <li><a href="patient-signup.php">Patient SignUp</a></li>
                    <li><a href="doctor-signup.php">Doctor SignUp</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--end header-->



    <div class="container">
        <div class="row" style="padding-top: 50px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center">Login</h2>
                    </div>

                    <div class="panel-body">
                        <form action="login.php" method="post" onsubmit="return checkValidation()">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" id="email_field" name="mail" class="form-control">
                                <p class="help-block"><span id="email_mesg"></span></p>
                            </div>

                            <div class="form-group">
                                <label for="pass_field" class="control-label">Password</label>
                                <input type="password" id="pass_field" name="pass_wrd" class="form-control">
                                <p class="help-block"><span id="pass_mesg"></span></p>
                            </div>

                            <div class="form-group">
                                <input type="radio" name="radio_check" value="patient" checked> Patient
                                <input type="radio" name="radio_check" value="doctor"> Doctor <br><br>
                            </div>

                            <button type="submit" class="btn btn-success">Login</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
     <script type="text/javascript">
        function checkValidation(){
           
            var pass_elmnt=document.getElementById("pass_field");
            var email_elmnt=document.getElementById("email_field");
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
           if (!filter.test(email_elmnt.value)) {
                email_elmnt.className="name_red";
                document.getElementById('email_mesg').innerHTML = "* Please Enter Valid Email!";
                return false;
             }
            
           else if(pass_elmnt.value.length == 0){
               pass_elmnt.className="name_red";
              document.getElementById('pass_mesg').innerHTML = "* Please Enter Your password!";
                return false;
            }
			 else{ 
			 return true;
            }
            }
        
    </script>
    
  </body>
</html>
