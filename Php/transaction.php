<?php

session_start();

$t_name = $_SESSION['t_name'];


$servername = "localhost";
$username = "upescit8_upescsi";
$password = "UPESCSI@2021s";
$dbname = "upescit8_arena_register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['SUBMIT'])) {

    // $filedata = $_FILES['filedata']['name'];

    // $filedata = $t_name . "_" . $filedata;

    // $tmp_name = $_FILES['filedata']['tmp_name'];

    // $folder = "../assets/payments/" . $filedata;

    if (isset($_FILES['filedata'])) {
        $errors = array();
        $filedata = $_FILES['filedata']['name'];
        // $file_size = $_FILES['filedata']['size'];
        $file_tmp = $_FILES['filedata']['tmp_name'];
        $file_type = $_FILES['filedata']['type'];
        $folder = "../assets/payments/";
        // $file_ext = strtolower(end(explode('.', $_FILES['filedata']['name'])));

        // $extensions = array("jpeg", "jpg", "png");

        // if (in_array($file_ext, $extensions) === false) {
        //     $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        // }

        // if ($file_size > 2097152) {
        //     $errors[] = 'File size must be exactly 2 MB';
        // }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $folder . $t_name . ".png");
            echo "<script>alert('Successfully Registered')</script>";
            header("Location: https://upescsi.in/");
        } else {
            print_r($errors);
        }
    }

    $transaction_id = $_POST['trans'];

    $insert_payment = "INSERT INTO transaction_details VALUES ('$t_name', '$transaction_id','$filedata')";

    $query_result = mysqli_query($conn, $insert_payment);

    if ($query_result) {

        move_uploaded_file($file_tmp, $folder);
        echo "<script>alert('Successfully Registered')</script>";


    } else {
        echo "Error: " . $insert_payment . "<br>" . mysqli_error($conn);
        echo "<script>alert('Payment no uploaded')</script>";
    }


}

$conn->close();



?>