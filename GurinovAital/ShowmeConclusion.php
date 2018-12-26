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
	$SQLquery = 'SELECT * FROM Conclusion';
	$SQLresult = mysqli_query($link,$SQLquery);

	printf('<table cellspacing=\' 10 \' border=\' 1 \'> %s',"\n");
	printf('<TR> %s',"\n");
	printf('	<TH>Name</TH> %s',"\n");
	printf('	<TH>What to do?</TH> %s',"\n");
	printf('</TR> %s',"\n");


	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<TR>');
		{printf('<TD>%s</TD> <TD>%s</TD>',$result[1],$result[2]);}
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