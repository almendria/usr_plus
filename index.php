<!DOCTYPE html>
<html>
    <head>
        <script>if (window.location.href == "http://almendria.ml/") { window.location.href = "https://www.almendria.ml/";}</script>
        <title>USR+</title>
        <style>
            /*html {
                height: 100%;
            }*/
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

            ::placeholder {
                color: #eeeee;
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
                <form action="portal.php" method="POST">
                    <input size=15 placeholder="Username" type="text" id="user" name="user" />
                    <input size=15 placeholder="Password" type="password" id="pass" name="pass" />
                    <input type="submit" id="btn" value="Login" />
                    <p style="font-size: 10px"><a href="terms_and_conditions.pdf" target="blank">By logging in, I agree to the Terms and Conditions.</a></p>
                </form>
            </div>
        </div>

        <div class="content">
      <h1 style="font-size: 300%">Welcome to the Socialist Republics!</h1>
      <h2>
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

            $sql = "SELECT balance FROM users";
            $result = $conn->query($sql);
            
            $sum = 0;
            $x = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $x = $x + 1;
                    $sum = $sum + $row["balance"];
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            echo "USR+ helps us manage ".$sum."¢ within ".$x." accounts.<br>Each credit is worth ".(17564.06/$sum)." USD.";

        ?>
      </h2>


      <table>

        <td>
          <p align=center><strong>United Socialist Republics</strong><br>Socialist Republics</p>
          <table>
            <tr>
              <td style="text-align: left"><strong>Capital</strong></td>
              <td style="text-align: left">AUC–CT</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Official language(s)</strong></td>
              <td style="text-align: left">English</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Demonym(s)</strong></td>
              <td style="text-align: left">Socialist Republican</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Government</strong></td>
              <td style="text-align: left">Marxist direct democracy</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Legislature</strong></td>
              <td style="text-align: left">National Assembly</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Citizenry</strong></td>
              <td style="text-align: left">120</td>
            </tr>
            <tr>
              <td style="text-align: left"><strong>Currency</strong></td>
              <td style="text-align: left">Socialist Republics Credit</td>
            </tr>
          </table>
        </td>
        <td><span align=center><img src="seal.png" height=150px><br>Seal</span><br><p><strong>Anthem:</strong> "<i>The Internationale</i>"</p><audio controls><source src="internationale.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
        </td>
      </table>

      <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Y-AvlDPatezlbpWOqtlkvCkEJaLGBTqS" width="640" height="480"></iframe>
    
    <a href="https://info.flagcounter.com/qUOq"><img src="https://s11.flagcounter.com/count2/qUOq/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a

        </div>
    </body>
</html>