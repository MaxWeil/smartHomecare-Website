<?php
  include 'php/database.php';

  $sqlQuery = "SELECT * , TIMEDIFF(departure, arrival) period_of_time FROM timestamp ORDER BY date DESC LIMIT 10";
  $result = mysqli_query($connection, $sqlQuery);

  while($row = mysqli_fetch_assoc($result)){

    echo($row['departure']." ");

  }
 ?>
