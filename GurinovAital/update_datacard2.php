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
			  <form action="upd_datacard2_form_action.php" method="post">
				Select datacard: 
				<select name="dc">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idCard, FullName, Session, Name FROM Datacard inner join Patient on Datacard.Patient=Patient.idPatient inner join Conclusion on Conclusion.idConc=Datacard.Conclusion';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%d %s %s %s %s %s %s</option>',$result[0],$result[0],'/',$result[1],'/',$result[2],'/',$result[3]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>
				<br>
				Switch conclusion: 
				<select name="ccc">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idConc, Name, InitialT FROM Conclusion';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%s %s %s</option>',$result[0],$result[1],' / ',$result[2]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>
				<br>
              		  	<input type="submit" value="Apply changes">
      			  </form>
			</TD>
		</TR>

 </body>
</html>