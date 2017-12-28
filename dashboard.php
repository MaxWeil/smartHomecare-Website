<?php
  session_start();

  // if(!isset($_SESSION['u_id'])){
  //   header("Location: ./index.php?error");
  // }

  // if($_SESSION['u_auth_lvl'] == 0){
  //   header("Location: ./accountSettings.php");
  // }

  include './php/database.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <link rel="icon" href="./img/logo.png">
    <link rel="fonts" href="./fonts/ubuntu.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/topbar-navigation.js"></script>
    <script src="./js/dashboard.js"></script>

    <title>Dashboard</title>
  </head>
  <body>
    <?php include './components/topbar-navigation.php'; ?>

    <div class="content">

      <p class="heading">Dashboard</p>

      <div class="stats-container" onclick="statsClick('clients')">
        <img class="stats-logo" src="./img/clients.svg">

        <div>
          <p id="clients-count" class="stats-count"></p>
          <p>Active clients</p>
        </div>
      </div>

      <div class="stats-container" onclick="statsClick('employees')">
        <img class="stats-logo" src="./img/employees.svg">

        <div>
          <p id="employees-count" class="stats-count"></p>
          <p>Active employees</p>
        </div>
      </div>

      <div class="recents-container">
        <div>
          <img src="./img/timestamps.svg">
          <p>Recent activities</p>
        </div>

        <div class="recents-table-container" onclick="statsClick('recents')">
          <table class="recents-table">
            <th id="colDate" class="colDate">Date</th>
            <th id="colEmployees" class="colName">Employee</th>
            <th id="colClients" class="colName">Client</th>
            <th id="colArrival" class="colTime">Arrival</th>
            <th id="colDeparture" class="colTime">Departure</th>
            <th id="colTime" class="colTime">Period of Time</th>

          <?php
            $sqlQuery =   "SELECT   timestamp.ID,
                                    timestamp.date,
                                    timestamp.Employee_ID,
                                    CONCAT_WS(' ',employee.name, employee.surname) AS employee_name,
                                    timestamp.Client_ID, CONCAT_WS(' ',client.name, client.surname) AS client_name,
                                    timestamp.departure,
                                    timestamp.arrival,
                                    TIMEDIFF(departure, arrival) period_of_time
                                    FROM timestamp
                                    INNER JOIN employee ON timestamp.Employee_ID=employee.ID
                                    INNER JOIN client ON timestamp.Client_ID=client.ID
                                    ORDER BY date DESC
                                    LIMIT 10";
            $result = mysqli_query($connection, $sqlQuery);
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
                echo "<td id=\"colDate\">".$row['date']."</td>";
                echo "<td id=\"colEmployees\">
                        <a href=\"employees.php?e=".$row['Employee_ID']."\">"
                          .$row['employee_name']."
                        </a>
                      </td>";
                echo "<td id=\"colClients\">
                        <a href=\"clients.php?c=".$row['Client_ID']."\">"
                          .$row['client_name']."
                        </a>
                      </td>";
                echo "<td id=\"colArrival\">".$row['arrival']."</td>";
                echo "<td id=\"colDeparture\">".$row['departure']."</td>";
                echo "<td id=\"colTime\">
                        <a href=\"logs.php?ID=".$row['ID']."\">"
                          .$row['period_of_time']."
                        </a>
                      </td>";
              echo "</tr>";
            }
           ?>
          </table>
        </div>

      </div>
    </div>

    <?php include './components/footer.php'; ?>
  </body>
</html>
