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

</head>
<?php include 'db_connection.php'; ?>

<body>

    <nav class="navbar navbar-expand-lg fixed-top transparent-navbar">
        <div class="container" id="contain">
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
                            <a class="dropdown-item" href="Series_Popular.php">Most Popular</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Celebrities
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Celebs_Actors.php">Actors</a>
                            <a class="dropdown-item" href="Celebs_Actress.php">Actresses</a>
                            <a class="dropdown-item" href="Celebs_Directors.php">Directors</a>
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
    </nav><br><br><br><br>

    <section class="site-section py-5" style="background-color:#111d27;">
        <div class="container">
            <h2 class="section-heading">Dive into Our Newest Releases</h2><br>
            <form class="form-inline mt-3">
                <div class="input-group w-100">
                    <input class="form-control mr-sm-2" type="search" placeholder="Explore....." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </div>
            </form><br>
            <div class="row w-100">
                <?php
                // Define movies per page and current page
                $moviesPerPage = 30;
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($currentPage - 1) * $moviesPerPage;

                // Fetch movies from the database
                $sql = "SELECT * FROM movies WHERE release_status = 'new_release' ORDER BY id DESC LIMIT $offset, $moviesPerPage";
                $result = $conn->query($sql);

                // Display movies in grid view
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-2 mb-4">';
                        echo '<a href="movie_details.php?title=' . urlencode($row['name']) . '&year=' . urlencode($row['year']) . '" class="card-link">';
                        echo '<div class="card h-100" id="movieCard">';
                        echo '<img src="uploads/' . $row['poster'] . '" class="card-img-top" id="movieImage" alt="' . $row['name'] . '">';

                        echo '<div class="card-body" id="cardBody">';
                        echo '<p class="card-text cardDetails">' . $row['quality'] . ' | ⭐ ' . $row['rating'] . '</p>';
                        echo '<h5 class="card-title" id="cardTitle">' . $row['name'] . '</h5>';
                        echo '<p class="card-text cardDetails">' . $row['year'] . '</p>';
                        echo '<p class="card-text cardDetails">' . $row['genre'] . '</p>';
                        echo '</div>'; // Close card-body
                        echo '</div>'; // Close card
                        echo '</div>'; // Close col-md-4
                    }
                } else {
                    echo '<p>No movies found.</p>';
                }
                ?>
            </div> <!-- Close row -->
        </div> <!-- Close container -->
    </section>


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
</body>

</html>