<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    $sql = "SELECT filename, filedata FROM resume WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fileId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $filename = $row['filename'];
        $filedata = $row['filedata'];

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        echo $filedata;
    } else {
        echo "File not found";
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>