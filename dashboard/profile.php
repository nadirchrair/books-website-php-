<?php
session_start();
include 'include/connection.php';
include 'include/header.php';

if(isset($_SESSION['$admininfo'])){
  header('location:index.php');
}
else{
  
?>
<div class="container-fluid">
<?php 
$query= "SELECT *FROM admin ";
$resualt = mysqli_query($con,$query);
$row= mysqli_fetch_assoc($resualt);




?>
<?php 
if (isset($_POST['edit'])){

$adminName=$_POST['name'];
$adminEmail=$_POST['email'];
$adminpass=$_POST['pass'];

$query= "UPDATE admin SET 
name='$adminName',
email='$adminEmail',
pass= '$adminpass'
    WHERE id='0'";
$re= mysqli_query($con,$query);
header("REFRESH:0");
exit();













}
?>





<div class="profile">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method= "POST">
<div class="form-group">
    <label for="name" >الاسم</label>
    <input type="text" class="form-control" id="name" value= "<?php echo $row['adminName']; ?>" name="name">
</div>
<div class="form-group">
    <label for="email">البريد الاكتروني</label>
    <input type="text" class="form-control" id= "email" value= "<?php echo $row['adminEmail']; ?>" name= "email">
</div>
<div class="form-group">
    <label for="pass">كلمة السر</label>
    <input type="text" class="form-control" id="pass" value= "<?php echo $row['adminpass']; ?>" name= "pass">
</div>
<button class="custom-btn" name= "edit">
    تعديل البيانات
</button>
</form>
</div>




</div>



<?php
  include 'include/footer.php';
  ?>


<?php
  
}
?>