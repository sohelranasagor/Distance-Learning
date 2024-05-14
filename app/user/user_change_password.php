<?php
    session_start();
	if(!isset($_SESSION['email']))
	{
		header("Location:../../index.php");
	}
	include_once("../../core/user_services.php");
	$error="";
	$error1="";
	$error2="";
    $user=loadUser($_SESSION['email']);
    $userPass=$user['password'];
	if(isset($_POST['change']))
	{
        $oldPass=$_POST['oldPass'];
        $newPass=$_POST['newPass'];
        $cPass=$_POST['confirmPass'];
        
        if($oldPass=="")
		{
			$error= "Old password can not empty";
        }
        elseif($userPass!=$oldPass)
        {
            $error="Old password is not Match";
        }
        elseif($newPass=="")
		{
			$error1= "New password can not empty";
        }
        else if (!preg_match('/[@#$%]/', $newPass))
		{
			$error1="Password must contain atleast one of the special characters [@,#,$,%]";
		}
		elseif(strlen($newPass)>30)
		{
			$error1="password can contain 30 character";
		}
		elseif($newPass!=$cPass)
		{
			$error2= "New password and Confirm password does not match";
		}
        elseif($_SERVER['REQUEST_METHOD']=="POST"){     
            $result=updatePassword($_SESSION['email'],$cPass);
            $result1=updatePasswordFromLog($_SESSION['email'],$cPass);
            if($result && $result1)
            {
                header("Location:user_home.php");
            }
        }
    }	
?>


<html>
	<head>
		<title>Change Password</title>
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
		<form method="post">
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

                        #border{
                            border-collapse: collapse;
                            border: 1px solid black;
                        }
                        </style>
                        <ul id="ul">
                            <li id="q"><a class="active" href="user_home.php">Home</a></li>
    
                        </ul>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
			<table border="0" width="100%">
				<td width="20%"></td>
				<td>
					<table border="1" width="100%" align="center">
                        <tr> <!-- create a table row -->
                            <td align="right">Old Password:</td> <!-- set table data -->
                            <td><input type="password" name="oldPass" placeholder="Please enter your Old password"/> <font color="red"><label><?=$error?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">New Password:</td>
                            <td><input type="password" name="newPass" placeholder="Please enter your new password" /> <font color="red"><label><?=$error1?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Confirm Password:</td>
                            <td><input type="password" name="confirmPass" placeholder="Please enter your confirm password" /> <font color="red"><label><?=$error2?></label></font> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="change" value="Change" />
                            </td>
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



