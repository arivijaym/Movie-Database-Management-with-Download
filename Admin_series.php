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
                    <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
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
                            <a class="nav-link active" href="Admin_series.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="Admin_series_details.php">
                                Series Details
                            </a>
                        </li>
                    </ul>
                    <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Series [New Releases, Most Populars, Upcomings]</h1>
                </div>

                <div class="row">
                    <form action="AS_add.php" method="post" enctype="multipart/form-data" id="movieForm1">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="moviePoster">Movie Poster</label>
                                <input type="file" class="form-control" id="seriesPoster" name="seriesPoster" accept="image/*" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieName">Movie Name</label>
                                <input type="text" class="form-control" id="seriesName" name="seriesName" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieYear">Year</label>
                                <input type="text" class="form-control" id="seriesYear" name="seriesYear" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieGenre">Genre</label>
                                <input type="text" class="form-control" id="seriesGenre" name="seriesGenre" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="seriesSeason">Seasons</label>
                                <input type="text" class="form-control" id="seriesSeason" name="seriesSeason" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieQuality">Quality</label>
                                <input type="text" class="form-control" id="seriesQuality" name="seriesQuality" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movieRating">Rating</label>
                                <input type="text" class="form-control" id="seriesRating" name="seriesRating" step="0.1" min="0" max="10" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="releaseStatus">Release Status</label>
                                <select class="form-control" id="releaseStatus" name="releaseStatus">
                                    <option value="">--Select--</option>
                                    <option value="new_release">New Release</option>
                                    <option value="old_series">Old Release</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="popularityStatus">Popularity Status</label>
                                <select class="form-control" id="popularityStatus" name="popularityStatus">
                                    <option value="">--Select--</option>
                                    <option value="most_popular">Most Popular</option>
                                    <option value="not_popular">Not Popular</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 align-self-end">
                                <button type="submit" class="btn btn-outline-warning" id="submit_movie1" name="submit_movie">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Movie List -->
                <div class="row mt-4">
                    <div class="col-md-8">
                        <h2>Movie List</h2>
                        <table class="table table-bordered" id="movieTable">
                            <thead>
                                <tr>
                                    <th>Poster</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Genre</th>
                                    <th>Quality</th>
                                    <th>Season</th>
                                    <th>Rating</th>
                                    <th>Release Status</th>
                                    <th>Popularity Status</th>
                                    <th class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Movie list will be loaded here via AJAX -->
                            </tbody>
                        </table>
                    </div>
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
        $(document).ready(function() {
            // Submit form via AJAX
            $("#movieForm").submit(function(event) {
                // Prevent default form submission
                event.preventDefault();
                // Serialize form data
                var formData = $(this).serialize();
                // AJAX call to add_movie.php
                $.ajax({
                    url: "AS_add.php",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // Show success message
                        $("#message").html(response);
                        // Clear form fields
                        $("#movieForm1")[0].reset();
                        // Refresh movie list
                        loadMovies();
                    }
                });
            });
            // Load movies on page load
            loadMovies();
            // Function to load movies
            function loadMovies() {
                // AJAX call to get_movies.php
                $.ajax({
                    url: "AS_get.php",
                    type: "GET",
                    success: function(response) {
                        // Show movies in table
                        $("#movieTable tbody").html(response);
                    }
                });
            }
            // Function to delete movie
            $("body").on("click", ".deleteMovie", function(event) {
                event.preventDefault();
                var id = $(this).data("id");
                var cls = $(this);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "AS_delete.php",
                            type: "post",
                            data: {
                                id: id
                            },
                            beforeSend: function() {
                                $(cls).text("Deleting...");
                            },
                            success: function(res) {
                                if (res == true) {
                                    $(cls).closest("tr").remove();
                                    swal("Poof! Your data has been deleted!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Failed. Please Try Again!");
                                    $(cls).text("Try Again");
                                }
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
            });

        });
    </script>
</body>

</html>