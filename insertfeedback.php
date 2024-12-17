<?php
$host = "localhost";
$db_name = "dermacareadmin";
$username = "dermacare";
$password = "dermatologists";

$con = mysqli_connect($host, $username, $password, $db_name);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit1'])) {
    $name = $_POST['name'];
    $stars = $_POST['stars'];
    $feedback = $_POST['feedback'];

    // Load the fixed image content
    $fixedImageContent = file_get_contents('images/user_avatar.png');
    
    $smallfile = addslashes($fixedImageContent);
    $fileType = 'image/png'; // Set the appropriate MIME type for your fixed image

    $query = "INSERT INTO feedback(name, stars, message, picture, picture_type) VALUES ('$name', $stars, '$feedback', '$smallfile', '$fileType')";
    $data = mysqli_query($con, $query);

    if ($data) {
        echo '<script>window.location.href = "logout.php";</script>';
    } else {
        echo "Error inserting data: " . mysqli_error($con);
    }
} elseif (isset($_POST['submit2'])) {
    echo '<script>window.location.href = "logout.php";</script>';
}

mysqli_close($con);
?>
