<html>
 <head>
  <title>WEB-site of the GG Polyclinic</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<?php
	printf('<P>Hello there!</P> %s',"\n");
	// Соединяемся, выбираем базу данных VER3
	
	$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')
	    or die('Error: Unable to connect: ' . mysqli_connect_error());
	printf('<P>Successfully connected!</P> %s',"\n");
	
	// Выполняем SQL-запрос
	$SQLquery = 'SELECT * FROM Session';
	$SQLresult = mysqli_query($link,$SQLquery);

	printf('<table cellspacing=\' 10 \' border=\' 1 \'> %s',"\n");
	printf('<TR> %s',"\n");
	printf('	<TH>idSession</TH> %s',"\n");
	printf('	<TH>Doctor</TH> %s',"\n");
	printf('	<TH>Date</TH> %s',"\n");
	printf('	<TH>Time</TH> %s',"\n");
	printf('	<TH>Active</TH> %s',"\n");
	printf('</TR> %s',"\n");


	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<TR> %s',"\n");
		if ($result[4]==1)
		{
			printf('<TD> %d </TD> <TD>%d</TD> <TD>%s</TD> <TD>%s</TD> <TD>%s</TD>',$result[0],$result[1],$result[2],$result[3],'YES');
		}
		else
		{
			printf('<TD> %d </TD> <TD>%d</TD> <TD>%s</TD> <TD>%s</TD> <TD>%s</TD>',$result[0],$result[1],$result[2],$result[3],'NO'); 
		}
		printf('</TR> %s',"\n");
	}
	printf('</table> %s',"\n");
	// Освобождаем память от результата
	mysqli_free_result($SQLresult);
	mysqli_close($link);

?>
<BR>
<a href="index.html"> <P>GO BACK</P> </a>
 </body>
</html>