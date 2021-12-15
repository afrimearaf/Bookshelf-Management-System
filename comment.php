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
        <th>Comment ID</th>
        <th>Book ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Visibility</th>
        <th>Add Comment</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

<?php
        
    $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

                                            
    $sql= "SELECT * FROM comments";
    $select_comments= mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($select_comments)){
        
        $id=$row['id'];
        $book_id=$row['book_id'];
        $name=$row['name'];
        $email=$row['email'];
        $comment=$row['comment'];
        $visibility=$row['visibility'];
        $date=$row['date'];
        
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$book_id</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        echo "<td>$comment</td>";
        echo "<td>$date</td>";
        echo "<td>$visibility</td>";
        
        echo "<td><a href='comment.php?add={$id}'>Add</a> </td>";
        echo "<td><a href='comment.php?delete={$id}'>Delete</a> </td>";
        echo "</tr>";
    }
 ?>
                               
    </tbody>
    </table>
</form>


<?php
    
if(isset($_GET['add'])){
    echo $the_comment_id=$_GET['add'];
    
    $sqll="UPDATE comments SET visibility='assigned' WHERE id= {$the_comment_id} ";
    $add_commnet= mysqli_query($conn,$sqll);
    header("Location: comment.php"); 
}
if(isset($_GET['delete'])){
    $the_comment_id=$_GET['delete'];
    
    $sqls="DELETE FROM comments WHERE id= {$the_comment_id}";
    $delete= mysqli_query($conn,$sqls);
    header("Location: comment.php"); 

}                                                     
?>

</body>
</html>
