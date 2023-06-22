<?php
include "config.php";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Our Book Store</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <select id="category-select" onchange="updateBookList(this.value)">
        <option value="">All Categories</option>
    </select>

    <div id="book-list">
        <!-- books will be appended here by the JavaScript -->
    </div>
    <?php
        $connection->close();
    ?>  
    <script src="./js/script.js"></script>
</body>
</html>
