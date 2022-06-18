<?php
  include('Connection.php');
  $conn = new ConnectDatabase();
  $Status = 0;
  
  if ($conn->GetConnection()) {
    $Status = 1;
    echo(json_encode($Status));
  } else {
    if ($conn->CreateDatabase()) {
      $Status = 2;
      echo json_encode($Status);
    } else {
      $Status = 3;
      echo json_encode($Status);
    }
  }
?>