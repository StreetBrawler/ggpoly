<?php
$link = mysqli_connect('10.14.129.132', 'SlepcovaValentina', 'Dc6LZquV','SlepcovaValentinaDB')
	or die('Error: Unable to connect: ' . mysqli_connect_error());

$first_name = $_POST['first_name'];
$family_name = $_POST['family_name'];
echo $first_name;
echo $family_name;
S ((SELECT max(AuthorID) from (Select AuthorID from authors) as ID) + 1, 'Mikhail','Antonov');
$SQLquery = "INSERT INTO authors (AuthorID, FirstName, FamilyName) VALUES ((SELECT max(AuthorID)+1 from (Select AuthorID from authors) as ID), '$first_name','$family_name')";
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