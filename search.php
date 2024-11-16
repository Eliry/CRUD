<!-- Search the Data
using PHP PDO and MySql
Author: Reden Paul L. Rivera
Instructor: JM Policarpio-->
<?php

// php search data in mysql database using PDO
// set data in input text

$id = "";
$name = "";
$status = "";

if(isset($_POST['Find']))
{
        // connect to mysql
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=dbcrud","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    // id to search
    $id = $_POST['Id'];
    
     // mysql search query
    $pdoQuery = "SELECT * FROM tbinfo WHERE id = :id";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    //set your id to the query id
    $pdoExec = $pdoResult->execute(array(":id"=>$id));
    
      if($pdoExec)
    {
            // if id exist 
            // show data in inputs
        if($pdoResult->rowCount()>0)
        {
           
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
        } else {
            echo '<br><br><br><br><br>';
            echo 'No Data';
    }
}
}
$pdoConnect = null;
?>