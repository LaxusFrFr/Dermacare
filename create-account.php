<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    <body style="background-image: url('images/bg2.jpg'); background-repeat: no-repeat; background-size: cover; <meta charset="UTF-8>
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
$_SESSION["user"]="";
$_SESSION["usertype"]="";
// Set the new timezone
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$_SESSION["date"]=$date;
//import database
include("connection.php");
if($_POST){
    $result= $database->query("select * from webuser");
    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            //TODO
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");
            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;
            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Reconfirm Password</label>';
    }
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}
?>
    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">You're Almost There.</p>
                    <p class="sub-text">Add your personal details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>   
            </tr>
            <tr>
            <td class="label-td" colspan="2">
        <label for="tele" class="form-label">Mobile Number: </label>
    </td>
</tr>
<tr>
        <td class="label-td" colspan="2" style="position: relative; padding-top: 0px;"> <!-- Adjust padding-top here -->
        <span class="flag-icon">🇵🇭</span>
        <img src="images/Flag.png" alt="Philippine Flag" style="height: 7px; vertical-align: middle; margin-left: 0px;">
        <input type="tel" name="tele" class="input-text" placeholder="XXXXXXXXXX" pattern="[0-9]{10}" required style="font-size: normal; padding-left: 40px; padding-top: 8px; line-height: 25px;">
        <span style="position: absolute; left: 5px; top: 67%; transform: translateY(-50%); font-size: smaller; color: black;">(+63)</span>
    </td>
</tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Confirm Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $error ?>

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
        <input type="submit" value="Submit" class="login-btn btn-primary">
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