
<?php

session_start();

$t_name = $_SESSION['t_name'];
$game_option = $_SESSION['game'];
$team_size = $_SESSION['team_size'];

$servername = "localhost";
$username = "root";
$password = "huR5bN@1";
$dbname = "Game_event";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}



if(isset($_POST['next'])){

    
    if($game_option == "BGMI"){


        $team_lead_details = array(

            $tl_name = $_POST['tl_name'],
            $tl_email = $_POST['tl_email'],
            $tl_id = $_POST['tl_id'],
            $tl_rank = $_POST['tl_rank'],
            $tl_contact = $_POST['tl_contact'],
            $tl_sap = $_POST['tl_sap'],
            $tl_college = $_POST['tl_college'],
            $tl_discord = $_POST['tl_discord'],
        );

        $member1_details = array(

            $m1_name = $_POST['m1_name'],
            $m1_email = $_POST['m1_email'],
            $m1_id = $_POST['m1_id'],
            $m1_rank = $_POST['m1_rank'],
            $m1_contact = $_POST['m1_contact'],
            $m1_sap = $_POST['m1_sap'],
            $m1_college = $_POST['m1_college'],
            $m1_discord = $_POST['m1_discord'],
        );

        function null_Check($array){

            foreach($array as $value){

                if(!isset($value) || empty($value)){

                    $value= 'NULL';
                }
            }
            
        }

         
        $registered_successfully = array(); 

        null_Check($team_lead_details);
        null_Check($member1_details);

        $insert_tl_details = "INSERT INTO Team_lead VALUES ('$tl_name', '$tl_email','$tl_id','$tl_rank','$tl_contact', '$tl_sap', '$tl_college','$tl_discord' ,'$t_name')";
        $insert_m1_details = "INSERT INTO m1_details VALUES ('$m1_name', '$m1_email','$m1_id','$m1_rank', '$m1_contact', '$m1_sap', '$m1_college' ,'$m1_discord','$t_name')";

        $tl_registered = mysqli_query($conn, $insert_tl_details);
        $m1_registered = mysqli_query($conn, $insert_m1_details);

        if($tl_registered && $m1_registered){

            array_push($registered_successfully, true);
        }

        if($team_size > 2 ){

            $member2_details = array(

                $m2_name = $_POST['m2_name'],
                $m2_email = $_POST['m2_email'],
                $m2_id = $_POST['m2_id'],
                $m2_rank = $_POST['m2_rank'],
                $m2_contact = $_POST['m2_contact'],
                $m2_sap = $_POST['m2_sap'],
                $m2_college = $_POST['m2_college'],
                $m2_discord = $_POST['m2_discord'],
            );

            null_Check($member3_details);
            $insert_m2_details = "INSERT INTO m2_details VALUES ('$m2_name', '$m2_email','$m2_id','$m2_rank', '$m2_contact', '$m2_sap', '$m2_college' ,'$m2_discord','$t_name')";

            $m2_registered = mysqli_query($conn, $insert_m2_details);

            if($m2_registered){

                array_push($registered_successfully, true);
            }

            if($team_size == 4){

                $member3_details = array(

                    $m3_name = $_POST['m3_name'],
                    $m3_email = $_POST['m3_email'],
                    $m3_id = $_POST['m3_id'],
                    $m3_rank = $_POST['m3_rank'],
                    $m3_contact = $_POST['m3_contact'],
                    $m3_sap = $_POST['m3_sap'],
                    $m3_college = $_POST['m3_college'],
                    $m3_discord = $_POST['m3_discord'],
                );

                null_Check($member3_details);
                $insert_m3_details = "INSERT INTO m3_details VALUES ('$m3_name', '$m3_email','$m3_id','$m3_rank', '$m3_contact', '$m3_sap', '$m3_college','$m3_discord' ,'$t_name')";

                $m3_registered = mysqli_query($conn, $insert_m3_details);

                if($m3_registered){

                    array_push($registered_successfully, true);
                }
            }


        }
        function check_Registration($array) {
            return array_reduce($array, function ($carry, $item) {
                return $carry && $item;
            }, true);
        }

        if(check_Registration($registered_successfully)){

            header("Location: ../html/page3.html");
  
        }
        else{ 
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    else{


        $team_lead_details = array(

            $tl_name = $_POST['tl_name'],
            $tl_email = $_POST['tl_email'],
            $tl_id = $_POST['tl_id'],
            $tl_rank = $_POST['tl_rank'],
            $tl_contact = $_POST['tl_contact'],
            $tl_sap = $_POST['tl_sap'],
            $tl_college = $_POST['tl_college'],
            $tl_discord = $_POST['tl_discord'],
        );

        $member1_details = array(

            $m1_name = $_POST['m1_name'],
            $m1_email = $_POST['m1_email'],
            $m1_id = $_POST['m1_id'],
            $m1_rank = $_POST['m1_rank'],
            $m1_contact = $_POST['m1_contact'],
            $m1_sap = $_POST['m1_sap'],
            $m1_college = $_POST['m1_college'],
            $m1_discord = $_POST['m1_discord'],
        );

        $member2_details = array(

                $m2_name = $_POST['m2_name'],
                $m2_email = $_POST['m2_email'],
                $m2_id = $_POST['m2_id'],
                $m2_rank = $_POST['m2_rank'],
                $m2_contact = $_POST['m2_contact'],
                $m2_sap = $_POST['m2_sap'],
                $m2_college = $_POST['m2_college'],
                $m2_discord = $_POST['m2_discord'],
            );

            $member3_details = array(

                $m3_name = $_POST['m3_name'],
                $m3_email = $_POST['m3_email'],
                $m3_id = $_POST['m3_id'],
                $m3_rank = $_POST['m3_rank'],
                $m3_contact = $_POST['m3_contact'],
                $m3_sap = $_POST['m3_sap'],
                $m3_college = $_POST['m3_college'],
                $m3_discord = $_POST['m3_discord'],
            );

        $member4_details = array(

            $m4_name = $_POST['m4_name'],
            $m4_email = $_POST['m4_email'],
            $m4_id = $_POST['m4_id'],
            $m4_rank = $_POST['m4_rank'],
            $m4_contact = $_POST['m4_contact'],
            $m4_sap = $_POST['m4_sap'],
            $m4_college = $_POST['m4_college'],
            $m4_discord = $_POST['m4_discord'],
        );

        $registered_successfully = array();

        null_Check($member1_details);
        null_Check($member2_details);

        $insert_tl_details = "INSERT INTO Team_lead VALUES ('$tl_name', '$tl_email','$tl_id','$tl_rank','$tl_contact', '$tl_sap', '$tl_college','$tl_discord' ,'$t_name')";
        $insert_m1_details = "INSERT INTO m1_details VALUES ('$m1_name', '$m1_email','$m1_id','$m1_rank', '$m1_contact', '$m1_sap', '$m1_college' ,'$m1_discord','$t_name')";

        $insert_m2_details = "INSERT INTO m2_details VALUES ('$m2_name', '$m2_email','$m2_id','$m2_rank', '$m2_contact', '$m2_sap', '$m2_college' ,'$m2_discord','$t_name')";

        $insert_m3_details = "INSERT INTO m3_details VALUES ('$m3_name', '$m3_email','$m3_id','$m3_rank', '$m3_contact', '$m3_sap', '$m3_college','$m3_discord' ,'$t_name')";

        $insert_m4_details = "INSERT INTO m4_details VALUES ('$m4_name', '$m4_email', '$m4_id','$m4_rank','$m4_contact', '$m4_sap', '$m4_college','$m4_discord' ,'$t_name')";

        $m1_registered = mysqli_query($conn, $insert_tl_details);
        $m2_registered = mysqli_query($conn, $insert_m1_details);
        $m3_registered = mysqli_query($conn, $insert_m2_details);
        $m4_registered = mysqli_query($conn, $insert_m3_details);
        $m5_registered = mysqli_query($conn, $insert_m4_details);

        if($m1_registered && $m2_registered && $m3_registered && $m4_registered && $m5_registered){

            array_push($registered_successfully, true);

        }

        function check_Registration($array) {
            return array_reduce($array, function ($carry, $item) {
                return $carry && $item;
            }, true);
        }

        if(check_Registration($registered_successfully)){

            header("Location: ../html/page3.php");
  
        }
        else{ 
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    $conn->close();


}

?>

