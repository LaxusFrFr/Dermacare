<?php 
if ($_POST) {
    include("connection.php");

    // Get the email from the form
    $email = $_POST['email'];

    // Check if the email exists in the database
    $result = $database->query("SELECT * FROM webuser WHERE email='$email'");
    
    if ($result->num_rows == 1) {
        // Generate a unique token for the password reset
        $token = bin2hex(random_bytes(50));

        // Store the token in the database (you may want to add a token expiration time)
        $database->query("UPDATE webuser SET reset_token='$token' WHERE email='$email'");

        // Create a password reset URL
        $reset_link = "http://yourdomain.com/resetpassword.php?token=" . $token;

        // Send the reset link to the user's email
        $subject = "Password Reset Request";
        $message = "Click the link below to reset your password: \n" . $reset_link;
        $headers = "From: no-reply@yourdomain.com";

        // Send email
        if (mail($email, $subject, $message, $headers)) {
            $success_message = "Check your email for the password reset link.";
        } else {
            $error_message = "There was an issue sending the email. Please try again.";
        }
    } else {
        $error_message = "Email not found in our records.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <title>Forgot Password</title>
    <link rel="icon" href="images/B2.ico" type="image/dermacare-icon">
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/bg2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff; /* White container */
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: top 0.3s ease, bottom 0.3s ease; /* Smooth transition when adjusting */
            box-shadow: 0 3px 5px 0 rgba(240, 240, 240, 0.3);
            animation: transitionIn-Y-over 0.5s;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container {
            width: 100%;
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
            text-align: center; /* Center the text label */
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            color: #333;
        }

        .form-container input[type="submit"] {
            background-color: #ff0157;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .form-container input[type="submit"]:hover {
            background-color: #e6004f;
        }
        .form-container label.special-text {
            color: black; /* Make the specific label text black */
        }
        .message {
            font-size: 14px;
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        .success {
            color: green;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #ff0157;
            text-decoration: none;
        }

        .back-link a:hover {
            color: #e6004f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="forgot_password.php" method="POST" class="form-container">
            <?php if (isset($success_message)): ?>
                <p class="message success"><?php echo $success_message; ?></p>
            <?php elseif (isset($error_message)): ?>
                <p class="message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            
            <label for="email" class="special-text">Please enter your email to search for your account.
            </label>
            <input type="email" name="email" required placeholder="Enter your email">

            <input type="submit" value="Continue">
        </form>

        <div class="back-link">
            <a href="login.php">Cancel</a>
        </div>
    </div>
</body>
</html>
