<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css?v=1">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        Dashboard
                    </h5>
                    <ul class="nav flex-column mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="Admin.php">
                                Hero Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_movies.php">
                                Movies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_series.php">
                                Series
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_celebrities.php">
                                Celebrities
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_upcomings.php">
                                Upcomings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="Admin_movie_details.php">
                                Movie Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_series_details.php">
                                Series Details
                            </a>
                        </li>
                    </ul>
                    <h5
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        Account
                    </h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_profile.php">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Movie Details</h1>
                </div>

                <div class="row">
                    <form action="movie_details_function.php" method="post" enctype="multipart/form-data"
                        id="movieForm1">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="moviePoster">Poster</label>
                                <input type="file" class="form-control" id="moviePoster" name="moviePoster"
                                    accept="image/*" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieTitle">Title</label>
                                <input type="text" class="form-control" id="movieTitle" name="movieTitle" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieYear">Year</label>
                                <input type="text" class="form-control" id="movieYear" name="movieYear" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieAudio">Audio</label>
                                <input type="text" class="form-control" id="movieAudio" name="movieAudio">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="movieSubtitles">Subtitles</label>
                                <input type="text" class="form-control" id="movieSubtitles" name="movieSubtitles">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieGenre">Genre</label>
                                <input type="text" class="form-control" id="movieGenre" name="movieGenre" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieQuality">Quality</label>
                                <input type="text" class="form-control" id="movieQuality" name="movieQuality">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieRating">Rating</label>
                                <input type="text" class="form-control" id="movieRating" name="movieRating">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="movieRuntime">Runtime</label>
                                <input type="text" class="form-control" id="movieRuntime" name="movieRuntime">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieStarring">Starring</label>
                                <input type="text" class="form-control" id="movieStarring" name="movieStarring">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieDirector">Director</label>
                                <input type="text" class="form-control" id="movieDirector" name="movieDirector">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieProducer">Producer</label>
                                <input type="text" class="form-control" id="movieProducer" name="movieProducer">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="movieOTT">OTT</label>
                                <input type="text" class="form-control" id="movieOTT" name="movieOTT">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="movieTrailer">Trailer Link (YouTube)</label>
                                <input type="text" class="form-control" id="movieTrailer" name="movieTrailer">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="moviePlot">Plot Summary</label>
                                <textarea class="form-control" id="moviePlot" name="moviePlot" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="media1">Video</label>
                                <input type="file" class="form-control" id="media1" name="media1"
                                    accept="video/*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="media2">Media 2</label>
                                <input type="file" class="form-control" id="media2" name="media2"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="media3">Media 3</label>
                                <input type="file" class="form-control" id="media3" name="media3"
                                    accept="image/*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="media4">Media 4</label>
                                <input type="file" class="form-control" id="media4" name="media4"
                                    accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-warning w-100" id="submit_movie"
                            name="submit_movie">Submit</button>
                    </form>

                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Submit form via AJAX
            $("#movieForm").submit(function (event) {
                // Prevent default form submission
                event.preventDefault();
                // Serialize form data
                var formData = $(this).serialize();
                // AJAX call to add_movie.php
                $.ajax({
                    url: "movie_details_function.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        // Show success message
                        $("#message").html(response);
                        // Clear form fields
                        $("#movieForm1")[0].reset();
                        // Refresh movie list
                        loadMovies();
                    }
                });
            });
        });
    </script>
</body>

</html>