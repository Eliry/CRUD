<!-- Delete the Data
using PHP PDO and MySql
Author: Reden Paul L. Rivera
Instructor: JM Policarpio-->

<?php
require_once("./include/dbcon.php");

    $pdoQuery = "DELETE FROM tbinfo where id =" . $_GET['id'];
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
	header('location:addpage.php');

	$pdoConnect = null;
?>