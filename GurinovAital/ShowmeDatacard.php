<html>
 <head>
  <title>WEB-site of the GG Polyclinic</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Hello there!</P> %s',"\n");
	// ������塞��, �롨ࠥ� ���� ������ VER3
	
	$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	printf('<P>Successfully connected!</P> %s',"\n");
	
	// �믮��塞 SQL-�����
	$SQLquery = 'SELECT * FROM Datacard inner join Patient on Datacard.Patient=Patient.idPatient inner join Session on Datacard.Session=Session.idSession inner join Conclusion on Datacard.Conclusion=Conclusion.idConc;';
	$SQLresult = mysqli_query($link,$SQLquery);

	printf('<table cellspacing=\' 10 \' border=\' 1 \'> %s',"\n");
	printf('<TR> %s',"\n");
	printf('	<TH>Patient</TH> %s',"\n");
	printf('	<TH>Session</TH> %s',"\n");
	printf('	<TH>Conclusion</TH> %s',"\n");
	printf('</TR> %s',"\n");


	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<TR>');
		{printf('<TD>%s</TD> <TD>%d</TD> <TD>%s</TD>',$result[5],$result[8],$result[14]);}
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