<!DOCTYPE html>
<html>
    <head>
        <title>Change Account – Bank of Almendria</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $newuser = $_POST['newuser'];
            $newpass = $_POST['newpass'];
            $newname = $_POST['newname'];
            $newemail = $_POST['newemail'];
            $newjurisdiction = $_POST['newjurisdiction'];
            $newtype = $_POST['newtype'];
            
                        /*
                        $servername, $username, $password, and $dbname required
                        */

            if ($user === $pass or $newuser === $newpass) {
                die("Username cannot be same as password.");
            }

            // VERIFY ACCOUNT
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                header('Location: error.html');
                end();
            }

            $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $sql = "UPDATE users SET username='$newuser', password='$newpass', name='$newname', email='$newemail', jurisdiction='$newjurisdiction', type='$newtype' WHERE username='$user'";

                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            $conn->close();
            
        ?>
    </head>
    <body>
        <a href="login.php">Go to Login page.</a>     
    </body>
</html>