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
        <th>User ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Position</th>
        <th>Status</th>
        <th>Add User</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

<?php
        
    $conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

                                            
    $sql= "SELECT * FROM users";
    $select_users= mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($select_users)){
        
        $user_id=$row['user_id'];
        $fname=$row['firstname'];
        $lname=$row['lastname'];
        $position=$row['position'];
        $username=$row['user_name'];
        $email=$row['email'];
        $status=$row['status'];
        
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$fname</td>";
        echo "<td>$lname</td>";
        echo "<td>$email</td>";
        echo "<td>$position</td>";
        echo "<td>$status</td>";
        
        echo "<td><a href='users.php?add={$user_id}'>Add</a> </td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a> </td>";
        echo "</tr>";
    }
 ?>
                               
    </tbody>
    </table>
</form>


<?php
    
if(isset($_GET['add'])){
    $the_user_id=$_GET['add'];
    
    $sqll="UPDATE users SET status='assigned' WHERE user_id= {$the_user_id} ";
    $add_user= mysqli_query($conn,$sqll);
}
if(isset($_GET['delete'])){
    $the_user_id=$_GET['delete'];
    
    $sqls="DELETE FROM users WHERE user_id= {$the_user_id}";
    $delete= mysqli_query($conn,$sqls);

}                                                     
?>

</body>
</html>
