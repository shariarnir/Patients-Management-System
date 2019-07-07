<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Management System</title>
</head>
<body>
    <center>
    <br><br><br><br><br><br><br><br><br>
    <?php
        
/*collect Form data*/
        $mail=$_POST['mail'];
        $pass=$_POST['pass_wrd'];
        $radio_check = $_POST["radio_check"];
        
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
        
        if ($_POST["radio_check"]=="patient"){
            
            		$sql = "SELECT * FROM patient WHERE p_mail='$mail' and p_passw='$pass'";

		$result = $conn->query($sql);
                         if ($result->num_rows > 0) {
                             
                             $row = $result->fetch_assoc();
                             $sn_mail = $row['p_mail'];
                             $_SESSION["login_data"] = $sn_mail;
                             
                             echo "Login Successful:";
                             header('Location: patient-dashboard.php', true, 301);
                             exit();
                         }else {echo "Wrong Email or Password";
                        ?>
                       <br><br> <a href="index.php">click here to try again</a>
                        <?php
                               }

        }
        else {
            
            $sql = "SELECT * FROM doctor WHERE d_mail='$mail' and d_passw='$pass'";

		$result = $conn->query($sql);
                         if ($result->num_rows > 0) {
                             
                             $row = $result->fetch_assoc();
                             $sn_mail = $row['d_mail'];
                             $_SESSION["login_data"] = $sn_mail;
                             
                             echo "Login Successful:";
                             header('Location: doctor-dashboard.php', true, 301);
                             exit();
                         }else {echo "Wrong Email or Password";
                        ?>
                       <br><br> <a href="index.php">click here to try again</a>
                        <?php
                               }
        }
		

$conn->close();


?>
   </center> 
</body>
</html>

