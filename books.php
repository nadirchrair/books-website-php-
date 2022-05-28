<?php 
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>


<!--show boks-->







<div class="books">
    <div class="container">
        <div class="books"> 
        <div class="row">
        <?php
                $query = "SELECT * FROM books WHERE id='$id'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                ?>

            <div class="col-md-4">
<div class="book-cover">
    <img src="uploads/booksCover/<?php echo $row['bookcover']; ?>" alt="book-cover" style="width: 98%;">
</div>

            </div>
            <div class="col-md-8">
                <div class="bok-content">
                    <h4><a href=""> <?php echo $row['bookIitle']; ?></a></h4>
                    <h5><a href="author.php?author=<?php  echo $row['bookAuthor']; ?>"> <?php echo $row['bookAuthor']; ?></a></h5>

<hr>
                <p>
                <?php echo mb_substr($row['bookcontent'],0,400, "UTF-8"); ?>
                </p>
                <button class="custom-btn" style="width:30%;">
                <a href="uploads/booktl/<?php echo $row['book']; ?>" download>تحميل الكتاب</a>
                        
                        </button>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
<!--end show books-->
<!--related books-->
<div class="related-books text-center">
    <div class="container">
        <h4>كتب ذات صلة</h4>
        <hr>
        <div class="row">
        <?php 
            if(isset($_GET['category'])){
                $bookCat = $_GET['category'];
            }
            // fetch related books
            $query = "SELECT * FROM books WHERE bookCat = '$bookCat' AND id !='$id'";
            $res = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($res)){
            ?>
        <div class="col-lg-3 col-md-3 col-6">
<div class="related-book text-center">
    <div class="cover">
<a href="#">
    <img src="uploads/booksCover/<?php echo $row['bookcover']; ?>" alt="">
</a> 
           </div>
           <div class="title">
               <h5>
                   <a href="books.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"> <?php echo $row['bookIitle']; ?></a>
               </h5>
           </div>
           </div>

            </div>
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