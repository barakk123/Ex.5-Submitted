<?php
include "config.php";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}

$book_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$sql = "SELECT * FROM tbl_28_books WHERE id = $book_id LIMIT 0,1";
$result = $connection->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Book</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div id="book-details">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='book-details'>";
                echo "<img src='" . $row["img_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<h3>" . $row["author"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: " . $row["price"] . "</p>";
                echo "<p>Rate: " . $row["rate"] . "</p>";
                echo "<p>Category: " . $row["category"] . "</p>";
                echo "<a class='button' href='index.php'>Back to Book List</a>";
                echo "</div>";
            }
        } else {
            echo "No book found with that ID.";
        }
        $connection->close();
        ?>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
