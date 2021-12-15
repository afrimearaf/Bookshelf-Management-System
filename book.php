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
                    error_reporting(0);
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


<section>
    <div class="container pt-3">

    <?php
        $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');
        
    if(isset($_GET['b_id'])){
        $the_book_id=$_GET['b_id'];
    }
        
        $sql = "select * from books";
        $book= mysqli_query($conn,$sql);
            
    
        $query= "select * from books where book_id = $the_book_id";
        $select_book= mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($select_book)){
            $book_id=$row['book_id'];
            $book_title=$row['book_title'];
            $book_author=$row['book_author'];
            $book_category=$row['book_category'];
            $book_info=$row['book_info'];
            $book_content=$row['book_content'];
            $book_keyword=$row['book_keyword'];
            $book_image=$row['book_img'];          
    ?>
        
          
            <div >
              <br> 
              <div class="container" style="padding: 16px ;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12);">
                <h1 class="page-header">
                    <?php echo $book_title?>
                    <small><p class="titlee"> <?php echo $book_author ?></p></small>
                </h1>
                <img src="./image/<?php echo $book_image; ?>" alt="image" style="width:100%;height:50vh; margin-bottom: 40px;">
                
        <!--
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
        -->
                 
                <p class="book_content"><?php echo $book_content ?></p>
              </div>
              <br> 
              
              <ul class="pagination d-flex justify-content-between  mb-3 px-3">
                    <li class="page-item"><a class="page-link" href="book.php?b_id=<?php echo $book_id-1; ?>"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous </a></li>
                    <li class="page-item"><a class="page-link" href="book.php?b_id=<?php echo $book_id+1; ?>">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a></li>
                  </ul>
              
                       <!-- Blog Comments -->
                <?php
                if(isset($_POST['create_comment'])){
                    
                    $the_book_id=$_GET['b_id'];
                    $name= $_POST['name'];
                    $email= $_POST['email'];
                    $comment= $_POST['comment'];
                    
                    $query="INSERT INTO comments(book_id, name, email, comment, visibility, date) VALUES ($the_book_id, '$name', '$email', '$comment', 'unassigned', now())";
                    $comment_query= mysqli_query($conn, $query);
                    
                    if(!$comment_query){
                        die("Query Failed". mysqli_error($conn));
                    }
                    
                }
                
                ?>

                <!-- Comments Form -->
                <div class="well pt-3 mx-3" >
                    <h4 class="pb-3">Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                      
                       <div class="form-group">
                           <label for="Author">Name: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group" >
                           <label for="Email">Email:</label>
                            <input type="email" name="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                           <label for="Comment">Comment: </label>
                            <textarea name="comment" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-custom">Submit</button>
                    </form>
                </div>

                 <hr>


            </div>
    
        <?php }
        
            if ( $the_book_id !== $book_id ){
                echo "<h1>No More Books.</h1>"; 
            }
        ?>
           
                        <!-- Posted Comments -->
                
                <?php
                $query="SELECT * FROM comments WHERE book_id={$the_book_id} AND visibility='assigned' ORDER BY id DESC";
                $show_comment= mysqli_query($conn,$query);
                if(!$show_comment){
                    die("Query Failed". mysqli_error($conn));
                }
                while($row=mysqli_fetch_assoc($show_comment)){
                    $date=$row['date'];
                    $comment=$row['comment'];
                    $name=$row['name'];
                    
                    
                ?>
                
                <div class="card">
                    <div class="container mt-3">
                      <div class="media border p-3">
                        <div class="media-body">
                          <h4><?php echo $name; ?> <small><i>Posted on <?php echo $date; ?></i></small></h4>
                          <p><?php echo $comment; ?></p>      
                        </div>
                      </div>
                    </div>
                </div>         
                
                <?php } ?>
     
                <br> <br> 
                  
                
                <!-- Comment -->

    </div>
</section>  <footer id="main-footer">
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
