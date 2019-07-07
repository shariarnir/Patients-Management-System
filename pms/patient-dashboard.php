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

$sql = "SELECT * FROM patient WHERE p_mail='$mail'";

$result = $conn->query($sql);

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
<header id="nav_menu">
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
                    <?php if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    ?>
                        <li>
                            <a href="#">Hello, <span><?php echo $row["Name"] ?></span></a>
                        </li>
                    <?php } ?>

                    <li>
                        <a href="index.php">Logout</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">

    </div>
</header><!--end header-->

<?php

$key = $row['P_id'];

$sql = "select * FROM patient p JOIN treatment_info t on (p.P_id = t.p_id) WHERE p.P_id='$key'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table>
                <tr>
                    <th>Patient Name</th>
                    <th>Diseases type</th>
                    <th>prescription</th>
                    <th>Admited Date</th>
                    <th>cabin No</th>
                    <th>Release Date</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>

                        <td><?php echo $row["Name"] ?></td>
                        <td><?php echo $row["Diseases_type"] ?></td>
                        <td><?php echo $row["prescription"] ?></td>
                        <td><?php echo $row["Admited_Date"] ?></td>
                        <td><?php echo $row["cabin_no"] ?></td>
                        <td><?php echo $row["release_date"] ?></td>
                    </tr>
                    <?php

                }
                } else {
                    echo "0 results";
                }


                ?>
            </table>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>