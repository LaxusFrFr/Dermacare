<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    <link rel="icon" href="images/B2.ico" type="image/dermacare-icon">
    <title>Sign Up</title>
    <style>
        /* Global reset */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
        }

        body {
            background-image: url('images/bg2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        /* Ensuring full height layout */
        .container {
            min-height: 50vh; /* Take 50% of the viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative; /* Allow for movement with top/bottom */
            top: 100px; /* Initial position from the top */
            bottom: 0; /* Ensure it's anchored from the bottom as well */
            transition: top 0.3s ease, bottom 0.3s ease; /* Smooth transition when adjusting */
        }
    </style>
</head>
<body>
<?php
//learn from w3schools.com
//Unset all the server side variables
session_start();
$_SESSION["user"] = "";
$_SESSION["usertype"] = "";
// Set the new timezone
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d');
$_SESSION["date"] = $date;
if($_POST){
    $_SESSION["personal"] = array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );
    print_r($_SESSION["personal"]);
    header("location: create-account.php");
}
?>
    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started.</p>
                    <p class="sub-text">Add your personal details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
            <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">Age: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="Age" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>
            <style>
    .btn-primary-soft, .btn-primary {
        background-color: #ff0157; /* Button color */
        color: white; /* Text color for contrast */
        border: none; /* Remove border */
        padding: 12px 24px; /* Increased padding for a more substantial look */
        width: 100%; /* Full width of container */
        box-sizing: border-box; /* Include padding and border in total width and height */
        border-radius: 5px; /* Rounded corners for a modern touch */
        font-size: 16px; /* Increased font size for better readability */
        font-family: 'Arial', sans-serif; /* Consistent font family */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }
    .btn-primary-soft:hover, .btn-primary:hover {
        background-color: #e6004f; /* Darken color on hover */
        transform: translateY(-2px); /* Lift effect on hover */
    }
</style>
<tr> 
    <td>
        <input type="reset" value="Reset" class="login-btn btn-primary-soft">
    </td>
    <td>
        <input type="submit" value="Next" class="login-btn btn-primary">
    </td>
</tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>
                    </form>
            </tr>
        </table>
    </div>
</center>
</body>
</html>
