<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Bookshelf Management System</title>
</head>
<body>
  <header id="header">
   <h1><a class="logo" href="all_books.php">Bookshelf Management System</a></h1>
   <nav id="nav">
    <ul>
                <span>
            <span class="dropdown">
                <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
                  Category
                </button>
                <div class="dropdown-menu ">
                 <?php 
                    
                    $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');
                    $sql= "select distinct book_category from books";
                    $all_category= mysqli_query($conn,$sql);
                    
                    while($row=mysqli_fetch_assoc($all_category)){
                         $book_category=$row['book_category'];
                         echo "<a class='dropdown-item distinct' href='category.php?category=$book_category'>{$book_category}</a>";
                    }
                    
                    ?>
                </div>
            </span>
        </span>
        
        <span style="margin-left:8px;">
            <span class="dropdown">
                <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
                  Author
                </button>
                <div class="dropdown-menu ">
                    <?php 
                    
                        $sql= "select distinct book_author from books";
                        $all_author= mysqli_query($conn,$sql);
                    
                        while($row=mysqli_fetch_assoc($all_author)){
                             $book_author=$row['book_author'];
                             echo "<a class='dropdown-item' href='author.php?author=$book_author'>{$book_author}</a>";
                        }
                    ?>
                </div>
            </span>
        </span>
       
        
        <li>
            <form class="form-inline" action="search.php" method="post">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search...">
                <button class="btn btn-custom" name="submit" type="submit"><i class="fas fa-search"></i></button>
            </form>
         </li>
        <li><a href="all_books.php">Home <i class="fas fa-home"></i></a> </li>
        <li><a href="profile.php">Profile <i class="far fa-user-circle"></i></a> </li>
        <li><a href="logout.php">Log Out <i class="fas fa-power-off"></i></a></li>
   </ul>
</nav>
</header>
    <section class="books">  
                 <br> <br>
        <?php
        
        $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');
        
            if(isset($_GET['category'])){
                $category=$_GET['category'];
            }

            $sql= "select * from books where book_category LIKE '%$category%'";
            $category_sql= mysqli_query($conn,$sql);

            if (!$category_sql){
                die("query failed!!".mysqli_error($conn));
            }
            $c = mysqli_num_rows($category_sql);
            if($c == 0){
                echo "<h1>There is no such book.</h1>";
            }
            else{ 

    

                while($row=mysqli_fetch_assoc($category_sql)){
                    $book_id=$row['book_id'];
                    $book_title=$row['book_title'];
                    $book_author=$row['book_author'];
                    $book_category=$row['book_category'];
                    $book_info=$row['book_info'];
                    $book_content=$row['book_content'];
                    $book_image=$row['book_img'];        
        ?>

        
          <div class="column">
            <div class="card">
              <img src="./image/<?php echo $book_image; ?>" alt="Image" style="width:100%;height:450px">
              <div class="container">
                <h2>
                <a class="title" href="food.php?food_id=<?php echo $book_id; ?>" > <?php echo $book_title?></a>
                </h2>
                <p class="titlee">Author: <?php echo $book_author ?></p>
                <p><?php echo $book_info ?></p>
                <p><a class="button2" href="book.php?b_id=<?php echo $book_id; ?>">Read More</a></p>
              </div>
            </div>
          </div>
        <?php } } ?>
    </section>

</body>
</html>
