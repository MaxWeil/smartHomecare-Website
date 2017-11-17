<?php
  include 'php/database.php';

  session_start();

  if(isset($_SESSION['u_id']) == false){
    header("Location: index.php?error");
    exit();
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="icon" href="./img/logo.jpg">
    <link href="./fonts/ubuntu.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Dashboard</title>

  </head>

  <body class="bodyDashboard">

    <?php
      include_once 'navbar.php';
     ?>
    <div class="welcome">
      <?php echo("Logged in as ".$_SESSION['u_name']." ".$_SESSION['u_surname']);?>
      <a href="accountSettings.php">change Account Settings</a>
    </div>

    <a class="stat" id="employee" href="employees.php">
        <span id="statCount">
          <?php
            //getting number of Employee entries
            $sqlQuery = "SELECT * FROM employee";
            $result = mysqli_query($connection, $sqlQuery);
            $rows = mysqli_num_rows($result);

            echo($rows);
           ?>
        </span>
        <span>Employees with active Account</span>
    </a>

    <a class="stat" id="client" href="clients.php">
        <span id="statCount">
          <?php
            //getting number of Client entries
            $sqlQuery = "SELECT * FROM client";
            $result = mysqli_query($connection, $sqlQuery);
            $rows = mysqli_num_rows($result);

            echo($rows);
           ?>
        </span>
        <span>Clients with active Transmitter</span>
    </a>

    <div id="recentActivity">
      <span>Recent Activity</span>
      <table id="recents">
        <th class="colDate">Date</th>
        <th class="colName">Employee</th>
        <th class="colName">Client</th>
        <th class="colTime">Arrival</th>
        <th class="colTime">Departure</th>
        <th class="colTime">Period of Time</th>

        <?php
          $result = mysqli_query($connection, "SELECT * FROM timestamp ORDER BY date DESC LIMIT 10");

          for($i = 0; $i < mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_assoc($result);

            $employeeAccount = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM account WHERE ID=".$row['Employee_Account_ID']));

            $clientAccount = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM account WHERE ID=".$row['Client_Account_ID']));
            echo "<tr>";
              echo "<td>".$row['date']."</td>";
              echo "<td>
                      <a href=\"employees.php?eA=".$row['Employee_Account_ID']."\">"
                        .$employeeAccount['name']." ".$employeeAccount['surname']."
                      </a>
                    </td>";
              echo "<td>
                      <a href=\"clients.php?cA=".$row['Client_Account_ID']."\">"
                        .$clientAccount['name']." ".$clientAccount['surname']."
                      </a>
                    </td>";
              echo "<td>".$row['arrival']."</td>";
              echo "<td>".$row['departure']."</td>";
              echo "<td>
                      <a href=\"logs.php?lID=".$row['Log_ID']."\">"
                        .$row['period_of_time']."
                      </a>
                    </td>";
            echo "</tr>";
          }
         ?>
      </table>
    </div>

    <?php
      include_once 'footer.php';
     ?>
  </body>

</html>
