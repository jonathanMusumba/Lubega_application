<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LINMS";
function generateRandomCode($length = 4) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomCode;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDB) === FALSE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

// Create the table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS biodata (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    entryType VARCHAR(50) NOT NULL,
    level VARCHAR(50) NOT NULL,
    course VARCHAR(255) NOT NULL,
    academicSession VARCHAR(255) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    givenName VARCHAR(50) NOT NULL,
    otherNames VARCHAR(50),
    dob DATE NOT NULL,
    age INT(2),
    sex VARCHAR(6),
    maritalStatus VARCHAR(15),
    religion VARCHAR(50),
    telephone VARCHAR(13) NOT NULL,
    email VARCHAR(50) NOT NULL,
    country VARCHAR(50),
    district VARCHAR(50) NOT NULL,
    county VARCHAR(50),
    subcounty VARCHAR(50) NOT NULL,
    parish VARCHAR(50),
    village VARCHAR(50) NOT NULL,
    kinName VARCHAR(50) NOT NULL,
    kinOccupation VARCHAR(50) NOT NULL,
    kinTelephone VARCHAR(13) NOT NULL,
    kinEmail VARCHAR(50),
    kinDistrict VARCHAR(50) NOT NULL,
    kinParish VARCHAR(50),
    kinVillage VARCHAR(50) NOT NULL,
    kinRelation VARCHAR(50) NOT NULL,
    applicantCode VARCHAR(4) NOT NULL UNIQUE

)";
if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table biodata created successfully<br>";
} else {
    echo "Error creating table biodata: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $EntryType = $_POST['entryType'];
    $Level = $_POST['level'];
    $Course = $_POST['course'];
    $ACADEMIC_SESSION = $_POST['academicSession'];
    $SURNAME = $_POST['surname'];
    $GIVEN_NAME = $_POST['givenName'];
    $OTHER_NAMES = $_POST['otherNames'];
    $DOB = $_POST['dob'];
    $AGE = $_POST['age'];
    $SEX = $_POST['sex'];
    $MARITAL_STATUS = $_POST['maritalStatus'];
    $RELIGION = $_POST['religion'];
    $TELEPHONE = $_POST['telephone'];
    $EMAIL= $_POST['email'];
    $COUNTRY= $_POST['country'];
    $DISTRICT = $_POST['district'];
    $COUNTY = $_POST['county'];
    $SUBCOUNTY = $_POST['subCounty'];
    $PARISH = $_POST['parish'];
    $VILLAGE = $_POST['village'];
    $KIN_NAME = $_POST['kinName'];
    $KIN_OCCUPATION = $_POST['kinOccupation'];
    $KIN_TELEPHONE = $_POST['kinTelephone'];
    $KIN_EMAIL = $_POST['kinEmail'];
    $KIN_DISTRICT = $_POST['kinDistrict'];
    $KIN_PARISH = $_POST['kinParish'];
    $KIN_VILLAGE = $_POST['kinVillage'];
    $RELATIONSHIP= $_POST['kinRelationship'];
    $randomCode = generateRandomCode();

    $sqlInsert = "INSERT INTO biodata (entryType, level, course, academicSession, surname, givenName, otherNames, dob, age, sex,
        maritalStatus, religion, telephone, email, country, district, county, subcounty, parish, village, kinName, kinOccupation,
        kinTelephone, kinEmail, kinDistrict, kinParish, kinVillage, kinRelation, applicantCode) 
        VALUES ('$EntryType', '$Level', '$Course', '$ACADEMIC_SESSION', '$SURNAME', '$GIVEN_NAME', '$OTHER_NAMES',
        '$DOB', '$AGE', '$SEX', '$MARITAL_STATUS', '$RELIGION', '$TELEPHONE', '$EMAIL', '$COUNTRY', '$DISTRICT', '$COUNTY', '$SUBCOUNTY',
        '$PARISH', '$VILLAGE', '$KIN_NAME', '$KIN_OCCUPATION', '$KIN_TELEPHONE', '$KIN_EMAIL', '$KIN_DISTRICT', '$KIN_PARISH',
        '$KIN_VILLAGE', '$RELATIONSHIP', '$randomCode')";

if ($conn->query($sqlInsert) === TRUE) {
    // Display success message with applicant code and continue button
    echo "Biodata data submitted successfully. Your applicant code is: $randomCode <br>";
    echo '<button onclick="redirectToAcademics()">Continue to Academics</button>';
} else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
}
}
?>

<script>
function redirectToAcademics() {
// Redirect to academics.html
window.location.href = 'academics.html';
}
</script>