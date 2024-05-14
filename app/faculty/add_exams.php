<?php
    session_start();
	if(!isset($_SESSION['email']))
	{
		header("Location:../../index.php");
    }
    $courseid=$_SESSION['courseId'];
    $email=$_SESSION['email'];
    include_once("../../core/faculty_services.php");
    $facultyemail=$_SESSION['email'];
    $result=loadFaculty($facultyemail);
    if($_SERVER['REQUEST_METHOD']=="POST"){

		$instructor=$result['facultyname'];
        for($i=0;$i<count($_FILES['files']['name']);$i++)
        {
            $info = pathinfo($_FILES['files']['name'][$i]);

            // $ext = $info['extension'];
            $newname = $_FILES['files']['name'][$i];

            $target = 'exams/' . $newname;

            move_uploaded_file($_FILES['files']["tmp_name"][$i], $target);
            $result1=addNewExams($courseid,$instructor,$target);
            if($result1)
			{
				header("Location:faculty_home.php");
			}
        }

    }
    //$result1=addNewAssignment($courseid,$email,$insertValuesSQL);
?>

<html>
	<head>
		<title>Add Exams</title>
		<style>
			table {
			  border-collapse: collapse;
			  margin: 0px;
			  border: 0px;
			}

			table, td, th {
			  border: 1px solid black;
			  margin: 0px;
			  border: 0px;
			}
			body{
				margin: 0px;
			  	border: 0px;
			}
		</style>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<table border="0" width="100%">
				<tr height="15%" bgcolor="#553819">
					<td width="20%"></td>
					<td valign="top"> <h2> <b> <font color="#ec9000">E-VARSITY</font><font color="white">OPENCOURSEWARE</font> </b> </h2>
						<td width="30%" valign="top" align="right">
							<a href="http://www.facebook.com/">
								<img src="../Logos/fb.png" width="40" height="40" alt="Click to visit our facebook page">
							</a>
							<a href="http://www.twitter.com/">
								<img src="../Logos/twitter.png" width="40" height="40" alt="Click to visit our twitter page">
							</a>
							<a href="http://www.youtube.com/">
								<img src="../Logos/youtube.png" width="40" height="40" alt="Click to visit our youtube page">
							</a>
							<a href="http://www.wikipidia.com/">
								<img src="../Logos/wiki.png" width="40" height="40" alt="Click to visit our wikipidia page">
							</a> <br/><br/>
							<a href="../../core/logout.php"><font color="white">Logout</font></a>&nbsp;&nbsp;
						</td>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
			<table border="0" width="100%">
				<tr height="7" bgcolor="#3d1f05">
					<td width="20%"></td>
					<td width="40" height="40">
                        <style>
                                
                            #ul {
                            list-style-type: none;
                            margin: 0px;
                            padding: 0px;
                            overflow: hidden;
                            background-color: #3d1f05;
                            }

                            #q{
                            float: left;
                            }

                            #q a {
                            display: block;
                            color: white;
                            text-align: center;
                            padding: 14px 16px;
                            text-decoration: none;
                            }

                            #q a:hover {
                            background-color: #111;
                            }
                        </style>
                        <ul id="ul">
                            <li id="q"><a class="active" href="faculty_home.php">Home</a></li>


                        </ul>
					</td>
					<td>
						<font color="lightBlue"> <h3></h3> </font>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
			<table border="0" width="100%">
				<td width="20%"></td>
				<td>
					<table border="0" width="100%" align="center">
                        <tr>
                            <td align="right">Exams:</td>
                            <td><input type="file" name="files[]" multiple></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="submit" /></td>
                        </tr>
					</table>
				</td>
				<td width="20%"></td>
			</table>
			<hr size="3" color="black"/>
			<table border="0" width="100%">
				<tr>
					<td width="20%"></td>
					<td width="35%">
						<h2> <b> About </b> </h2>
						<ul type="circle">
							<li> <a href="about.php"><font color="#de312d">About OpenCourseWare </font> </a> </li>
							<li> <a href="help.php"><font color="#de312d">Help & FAQs </font> </a> </li>
							<li> <a href="contact.php"><font color="#de312d">Contact Us </font> </a> </li>
							<li> <a href="privacy.php"><font color="#de312d">Privacy & Terms of Use </font> </a> </li>
						</ul>
						<vr>
					</td>
					<td width="25%" valign="top">
						<table border="0">
							<tr>
								<td valign="top">OUR CORPORATE SUPPORTERS</td>
							</tr>
							<tr>
								<td>
									<a href="https://www.accenture.com/us-en/">
									<img src="../Logos/accenture.png" width="150" height="70" alt="Click to visit our facebook page">
									</a>
									<a href="https://www.mathworks.com/">
									<img src="../Logos/mathworks.png" width="150" height="70" alt="Click to visit our facebook page">
									</a><br/>
									<a href="https://www.dow.com/en-us/">
									<img src="../Logos/dow.png" width="150" height="70" alt="Click to visit our facebook page">
									</a>
									<a href="http://www.abinitio.com/en/">
									<img src="../Logos/abinito.png" width="150" height="70" alt="Click to visit our facebook page">
									</a>
								</td>
							</tr>
						</table>
					</td>
					<td width="20%"></td>
				</tr>
				<tr>
					<td width="20%"></td>
					<td colspan="2">
						<hr>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

