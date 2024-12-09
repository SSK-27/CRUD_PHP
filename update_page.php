<?php include('header.php'); ?>
<?php include('db_conn.php'); ?>

<?php 

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $query = "SELECT * FROM `students` WHERE `id`='$id'";

        $result = mysqli_query($connection,$query);

        $row = mysqli_fetch_assoc($result);
        
    }

?>

<?php

    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $id_new=$_GET['id_new'];
        }

        $fname=$_POST['f_name'];
        $lname=$_POST['l_name'];
        $age=$_POST['age'];

        echo $query = "UPDATE `students` SET `first_name`='$fname', `last_name`='$lname', `age`='$age' WHERE `id`='$id_new'";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed!" .mysqli_error());
        }
        else{
            header('location:index.php?update_msg=Data Updated Successfully!!');
        }
    }

?>

<form action="update_page.php?id_new=<?php echo $id ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']?>">

            <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>">

            <label for="age">Age</label>
                <input type="text" name="age" class="form-control" value="<?php echo $row['age']?>">
        </div>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php
    include('footer.php');
?>