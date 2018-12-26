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
			  <a href="add_patient.html"> <P>Add new patient</P> </a>
			  <a href="add_conc.html"> <P>Add info about new plague</P> </a>
			  <a href="add_spec.html"> <P>Add new specialization</P> </a>
			</TD>			<TD>
			  <P>Add doctor:</P>
			  <form action="add_doctor_form_action.php" method="post">
          		  	Fullname: <input type="text" name="fullname">
          		  	<br>
				Diploma (yes - 1 / no - 0): <input type="number" name="diploma">
          		  	<br>
				Worktime (HH-HH (like 0900-1500)): <input type="text" name="worktime">
				<br>
				Spec: 
				<select name="spec_id">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect('10.14.129.132', 'GurinovAjtal', 'CB5LagBA','GurinovAjtalDB')					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT idSpec, SpecName FROM Spec';
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
            		  	<input type="submit" value="Add doctor">
      			  </form>
			</TD>
		</TR>

 </body>
</html>