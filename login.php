<!DOCTYPE html>
<html>
    <head>
        <title>USR+</title>
        <style>
            html {
            height: 100%;
            }

            body {
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

        <div class="content">
            <h1>Login</h1>
            <form action="portal.php" method="POST">
                <p>
                    <label>Username</label><br>
                    <input type="text" id="user" name="user" />
                </p>
                <p>
                    <label>Password</label><br>
                    <input type="password" id="pass" name="pass" />
                </p>
                <p>
                    By clicking "Login", I agree to the <a href="terms_and_conditions.pdf" target="blank">Terms and Conditions</a>.
                </p>
                <p>
                    <input type="submit" id="btn" value="Login" />
                </p>
            </form>
        </div>
    </body>
</html>