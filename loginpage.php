<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      if($row['user_type'] == 'Admin'){
         $_SESSION['USER_TYPE'] = $row['user_type'];
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];
         header('location:adminpage.php');

      }elseif($row['user_type'] == 'User'){
         $_SESSION['USER_TYPE'] = $row['user_type'];
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];
         header('location:userpage.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



    <!-- Navigation Bar -->
    <div class="top-nav">
        <div class="include">
            <div class="text-white float-left pt">
                <marquee direction="right">Quality education that extends beyond the classrooms.</marquee>
            </div>
            <div class="social">
                <a href="https://www.facebook.com/VITAustralia"><img src="img/icon/fb.png"></a>
                <a href="https://www.youtube.com/channel/UCPuQJ0kLnbeSudEfocICv8w?view_as=subscriber"><img src="img/icon/yt.png"></a>
                <a href="https://twitter.com/vitaustralia"><img src="img/icon/twitter.png"></a>
                <a href="https://www.linkedin.com/school/vitaustralia/"><img src="img/icon/in.png"></a>
              
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="include">
            <div class="nav-title">
                <div class="nav-brand">
                    <a href="index.html">
                        <img class="logo-img" src="img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="nav-links">
                <a href="index.html">Home</a>
                <a href="courses.html">courses</a>
                <a href="vit.html">life at vit</a>
                <a href="about.html">about</a>
                <a href="faq.html">faq</a>
                <a class="active" href="contact.html">Contact</a>
            </div>
        </div>
    </nav>
    <div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="Email" name="email" required placeholder="Enter your Email">
      <input type="password" name="password" required placeholder="Enter your password" id="myBtn">
      <input type="submit" name="submit" value="login now" class="form-btn" >
      <input type="checkbox" onclick="myFunction()">Show Password
      <Script>
        function myFunction() {
  var x = document.getElementById("myBtn");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</Script>
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>
</div>

<style type="text/css">

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}
.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
</style>
    
    <footer class="footer text-center">
        <p> &copy; Copyright VIT (Victorian Institute of Technology) 2022. VIT</p>
    </div>
    <hr>
    
    <p>
        <a href="Index.html">Home</a> |
        <a href="courses.html">Course</a> |
        <a href="vit.html">Life at VIT</a> |
        <a href="about.html">About</a> |
        <a href="faq.html">FAQ</a> |
        <a href="contact.html">Contact</a>
    </p>
    </footer>
    



</body>
</html>
