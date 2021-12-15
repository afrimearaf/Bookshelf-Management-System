<?php 

$conn= mysqli_connect('localhost', 'root', '', 'bookshelf');

if(isset($_POST['add_book'])){
    
    $book_title=$_POST['book_title'];
    $author_name=$_POST['author_name'];
    $book_cat=$_POST['book_category'];
    $book_info=$_POST['book_info'];
    $book_content=$_POST['book_content'];
    $book_keyword=$_POST['book_keyword'];
    
    $book_image=$_FILES['book_image']['name'];
    $book_image_temp=$_FILES['book_image']['tmp_name'];
        
    move_uploaded_file($book_image_temp, "./image/$book_image");
    
    $sql= "INSERT INTO books(book_title, book_author, book_category, book_info, book_content, book_img, book_keyword) VALUES ('{$book_title}',  '{$author_name}', '{$book_cat}', '{$book_info}', '{$book_content}', '{$book_image}', '{$book_keyword}')";
    
    $add_book= mysqli_query($conn,$sql);
    
    if(!$add_book){
            die("Query Failed". mysqli_error($conn));
    }
    else{
        header("Location: admin_home.php");
        echo "<h1>Registration Completed</h1>";
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
                <div></div>
                <div class="signup-form">
                    <form action="add_book.php" method="POST" class="register-form" id="register-form">
                        <h2 style="text-transform: uppercase; text-align: center; letter-spacing: 1px; margin-bottom: 24px;">Add New Book</h2>
                        <div class="forms">
                            <label for="book_title">Book Title</label>
                            <input type="text" name="book_title" id="book_title" required/>
                        </div>
                        <div class="forms">
                            <label for="author_name">Book Author :</label>
                            <input type="text" name="author_name" id="author_name" required/>
                        </div>
                        <div class="forms">
                            <label for="course">Book Category :</label>
                            <div class="form-select">
                                <select name="book_category" id="book_category">
                                    <option value="poetry">Poetry</option>
                                    <option value="literature">Literature</option>
                                    <option value="journalism">Journalism</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="comics">Comics</option>
                                    <option value="biography">Biography</option>
                                    <option value="novel">Novel</option>
                                    <option value="plays">Plays</option>
                                    <option value="magazine">Magazine</option>
                                </select>
                            </div>
                        </div>
                        <div class="forms">
                            <label for="book_info">Book Information :</label>
                            <textarea style="width: 100%; border: 2px solid #ebebeb;" name="book_info" id="book_info"></textarea>
                        </div>
                        <div class="forms">
                            <label for="book_content">Book Content :</label>
                            <textarea style="width: 100%;" name="book_content" id="book_content"></textarea>
                        </div>
                        <div class="forms">
                            <label for="book_keyword">Keyword :</label>
                            <input type="text" name="book_keyword" id="book_keyword">
                        </div>
                        <div class="forms">
                            <label for="book_image">Book Image :</label>
                            <input type="file" name="book_image" id="book_image">
                        </div>
                        <div class="form-submit">
                            <span><input type="submit" value="Submit" class="submit" name="add_book" id="submit" /></span>
                        </div>
                    </form>
                    <div class="footer" style="text-align: center;">
                        <p>Don't want to add book? <a href="admin_home.php">Cancel</a></p>
                    </div>
                </div>
                
                <div></div>
            </div>
        </div>

    </div>
</body>
</html>