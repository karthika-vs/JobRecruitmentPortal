<?php
if (isset($_POST['submit'])) {
    // Database connection
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "jobportal";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $orgname=$_POST['orgname'];

    $fileData = file_get_contents($fileTmpName);

    

    // Insert data into the database
    $sql = "INSERT INTO resume (filename, filedata, orgname) VALUES (?, ? ,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fileName, $fileData,$orgname);

    if ($stmt->execute()) {
        echo "File uploaded successfully!";
        header("Location:mainJob.html");
    } else {
        echo "Error uploading file: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>