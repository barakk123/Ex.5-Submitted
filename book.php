<?php
include "config.php";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

$book_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$sql = "SELECT * FROM tbl_28_books WHERE id = $book_id LIMIT 0,1";
$result = $connection->query($sql);

$book_name = "";
$book_details = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $book_name = $row["name"]; // Store the book name in a variable

        $book_details .= "<div class='book-details'>";
        $book_details .= "<img class='book-image-in-books' src='" . $row["img_url"] . ".png' alt='" . $row["name"] . "'>";
        $book_details .= "<img class='book-image-in-books' src='" . $row["img_url2"] . ".png' alt='" . $row["name"] . "'>";
        $book_details .= "<h2>" . $row["name"] . "</h2>";
        $book_details .= "<h3>" . $row["author"] . "</h3>";
        $book_details .= "<p>Price: " . $row["price"] . " $</p>";
        $book_details .= "<p>Rate: " . $row["rate"] . "</p>";
        $book_details .= "<p class='p-in-book'>Category: " . $row["category"] . "</p>";
        $book_details .= "<p>" . $row["description"] . "</p>";
        $book_details .= "<a class='info-button' id='in-book' href='index.php'>Back to Book List</a>";
        $book_details .= "</div>";
    }
} else {
    $book_details = "No book found with that ID.";
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $book_name; ?></title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <nav>
        <h2 class="headline">Fiction Book Store</h2>
    </nav>
    <div id="book-details">
        <?php echo $book_details; ?>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
