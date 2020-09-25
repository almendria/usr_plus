<!DOCTYPE html>
<html>
    <head>
        <title>Stocks</title>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: IBM Plex Sans;
                color: black;
                display: flex;
                margin: 0;
                background-color: black;
                border: 7.5px solid #FF7F28;
                height: 100%;
                text-align: justify;
                font-size: 20px;
            }

            * {
                box-sizing: border-box;
            }

            .sidebar {
                width: 300px !important;
                background-color: black;
                color: white;
                height: 100% !important;
            }

            .box {
                flex: 1;
                background-color: #EDEDED;
            }

            .content {
                background-color: #EDEDED;
                /*margin-left: 5%;
                margin-right: 5%;*/
                padding-left: 10%;
                padding-right: 20%;
            }

            .header {
                background-color: #FF7F28;
                padding-left: 10%;
                padding-right: 20%;
                color: white;
            }

            p {
                font-size: 20px;
            }

            h1 {
                font-size: 50px;
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

            .sidebar a {
                font-size: 30px;
                color: white;
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

            .icon-bar {
                font-size: 190%;
            }

            .icon-bar a {
                display: block;
                padding: 3%;
                transition: all 0.3s ease;
            }

            th, td {
                font-size: 20px;
                padding-left: 20px;
                text-align: left;
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

            ::-moz-selection { /* Code for Firefox */
                color: white;
                background: #FF7F28;
            }

            ::selection {
                color: white;
                background: #FF7F28;
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
        <div class="box">
            <div class="header"><h1>Almendrian Stock Exchange</h1></div>
            <div class="content">
                <strong>ASE:RBI – Royal Betting Incorporated</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["RBI"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>


                <table><tr><td>Buy at:</td>
                <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                    $ticker = "RBI";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $x = 0;
                    $sql = "SELECT price FROM sellOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                    $x = 0;
                    $sql = "SELECT price FROM buyOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                    $conn->close();
                ?>
                </tr></table>


                <strong>ASE:BOA – Bank of Almendria Co.</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["BOA"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "BOA";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:ALC – Almendrian Land Corporation</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["ALC"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "ALC";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $x = 0;
                    $sql = "SELECT price FROM sellOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                    $x = 0;
                    $sql = "SELECT price FROM buyOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                    $conn->close();            ?>
                </tr></table>

                <strong>ASE:ROSE – SpaceRose Corporation</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["ROSE"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "ROSE";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:ANBC – Almendrian News & Broadcasting Corp.</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["ANBC"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>
                <table><tr><td>Buy at:</td>
                <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "ANBC";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $x = 0;
                    $sql = "SELECT price FROM sellOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                    $x = 0;
                    $sql = "SELECT price FROM buyOrders".$ticker;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $x = $x + 1;
                        }
                    }
                    echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                    $conn->close();
                ?>
                </tr></table>


                <strong>ASE:ACU – Almendrian Communist Union</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["ACU"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>
                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "ACU";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:ASE – Almendria Stock Exchange Corporation</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["ASE"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "ASE";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:CAD – Canadian Dollar</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["CAD"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "CAD";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:DDM – Mark of the German Democratic Republic</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["DDM"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "DDM";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>

                <strong>ASE:AAAA – A4 Holdings Inc.</strong>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM users";
                        $sum = 0;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sum = $sum + $row["AAAA"];
                            }
                        }
                        echo "(Total shares ".$sum.")";
                        $conn->close();
                    ?>
                <br>

                <table><tr><td>Buy at:</td>
                    <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */
                        $ticker = "AAAA";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $x = 0;
                        $sql = "SELECT price FROM sellOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "<td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM sellOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }

                        $x = 0;
                        $sql = "SELECT price FROM buyOrders".$ticker;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $x = $x + 1;
                            }
                        }
                        echo "</tr><tr><td>Sell at: </td><td>Total: ".$x."</td>";

                        $sql = "SELECT price FROM buyOrders".$ticker." ORDER BY price DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $lowprice = $row["price"];
                            }
                            echo "<td>".$lowprice."¢</td>";
                        } else {
                            echo "<td>N/A</td>";
                        }
                        $conn->close();
                    ?>
                </tr></table>





                <form action="stockorder.php" method="POST">
                    <p>
                        <label>Username</label><br>
                        <input type="text" id="user" name="user" />
                    </p>
                    <p>
                        <label>Password</label><br>
                        <input type="password" id="pass" name="pass" />
                    </p>
                    <p>
                        Ticker:
                        <select name="ticker" id="ticker">
                            <option value="RBI">ASE:RBI</option>
                            <option value="BOA">ASE:BOA</option>
                            <option value="ALC">ASE:ALC</option>
                            <option value="ROSE">ASE:ROSE</option>
                            <option value="ANBC">ASE:ANBC</option>
                            <option value="ACU">ASE:ACU</option>
                            <option value="ASE">ASE:ASE</option>
                            <option value="SLV">ASE:SLV</option>
                            <option value="CAD">ASE:CAD</option>
                            <option value="DDM">ASE:DDM</option>
                            <option value="AAAA">ASE:AAAA</option>
                        </select>
                    </p>
                    <p>
                        <input type="radio" id="buy" name="buysell" value="buy">
                        <label for="buy">Buy</label>
                        <input type="radio" id="sell" name="buysell" value="sell">
                        <label for="female">Sell</label><br>
                    </p>
                    <p>
                        Shares: <input type='text' size=3 id='shares' name='shares'>
                    </p>
                    <p>
                        Limit price: <input placeholder='optional' size=7 id='prices' name='prices'>¢
                    </p>
                    <p>
                        <input value='Go' id='submit' type='submit'>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>