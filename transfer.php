<!DOCTYPE html>
<html>
    <head>
        <title>Transferring...</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <?php

            $recipient = $_POST['recipient'];
            $amount = $_POST['amount'];
            $timez = date("Y\–m\-d");
            
                        /*
                        $servername, $username, $password, and $dbname required
                        */

            $senderusr = $_POST['user'];
            $senderpass = $_POST['pass'];


            if ($senderusr == $senderpass) {die("username cannot be same as password");}
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT email, username, balance FROM users WHERE username='$senderusr' and password='$senderpass'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $senderbalance = $row["balance"];
                if (intval($amount) > intval($senderbalance)) {
                    die("Error: you don't have that many credits.<br><a href='login.php'>Return to login</a>");
                    end();
                }
                $newsenderbalance = strval(intval($senderbalance)-intval($amount)-1);
            }
            } else {
                die("Error: username and/or password incorrect.");
            }
            $conn->close();


            // VERIFY RECIPIENT
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT email, username, balance FROM users WHERE username='$recipient'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $recipientbalance = $row["balance"];
                $newrecipientbalance = strval(intval($recipientbalance)+intval($amount));
            }
            } else {
                die("Error");
            }
            $conn->close();


            // UPDATE SENDER BALANCE
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Error 75");
            }

            $sql = "UPDATE users SET balance='$newsenderbalance' WHERE username='$senderusr'";

            if ($conn->query($sql) === TRUE) {
            } else {
                die("Error 82");
            }

            $conn->close();


            // UPDATE RECIPIENT BALANCE
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Error 92");
            }

            $sql = "UPDATE users SET balance='$newrecipientbalance' WHERE username='$recipient'";

            if ($conn->query($sql) === TRUE) {
            } else {
                die("Error 99");
            }

            $conn->close();


            // CALC NEW GOVT BALANCE – TAXES
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT email, username, balance FROM users WHERE username='AlmendrianGov'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $govbalance = $row["balance"];
                    $newgovbalance = strval(intval($govbalance)+1);
                }
            } else {
                die("Error 122");
            }
            $conn->close();


            // UPDATE GOVERNMENT BALANCE – TAXES
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Error 131");
            }

            $sql = "UPDATE users SET balance='$newgovbalance' WHERE username='AlmendrianGov'";

            if ($conn->query($sql) === TRUE) {
            } else {
                die("Error 138");
            }

            $conn->close();



            // UPDATE TRANSFERS
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO transfers (sender, recipient, amount)
            VALUES ('$senderusr', '$recipient', '$amount')";

            if ($conn->query($sql) === TRUE) {
            echo "";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();


            //header('Location: https://a4holdingsinc.com/bank/login.php')

        ?>
    </head>
    <body>
        <a href="login.php">Return to login</a>
    </body>
</html>