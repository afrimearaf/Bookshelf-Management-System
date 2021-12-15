<?php session_start(); ?>
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
<body style="background: #eee;">
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

<?php
    
    
    $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');
    
    if(isset($_SESSION['user_name'])){
        $username = $_SESSION['user_name'];
        
        $sql= "SELECT * FROM users WHERE user_name = '{$username}' ";
        $profile= mysqli_query($conn, $sql);
        
        while($row=mysqli_fetch_array($profile)){
        
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $email=$row['email'];
            $password=$row['password'];
            $position=$row['position'];
            $status=$row['status'];
        }
    }
    
    if(isset($_POST['submit'])){
    
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $name=$_POST['username'];
        $user_email=$_POST['email'];
        $pass=$_POST['password'];



        $sqls= "UPDATE users SET firstname = '{$fname}', lastname = '{$lname}',  user_name = '{$name}', email =  '{$user_email}', password = '{$pass}' WHERE user_name = '{$username}'";

        $update= mysqli_query($conn,$sqls);

    }
    
    
?>



<section id="prof">
    <div class="form-style">
        <h1>Profile!<span>
        
        <?php if(isset($_POST['submit'])){ echo "Updated"; } ?>
        
        </span></h1>
        <form action="profile.php" method="post">
            <div class="section"><span>1</span>Name</div>
            <div class="inner-wrap">
                <label>First Name <input value="<?php echo $firstname; ?> " type="text" name="firstname" /></label>
                <label>Last Name  <input value="<?php echo $lastname; ?> " type="text" name="lastname" /></label>
            </div>

            <div class="section"><span>2</span>Email</div>
            <div class="inner-wrap">
                <label>Email Address <input value="<?php echo $email; ?> " type="email" name="email" /></label>
                <label>Username <input value="<?php echo $user_name; ?> " type="text" name="username" /></label>
            </div>

            <div class="section"><span>3</span>Password</div>
                <div class="inner-wrap">
                <label>Password <input value="<?php echo $password; ?> " type="password" name="password" /></label>
            </div>
            <div class="button-section">
             <button class="prof-btn" name="submit" type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
