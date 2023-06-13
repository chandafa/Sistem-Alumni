<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user_id']; ?></h2>
    <p>This is the home page for the authenticated user.</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
