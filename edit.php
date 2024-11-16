<!-- Modify the Data
using PHP PDO and MySql
Author: Reden Paul L. Rivera
Instructor: JM Policarpio-->
<?php
include_once './include/dbcon.php';
 

if(!empty($_POST["modify"])) {
    $pdoQuery=$pdoConnect->prepare("update tbinfo set name = '" . $_POST['name'] . "' , status = '" . $_POST['status'] . "' where id = " . $_GET["id"]);
         $pdoResult = $pdoQuery->execute();
             if($pdoResult) {
                 header('location:addpage.php');
    }
}
    $pdoQuery = $pdoConnect->prepare("SELECT * FROM tbinfo where id=" . $_GET["id"]);
    $pdoQuery->execute();
    $pdoResult = $pdoQuery->fetchAll();
    $pdoConnect = null;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modify data</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <br>
        <form action="" method="post">
            Name:  <input type="text" name="name" value="<?php echo $pdoResult[0]['name']; ?>" required placeholder="Name" ><br><br>
            Status:&nbsp; <input type="text" name="status"  value="<?php echo $pdoResult[0]['status']; ?>"  required placeholder="Status"><br><br>
            <input type="submit" name="modify" value="       Update      "> 
        </form>
        <br>
    </body>
</html>

