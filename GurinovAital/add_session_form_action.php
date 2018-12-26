<?php
include('config.php');	
$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$doc = mysqli_real_escape_string($link, $_POST['doc']);
$pat = mysqli_real_escape_string($link, $_POST['patient']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$time = mysqli_real_escape_string($link, $_POST['time']);

$SQLquery = "INSERT INTO Datacard (idCard, Patient, Session, Conclusion) VALUES ((SELECT IFNULL(max(idCard)+1,1) from (Select idCard from Datacard) as id),$pat,(SELECT IFNULL(max(idSession)+1,1) from (Select idSession from Session) as kd),2)";
echo '<BR> SQL query: ';
echo $SQLquery;

$SQLquery = "INSERT INTO Session (idSession, Doctor, Date, Time, Succeed) VALUES ((SELECT IFNULL(max(idSession)+1,1) from (Select idSession from Session) as id), $doc,'$date','$time',0)";
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