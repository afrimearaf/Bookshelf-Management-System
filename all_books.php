<?php 

        


?>



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
       
        
        <li><a href="all_books.php">Home <i class="fas fa-home"></i></a> </li>
        <li><a href="profile.php">Profile <i class="far fa-user-circle"></i></a> </li>
        <li><a href="logout.php">Log Out <i class="fas fa-power-off"></i></a></li>
   </ul>
</nav>
</header>
    <section id="showcase">
    <div class="container">
      <div class="showcase-container">
        <div class="showcase-content">
          <div class="category category-sports">Sports</div>
          <h1>Search Your Books</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus rerum officia quibusdam mollitia deserunt animi soluta laudantium. Quam sapiente a dolorum magnam necessitatibus quis tempore facere totam. Dolor, sequi distinctio!</p>
        <form class="form-inline" action="search.php" method="post">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search...">
            <button class="btn btn-custom" name="submit" type="submit"><i class="fas fa-search"></i></button>
        </form>
          
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <section id="home-articles" class="py-2">
    <div class="container">
        <h1 class="top">Popular Picks</h1>
        <div class="bar"></div>
        <br><br>
        <div class="articles-container">
        <?php
            
        $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

        $sql= "select * from books";
        $all_books= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($all_books)){
            $book_id=$row['book_id'];
            $book_title=$row['book_title'];
            $book_author=$row['book_author'];
            $book_category=$row['book_category'];
            $book_info=$row['book_info'];
            $book_content=$row['book_content'];
            $book_keyword=$row['book_keyword'];
            $book_image=$row['book_img'];        
        ?>
          <article class="card" >
            <img src="./image/<?php echo $book_image; ?>" alt="">
            <div>
              <h3>
                <a href="book.php?b_id=<?php echo $book_id; ?>" > <?php echo $book_title?></a>
              </h3>              
              <div class="category">Author: <?php echo $book_author ?></div>

              <p><?php echo $book_info ?></p>
              <a class="btn btn-secondary" href="book.php?b_id=<?php echo $book_id; ?>" > Read More</a>
            </div>
          </article>
          <?php } ?>
        </div>
    </div>
  </section>
  <hr>
  <footer id="main-footer">
    <div class="container footer-container">
      <div>
       <h3>Bookshelf Management System</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit deserunt assumenda enim non? Ratione ipsum voluptates fuga eos earum vitae.</p>
      </div>
      <div>
        <h3>Email Newsletter</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <form>
          <input type="email" placeholder="Enter Email...">
          <input type="submit" value="Subscribe" class="btn btn-primary">
        </form>
      </div>
      <div>
        <h3>Site Links</h3>
        <ul class="list">
          <li><a href="#">Help & Support</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div>
        <h2>Join Our Club</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, nesciunt!</p>
        <a href="#" class="btn btn-secondary">Join Now</a>
      </div>
      <div>
        <p>
          Copyright &copy; 2019, All Rights Reserved
        </p>
      </div>
    </div>
  </footer>
</body>
</html>
