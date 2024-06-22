<!DOCTYPE html>
<head>
<title>Login - FIlm Gentleman</title>
<link rel="stylesheet" type="text/css" href="login.css?v=1">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    

<body>


    <div class="box">

    <img src="images/FG.png" class="user">

        <h1>Login Here</h1>

        <form name="myform"  action="login_connect.php" method="POST" >

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username " required="">

            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character. Minimum 8 characters." required="">


            <input type="submit" name="" value="Login">

            <br><br>
            <a href="Signup.php">Register for new account ?</a>

        </form>
        
    </div>
    <script>
$(document).ready(function() {
  $('.box').fadeIn(1500); // Adjust the duration as needed (in milliseconds)
});
</script>

    

</body>
</html>