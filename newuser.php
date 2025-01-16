<?php

$dbpath=mysqli_connect("localhost","root","","dream_campus");
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];

$register="insert into login values('$user','$pass')";
if(mysqli_query($dbpath,$register))
{
echo(" new user added success ");
}

?>