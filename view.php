<?php
include 'db.php' ;
$sql="SELECT * FROM upload";
$result=$conn->query($sql);
$result = mysqli_query($conn,"SELECT *FROM upload");
session_start();

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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Upload</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   
  <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"> </script>
  
  
</head>
<body>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Degree</th>
                <th>Photo</th>
                <th>Edit</th>
                <th>Delete</th>
 -->
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['degree'];?></td>
                    <td><img width="100px" height="100px" src="photos/<?php echo $row['photo'];?> "> <?php echo $row['photo'];?></td>

                    <td> <a href="/file-upload/update.php ? id= <?php echo $row["id"];?>" class="btn btn--radius btn--green">Update</a></td>
                                                         
                    <td><input type="button" name="delete" value="Delete" class="btn btn--radius btn--green"></td>                   
           </tr>
                <?php
            }?>
        </tbody>
    </table>

        <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});</script>
        </tbody>
</body>
</html>