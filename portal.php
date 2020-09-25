<!DOCTYPE html>
<html>
    <head>
        <title>USR+</title>
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
                <a href="."><h2>USR+</h2></a>
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
                <tr>
                    <td style="width: 50%">
                        <?php

                        /*
                        $servername, $username, $password, and $dbname required
                        */

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $user = mysqli_real_escape_string($conn, $_POST['user']);

                            $sql = "SELECT password FROM users WHERE username='$user'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $pass = $row["password"];
                                }
                            }
                            
                            if (substr($pass, -1) == "$") {
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                                $pass = substr_replace($pass, "", -1);
                            }

                            if (password_verify(mysqli_real_escape_string($conn, $_POST['pass']), $pass)) {
                            } else {
                                if (sha1($_POST['pass']) == $pass) {
                                    $passw = password_hash($_POST['pass'], PASSWORD_DEFAULT)."CONFIDENTIAL";
                                    $sql = "UPDATE users SET password='$passw' WHERE username='$user'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "";
                                    } else {
                                        die("Error updating record: " . $conn->error);
                                    }
                                } else {
                                    die("Incorrect username/password.".$pass);
                                }
                            }
                            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                            session_start();
                            $_SESSION["username"] = $user;
                            $_SESSION["password"] = $pass;

                            $sql = "UPDATE users SET agreed='1' WHERE username='$user'";
                            if ($conn->query($sql) === TRUE) {
                                echo "";
                            } else {
                                die("Error updating record: " . $conn->error);
                            }

                            $sql = "SELECT * FROM users WHERE username='$user'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if ($row['type'] == "User") {
                                    $action = "<a href='https://forms.gle/yTman4mvhkvwcR437' target='blank'>Right now, you are just a User. Apply to become a citizen.</a>";
                                }
                                echo "<h2><strong>Welcome back!</strong></h2><table><tr><td><strong>Username</strong></td><td>" . $row["username"]. "</td></tr><tr><td><strong>Balance</strong></td><td>" . $row["balance"]. "¢</td></tr><tr><td><strong>Type</strong></td><td>".$row['type']."</td></tr></table><p>".$action."</p><form action='transfer.php' method='POST'><p><h3><a href='votes.php'>Go to voting.</a></h3><h3>Transfer</h3></p><label>Recipient username<br></label><input type='text' id='recipient' name='recipient' /></p><p><label>Amount (¢)</label><br><input type='text' id='amount' name='amount' /></p><p><input type='submit' id='btn' value='Send' /><br><br>When you click 'Send', the money will transfer and you will be redirected to login. There is a 1¢ tax for every transfer.</p></form>";
                                }
                            } else {
                                header("Location: login.php");
                                die("You aren't logged in!");
                            }

                            $conn->close();

                        ?>

                        <form action="change.php" method="POST">
                            <p>
                                <h3>Change</h3>
                            </p>
                            <p>
                                <input type="hidden" id="user" name="user" value="<?php echo $user ?>" />
                            </p>
                            <p>
                                <input type="hidden" id="pass" name="pass" value="<?php echo $pass ?>" />
                            </p>
                            <p>
                                <label>New username</label><br>
                                <input type="text" id="newuser" name="newuser" />
                            </p>
                            <p>
                                <label>New password</label><br>
                                <input type="password" id="newpass" name="newpass" />
                            </p>
                            <p>
                                <label>New email</label><br>
                                <input type="text" id="newemail" name="newemail" />
                            </p>
                            <p>
                                <label>New name</label><br>
                                <input type="text" id="newname" name="newname" />
                            </p>
                            <p>
                                <label>New type</label><br>
                                <input type="radio" id="User" name="newtype" value="User">
                                <label>User</label><br>
                                <input type="radio" id="Organization" name="newtype" value="Organization">
                                <label>Organization</label><br>
                            </p>
                            <input type="submit" id="btn" value="Go" />
                        </form>
                    </td>
                    <td style="width: 50%">
                        <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM users WHERE username='$user' AND type='Admin'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <h3>Admin Features</h3>
                                        <form action='deletepost.php' method='POST'>
                                            <h4>Delete a post</h4>
                                            <table>
                                                <input type='hidden' name='user' value='".$user."'>
                                                <input type='hidden' name='pass' value='".$pass."'>
                                                <tr><td>Enter Post Name</td><td><input name='name'></td><td>OR</td></tr>
                                                <tr><td>Enter Post ID</td><td><input name='id'></td></tr>
                                                <tr><td><input type='submit'></td></tr>
                                            </table>
                                        </form>
                                        <form action='deleteuser.php' method='POST'>
                                            <h4>Delete a user</h4>
                                            <table>
                                                <input type='hidden' name='user' value='".$user."'>
                                                <input type='hidden' name='pass' value='".$pass."'>
                                                <tr><td>Enter Their Username</td><td><input name='deluser'></td></tr>
                                                <tr><td><input type='submit'></td></tr>
                                            </table>
                                        </form>
                                        <form action='updateuser.php' method='POST'>
                                            <h4>Delete a user</h4>
                                            <p>Leave any part blank for no change.</p>
                                            <table>
                                                <input type='hidden' name='user' value='".$user."'>
                                                <input type='hidden' name='pass' value='".$pass."'>
                                                <tr><td>Enter Their Username</td><td><input name='oldusername'></td></tr>
                                                <tr><td>Enter Their New Username</td><td><input name='newusername'></td></tr>
                                                <tr><td>Enter Their New Password</td><td><input name='newpassword'></td></tr>
                                                <tr><td><input type='submit'></td></tr>
                                            </table>
                                        </form>
                                    ";
                                }
                            }
                            $conn->close();
                        ?>


                        <h3>Transfers</h3>
                        <table>
                            <tr>
                                <th style="text-align: left">Sender</th>
                                <th style="text-align: left">Recipient</th>
                                <th style="text-align: left">¢</th>
                            </tr>
                            <?php
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT sender, recipient, amount FROM transfers WHERE recipient='$user' OR sender='$user' ORDER BY Personid DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                $x = 0;
                                while($x < 10) {
                                    $row = $result->fetch_assoc();
                                    if ($row["sender"] == "$user" and intval($row["amount"]) > 0) {
                                        echo "<tr><td>".$row["sender"]."</td><td>".$row["recipient"]."</td><td><span style='color: red'>-".$row["amount"]."</span></td></tr>";
                                    }
                                    else if ($row["sender"] == "$user" and intval($row["amount"]) < 0) {
                                        echo "<tr><td>".$row["sender"]."</td><td>".$row["recipient"]."</td><td><span style='color: red'>".$row["amount"]."</span></td></tr>";
                                    }
                                    else {
                                        echo "<tr><td>".$row["sender"]."</td><td>".$row["recipient"]."</td><td><span style='color: green'>".$row["amount"]."</span></td></tr>";
                                    }
                                    $x = $x + 1;
                                }
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                            ?>
                        </table>

                        <h3>Education</h3>
                        <p><a href="education.php">Go to classroom login and registration.</a></p>
                        <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM test WHERE username='$user'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "test Location: ".$row["unit"]."–".$row["lesson"];
                                }
                            } else {
                                echo "0 results";
                            }
                        ?>

                        <h3>Portfolio</h3>
                        <p><a href="stock.php">Go to stocks section.</a></p>
                        <table>
                            <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM users WHERE username='$user'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <td>RBI</td>
                                            <td>".$row["RBI"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>BOA</td>
                                            <td>".$row["BOA"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>ALC</td>
                                            <td>".$row["ALC"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>ROSE</td>
                                            <td>".$row["ROSE"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>ANBC</td>
                                            <td>".$row["ANBC"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>ACU</td>
                                            <td>".$row["ACU"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>ASE</td>
                                            <td>".$row["ASE"]." share(s)</td>
                                        </tr>
                                        <tr>
                                            <td>CAD</td>
                                            <td>".$row["CAD"]." CAD</td>
                                        </tr>
                                        <tr>
                                            <td>DDM</td>
                                            <td>".$row["DDM"]." DM</td>
                                        </tr>
                                    ";
                                }
                                } else {
                                echo "0 results";
                                }
                            ?>
                        </table>

                        <!--<h3>Post</h3>
                        <form action="posting.php" method="POST">
                            <p>
                                <input type='hidden' name='user' value='".$user."'>
                                <input type='hidden' name='pass' value='".$pass."'>
                            </p>
                            <p>
                            <p>
                                <label>Post Name</label><br>
                                <input type="text" id="name" name="name" />
                            </p>
                            <p>
                                <label>Content</label><br>
                                <input type="text" id="content" name="content" />
                            </p>
                            <p>
                                <input type="submit" id="btn" value="Post" />
                            </p>
                        </form>-->
                        <!--<h3>Create an organization</h3>
                        <form action="process.php" method="POST">
                            <p>
                                <label>Username</label><br>
                                <input type="text" id="user" name="user" />
                            </p>
                            <p>
                                <label>Password</label><br>
                                <input type="password" id="pass" name="pass" />
                            </p>
                            <input type="hidden" id="type" name="type" value="Organization">
                            <p>
                                Your company account is treated the same as a normal personal account. Login between user accounts and personal accounts is the same.
                            </p>
                            <p>
                                <input type="submit" id="btn" value="Signup" />
                            </p>
                        </form>-->
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
