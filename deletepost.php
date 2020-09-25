<!DOCTYPE html>
<html>
    <head>
        <title>Post Deleted – Bank of Almendria</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $name = $_POST['name'];
            $id = $_POST['id'];
            
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
            }




            if ($id == "") {
                $sql = "DELETE FROM posts WHERE postname='$name'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                $sql = "DELETE FROM posts WHERE Personid='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully.";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }

            
        ?>
    </head>
    <body>
        <a href="login.php">Go to Login page.</a>     
    </body>
</html>