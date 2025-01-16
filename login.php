<?php
$path = mysqli_connect("localhost", "root", "", "dream_campus");

if (!$path) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];

$sql = "SELECT * FROM login WHERE username='$user' AND password='$pass'";

$result = mysqli_query($path, $sql);

if ($result) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        include("student.html");
    } else {
        echo("<h1 style='color:red;font-size:40px'>.....login failed......</h1>");
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($path);
}

mysqli_close($path);
?>
