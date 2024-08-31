<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link rel="stylesheet" type="text/css" href="domain.css">
</head>
<body>
    <?php
    // Database connection parameters
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "jobportal";

    // Create a database connection
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Define the SELECT query
    $sql = "SELECT orgname,position,minexp,contact FROM vacancy where domain='entertainment'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row-container'>
                <div class='item'>Organisation Name: " . $row["orgname"] . "</div>
                <div class='item'>Vacant Position " . $row["position"] . "</div>
                <div class='item'>Minimum Experience: " . $row["minexp"] . "</div>
                <div class='item'>Contact email" . $row["contact"] . "</div>
                <a href='filetrial.html'><button class='apply-button'>Apply</button></a>
            </div>";
        }
    }
    else {
        echo "No records found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>