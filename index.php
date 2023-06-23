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
    <script src="./js/script.js"></script>
</head>
<body>
<div class="element" style="--color: var(--color1)"></div>
    <nav>
        <h2 class="headline">Fiction Book Store</h2>

    </nav>
    <div class="wrapper">
        <select id="category-select" onchange="updateBookList(this.value)">
            <option value="">All Categories</option>
        </select>

        <div id="book-list">
            <!-- books will be appended here by the JavaScript -->
        </div>
    </div>
    <?php
        $connection->close();
    ?>  

</body>
</html>
