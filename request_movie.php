<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Gentleman - World Of Digital Theatre</title>
  <link rel="stylesheet" href="style.css?v=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+First+Font&family=Your+Second+Font&display=swap">
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

</head>
<?php include 'db_connection.php'; ?>

<body>

  <nav class="navbar navbar-expand-lg fixed-top transparent-navbar">
    <div class="container">
      <a class="navbar-brand" href="main.php">
        <img src="images/logo1.png" alt="Logo" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Movies
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Movie_New.php">New Releases</a>
              <a class="dropdown-item" href="Movie_Popular.php">Most Popular</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Series
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Series_New.php">New Releases</a>
              <a class="dropdown-item" href="Series_popular.php">Top Rateds</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Celebrities
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Celebs_Actors.php">Actors</a>
              <a class="dropdown-item" href="Celebs_Actress.php">Actresses</a>
              <a class="dropdown-item" href="Admin_celebrities.php">Directors</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Upcomings.php">Upcomings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="request_movie.php">Request Movie/Series</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
      <?php
      session_start(); // Start session
      if (isset($_SESSION['username'])) {
        // Admin is logged in , show  logout button and user name 
        echo '<li class="nav-item logged-in">';
        echo '<p class="nav-link">Welecome, ' . $_SESSION['username'] . '</p>';
        echo '</li>';
        echo '<li class="nav-item logged-in">';
        echo '<a class="nav-link" href="logout.php">Logout</a>';
        echo '</li>';
        echo '<li class="nav-item logged-in">';
        echo '<a class="btn btn-outline-warning" href="Admin.php" id="btnn">Dashboard</a>';
        echo '</li>';
      } else {
        // Admin is not logged in, regular elements
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="login.php">Login</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="btn btn-outline-warning" href="signup.php" id="btnn">Signup</a>';
        echo '</li>';
      }
      ?>
    </ul>
      </div>
    </div>
  </nav>
  <!-- Request Form -->
  <br><br><br><br><br>
  <section class="request">
    <div class="container">
      <h2>Request A Movie Or Series</h2>
      <div class="row">
        <div class="col-md-6">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Movie or Series(Name, Year, Language & OTT) </label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" onclick="submitForm(event)">Request Now!</button>
          </form>
        </div>
        <div class="col-md-6">
          <h3>Request Method</h3>
          <p><strong>Correct Spelling & Year</strong> for Movies, Series</p>
          <p><strong>Audio (Language)</strong> for Movies, Series</p>
          <p><strong>OTT</strong> mention (If Known)</p>
          <p><strong>Format:</strong> Name (Year), Language, OTT Mention</p>
          <p><strong>Ex:</strong> Leo (2023), Tamil, Netflix</p>
        </div>
      </div>
    </div>
  </section><br><br><br>
  <section class="site-section py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="section-description">
            <h2><strong>World Of Digital Theatre</strong></h2>
            <br>
            <p>Your ultimate destination for a cinematic journey! Explore an extensive collection of movies, series, and
              celebrity insights. Unlock the magic of storytelling with seamless access to information and download
              links, making your entertainment experience unforgettable.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="section-logo text-center">
            <img src="images/logo1.png" alt="Website Logo" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <!-- Slogan and Description -->
        <div class="col-md-6">
          <h4>Film Gentleman</h4>
          <p>Your one-stop destination for movies, series, and celebrity information.</p>
        </div>

        <!-- Copyright and Links -->
        <div class="col-md-6">
          <p class="float-md-right">
            &copy; 2024 Film Gentleman. All rights reserved. |
            <a href="#">Terms of Service</a> |
            <a href="#">Privacy Policy</a>
          </p>

          <!-- Social Icons -->
          <div class="social-icons float-md-right">
            <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-telegram"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <!-- Add more social icons as needed -->
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Your Content Goes Here -->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="javascript.js"></script>
  <script>
  function submitForm(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    if (name === '' || email === '' || message === '') {
      Swal.fire({
        title: "Error!",
        text: "Please fill in all the fields.",
        icon: "error"
      });
      return;
    }

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Prepare the request
    xhr.open("POST", "sendmail.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Set up the callback function when the request is complete
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Process the response from the server
        Swal.fire({
          title: "Thank You!",
          text: "Our team will upload ASAP!",
          icon: "success"
        });

        // Clear the form fields
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('message').value = '';
      } else {
        // Handle any errors
        Swal.fire({
          title: "Error!",
          text: "Failed to make a request. Please try again.",
          icon: "error"
        });
      }
    };

    // Create the data string to send
    var data = "name=" + encodeURIComponent(name) +
               "&email=" + encodeURIComponent(email) +
               "&message=" + encodeURIComponent(message);

    // Send the request
    xhr.send(data);
  }
</script>
</body>
</html>
