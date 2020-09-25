<!DOCTYPE html>
<html>
    <head>
        <title>Posts – Almendria+</title>
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

            .sidebar hr { display: block; height: 5px;
                border: 0; border-top: 5px solid white; padding: 0; }

            .content {
                flex: 1;
                background-color: #EDEDED;
                padding-left: 5%;
                padding-top: 1%;
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

            .content hr {
            display: block; height: 5px;
            border: 0; border-top: 5px solid #3D85C6; padding: 0;
            //width: 80%;
            opacity: 60%;
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

        <div class="content">
            <h1>Posts</h1>
            <form action="posting.php" method="POST">
                <p>
                    <label>Username</label><br>
                    <input type="text" id="username" name="username">
                </p>
                <p>
                    <label>Password</label><br>
                    <input type="password" id="password" name="password">
                </p>
                <p>
                    <label>Post Name</label><br>
                    <input type="text" id="name" name="name" />
                </p>
                <p>
                    <label>Content</label><br>
                    <input type="text" id="content" name="content" />
                </p>
                <p>
                    By clicking "Post", I agree to cookies.
                </p>
                <p>
                    <input type="submit" id="btn" value="Post" />
                </p>
            </form>
            <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM posts ORDER BY `posts`.`Personid` DESC";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "Username: " . $row["username"]. " - Postname: " . $row["postname"]. " – Content: " . $row["content"]. "<br>";
                echo "<div style='padding: 5px; border: 2px solid black; border-radius: 8px; margin-right: 70%; background-color: white; font-size: 20px;'><strong>".$row["postname"]."</strong><br><a href='".$row['username'].".php'>".$row['nameusr']." (".$row["username"].")</a><br>".$row["content"]."</div><br>";
                $x = $x + 1;
            }
            } else {
            echo "0 results";
            }
            $conn->close();
            ?>

        </div>
    </body>
</html>