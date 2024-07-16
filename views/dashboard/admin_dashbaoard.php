<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h3>Admin Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Course Outline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Spotlight Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Complaints</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Site Settings</a>
                </li>
                <li class="nav-item">
                    <form action="../controllers/AuthController.php" method="post">
                        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Welcome, Admin</h3>
            <!-- Admin specific content goes here -->
        </div>
    </div>
</div>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>
