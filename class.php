<!DOCTYPE html>
<html>
    <head>
        <title>Class – Almendria+</title>
        <style>
            body {
            height: 100%;
            font-family: Helvetica;
            color: black;
            display: flex;
            margin: 0;
            background-color: #FF7F28;
            border: 7.5px solid #FF7F28;
            height: 100%;
            text-align: justify;
            }

            * {
            box-sizing: border-box;
            }

            ::-moz-selection { /* Code for Firefox */
            color: white;
            background: #FF7F28;
            }

            ::selection {
            color: white;
            background: #FF7F28;
            }

            .content a:active, a:visited, a:link {
            text-decoration: underline!important ;
            text-decoration-color: #FF7F28 !important;
            }

            .content a:hover {
            background: #FF7F28;
            transition: 0.3s;
            }

            .logo img {
            width: 100%;
            }

            .sidebar {
            max-width: 280px !important;
            //width: 100% !important;
            padding-right: 2.5% !important;
            background-color: black;
            color: white;
            //height: 100% !important;
            padding-top: 2.5%;
            padding-left: 2.5%;
            }

            .sidebar a:active, a:visited, a:link {
            color: white;
            text-decoration: none;
            }

            .sidebar a:hover {
            background: #FF7F28;
            transition: 0.3s;
            }

            .content {
            flex: 1;
            background-color: #EDEDED;
            padding-left: 5%;
            padding-top: 1%;
            }

            .content1 {
            flex: 1;
            color: white;
            padding-left: 5%;
            padding-top: 1%;
            background-size: cover !important;
            }

            .icon-bar {
            font-size: 190%;
            }

            .icon-bar a {
            display: block;
            padding: 3%;
            transition: all 0.3s ease;
            }

            h1, h2, h3, h4, h5 {
            font-weight: 300;
            }

            h2 {
            font-size: 33px;
            }

            h3 {
            font-size: 27px;
            }

            th, td {
            font-size: 20px;
            padding-left: 20px;
            text-align: left;
            }

            .sidebar hr { display: block; height: 5px;
                border: 0; border-top: 5px solid white; padding: 0; }

            .content hr {
            display: block; height: 5px;
            border: 0; border-top: 5px solid #3D85C6; padding: 0;
            //width: 80%;
            opacity: 60%;
            }

            .sidebar input {
            color: white;
            background-color: black;
            font-size: 80%;
            border: 3px solid white;
            }

            .sidebar input:focus {
            border: 3px solid #3D85C6;
            }

            .content input {
            color: black;
            background-color: #EDEDED;
            font-size: 20px;
            border: 2px solid black;
            padding: 0.75%;
            }

            .content input:focus {
            border: 2px solid #3D85C6;
            }

            table {
            padding: 0;
            margin: 0;
            }

            .description {
            font-size: 20px;
            opacity: 70%;
            }

            h1 {
            font-size: 40px;
            }

            td {
            vertical-align: top;
            }

            .content a {
                color: black !important;
            }

            .content a:hover {
                background: none;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="icon-bar">
                <a href="."><h2>Almendria+</h2></a>
                <hr>
                <a href=".">Home</a>
                <a href="signup.php">Signup</a>
                <a href="login.php">Login</a>
                <a href="posts.php">Posts</a>
                <hr>
            </div>
        </div>
        <br>
        <div class="content">
            <table>
                    <td style="width: 50%">
                        <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $class = $_POST['class'];
                            
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM $class WHERE username='$user'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                            <h1>$class</h1>
                                            <h2>Welcome back, $user.</h2>
                                        ";
                                    $unit = $row["unit"];
                                    $lesson = $row["lesson"];
                                }
                            } else {
                                die("You aren't logged in!");
                            }

                            $sql = "SELECT * FROM ".$class."Content WHERE unit='$unit' AND lesson='$lesson'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $correct = 0;
                                    echo "
                                            <strong>".$row["unit"]."–".$row["lesson"].": ".$row["name"]."</strong>
                                            <p>".$row["content"]."</p>
                                            <h3>Lesson Quiz – Get correct to continue</h3>
                                            <p>Question: ".$row["question"]."</p>
                                        ";
                                    //echo "<script>alert($correct)</script>";
                                }
                            }

                            $conn->close();
                        ?>
                        <form action='answerquiz.php' method='POST'>
                            <table>
                                <tr><td>Username</td><td><input name='user'></td></tr>
                                <tr><td>Password</td><td><input type='password' name='pass'></td></tr>
                                <tr><td>Class</td><td><input name='class'></td></tr>
                            </table>
                            Your answer:
                            <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                                $user = $_POST['user'];
                                $pass = $_POST['pass'];
                                $class = $_POST['class'];
                                
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM $class WHERE username='$user'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $unit = $row["unit"];
                                        $lesson = $row["lesson"];
                                    }
                                }

                                $sql = "SELECT * FROM ".$class."Content WHERE unit='$unit' and lesson='$lesson'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $one = rand(1, 4);
                                        $two = rand(1, 4);
                                        while ($two == $one) {
                                            $two = rand(1, 4);
                                        }
                                        $three = rand(1, 4);
                                        while ($three == $one or $three == $two) {
                                            $three = rand(1, 4);
                                        }
                                        $four = rand(1, 4);
                                        while ($four == $one or $four == $two or $four == $three) {
                                            $four = rand(1, 4);
                                        }

                                        echo "<table>";
                                        echo "<tr><td><input type='radio' name='answer' value='".$row["option$one"]."'></td><td>".$row["option$one"]."</td></tr>";
                                        echo "<tr><td><input type='radio' name='answer' value='".$row["option$two"]."'></td><td>".$row["option$two"]."</td></tr>";
                                        echo "<tr><td><input type='radio' name='answer' value='".$row["option$three"]."'></td><td>".$row["option$three"]."</td></tr>";
                                        echo "<tr><td><input type='radio' name='answer' value='".$row["option$four"]."'></td><td>".$row["option$four"]."</td></tr>";
                                        echo "</table>";
                                    }
                                }
                            ?>
                            <input type='submit'>
                        </form>
                    </td>
            </table>
        </div>
    </body>
</html>