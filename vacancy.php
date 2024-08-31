<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $orgname = $_POST['orgname'];
    $domain=$_POST['domain'];
    $position = $_POST['position'];
    $qualification = $_POST['qualification'];
    $min_exp = $_POST['minexp'];
    $mail = $_POST['contact'];

    // Validate user input (you can add more validation as needed)
    if (empty($orgname) || empty($position) || empty($qualification) || empty($min_exp) || empty($mail) || empty($domain)) {
        echo "All fields are required.";
        exit;
    }
    // Database connection
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "jobportal";
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "INSERT INTO vacancy (orgname, domain, position, qualification, minexp, contact) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare statement failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ssssis", $orgname, $domain, $position, $qualification, $min_exp, $mail);
    if (mysqli_stmt_execute($stmt)) {
        echo "Add vacancy Successful";
        header("Location:main.html");
    } else {
        echo "Add vacancy Failed: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
