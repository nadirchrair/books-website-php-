<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['admininfo'])) {
  header('Location:index.php');
} 
else{



?>
<div>
<?php 
if(isset($_GET['id'])){
$id=$_GET['id'];
$query="DELETE FROM categories WHERE id='$id'";
$res=mysqli_query($con,$query);
}















?>
<?php 

if($_SERVER["REQUEST_METHOD"]== 'POST'){
$categories=$_POST['categories'];
if(empty($categories)){
 echo "<div class='alert alert-danger'>الرجاء ملئ الحقل ادناه</div>";


}
else{
$query="INSERT INTO categories(categoriesName) VALUES ('$categories')";
$resultas=mysqli_query($con,$query);
if(isset($resultas)){
  echo "<div class='alert alert-sucess'>تمت بنجاح</div>";
}
}
}
?>

<div class="container-fluid">
  <!-- /#page-content-wrapper -->
<div class="categories">
<div class="add-cart">
<form action="<?php echo $_SERVER['PHP_SELF'];   ?>" method="POST">
<div class="form-group">

<label for="cat">اضافة تصنيف</label>

<input type="text" id="cat" class="form-control" name="categories">
</div>
<button class="custom-btn">اضافة</button>
</form>
</div>
<div class="show-cat">



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">الرقم</th>
      <th scope="col">عنوان التصنيف</th>
      <th scope="col">تاريخ الاضافة</th>
      <th scope="col">الاجراء</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $query= "SELECT *FROM categories ORDER BY id DESC ";
    
    $res=mysqli_query($con,$query);
    $i=0;
    while($row= mysqli_fetch_assoc($res)){
$i++;
    
    ?>
    <tr>
      <th><?php  echo $i; ?></th>
      <td><?php  echo $row['categoriesName']; ?></td>
      <td><?php  echo $row['categoriesdate']; ?></td>
      <td>
<a href="edit-cat.php?id=<?php  echo $row['id'];?>" class="custom-btn" >تعديل</a>
<a href="categories.php?id=<?php  echo $row['id'];?>" class="custom-btn confirm" >حذف</a>


      </td>
    </tr>
    <?php 
    
    
    
    
  }
    
    
    
    ?>
  </tbody>
</table>


</div>
</div>

  </div>

</div>
  <!-- /#wrapper -->
  <?php
  include 'include/footer.php';
  ?>

<?php
}
?>