<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Us</title>
<style>
    .container {
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        margin: 10px;
        padding: 20px;
        background-color: bisque;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container input {
        margin: 10px 0;
        padding: 10px;
    }
</style>
</head>

<body>
    <?php include "Header.php"; ?>

    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $db = "form_table";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uname = trim($_POST['U_Name']);
            $pass = trim($_POST['Pwd']);

            if (!empty($uname) && !empty($pass)) {
                // Prepare an insert statement
                $stmt = $conn->prepare("INSERT INTO sign_form (username, password, datetime) VALUES (?, ?, ?)");
                $datetime = date('Y-m-d H:i:s');
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

                if ($stmt) {
                    $stmt->bind_param("sss", $uname, $hashed_password, $datetime);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Please fill in all fields.";
            }
        }

        $conn->close();
    ?>

    <div class="container">
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="U_Name">Username:</label>
                <br>
                <input type="text" name="U_Name" id="U_Name" placeholder="Username" required>
                <br>
                <label for="Pwd">Password:</label>
                <br>
                <input type="password" name="Pwd" id="Pwd" placeholder="Create password" required>
                <br>
                <input type="submit" name="BtnSub" value="Sign Up">
            </form>
        </div>
    </div>
</body>

</html>