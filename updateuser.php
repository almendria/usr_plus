<!DOCTYPE html>
<html>
    <head>
        <title>Post Deleted</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $oldusername = $_POST['oldusername'];
            $newusername = $_POST['newusername'];
            $newpassword = $_POST['newpassword'];
            $newname = $_POST['newname'];
            $newjurisdiction = $_POST['newjurisdiction'];
            $newtype = $_POST['newtype'];
            
                        /*
                        $servername, $username, $password, and $dbname required
                        */

            if ($user === $pass) {
                die("Username cannot be same as password.");
            }



            // VERIFY ACCOUNT
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass' AND type='Admin'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo("Account verified!");
                }
            } else {
                die("Account not verified");
            }




            if ($newusername != "") {
                $sql = "UPDATE users SET username='$newusername' WHERE username='$oldusername'";
                if ($conn->query($sql) === TRUE) {
                    echo "Username updated successfully";
                } else {
                    die("Error updating record: " . $conn->error);
                }
            } else {
                $newusername = $oldusername;
            }

            if ($newpassword != "") {
                $sql = "UPDATE users SET password='$newpassword' WHERE username='$newusername'";
                if ($conn->query($sql) === TRUE) {
                    echo "Password updated successfully";
                } else {
                    die("Error updating record: " . $conn->error);
                }
            }

            if ($newname != "") {
                $sql = "UPDATE users SET name='$newname' WHERE username='$newusername'";
                if ($conn->query($sql) === TRUE) {
                    echo "Name updated successfully";
                } else {
                    die("Error updating record: " . $conn->error);
                }
            }

            if ($newjurisdiction != "") {
                $sql = "UPDATE users SET jurisdiction='$newjurisdiction' WHERE username='$newusername'";
                if ($conn->query($sql) === TRUE) {
                    echo "Jurisdiction updated successfully";
                } else {
                    die("Error updating record: " . $conn->error);
                }
            }

            if ($newtype != "") {
                $sql = "UPDATE users SET type='$newtype' WHERE username='$newusername'";
                if ($conn->query($sql) === TRUE) {
                    echo "Type updated successfully";
                } else {
                    die("Error updating record: " . $conn->error);
                }
            }

            $conn->close();
            
        ?>
    </head>
    <body>
        <a href="login.php">Go to Login page.</a>     
    </body>
</html>