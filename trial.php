<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Gallery</title>
    <link rel="stylesheet" href="Styles/trial.css">
</head>
<body>
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

        $sql = "SELECT id, filename FROM resume LIMIT 10";
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

</body>
</html>