<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LINMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch applicants data from the database
$sql = "SELECT biodata.surname, biodata.givenName, biodata.otherNames, biodata.sex, biodata.age, academics.level, biodata.entryType, academics.course, biodata.telephone, biodata.district, biodata.village, biodata.kinName, biodata.kinTelephone, biodata.kinRelation, academics.yearUCE, academics.indexNumberUCE, academics.aggregates, academics.division, biodata.applicantCode FROM biodata INNER JOIN academics ON biodata.id = academics.biodata_id";

$result = $conn->query($sql);

$data = array();

// Check if the query executed successfully
if ($result) {
    // Fetch rows from the result set
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "No records found"; // Handle case when no records are found
    }
} else {
    echo "Error: " . $conn->error; // Handle query execution error
}

// Close connection
$conn->close();

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
