<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Student Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Course Outline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Course Coverage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Spotlight Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fees Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Submit Complaint</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Results</a>
                </li>
                <li class="nav-item">
                    <form action="../controllers/AuthController.php" method="post">
                        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Welcome, Student</h3>
            <!-- Student specific content goes here -->
        </div>
    </div>
</div>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
