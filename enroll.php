<!DOCTYPE html>
<html>
    <head>
        <title>Enroll – Bank of Almendria</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $class = $_POST['class'];
            
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

            $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                die("Account not found.");
            }

            $sql = "SELECT * FROM $class WHERE username='$user'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                die("You are already enrolled in this class!");
            }

            $sql = "INSERT INTO $class (username)
            VALUES ('$user')";
            if ($conn->query($sql) === TRUE) {
                echo "Registered to class. Welcome, $user!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            
        ?>
    </head>
    <body>
        <a href="education.php">Go to class Login page.</a>     
    </body>
</html>