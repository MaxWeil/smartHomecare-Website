<?php
  session_start();
 ?>

    <header>
      <div class="navbar">
        <img id="logo" src="./img/logo.jpg">
        <span id="brandname">smartHomecare</span>

        <div id="navPlaceholder"></div>

        <a id="aDashboard" href="dashboard.php">Dashboard</a>
        <a id="aLogs" href="logs.php">Logs</a>
        <a id="aEmployees" href="employees.php">Employees</a>
        <a id="aClients" href="clients.php">Clients</a>
        <button id="btnLogout" type="submit" name="btnLogout">Logout</button>
      </div>
    </header>
