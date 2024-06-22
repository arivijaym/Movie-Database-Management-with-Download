<!DOCTYPE html>
<head>
<title>Signup - Film Gentleman</title>
    <link rel="stylesheet" type="text/css" href="login.css?v=2">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="box">
    <img src="images/FG.png" class="user">

        <h1>Register Here</h1>
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form name="myform2" action="login_data.php" method="POST" onsubmit="return validateForm()">

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required="">

            <p>Email</p>
            <input type="Email" name="email" placeholder="Enter email id" required="">

            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character. Minimum 8 characters." required="">

            <p>Retype Password</p>
            <input type="password" name="repassword" placeholder="Re-Enter Password" pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character. Minimum 8 characters." required="">

            <input type="submit" name="" value="Register">

            <br><br>
            <a href="Login.php">existing user, login !?</a>
        </form>
        
    </div>
    <script>
$(document).ready(function() {
  $('.box').fadeIn(1500);
});
</script>
<script>
    function validateForm() {
        var password = document.forms["myform2"]["password"].value;
        var repassword = document.forms["myform2"]["repassword"].value;

        if (password !== repassword) {
            alert("Sorry Friend, Passwords do not match! Try Again");
            return false;
        }
        return true;
    }
</script>


</body>
</html>