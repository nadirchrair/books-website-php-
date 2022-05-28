<?php
error_reporting(0);
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['admininfo'])) {
    header('Location:index.php');
} else {

?>


    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

    <?php 

if(($_SERVER["REQUEST_METHOD"]== 'POST')){
    $bookTitle=$_POST['bookTitle'];
    $bookAuthor = $_POST['authorName'];
    $bookCat=$_POST['bookCat'];
    $bookContent=$_POST['bookContent'];
    $imageName=$_FILES['bookCover']['name'];
    $imageTmp=$_FILES['bookCover']['tmp_name'];
    
    
    $bookName=$_FILES['book']['name'];
    $bookTmp=$_FILES['book']['tmp_name'];
    if( empty($bookTitle)){
        echo "<div class='alert alert-danger'>" . "الرجاء ملء الحقول أدناه" . "</div>";
                }               
    if(empty($bookContent))  {
        echo "<div class='alert alert-danger'>" . "الرل أدناه" . "</div>";
       }   
      
     if (empty($imageName)) {
        echo "<div class='alert alert-danger'>" . "الرجاء إختيار صورة مناسبة" . "</div>";
             }
     if (empty($bookName)) {
                echo "<div class='alert alert-danger'>" . "الرجاء إختيار  الملف المناسب" . "</div>";
            }   
     else {
     $bookCover= rand(0, 1000) . "_" . $imageName;
     move_uploaded_file($imageTmp,"../uploads/booksCover/". $bookCover);

     $book= rand(0, 1000) . "_" . $bookName;
     move_uploaded_file($bookTmp,"../uploads/bookTl/". $book);
     $query = "INSERT INTO books (bookIitle,bookAuthor,bookCat,bookcover,book,bookcontent)
     VALUES ('$bookTitle','$bookAuthor','$bookCat','$bookCover','$book','$bookContent')";
     $res = mysqli_query($con, $query);
     if (isset($res)) {
         echo "<div class='alert alert-success'>" . "تم إضافة الكتاب بنجاح" . "</div>";
     }

          } 
        }

?>
<div class="container-fluid">
        <!-- Start new book -->
<div class="new-book">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="title" >عنوان الكتاب</label>
<input type="text" name="bookTitle" id="title" class="form-control" >
</div>
<div class="form-group">
<label for="author" > إسم الكاتب</label>
<input type="text" name="authorName" id="author" class="form-control">
</div>
<div class="form-group">
<label for="title">التصنيف</label>
<select  class="form-control" name="bookCat">
<?php 
$qurey="SELECT categoriesName FROM categories";
$res= mysqli_query($con,$qurey);
while($row=mysqli_fetch_assoc($res)){
?>
<option><?php echo $row['categoriesName'];  ?></option>
<?php
}
?>

</select>
</div>
<div class="form-group">
<label for="img">غلاف الكتاب</label>
<input type="file" class="form-control" name="bookCover">
</div>
<div class="form-group">
<label for="img">ملف الكتاب</label>
<input type="file" class="form-control" name="book">
</div>
<div class="form-group">
<label for="img">نبذة عن الكتاب </label>
<textarea  id="" cols="30" rows="10" name="bookContent" class="form-control" ></textarea>
</div>      
<button class="custom-btn" name="submit">نشر الكتاب</button>
   </form>
            
        </div>
        <!-- End new book -->
    </div>
    <!-- /#page-content-wrapper -->

    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
    ?>


<?php
}
?>