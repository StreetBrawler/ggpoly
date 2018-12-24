<?php
include('config.php');	
$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());


$fullname = mysqli_real_escape_string($link, $_POST['fullname']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$passport = mysqli_real_escape_string($link, $_POST['passport']);
// Ecape String

// PhPMyAdmin // Sakila and World
echo $first_name;
echo $family_name;

$SQLquery = "INSERT INTO Patient (idPatient, Fullname, Address, Passport) VALUES ((SELECT IFNULL(max(idPatient)+1,1) from (Select idPatient from Patient) as id), '$fullname','$address','$passport')";
echo '<BR> SQL query: ';
echo $SQLquery;

if (mysqli_query($link, $SQLquery)) {
    echo "<BR>New record created successfully";
} else {
    echo "<BR>Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

printf('<a href="index.html"> <P>GO BACK</P> </a>');
?>