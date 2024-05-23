<?php
    require 'config.php';
    session_start(); // Start the session at the beginning

    if (isset($_POST["submit"])) {
        //Setting user inputs to variables
        $name_email = $_POST["name_email"];
        $password = $_POST["password"];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users_table WHERE U_Name = ? OR Email = ?");
        $stmt->bind_param("ss", $name_email, $name_email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a row is selected
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedHash = $row["Password"];

            // Verify the password
            if (password_verify($password, $storedHash)) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["User_ID"];
                header("Location: index.php");
                echo $_SESSION["id"];
                exit(); // Ensure to exit after redirect
            } else {
                echo "<script>alert('Wrong Password.');</script>";
            }
        } else {
            echo "<script>alert('Name or Email not found.');</script>";
        }

        // Close statement
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="" method="post" autocomplete="off">
            <input type="text" name="name_email" id="txtNameEmail" required><br>
            <input type="password" name="password" id="txtPassword" required><br>
            <button type="submit" name="submit">Login</button>
        </form>
        <br>
        <span>Are you new? <a href="signup.php">Sign-Up</a></span>
    </body>
    <script>
        let nameEmail = $("#txtNameEmail").val();
        let pass = $("#txtPassword").val();

        $("button").click(function(){
            if(nameEmail == "admin84" || "admin@123.com" && pass == "abc@adm12in"){
                
            }
        });
    </script>
</html>
