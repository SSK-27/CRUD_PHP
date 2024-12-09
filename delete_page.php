<?php include('header.php'); ?>
<?php include('db_conn.php'); ?>
<?php 

    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $query = "DELETE FROM `students` WHERE `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("QERY FAILED!!" .mysqli_error());
        }
        else{
            header('location:index.php?delete_msg=Your Data is deleted successfully!!');
        }
    }

?>
<?php
    include('footer.php');
?>