<html>
 <head>
  <title>WEB-site of the GG Polyclinic</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
	<P style="color:red; font-size:18">
	Welcome to the GG Polyclinic!<BR>
	<BR>
	Please feel free to browse thorugh the site.
	</P>
 	<meta charset="utf-8">
	
	<table width="100%" cellspacing="0" border="1">	
		<TR>
			<TH>Stuff</TH>
			<TH>Description</TH>
		</TR>
		<TR>
			<TD>
			  <a href="index.html"> <P>GO BACK</P> </a>
			  </TD>			
			  <TD>
			  <P>Update datacard:</P>
			  <form action="upd_session_form_action.php" method="post"> 
				Select session: 
				<select name="session">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idSession, FullName, Date, Time
							 FROM Session inner join Doctor on Doctor.idDoctor=Session.Doctor';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%d %s %s %s %s %s %s</option>',$result[0],$result[0],'/',$result[1],' / ',$result[2],' / ',$result[3]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>
				<br>
				<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT Succeed FROM Session';
					$SQLresult = mysqli_query($link,$SQLquery);
					if ($result[0]==0)
					{
						printf('<p><input name="active" type="radio" value="0" checked>%s</p>','Active');
						printf('<p><input name="active" type="radio" value="1">%s</p>','Finished');
					} else  
					{
						printf('<p><input name="active" type="radio" value="0">%s</p>','Active');
						printf('<p><input name="active" type="radio" value="1" checked>%s</p>','Finished');
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>                                                     
				<br>
              		  	<input type="submit" value="Apply changes">
      			  </form>
			</TD>
		</TR>

 </body>
</html>