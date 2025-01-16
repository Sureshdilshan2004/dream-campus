<?php
$dbpath = mysqli_connect("localhost", "root", "", "dream_campus");

if (!$dbpath) {
    die("Connection failed: " . mysqli_connect_error());
}


$fullname= $_REQUEST['name'];
$nic = $_REQUEST['nic'];
$address = $_REQUEST['address'];
$tel = $_REQUEST['tel'];
$course = $_REQUEST['course'];

if (isset($_POST['record'])) {
    $sql = "INSERT INTO students (fullname, nic, address, tel, course) VALUES 
            ('$fullname', '$nic', '$address', '$tel', '$course')";

    if (mysqli_query($dbpath, $sql)) {
        echo ("<h1 style='color:blue; font-size:30px;'>Student details recorded successfully.</h1>");
    } else {
        echo ("<h1 style='color:red; font-size:30px;'>Error: Could not record details. " . mysqli_error($dbpath) . "</h1>");
    }
}

if (isset($_POST['update'])) {
    $sql = "UPDATE students SET 
            address='$address', 
            tel='$tel', 
            course='$course' 
            WHERE fullname='$fullname'";

    if (mysqli_query($dbpath, $sql)) {
        echo ("<h1 style='color:green; font-size:30px;'>Student details updated successfully.</h1>");
    } else {
        echo ("<h1 style='color:red; font-size:30px;'>Error: Could not update details. " . mysqli_error($dbpath) . "</h1>");
    }
}


if (isset($_POST['remove'])) {
    $sql = "DELETE FROM students WHERE fullname='$fullname'";

    if (mysqli_query($dbpath, $sql)) {
        echo ("<h1 style='color:red; font-size:30px;'>Student details removed successfully.</h1>");
    } else {
        echo ("<h1 style='color:red; font-size:30px;'>Error: Could not remove details. " . mysqli_error($dbpath) . "</h1>");
    }
}

mysqli_close($dbpath);
?>
