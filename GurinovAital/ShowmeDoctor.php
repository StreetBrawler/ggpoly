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
	$SQLquery = 'select Doctor.idDoctor, Doctor.FullName, Doctor.Diploma, Doctor.Worktime, Spec.SpecName, Spec.Cabinet from Doctor inner join Spec on Doctor.Spec=Spec.idSpec';
	$SQLresult = mysqli_query($link,$SQLquery);

	printf('<table cellspacing=\' 10 \' border=\' 1 \'> %s',"\n");
	printf('<TR> %s',"\n");
	printf('	<TH>Fullname</TH> %s',"\n");
	printf('	<TH>Diploma</TH> %s',"\n");
	printf('	<TH>Worktime</TH> %s',"\n");
	printf('	<TH>Spec</TH> %s',"\n");
	printf('	<TH>Cab.</TH> %s',"\n");
	printf('</TR> %s',"\n");


	while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
	{
		printf('<TR>');
		if ($result[2]==1)
		{printf('<TD>%s</TD> <TD>%s</TD> <TD>%s</TD> <TD> %s </TD> <TD> %d </TD>',$result[1],'YES',$result[3],$result[4],$result[5]);}
		else 
		{printf('<TD>%s</TD> <TD>%s</TD> <TD>%s</TD> <TD> %s </TD> <TD> %d </TD>',$result[1],'NO',$result[3],$result[4],$result[5]);};
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