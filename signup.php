<?php 

$conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

if(isset($_POST['user_reg'])){
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $position=$_POST['position'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    
    $sql= "INSERT INTO users(firstname, lastname, position, user_name, email, password, status) VALUES ( '{$fname}', '{$lname}', '{$position}', '{$username}', '{$email}', '{$password}', 'unassigned')";
    
    $create_user_query= mysqli_query($conn,$sql);
    
    if(!$create_user_query){
            die("Query Failed". mysqli_error($conn));
        }
    else{
        header("Location: ./index.php"); 
//        echo "<h1>Registration Completed</h1>";
    }
    
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bookshelf Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
  </head>
<body class="add">
    <div class="main">
        <div class="contain">
            <div class="signup-content">
                <!-- <div class="signup-img">
                    <img class="reg_img" src="images/signup-img.jpg" alt="">
                </div> -->
                <div></div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2 style="text-transform: uppercase; text-align: center; letter-spacing: 1px; margin-bottom: 24px;">User registration form</h2>
                        <div class="form-row">
                            <div class="forms">
                                <label for="firstname">First Name :</label>
                                <input type="text" name="firstname" id="firstname" required/>
                            </div>
                            <div class="forms">
                                <label for="lastname">Last Name :</label>
                                <input type="text" name="lastname" id="lastname" required/>
                            </div>
                        </div>
                        <div class="forms">
                            <label for="username">User Name :</label>
                            <input type="text" name="username" id="username" required/>
                        </div>
                        <div class="forms">
                            <label for="course">Position :</label>
                            <div class="form-select">
                                <select name="position" id="position">
                                    <option class="options" value="admin">Admin</option>
                                    <option class="options" value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="forms">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="forms">
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="form-submit">
                            <span><input type="submit" value="Submit" class="submit" name="user_reg" id="submit" /></span>
                        </div>
                    </form>
                    <div class="footer" style="text-align: center;">
                        <p>Already have an account? <a href="index.php">Login Here</a></p>
                    </div>
                </div>
                
                <div></div>
            </div>
        </div>

    </div>
</body>
</html>