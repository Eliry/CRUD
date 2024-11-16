<!-- Add and Display
using PHP PDO and MySql
Author: Reden Paul L. Rivera
Instructor: JM Policarpio-->

<?php
// php pdo insert data to mysql database 
if(isset($_POST['insert']))
{
    try {
        // connect to mysql
    $pdoConnect = new PDO("mysql:host=localhost;dbname=dbcrud","root","");
    // set the PDO error mode to exception
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    // get values form input text and number
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
   
   
    // mysql query to insert data
    $pdoQuery = "INSERT INTO `tbinfo`(`name`, `status`) VALUES (:name,:status)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":name"=>$name,":status"=>$status));
    
    // check if mysql insert query successful
    if($pdoExec)
    {
        // retrieve all files and display
        $pdoQuery = 'SELECT * FROM tbinfo';
        $pdoResult =  $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute();
            while ($row = $pdoResult->fetch()){
                echo  $row['id'] . " | " .$row['name'] . " | " . $row['status'] . " | " . "<br/>";
            }
            header("Location: addpage.php");
            exit;
        } else {
            echo 'Data Not Inserted';
    }
}
$pdoConnect = null;
?>

