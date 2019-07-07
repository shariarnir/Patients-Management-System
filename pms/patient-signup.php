<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pid=$_POST['pid'];
        $cno=$_POST['cno'];
        $gender=$_POST['p_gender'];
        $age=$_POST['age'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hospital_management";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO patient (`Name`,P_id,Contract_No,Gender,age,p_mail,p_passw) VALUES ('$name','$pid','$cno','$gender','$age','$email','$pass')";

        if ($conn->query($sql) === TRUE) {
           return header('Location: /');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
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

    <style>
        #name_mesg{
            color: red;
        }
        #email_mesg{
            color: red;
        }
        #radio_mesg{
            color: red;
        }
        .name_red{
            border: 2px solid red;
        }
    </style>

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
            <div class="container">
                <div class="col-md-6 col-sm-12 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="panel-title">Patient Signup</span>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="patient-signup.php" onsubmit="return checkValidation()">

                                <div class="form-group">
                                    <label for="name_field" class="control-label">Full name:</label>
                                    <input type="text" class="form-control" name="name" id="name_field">
                                    <p class="help-block"><span id="name_mesg"></span></p>
                                </div>


                                <div class="form-group">
                                    <label for="email_field" class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email_field" >
                                    <p class="help-block"><span id="email_mesg"></span></p>
                                </div>

                                <div class="form-group">
                                    <label for="pass_field" class="control-label">Password</label>
                                    <input type="text" class="form-control" name="pass" id="pass_field" >
                                    <p class="help-block"><span id="pass_mesg"></span></p>
                                </div>


                                <div class="form-group">
                                    <label for="patient_field" class="control-label">Patient Id</label>
                                    <input type="text" class="form-control" name="pid" id="patient_field" >
                                    <p class="help-block"><span id="patient_mesg"></span></p>
                                </div>


                                <div class="form-group">
                                    <label for="contact_field" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="cno" id="contact_field" >
                                    <p class="help-block"><span id="contact_mesg"></span></p>
                                </div>

                                <div class="form-group">
                                    <input type="radio" name="p_gender" value="Male" checked>Male
                                    <input type="radio" name="p_gender" value="Female">Female
                                </div>

                                <div class="form-group">
                                    <label for="Dob_field" class="control-label">Age</label>
                                    <input type="text" class="form-control" name="cno" id="Dob_field" >
                                    <p class="help-block"><span id="Dob_mesg"></span></p>
                                </div>

                                <button type="submit" class="btn btn-info">SignUp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script type="text/javascript">
    function checkValidation(){

        var pass_elmnt=document.getElementById("pass_field");
        var name_elmnt=document.getElementById("name_field");
        var email_elmnt=document.getElementById("email_field");
        var patient_elmnt=document.getElementById("patient_field");
        var contact_elmnt=document.getElementById("contact_field");
        var Dob_elmnt=document.getElementById("Dob_field");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(name_elmnt.value.length == 0){
            name_elmnt.className="name_red";
            document.getElementById('name_mesg').innerHTML = "* Please Enter Your Name!";
            return false;
        }

        else if (!filter.test(email_elmnt.value)) {
            email_elmnt.className="name_red";
            document.getElementById('email_mesg').innerHTML = "* Please Enter Valid Email!";
            return false;
        }

        else if(pass_elmnt.value.length == 0){
            pass_elmnt.className="name_red";
            document.getElementById('pass_mesg').innerHTML = "* Please Enter Your password!";
            return false;
        }
        else if(patient_elmnt.value.length == 0){
            patient_elmnt.className="name_red";
            document.getElementById('patient_mesg').innerHTML = "* Please Enter Your id!";
            return false;
        }
        else if(contact_elmnt.value.length == 0){
            contact_elmnt.className="name_red";
            document.getElementById('contact_mesg').innerHTML = "* Please Enter Your Contact No!";
            return false;
        }
        else if(Dob_elmnt.value.length == 0){
            Dob_elmnt.className="name_red";
            document.getElementById('Dob_mesg').innerHTML = "* Please Enter Your Date of Birth!";
            return false;
        }
        else{
            return true;
        }
    }

</script>

</body>
</html>