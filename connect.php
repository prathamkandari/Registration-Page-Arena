<?php
$t_name = $_POST['t_name'];
$t_type = $_POST['t_type'];
$teammate = $_POST['teammate'];
$m1_name = $_POST['m1_name'];
$m1_email = $_POST['m1_email'];
$m1_phno = $_POST['m1_phno'];
$m1_stuupes = $_POST['m1_stuupes'];
$m1_sap = $_POST['m1_sap'];
$m1_gender = $_POST['m1_gender'];
// $m1_memcsi = $_POST['m1_memcsi'];
$m1_csiid = $_POST['m1_csiid'];

$m2_name = $_POST['m2_name'];
$m2_email = $_POST['m2_email'];
$m2_phno = $_POST['m2_phno'];
$m2_stuupes = $_POST['m2_stuupes'];
$m2_sap = $_POST['m2_sap'];
$m2_gender = $_POST['m2_gender'];
// $m2_memcsi = $_POST['m2_memcsi'];
$m2_csiid = $_POST['m2_csiid'];
if ($teammate > 2) {
   $m3_name = $_POST['m3_name'];
   $m3_email = $_POST['m3_email'];
   $m3_phno = $_POST['m3_phno'];
   $m3_stuupes = $_POST['m3_stuupes'];
   $m3_sap = $_POST['m3_sap'];
   $m3_gender = $_POST['m3_gender'];
   // $m3_memcsi = $_POST['m3_memcsi'];
   $m3_csiid = $_POST['m3_csiid'];
} elseif ($teammate > 3)


   $m4_name = $_POST['m4_name'];
$m4_email = $_POST['m4_email'];
$m4_phno = $_POST['m4_phno'];
$m4_stuupes = $_POST['m4_stuupes'];
$m4_sap = $_POST['m4_sap'];
$m4_gender = $_POST['m4_gender'];
// $m4_memcsi = $_POST['m4_memcsi'];
$m4_csiid = $_POST['m4_csiid'];

$payment = $_POST['payment'];
$trans_id = $_POST['trans_id'];

// $jpeg_file = $jpeg_file['jpeg_file'];


?>
<?php
if (isset($_FILES['jpeg_file'])) {
   $errors = array();
   $file_name = $_FILES['jpeg_file']['name'];
   $file_size = $_FILES['jpeg_file']['size'];
   $file_tmp = $_FILES['jpeg_file']['tmp_name'];
   $file_type = $_FILES['jpeg_file']['type'];
   $file_ext = strtolower(end(explode('.', $_FILES['jpeg_file']['name'])));

   $extensions = array("jpeg", "jpg", "png");

   if (in_array($file_ext, $extensions) === false) {
      $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
   }

   if ($file_size > 2097152) {
      $errors[] = 'File size must be excately 2 MB';
   }

   if (empty($errors) == true) {
      move_uploaded_file($file_tmp, "uploads/" . $file_name);
      echo "Success";
   } else {
      print_r($errors);
   }
}
?>
<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hack_register');
if ($conn->connect_error) {
   die('Connection Failed : ' . $conn->connect_error);

} else {

   $sql = mysqli_query($conn, "INSERT INTO register (`t_name`, `t_type`, `teammate`, `m1_name`, `m1_email`,`m1_phno`,`m1_stuupes`,`m1_sap`, `m1_gender`,`m1_csiid`,`m2_name`,`m2_email`,`m2_phno`,`m2_stuupes`,`m2_sap`,`m2_gender`,`m2_csiid`,`m3_name`,`m3_email`,`m3_phno`,`m3_stuupes`,`m3_sap`,`m3_gender`,`m3_csiid`,`m4_name`,`m4_email`,`m4_phno`,`m4_stuupes`,`m4_sap`,`m4_gender`,`m4_csiid`,`payment`,`trans_id`,`jpeg_file`)
           VALUES('" . $t_name . "','" . $t_type . "','" . $teammate . "','" . $m1_name . "','" . $m1_email . "','" . $m1_phno . "','" . $m1_stuupes . "','" . $m1_sap . "','" . $m1_gender . "','" . $m1_csiid . "','" . $m2_name . "','" . $m2_email . "','" . $m2_phno . "','" . $m2_stuupes . "','" . $m2_sap . "','" . $m2_gender . "','" . $m2_csiid . "','" . $m3_name . "','" . $m3_email . "','" . $m3_phno . "','" . $m3_stuupes . "','" . $m3_sap . "','" . $m3_gender . "','" . $m3_csiid . "','" . $m4_name . "','" . $m4_email . "','" . $m4_phno . "','" . $m4_stuupes . "','" . $m4_sap . "','" . $m4_gender . "','" . $m4_csiid . "','" . $payment . "','" . $trans_id . "','uploads/" . $file_name . "' )") or die("Cannot connect1 to database!");


   // Email Address

   $to = 'm1_email';
   $subject = "Mail successfully sent";
   $body = "Hello This is your pc";
   $headers = "From: prathamkandari123@gmail.com";

   if (mail($to, $subject, $body, $headers)) {
      echo "Mail successfully sent";
   } else {
      echo "Error is there";
   }

   echo "Registration successfully...";
   $conn->close();

}
?>