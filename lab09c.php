<?php
    require 'lab09a.php';
    // Problem 3: Display images with location = "Ontario".
    // Print Data ----------------------------------------------------------------------------------------------
    $sql = "SELECT * FROM Photograph WHERE pic_location = 'Ontario';";
    echo "<p><u>Query:</u> $sql</p>";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div style='float:left padding:8px'>";
            $image = $row["picture_url"];
            echo "<p style='margin:5px'>No. " . $row["picture_number"] . "<br>Subject: " . $row["pic_subject"] . " <br>Location: " . $row["pic_location"] . " <br>Date: " . $row["date_taken"] . "<br><img src=$image style='border-radius:15px; border:3px solid white;' width=250 height=350></p>";
            echo "</div>";
        }
    } elseif (mysqli_error($connect) == "") {
        echo "<p>Error printing. (Table 's3kullar.Photograph' contains no data or data with Location = 'Ontario')</p>";
    } else {
        echo "<p>Error printing. (" . mysqli_error($connect) . ")</p>";
    }
?>