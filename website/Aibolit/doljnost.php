<html>
 <head>
  <title>Doljnost</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Spisok doljnostei:</P> %s',"\n");
	// ������塞��, �롨ࠥ� ���� ������ VER3
	
	$link = mysqli_connect('10.14.129.132', 'EgorovaTatyana', 'zEdAkFNC','EgorovaTatyanaDB')
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	printf('<P>Succesfully connected!</P> %s',"\n");
	
	// �믮��塞 SQL-�����
	$SQLquery = 'SELECT * FROM doljnost';
	$SQLresult = mysqli_query($link,$SQLquery);

	printf('<table cellspacing=\' 0 \' border=\' 1 \'> %s',"\n");
	printf('<TR> %s',"\n");
	printf('	<TH>Doljnost</TH> %s',"\n");
	printf('	<TH>Cabinet</TH> %s',"\n");
	printf('	<TH>Passport</TH> %s',"\n");
	printf('	<TH>Napravlenie2</TH> %s', "\n");
	printf('</TR> %s',"\n");


	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<TR>');
		printf('<TD> %s </TD> <TD> %d </TD> <TD> %d </TD> <TD> %d </TD>',$result[0],$result[1],$result[2],$result[3]);
		printf('</TR> %s',"\n");
	}
	printf('</table> %s',"\n");
	// �᢮������� ������ �� १����
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>
<BR>
<a href="index.html"> <P>GO BACK</P> </a>
 </body>                         	
</html>