<!DOCTYPE html>
<html>
    <head>
        <title>Posting – Bank of Almendria</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $name = $_POST['name'];
            $content = $_POST['content'];

            echo "<script>alert(".$id.");</script>";
            
                        /*
                        $servername, $username, $password, and $dbname required
                        */

            if ($username === $password) {
                die("Username cannot be same as password.");
            }


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM users WHERE username='$user' and password='$pass'";
            $result = $conn->query($sql);

            echo($row);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo " ";
                $nameusr = $row["name"];
            }
            } else {
                die("Account not found.");
            }

            $conn->close();


            // NEW POST
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "INSERT INTO posts (username, postname, content, nameusr)
            VALUES ('$user', '$name', '$content', '$nameusr')";

            if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id;
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            
        ?>
    </head>
    <body>
        <br><a href="login.php">Return to Portal.</a>
        <br><a href="posts.php">See posts.</a>       
    </body>
</html>