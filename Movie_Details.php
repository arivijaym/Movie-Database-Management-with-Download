<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Gentleman - World Of Digital Theatre</title>
  <link rel="stylesheet" href="style.css?v=4">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Your+First+Font&family=Your+Second+Font&display=swap">

  <style>
    body {
      color: white;
    }

    .scrollable-container {
      max-height: 400px;
      /* Adjust the height as needed */
      overflow-y: auto;
      overflow-y: auto;
      /* Enable vertical scrollbar */
      overflow-x: hidden;
      /* Hide horizontal scrollbar */
    }

    /* Hide the default scrollbar */
    .scrollable-container::-webkit-scrollbar {
      width: 4px;
      /* Set the width of the scrollbar */
    }

    /* Handle styles */
    .scrollable-container::-webkit-scrollbar-thumb {
      background-color: #888;
      /* Set the color of the scrollbar handle */
      border-radius: 10px;
      /* Set border radius to make it rounded */
    }
  </style>

</head>
<?php include 'db_connection.php'; ?>

<body>

  <nav class="navbar navbar-expand-lg fixed-top transparent-navbar">
    <div class="container" id="contain">
      <a class="navbar-brand" href="main.php">
        <img src="images/logo1.png" alt="Logo" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Movies
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Movie_New.php">New Releases</a>
              <a class="dropdown-item" href="Movie_Popular">Most Popular</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Series
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Series_New.php">New Releases</a>
              <a class="dropdown-item" href="Series_Popular.php">Most Popular</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
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
  </nav><br>

  <section>
    <div class="container mt-5 py-5">
      <div class="row">
        <?php
        // Retrieve movie title and year from URL parameters
        if (isset($_GET['title']) && isset($_GET['year'])) {
          $movieTitle = $_GET['title'];
          $movieYear = $_GET['year'];

          // Query movie_details table to fetch details for the selected movie
          $detailsSql = "SELECT * FROM movie_details WHERE title = ? AND year = ?";
          $detailsStmt = $conn->prepare($detailsSql);
          $detailsStmt->bind_param("si", $movieTitle, $movieYear);
          $detailsStmt->execute();
          $detailsResult = $detailsStmt->get_result();

          // Check if the movie details are found in the database
          if ($detailsResult->num_rows > 0) {
            $detailsRow = $detailsResult->fetch_assoc();
            // Display movie details
            echo '<div class="col-md-4">';
            echo '<img src="uploads/' . $detailsRow['poster'] . '" class="img-fluid" alt="Movie Poster" style="border-radius:10px;">';
            echo '</div>';
            echo '<div class="col-md-5">';
            echo '<h1>' . $detailsRow['title'] . '</h1>';
            echo '<hr>';
            echo '<p><strong>Release Date:</strong> ' . $detailsRow['year'] . '</p>';
            echo '<p><strong>Languages:</strong> ' . $detailsRow['audio'] . '</p>';
            echo '<p><strong>Subtitles:</strong> ' . $detailsRow['subtitles'] . '</p>';
            echo '<p><strong>Rating:</strong> ' . $detailsRow['rating'] . '</p>';
            echo '<p><strong>Runtime:</strong> ' . $detailsRow['runtime'] . '</p>';
            echo '<p><strong>Quality:</strong> ' . $detailsRow['quality'] . '</p>';
            echo '<p><strong>Genre:</strong> ' . $detailsRow['genre'] . '</p>';
            echo '<p><strong>Starring:</strong> ' . $detailsRow['starring'] . '</p>';
            echo '<p><strong>Director:</strong> ' . $detailsRow['director'] . '</p>';
            echo '<p><strong>OTT Platform:</strong> ' . $detailsRow['ott'] . '</p>';
            echo '</div>';
          } else {
            // Movie details not found, display error message
            echo "Movie details not found.";
          }
        } else {
          // Movie name and year not provided in the URL, display error message
          echo "Movie details Parameter error.";
        }
        ?>


        <div class="col-md-3">
          <h4>New Releases</h4>
          <div class="row w-100">
            <?php
            // Define the number of profiles to display
            $moviesToShow = 2;

            // Fetch profiles from the database with a limit of 10
            $sql = "SELECT * FROM movies WHERE release_status = 'new_release' LIMIT $moviesToShow";
            $result = $conn->query($sql);

            // Display profiles in grid view
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                // Generate HTML code for the movie card
                echo '<div class="col-md-12 mb-2 py-1">';
                echo '<div class="card h-100" id="movieCard">';
                echo '<img src="uploads/' . $row['poster'] . '" class="card-img-top" id="movieImage" alt="' . $row['name'] . '">';
                echo '<div class="card-body" id="cardBody">';
                echo '<p class="card-text cardDetails">' . $row['quality'] . ' | ⭐ ' . $row['rating'] . '</p>';
                echo '<h5 class="card-title" id="cardTitle">' . $row['name'] . '</h5>';
                echo '<p class="card-text cardDetails">' . $row['year'] . '</p>';
                echo '<p class="card-text cardDetails">' . $row['genre'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo '<p class="cardDetails">No profiles found.</p>';
            }
            ?>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php
          // Retrieve movie title and year from URL parameters
          if (isset($_GET['title']) && isset($_GET['year'])) {
            $movieTitle = $_GET['title'];
            $movieYear = $_GET['year'];

            // Query movie_details table to fetch details for the selected movie
            $detailsSql = "SELECT * FROM movie_details WHERE title = ? AND year = ?";
            $detailsStmt = $conn->prepare($detailsSql);
            $detailsStmt->bind_param("si", $movieTitle, $movieYear);
            $detailsStmt->execute();
            $detailsResult = $detailsStmt->get_result();

            // Display movie card along with details fetched from movie_details table
            while ($detailsRow = $detailsResult->fetch_assoc()) {

              // Output the plot summary inside a paragraph tag with strong emphasis
              echo '<p><strong>Plot Summary:</strong></p>';
              echo '<p>' . $detailsRow['plot_summary'] . '</p>';
            }
          } else {
            echo "No movies found in the database.";
          }

          ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <hr>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <h4>Videos & Photos</h4>
        </div>
        <div class="row">
          <!-- Left Column for YouTube Video -->
          <?php
          // Retrieve movie title and year from URL parameters
          if (isset($_GET['title']) && isset($_GET['year'])) {
            $movieTitle = $_GET['title'];
            $movieYear = $_GET['year'];

            // Query movie_details table to fetch details for the selected movie
            $detailsSql = "SELECT * FROM movie_details WHERE title = ? AND year = ?";
            $detailsStmt = $conn->prepare($detailsSql);
            $detailsStmt->bind_param("si", $movieTitle, $movieYear);
            $detailsStmt->execute();
            $detailsResult = $detailsStmt->get_result();

            // Display movie card along with details fetched from movie_details table
            while ($detailsRow = $detailsResult->fetch_assoc()) {
              // Function to extract the YouTube video ID from the trailer link
              function getYoutubeVideoId($url)
              {
                $videoId = false;
                // Extract video ID from URL
                $urlParts = parse_url($url);
                if (isset($urlParts['host']) && $urlParts['host'] === 'youtu.be') {
                  $videoId = ltrim($urlParts['path'], '/');
                } elseif (isset($urlParts['query'])) {
                  parse_str($urlParts['query'], $query);
                  if (isset($query['v'])) {
                    $videoId = $query['v'];
                  }
                }
                return $videoId;
              }

              // Assuming you have already fetched the details from the database and stored them in $detailsRow
          
              // Retrieve the trailer link from the $detailsRow variable
              $trailerLink = $detailsRow['trailer_link'];

              // Check if the trailer link is not empty
              if (!empty($trailerLink)) {
                // Extract the YouTube video ID from the trailer link
                $videoId = getYoutubeVideoId($trailerLink);

                // Check if a valid YouTube video ID is obtained
                if ($videoId !== false) {
                  // Construct the iframe HTML code
                  $iframeCode = '<div class="col-md-8">
                          <iframe width="100%" height="400" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>
                      </div>';

                  // Output the iframe HTML code
                  echo $iframeCode;
                } else {
                  // Output a message indicating that the trailer link is invalid
                  echo '<p>Invalid YouTube trailer link.</p>';
                }
              } else {
                // Output a message indicating that no trailer link is available
                echo '<p>No trailer available.</p>';
              }
            }
          } else {
            echo "No movies found in the database.";
          }
          ?>

          <!-- Right Column for Photos and Videos -->
          <div class="col-md-4">
            <!-- Container with scrolling functionality -->
            <div class="scrollable-container">
              <!-- Add your photos and videos here -->
              <?php
              // Retrieve movie title and year from URL parameters
              if (isset($_GET['title']) && isset($_GET['year'])) {
                $movieTitle = $_GET['title'];
                $movieYear = $_GET['year'];

                // Query movie_details table to fetch details for the selected movie
                $detailsSql = "SELECT * FROM movie_details WHERE title = ? AND year = ?";
                $detailsStmt = $conn->prepare($detailsSql);
                $detailsStmt->bind_param("si", $movieTitle, $movieYear);
                $detailsStmt->execute();
                $detailsResult = $detailsStmt->get_result();

                // Display movie card along with details fetched from movie_details table
                while ($detailsRow = $detailsResult->fetch_assoc()) {
                  $mediaFiles = array(
                    $detailsRow['media_1'],
                    $detailsRow['media_2'],
                    $detailsRow['media_3'],
                    $detailsRow['media_4']
                  );

                  // Loop through each media file and display it
                  foreach ($mediaFiles as $mediaFile) {
                    if (!empty($mediaFile)) {
                      // Check if it's a video or an image
                      $extension = pathinfo($mediaFile, PATHINFO_EXTENSION);
                      if (in_array($extension, ['mp4', 'webm', 'ogg'])) {
                        // Video
                        echo '<div class="row mt-2">';
                        echo '<div class="col-md-12">';
                        echo '<video width="100%" controls>';
                        echo '<source src="uploads/' . $mediaFile . '" type="video/' . $extension . '">';
                        echo 'Your browser does not support the video tag.';
                        echo '</video>';
                        echo '</div>';
                        echo '</div>';
                      } else {
                        // Image
                        echo '<div class="row mt-2">';
                        echo '<div class="col-md-12">';
                        echo '<img src="uploads/' . $mediaFile . '" class="img-fluid" alt="Photo">';
                        echo '</div>';
                        echo '</div>';
                      }
                    }
                  }
                }
              } else {
                echo "No movies found in the database.";
              }
              ?>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col">
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <a class="btn btn-danger" href="https://www.netflix.com/in/title/81639319" target="_blank">Online Watch &
            Download</a>
          <a class="btn btn-success" href="https://telegram.me/FilmGentleman" target="_blank">Download Free!</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <hr>
        </div>
      </div>

      <div class="col-sm-10 offset-sm-1 text-center text-white">
        <h2>Comments Section</h2>
      </div>
      <div class="row py-5">
        <div class="form-group col-md-6">
          <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email (optional)</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group col-12">
          <label for="comment">Leave a Comment!</label>
          <textarea id="comment" name="comment" rows="3" class="form-control" placeholder="Comment...."
            required></textarea>
        </div>
        <div class="form-group col-2">
          <button type="submit" class="btn btn-outline-warning" id="btnn">Comment</button>
        </div>
        </form>
      </div>
      <hr>
      <div class="row">
        <div class="col-12">
          <h4>Recent Comments</h4>
        </div>
        <!-- comment 1 -->
        <div class="col-12 my-4 bg-light rounded p-4 shadow-sm">
          <div class="d-flex flex-wrap align-items-center mb-2">
            <img src="images\user.jpg" width="32px" height="32px" alt="User Image" style="border-radius: 50px;">
            <div class="ml-2 d-block w-100">
              <h6 class="mb-0"><a href="#">Ari</a></h6>
              <small style="color: black;"><i class="fa fa-clock"></i> Today at 7:48 AM</small>
              <p class="mb-0" style="color: black;">Awesome!</p>
            </div>
          </div>
          <div class="d-flex py-2 flex-wrap align-items-center mb-2">
            <img src="images\user.jpg" width="32px" height="32px" alt="User Image" style="border-radius: 50px;">
            <div class="ml-2 d-block w-100">
              <h6 class="mb-0"><a href="#">Vijay</a></h6>
              <small style="color: black;"><i class="fa fa-clock"></i> Today at 8:48 AM</small>
              <p class="mb-0" style="color: black;">Good Direction!</p>
            </div>
          </div>
        </div>

        <!-- more comments here -->
      </div>
    </div>
    </div>
    </div>
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="javascript.js"></script>
</body>

</html>