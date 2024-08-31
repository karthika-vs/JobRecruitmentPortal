<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style5.css">
  <link rel="stylesheet" href="JSmain.css">
</head>
<body>
  <div class="all">
    <div class="left">
      <a href="main.php">HOME</a>
      <a href="vacancy.html">ADD VACANCY</a>
      <a href="userOrg.html">USER</a>
      <a href="wp1.html">LOGOUT</a>
    </div>
  </div>
  <div class="container">
    <?php
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="jobportal";
    $conn="";

    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, filename FROM resume  where orgname in ( select s.orgname from signupo s 
    JOIN ref r ON s.email=r.email where r.rid=(select max(rid) from ref)) LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fileId = $row['id'];
            $filename = $row['filename'];

            echo "<div class='enroll'>";
            echo "<p>File ID: $fileId</p>";
            echo "<p>Filename: $filename</p>";
            echo "<a href='download.php?id=$fileId'>Download</a>";
            echo "</div>";
        }
    } else {
        echo "No records found";
    }

    $conn->close();
    ?>
</div>
  <h1></h1>
</body>
</html>