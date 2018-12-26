<?php
include('config.php');	
$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$pat = mysqli_real_escape_string($link, $_POST['patient']);
$sss = mysqli_real_escape_string($link, $_POST['session']);

$SQLquery = "INSERT INTO Datacard (idCard, Patient, Session, Conclusion) VALUES ((SELECT IFNULL(max(idCard)+1,1) 
from (Select idCard from Datacard) as id),$pat,$sss,2)";
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