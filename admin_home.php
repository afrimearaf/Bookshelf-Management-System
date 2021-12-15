<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Bookshelf Management System</title>
</head>
<body>
  <header id="header">
   <h1><a class="logo" href="admin_home.php">Bookshelf Management System</a></h1>
   <nav id="nav">
    <ul>
        <li><a href="admin_home.php">Home <i class="fas fa-home"></i></a> </li>
        <li><a href="add_book.php">Add Book <i class="fas fa-book"></i></a></li>
        <li><a href="comment.php">Comments <i class="far fa-comment"></i></a> </li>
        <li><a href="users.php">Users <i class="far fa-user"></i></a> </li>
        <li><a href="logout.php">Log Out <i class="fas fa-power-off"></i></a></li>
     </ul>
    </nav> 
</header>
<form action="" method="post">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Book ID</th>
        <th>Book Title</th>
        <th>Book Author</th>
        <th>Book Category</th>
        <th>Book Information</th>
        <th>Book Content</th>
        <th>Book Keyword</th>
        <th>Book Image</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

<?php
        
    $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

                                            
    $sql= "SELECT * FROM books";
    $select_books= mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($select_books)){
        
        $book_id=$row['book_id'];
        $book_title=$row['book_title'];
        $book_author=$row['book_author'];
        $book_category=$row['book_category'];
        $book_info=$row['book_info'];
        $book_content=$row['book_content'];
        $book_keyword=$row['book_keyword'];
        $book_image=$row['book_img'];
        
        echo "<tr>";
        echo "<td>$book_id</td>";
        echo "<td>$book_title</td>";
        echo "<td>$book_author</td>";
        echo "<td>$book_category</td>";
        echo "<td>$book_info</td>";
        echo "<td>$book_content</td>";
        echo "<td>$book_keyword</td>";
        
        echo "<td><img width=300 src='./image/$book_image' alt='images'></td>";
        echo "<td><a href='admin_home.php?delete={$book_id}'>Delete</a> </td>";
        echo "</tr>";
    }
 ?>
                               
    </tbody>
    </table>
</form>
<?php
if(isset($_GET['delete'])){
    echo $the_book_id=$_GET['delete'];
    
    $sqls="DELETE FROM books WHERE book_id= {$the_book_id}";
    $delete= mysqli_query($conn,$sqls);

}                                                     
?>

</body>
</html>
