<?php

include("config.php");

$insert_query = "INSERT INTO tblstudent VALUES ('$_POST[stuID]', '$_POST[stuFName]', '$_POST[stuLName]', '$_POST[stuEmail]')";

mysqli_query($db, $insert_query);

header("Location: index.php");
    
?>