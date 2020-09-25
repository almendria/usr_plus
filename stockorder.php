<!DOCTYPE html>
<html>
    <head>
        <title>Stockorder</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <br>
        <div id="frm">
            <form action="transfer.php" method="POST">
                <?php
                        /*
                        $servername, $username, $password, and $dbname required
                        */

                    $user = $_POST['user'];
                    $pass = sha1($_POST['pass']);
                    $buysell = $_POST['buysell'];
                    $shares = $_POST['shares'];
                    $prices = $_POST['prices'];
                    $ticker = $_POST['ticker'];                    
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM users WHERE username='$user' and password='$pass'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $balance = $row['balance'];
                    }
                    } else {
                        die("Username and/or password are incorrect.");
                    }

                    $conn->close();

                    if ($prices != "") {
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: ".$conn->connect_error);
                        }

                        if ($buysell == "sell") {
                            $sql = "SELECT ".$ticker." FROM users WHERE username='$user'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $number = $row[$ticker];
                            }
                            } else {
                                die("Username and/or password are incorrect.");
                            }

                            if ($number < $shares) {
                                die("Owned shares is less than shares being sold. You own ".$number." shares of ".$ticker." and you are trying to ".$buysell.", but you are trying to sell ".$shares." shares.");
                            }
                        } else {
                            if ($balance < ($shares * $prices)) {
                                die("Not enough balance to initiate order.");
                            }
                        }

                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        
                        $x = 0;
                        while ($x < intval($shares)) {
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "INSERT INTO ".$buysell."Orders".$ticker." (username, price)
                            VALUES ('$user', '$prices')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<br>New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            $conn->close();
                            $x = $x + 1;
                        }
                    } else {
                        if ($buysell == "sell") {
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $sql = "SELECT ".$ticker." FROM users WHERE username='$user'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $number = $row[$ticker];
                                }
                            } else {
                                die("Username and/or password are incorrect.");
                            }
                            if ($number < $shares) {
                                die("Owned shares is more than shares being sold.");
                            }
                        } else {
                            if ($balance < ($shares * $prices)) {
                                die("Not enough balance to initiate order.");
                            }
                        }

                        if ($buysell == "buy") {
                            $buysell = "sell";
                        } else {
                            $buysell = "buy";
                        }

                        $x = 0;
                        $total = 0;
                        while ($x < $shares) {
                            // GET ORDERS
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM ".$buysell."Orders".$ticker." ORDER BY price DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $inituser = $row["username"];
                                    if ($inituser == $user) {
                                        die("You cannot buy from yourself!");
                                    }
                                    $initprice = $row["price"];
                                    $idpos = $row["id"];
                                    $total = $total + $initprice;
                                }
                            } else {
                                echo "<br>0 results";
                            }

                            // GET INITIATOR'S INFORMATION, CALCULATE INITIATOR & CLOSER'S NEW INFORMATION
                            $sql = "SELECT * FROM users WHERE username='$inituser'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $initbalance = $row["balance"];
                                    $sql = "SELECT ".$ticker." FROM users WHERE username='$inituser'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $initstock = $row[$ticker];
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    
                                    $sql = "SELECT * FROM users WHERE username='$user'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $closstock = $row[$ticker];
                                            $balance = $row["balance"];
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $sql = "SELECT ".$ticker." FROM users WHERE username='$user'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $number = $row[$ticker];
                                        }
                                    }

                                    if ($balance < $initprice) {
                                        die("You ran out of funds to continue this transaction. Part of the transaction may have been completed, so please check your balance and portfolio in your portal.");
                                    }

                                    if ($buysell == "buy") {
                                        $newinitbalance = $initbalance - $initprice;
                                        $newclosbalance = $balance + $initprice - 0.1;
                                        $newinitstock = $initstock + 1;
                                        $newclosstock = $number - 1;
                                    }
                                    if ($buysell == "sell") {
                                        $newinitbalance = $initbalance + $initprice;
                                        $newclosbalance = $balance - $initprice - 0.1;
                                        $newinitstock = $initstock - 1;
                                        $newclosstock = $number + 1;
                                    }
                                    echo "<br>New init balance: $newinitbalance<br>New clos balance: $newclosbalance<br>New init stock: $newinitstock<br>New clos stock: $newclosstock<br>";

                                    // Fetch ASE balance data
                                    $sql = "SELECT balance FROM users WHERE username='ase'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $newasebalance = $row["balance"] + 0.1;
                                        }
                                    }

                                    // Update stock exchange balance
                                    $sql = "UPDATE users SET balance='$newasebalance' WHERE username='ase'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating ASE: " . $conn->error;
                                    }

                                    // Update initiator balance
                                    $sql = "UPDATE users SET balance='$newinitbalance' WHERE username='$inituser'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }

                                    // Update closer balance
                                    $sql = "UPDATE users SET balance='$newclosbalance' WHERE username='$user'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }

                                    // Update initiator stock
                                    $sql = "UPDATE users SET ".$ticker."='$newinitstock' WHERE username='$inituser'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }

                                    // Update closer stock
                                    $sql = "UPDATE users SET ".$ticker."='$newclosstock' WHERE username='$user'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Record updated successfully";
                                    } else {
                                        echo "Error updating record: " . $conn->error;
                                    }
                                    
                                    $sql = "SELECT ".$ticker." FROM users WHERE username='$inituser'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $initstock = $row[$ticker];
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    $sql = "SELECT ".$ticker." FROM users WHERE username='$user'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $closstock = $row[$ticker];
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                }
                            } else {
                                die("Error");
                            }

                            $sql = "DELETE FROM ".$buysell."Orders".$ticker." WHERE id='$idpos'";
                            if ($conn->query($sql) === TRUE) {
                                echo "Record deleted successfully";
                                } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                            $conn->close();

                            $x = $x + 1;
                        }
                    }

                ?>
            </form>
            <br>
            <a href="login.php">Logout</a>
        </div>
    </body>
</html>