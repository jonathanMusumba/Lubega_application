<?php
// Include your database connection file
include_once "db_connection.php";

// Fetch data from both tables based on matching applicant code
$query = "SELECT biodata.*, academics.*
          FROM biodata
          INNER JOIN academics ON biodata.applicant_code = academics.applicant_code";
$result = mysqli_query($connection, $query);

// Check if there are any rows in the result
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h3>Biodata:</h3>";
            // Output biodata details
            echo "<p>Entry Type: " . $row["entry_type"] . "</p>";
            echo "<p>Level: " . $row["level"] . "</p>";
            echo "<p>Course: " . $row["course"] . "</p>";
            echo "<p>Academic Session: " . $row["academic_session"] . "</p>";
            echo "<p>Surname: " . $row["surname"] . "</p>";
            echo "<p>Given Name: " . $row["given_name"] . "</p>";
            echo "<p>Other Names: " . $row["other_names"] . "</p>";
            echo "<p>Date of Birth: " . $row["date_of_birth"] . "</p>";
            echo "<p>Age: " . $row["age"] . "</p>";
            echo "<p>Sex: " . $row["sex"] . "</p>";
            echo "<p>Telephone: " . $row["telephone"] . "</p>";
            echo "<p>Email: " . $row["email"] . "</p>";
            echo "<p>District: " . $row["district"] . "</p>";
            echo "<p>Village: " . $row["village"] . "</p>";

            echo "<h3>Academics:</h3>";
            // Output academics details
            echo "<p>Class: " . $row["class"] . "</p>";
            echo "<p>Subjects: " . $row["subjects"] . "</p>";
            echo "<p>Grades: " . $row["grades"] . "</p>";
            echo "<hr>"; // Add a horizontal line between records
        }
    } else {
        echo "No applicant data found";
    }
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
