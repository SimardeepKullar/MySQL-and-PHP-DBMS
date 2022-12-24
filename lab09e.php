<?php
    require 'lab09a.php';
    //// Problem 5: Display random image with count of items in database.
    $sql = "SELECT * FROM Photograph";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        echo "<p>Total number of images in database are: " . $count . "</p>";
    } else {
        echo "<p>Error printing number of images in database. (" . mysqli_error($connect) . ")</p>";
    }

    $sql = "SELECT * FROM Photograph ORDER BY rand()";
    $result = mysqli_query($connect, $sql);
    if ($result && $count != 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<p>Randomly selected image:</p>";
        $image = $row['picture_url'];
        echo "<p style='margin:5px'>No. " . $row["picture_number"] . "<br>Subject: " . $row["pic_subject"] . " <br>Location: " . $row["pic_location"] . " <br>Date: " . $row["date_taken"] . "<br><img src=$image style='border-radius:15px; border:3px solid white;' width=250 height=350></p>";
    } elseif (mysqli_error($connect) == "") {
        echo "<p>Error printing. (Table 's3kullar.Photograph' contains no data)</p>";
    } else {
        echo "<p>Error printing. (" . mysqli_error($connect) . ")</p>";
    }
?>