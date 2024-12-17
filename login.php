<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signin.css"> 
    <title>Sign In</title>
    <link rel="icon" href="images/B2.ico" type="image/dermacare-icon">
    <body style="background-image: url('images/bg2.jpg'); background-repeat: no-repeat; background-size: cover; <meta charset="UTF-8>
</head>
<style>
    
   
        header {
            position: absolute;
            top: 2%;
            left: 2%; /* Add left positioning */
        }
        .logo {
            text-decoration: none;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-size: 1.9em;
            font-weight: 750;
        }
        .logo img {
            vertical-align: middle;
            margin-right: 10px; /* Adjusted for better spacing */
        }
        .logo span {
            color: #ff0157;
            font-size: 1.3em;
        }
    </style> 
</head>
<body>
    <header>
        <a href="dermacarereview.html" class="back-link">
            <img src="images/Home1.png" alt="Back Arrow" class="back-arrow" /> <!-- Image arrow -->
        </a>
    </header>

    <style>
        .back-link {
            text-decoration: none; /* No underline */
            transition: color 0.3s; /* Smooth transition */
            display: inline-flex; /* Align icon */
            align-items: center; /* Center icon vertically */
        }

        .back-arrow {
            width: 80px; /* Set a larger width for the home image */
            height: auto; /* Maintain aspect ratio */
        }

        .back-link:hover .back-arrow {
            opacity: 0.7; /* Slightly change opacity on hover */
        }
    </style>
<body>
    <?php
    //learn from w3schools.com
    //Unset all the server side variables
    session_start();
    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    $_SESSION["date"]=$date;
    //import database
    include("connection.php");
    if($_POST){
        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        $error='<label for="promter" class="form-label"></label>';
        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){
                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid password or email address</label>';
                }
            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){
                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');
                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid password or email address</label>';
                }
            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){
                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid password or email address</label>';
                }
            }   
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">No account was found for this email</label>';
        }  
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }
    ?>
    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Sign In</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">Login your details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email" required>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>
            <tr>
                <td><br>
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
                    <input type="submit" value="Log In" class="login-btn btn-primary-soft">
                    <a href="forgotpassword.php" class="hover-link1 non-style-link">Forgot password?</a>
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>                        
                    </form>
        </table>
    </div>
</center>
</body>
</html>