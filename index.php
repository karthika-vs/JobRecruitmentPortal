<?php

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    // Check if username and password meet your validation criteria
    if (empty($email) || empty($password)) {
        // Handle validation errors
        echo "Please fill in both username and password fields.";
    }
    else{
      $dbservername = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "jobportal";
      $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

      $sql = "SELECT * FROM login WHERE email = '$email'"; 
      $result = $conn->query($sql);
      if ($result->num_rows == 1) 
      {
        $row = $result->fetch_assoc();
        if ($password === $row["password"]) 
        { 
            echo "Login successful.";
            header("Location:mainJob.html");
            $sql2="INSERT INTO ref(email) values (?)";
            $stmt2=mysqli_prepare($conn,$sql2);
            if(!$stmt2)
            {
                die("prepare statement failed: ". mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt2,"s",$email);
            mysqli_stmt_execute($stmt2);
        } 
        else 
        {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Username not found. Please try again.";
    }

    $conn->close();
}
}
?>