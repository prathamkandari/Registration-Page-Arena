<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "huR5bN@1";
$dbname = "Game_event";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['verify'])){

   $team_details =  array(

      $t_name = $_POST['t_name'],
      $game = $_POST['inlineRadioOptions'],
      $team_size = $_POST['inlineRadioOptions1'],

   );

   $_SESSION['t_name'] = $t_name;
   $_SESSION['game'] = $game;
   $_SESSION['team_size'] = $team_size;

   $insert_team = "INSERT INTO Team_details (Team_name, Game, No_of_players) VALUES ('$t_name', '$game', '$team_size')";

   $query_result = mysqli_query($conn, $insert_team);

   if($query_result){
      
      header("Location: ../html/page2.html");
      exit();
   }
   else{
      echo "Error: " . $insert_team . "<br>" . mysqli_error($conn);
   }


}

$conn->close();


?>