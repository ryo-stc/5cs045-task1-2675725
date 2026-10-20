<?php
    $mysqli = new mysqli("localhost","root","root","5cs045-task1-2675725");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

// Get the books; DATE_FORMAT shows the date as day/month/year like the table
$sql = "SELECT book_name, genre, price, DATE_FORMAT(date_of_release, '%d/%m/%Y') AS release_date FROM books";
$results = mysqli_query($mysqli, $sql);
?>

<html>
<head><meta charset="utf-8">
    <title>Books</title>
</head>
<body>
    <h1>books table</h1>
    <table border="1" cellpadding="6">
      <tr>
        <th>Book name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of release</th>
      </tr>
      <?php
      // One table row for each record
      while ($a_row = mysqli_fetch_assoc($results)) {
          print("<tr>");
          print("<td>{$a_row['book_name']}</td>");
          print("<td>{$a_row['genre']}</td>");
          print("<td>&pound;" . number_format($a_row['price'], 2) . "</td>");
          print("<td>{$a_row['release_date']}</td>");
          print("</tr>");
      }
      ?>
    </table>
    </body>
</html>
