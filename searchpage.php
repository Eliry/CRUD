<!-- Search the Data
using PHP PDO and MySql
Author: Reden Paul L. Rivera
Instructor: JM Policarpio-->
<?php
include_once './include/dbcon.php';
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add nd Display</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <a href='addpage.php'>Create</a>
    <a href='#'>Search</a>

    <br>
         <form action="search.php" method="post"> 
            Search: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Id" placeholder="Enter ID Here"><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Find" value="       Search      "><br><br><br>
        </form>

     
<br>
<?php
    $pdoQuery = 'SELECT * FROM tbinfo';
    $pdoResult =  $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
        echo "<table border='2' cellpadding='7'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Status</th>";
       
         
        echo "<th>Action</th>";
        echo "</tr>";
    while($row=$pdoResult->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$status</td>";
  

        echo "<td><a href='edit.php?id=$id';>Edit</a> <a href='del.php?id=$id';?>Delete</a></td>";
		echo "</tr>";
    }
?>

    </body>
</html>

