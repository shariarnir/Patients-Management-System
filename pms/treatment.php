<?php
// Start the session
session_start();
$mail=$_SESSION["login_data"];


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

$sql = "SELECT * FROM doctor WHERE d_mail='$mail'";

$result = $conn->query($sql);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $pid=$_POST['pid'];
    $did=$_POST['did'];
    $disease=$_POST['disease'];
    $Admitted_Date=$_POST['Admitted_Date'];
    $cabin=$_POST['cabin'];
    $prescription=$_POST['prescription'];
    $release_Date=$_POST['release_Date'];


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO treatment_info (p_id,d_id,Diseases_type,Admited_Date,cabin_no,prescription,release_date) VALUES ('$pid','$did','$disease','$Admitted_Date','$cabin','$prescription','$release_Date')";

    if ($conn->query($sql) === TRUE) {
        return header('Location: doctor-dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--    <style>
            body{
            background: url(1.png);
            background-size: 100%;
        }
        </style>-->


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
                PMS
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="doctor-dashboard.php">Dashboard</a></li>
                <li><a href="treatment.php">Treatment</a></li>
                <?php if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <li>
                        <a href="#">Hello, <span><?php echo $row["Doctor_Name"] ?></span></a>
                    </li>
                <?php } ?>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--end header-->


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">New Treatment</p>
                </div>
                <div class="panel-body">

                    <form action="treatment.php" method="post" class="form-horizontal">
                        
                        <div class="form-group">
                            <label for="pid" class="control-label col-sm-3 text-right">Patient ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pid" name="pid" placeholder="p4">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="did" class="control-label col-sm-3 text-right">Doctor ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="did" name="did" placeholder="d22">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disease" class="control-label col-sm-3 text-right">Disease</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="disease" name="disease" placeholder="Fever">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cabin" class="control-label col-sm-3 text-right">Room No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cabin" name="cabin" placeholder="501">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prescription" class="control-label col-sm-3 text-right">Prescription</label>
                            <div class="col-sm-8">
                                <textarea name="prescription" id="prescription" rows="5" class="form-control" placeholder="Write something"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Admitted_Date" class="control-label col-sm-3 text-right">Admit Date</label>
                            <div class="col-sm-8">
                                <input type="text" id="Admitted_Date" name="Admitted_Date" class="form-control" placeholder="15-09-2018">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="release_Date" class="control-label col-sm-3 text-right">Release Date</label>
                            <div class="col-sm-8">
                                <input type="text" id="release_Date" name="release_Date" class="form-control" placeholder="15-09-2018">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info col-sm-offset-3">Save Treatment</button>
                        
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

</body>
</html>