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
  <link rel="stylesheet" href="Styles/style5.css">
  <link rel="stylesheet" href="Styles/useremp.css">
</head>
<body>
  <div class="all">
    <div class="left">
      <a href="mainJob.html">HOME</a>
      <a href="useremp.php">USER</a>
      <a href="wp1.html">LOGOUT</a>
    </div>
  </div>
  <div class="column-right">
    <h4>
        <p class="p1"> Name        : <?php
        $sql1="SELECT s.name FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        echo $row["name"];
        ?> </p>  
        <p class="p2"> Email Id    : <?php
        $sql2="SELECT s.email FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        echo $row["email"];
        ?></p>
        <p class="p3"> Age         : <?php
        $sql3="SELECT s.age FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        echo $row["age"];
        ?></p>
        <p class="p4"> Gender      : <?php
        $sql4="SELECT s.gender FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql4);
        $row = $result->fetch_assoc();
        echo $row["gender"];        
        ?></p>
        <p class="p5"> Phone Number: <?php
        $sql5="SELECT s.phonenum FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql5);
        $row = $result->fetch_assoc();
        echo $row["phonenum"];
        ?></p>
        <p class="p6"> City: <?php
        $sql6="SELECT s.city FROM signupj s JOIN ref r ON s.email = r.email WHERE r.rid = (SELECT MAX(rid) FROM ref)";
        $result = $conn->query($sql6);
        $row = $result->fetch_assoc();
        echo $row["city"];
        
        ?> </p>
    </h4>
</div>
</div>
  <h1></h1>
</body>
</html>
<?php $conn->close(); ?>