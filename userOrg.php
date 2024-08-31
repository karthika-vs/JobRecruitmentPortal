<?php
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="jobportal";
    $conn="";

    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style5.css">
  <link rel="stylesheet" href="userOrg.css">
</head>
<body>
  <div class="all">
    <div class="left">
      <a href="main.html">HOME</a>
      <a href="vacancy.html">ADD VACANCY</a>
      <a href="userOrg.php">USER</a>
      <a href="wp1.html">LOGOUT</a>
    </div>
  </div>
  <div class="column-right">
    <h4>
        <p class="p1"> Organisation Name: <?php
        $sql1="SELECT s.orgname FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        echo $row["orgname"];
        ?> </p>  
        <p class="p2"> Owner Name: <?php
        $sql2="SELECT s.ownername FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        echo $row["ownername"];
        ?></p>
        <p class="p3">Based On: <?php
        $sql3="SELECT s.basedon FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        echo $row["basedon"];
        ?></p>
        <p class="p4">Office number: <?php
        $sql4="SELECT s.offnum FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql4);
        $row = $result->fetch_assoc();
        echo $row["offnum"];
        ?></p>
        <p class="p5">City: <?php
        $sql5="SELECT s.city FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql5);
        $row = $result->fetch_assoc();
        echo $row["city"];
        ?></p>
        <p class="p6">Email: <?php
        $sql6="SELECT s.email FROM signupo s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql6);
        $row = $result->fetch_assoc();
        echo $row["email"];
        ?> </p>
    </h4>
</div>
</div>
  <h1></h1>
</body>
</html>
<?php $conn->close(); ?>