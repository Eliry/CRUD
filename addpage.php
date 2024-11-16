<!-- Add and Display
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
    
    <a href='#'>Create</a>
    <a href='searchpage.php'>Search</a>
    <br> <br> 
        <form action="add.php" method="post">
           <input type="hidden" name="Id">
           &nbsp;Name:  <input type="text" name="name" required placeholder="Name"><br><br>
           Status:   <input type="text" name="status" required placeholder="Status"><br><br><br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="insert" value="       Save      "><br><br><br>
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

