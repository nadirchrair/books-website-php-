<?php
include 'header.php';
?>
<!--start banar-->
<div class="banar">
<div class="lib-info">

<h4>حمل عشرات الكتب مجانا</h4>

<p>من اجل نشر المعرفة و غرس حب القراءة و المطالعة بين المتحدثين </p>
</div>
</div>
<!--end banar-->

<!--satrt books-->

<div class="books">
    <div class="container">
<div class="row">
    <?php
    $query= "SELECT * FROM books ORDER BY id DESC ";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){
       while($row=mysqli_fetch_assoc($res)){
           ?>
           <div class="col-md-6 col-lg-4">
<div class="card text-center">
<div class="img-cover">
    <img src="uploads/booksCover/<?php echo $row['bookcover']; ?>" alt="Books cover" class="card-img-top">
</div>
<div class="crd-body">
    <h4 class="card-title">
    <a href="books.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"><?php echo $row['bookIitle']; ?></a>
      </h4>
      <p class="card-text"><?php echo mb_substr($row['bookcontent'],0,50, "UTF-8"); ?></p>
<button class="custom-btn">
<a href="books.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">تحميل الكتب</a>

</button>
        </div>



</div>
</div>

           <?php
       }

    }
    else{
?>
<div class="text-center">لا توجد كتب</div>

        <?php
    }
    
    
    ?>

</div>
</div>
</div>

<!--end books-->
<?php 
include 'footer.php';
?>