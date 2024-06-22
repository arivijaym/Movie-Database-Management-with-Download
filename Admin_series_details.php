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
                            <a class="nav-link" href="Admin_movie_details.php">
                                Movie Details
                            </a>
                        </li>
                        <li class="nav-item active">
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
                    <h1 class="h2">Series Details</h1>
                </div>

                <div class="row">
                    <form action="series_details_function.php" method="post" enctype="multipart/form-data"
                        id="seriesForm1">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="seriesPoster">Poster</label>
                                <input type="file" class="form-control" id="seriesPoster" name="seriesPoster"
                                    accept="image/*" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesTitle">Title</label>
                                <input type="text" class="form-control" id="seriesTitle" name="seriesTitle" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesYear">Year</label>
                                <input type="text" class="form-control" id="seriesYear" name="seriesYear" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesSeason">Season</label>
                                <input type="text" class="form-control" id="seriesSeason" name="seriesSeason" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="seriesEpisodes">Episodes</label>
                                <input type="number" class="form-control" id="seriesEpisodes" name="seriesEpisodes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="seriesAudio">Audio</label>
                                <input type="text" class="form-control" id="seriesAudio" name="seriesAudio">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesSubtitles">Subtitles</label>
                                <input type="text" class="form-control" id="seriesSubtitles" name="seriesSubtitles">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesGenre">Genre</label>
                                <input type="text" class="form-control" id="seriesGenre" name="seriesGenre" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesRating">Rating</label>
                                <input type="text" class="form-control" id="seriesRating" name="seriesRating">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="seriesQuality">Quality</label>
                                <input type="text" class="form-control" id="seriesQuality" name="seriesQuality">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesRuntime">Runtime</label>
                                <input type="text" class="form-control" id="seriesRuntime" name="seriesRuntime">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesStarring">Starring</label>
                                <input type="text" class="form-control" id="seriesStarring" name="seriesStarring">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="seriesDirector">Director</label>
                                <input type="text" class="form-control" id="seriesDirector" name="seriesDirector">
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-12">
                                <label for="seriesProducer">Producer</label>
                                <input type="text" class="form-control" id="seriesProducer" name="seriesProducer">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="seriesOTT">OTT</label>
                                <input type="text" class="form-control" id="seriesOTT" name="seriesOTT">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="seriesTrailer">Trailer Link (YouTube)</label>
                                <input type="text" class="form-control" id="seriesTrailer" name="seriesTrailer">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="seriesPlot">Plot Summary</label>
                                <textarea class="form-control" id="seriesPlot" name="seriesPlot" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="seriesMedia1">Video</label>
                                <input type="file" class="form-control" id="seriesMedia1" name="seriesMedia1"
                                    accept="video/*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="seriesMedia2">Media 2</label>
                                <input type="file" class="form-control" id="seriesMedia2" name="seriesMedia2"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="seriesMedia3">Media 3</label>
                                <input type="file" class="form-control" id="seriesMedia3" name="seriesMedia3"
                                    accept="image/*">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="seriesMedia4">Media 4</label>
                                <input type="file" class="form-control" id="seriesMedia4" name="seriesMedia4"
                                    accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-warning w-100" id="submit_series"
                            name="submit_series">Submit</button>
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
                    url: "series_details_function.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        // Show success message
                        $("#message").html(response);
                        // Clear form fields
                        $("#seriesForm1")[0].reset();
                        // Refresh movie list
                        loadMovies();
                    }
                });
            });
        });
    </script>
</body>

</html>