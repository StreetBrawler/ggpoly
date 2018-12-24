<?php
include('config.php');	
$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$name = mysqli_real_escape_string($link, $_POST['fullname']);
$dipl = mysqli_real_escape_string($link, $_POST['diploma']);
$time = mysqli_real_escape_string($link, $_POST['worktime']);
$spec = mysqli_real_escape_string($link, $_POST['spec_id']);

$SQLquery = "INSERT INTO Doctor (idDoctor, Fullname, Diploma, Worktime, Spec) VALUES ((SELECT IFNULL(max(idDoctor)+1,1) from (Select idDoctor from Doctor) as id), '$name',$dipl,'$time',$spec)";
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