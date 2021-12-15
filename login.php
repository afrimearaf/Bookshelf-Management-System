<?php session_start(); ?>
<?php 

$conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

if(isset($_POST['login'])){
    
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
    $sql="SELECT * FROM users WHERE user_name ='{$name}'";
    $select_user_query = mysqli_query($conn, $sql);

    if(!$select_user_query){
        
        die("Query Failed". mysqli_error($conn));
        
    }
    while($row=mysqli_fetch_assoc($select_user_query)){
        
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $password=$row['password'];
        $position=$row['position'];
        $status=$row['status'];
        
    }
    
    if($name !== $user_name && $pass !==  $password){
        
        header("Location: index.php");  
        
    }
    
    else if($name == $user_name && $pass ==  $password && $status == 'assigned' && $position  == 'admin'){
        
        $_SESSION['user_name'] = $user_name;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['position'] = $position;
        $_SESSION['password'] = $password;
        $_SESSION['status'] = $status;

        header("Location: admin_home.php"); 
        
    }
    
    else if($name == $user_name && $pass ==  $password && $status == 'assigned' && $position  == 'user'){
        $_SESSION['user_name'] = $user_name;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['position'] = $position;
        $_SESSION['password'] = $password;
        $_SESSION['status'] = $status;

        header("Location: all_books.php"); 
        
    }
    else{
        
        header("Location: index.php"); 

    }
        
}

?>