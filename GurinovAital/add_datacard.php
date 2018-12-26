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
			  <a href="ShowmeDoctor.php"> <P>All our doctors</P> </a>
			  <a href="ShowmeConclusion.php"> <P>Conclusion list</P> </a>
			  <a href="ShowmePatients.php"> <P>Our patients</P> </a>
			  <a href="ShowmeDatacard.php"> <P>Datacards</P> </a>
			  <a href="ShowmeSpec.php"> <P>All doctor's specs</P> </a>
			  <a href="ShowmeSession.php"> <P>Sessions</P> </a>
			  <br>
			  <a href="add_patient.html"> <P>Add new patient</P> </a>
			  <a href="add_doctor.php"> <P>Add doctor</P> </a>
			  <a href="add_conc.html"> <P>Add info about new plague</P> </a>
			  <a href="add_spec.html"> <P>Add new specialization</P> </a>
			  <a href="add_session.php"> <P>Add new session</P> </a>
			</TD>			<TD>
			  <P>Add new datacard:</P>
			  <form action="add_datacard_form_action.php" method="post">
				<br>
				Select patient:
				<select name="patient">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idPatient, FullName FROM Patient';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%s</option>',$result[0],$result[1]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>
				<br>
				Select session: 
				<select name="session">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idSession, FullName, Date, Time FROM Session inner join Doctor on Doctor.idDoctor=Session.Doctor';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%s %s %s %s %s</option>',$result[0],$result[1],' / ',$result[2],' / ',$result[3]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>

				<br>
            		  	<input type="submit" value="Add new datacard">
      			  </form>
			</TD>
		</TR>

 </body>
</html>