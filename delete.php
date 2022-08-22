<?php
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM upload");

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM `upload` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE) 
     {
        header('location:view.php') ;
}
    else

    {
        echo "Error:" . $sql . "<br>" . $conn->error;
          }
} 
?>
