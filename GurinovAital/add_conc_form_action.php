<?php
include('config.php');	
$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$name = mysqli_real_escape_string($link, $_POST['name']);
$init = mysqli_real_escape_string($link, $_POST['init']);

$SQLquery = "INSERT INTO Conclusion (idConc, Name, InitialT) VALUES ((SELECT IFNULL(max(idConc)+1,1) from (Select idConc from Conclusion) as id), '$name','$init')";
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