<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['admininfo'])) {
    header('Location:index.php');
} else {
?>
<div>
    <?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "SELECT * FROM categories WHERE id='$id'";
        $res=mysqli_query($con,$query);
        $row= mysqli_fetch_assoc($res);
    }
    ?>
    <!--edit-->
    <?php 
    if($_SERVER["REQUEST_METHOD"]== 'POST'){
$categoryName= $_POST['categories'];
$query= "UPDATE categories SET categoriesName='$categoryName' WHERE id ='$id' ";

$edit=mysqli_query($con,$query);
header("location:categories.php");
exit();
    }




    ?>
<div class="container-fluid">

<div class="edit-cat">
<form action="edit-cat.php?id=<?php echo $row['id']; ?>" method="post">
<div class="form-group">
    <label for="cat">تعديل:</label>
<input type="text" class ="form-control" id="cat" value="<?php echo $row['categoriesName']; ?>" name="categories">
</div>
<button class="custom-btn">تعديل</button>
</form>
</div>
</div>
</div>

    <?php
    include 'include/footer.php';
    ?>


<?php
}
?>