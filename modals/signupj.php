<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $num = $_POST['phonenum'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $conpass = $_POST['conpassword'];

    // Validate user input (you can add more validation as needed)
    if (empty($name) ||  empty($mail) || empty($password) || empty($conpass)) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $conpass) {
        echo "Password and Confirm Password do not match.";
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

    $sql1 = "INSERT INTO login (email, password) VALUES (?, ?)";
    $stmt1 = mysqli_prepare($conn, $sql1);
    if (!$stmt1) {
        die("Prepare statement failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt1, "ss", $mail, $password);
    if (mysqli_stmt_execute($stmt1)) {
        $sql = "INSERT INTO signupj (name, email, age, gender, phonenum, city, password, conpassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            die("Prepare statement failed: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "ssisisss", $name, $mail, $age, $gender, $num, $city, $password, $conpass);
        if (mysqli_stmt_execute($stmt)) {
            echo "Sign Up Successful";
            header("Location:wp3.html");
        } else {
            echo "Registration Failed: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Registration Failed: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
