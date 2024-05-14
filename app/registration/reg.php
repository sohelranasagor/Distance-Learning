<?php
	include_once("../../core/reg_services.php");
	$error="";
	$error1="";
	$error2="";
	$error3="";
	$error4="";
	$error5="";
	$error6="";
	$error7="";
	if(isset($_POST['submit']))
	{
		$fName=$_POST['firstName'];
		$lName=$_POST['lastName'];
		$pNo=$_POST['phnNo1'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$cPassword=$_POST['confirmPassword'];
		$dob=$_POST['date'];
		$phnNum=$_POST['phnNo'].$_POST['phnNo1'];
		//$gender=$_POST['gender'];
		$type=2; 
		if($fName=="")
		{
			$error="First name can not empty";
		}
		else if(ord($fName[0])<=57)
		{
			$error= "First name cannot start with a number";
		}
		elseif($lName=="")
		{
			$error1= "Last name cannot empty";
		}
		else if($dob="")
		{
			$error2= "date must be selected";
		}
		else if(!isset($_POST['gender']))
		{
			$error3= "Gender must be selected";
		}
		elseif($pNo="")
		{
			$error4= "phone number cannot empty";
		}
		elseif(strlen($pNo)>10)
		{
			$error4= "phone number is not valid";
		}
		elseif($email=="")
		{
			$error5= "email can not empty";
		}
		elseif(!preg_match('/@.+\.com/',$email))
		{
			$error5= "invalid email";
		}
		elseif($password=="")
		{
			$error6= "password can not empty";
		}
		else if (!preg_match('/[@#$%]/', $password))
		{
			$error6= "Password must contain atleast one of the special characters [@,#,$,%]";
		}
		elseif(strlen($password)>30)
		{
			$error6= "password can contain 30 character";
		}
		elseif($password!=$cPassword)
		{
			$error7= "Password and Confirm password does not match";
		}
		elseif(file_exists("../../core/user_list.json"))
		{
			$current_data=file_get_contents("../../core/user_list.json");
			$array_data=json_decode($current_data,true);
			$extra=array(
				"email"=>$_POST['email'],
				"phoneNo"=> $_POST['phnNo'].$_POST['phnNo1']
			);
			$array_data[]=$extra;
			$final_data=json_encode($array_data);
			if(file_put_contents("../../core/user_list.json",$final_data))
			{
				echo "Success";
				if($_SERVER['REQUEST_METHOD']=="POST"){     
					$fName=$_POST['firstName'];
					$lName=$_POST['lastName'];
					$pNo=$_POST['phnNo1'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					$cPassword=$_POST['confirmPassword'];
					$dob=$_POST['date'];
					$phnNum=$_POST['phnNo'].$_POST['phnNo1'];
					$gender=$_POST['gender'];
					$type=2;   
					$result=addNewUser($fName,$lName,$dob,$gender,$phnNum,$email,$password);
					$results=addNewLog($email,$password,$type);
					if($result && $results){
						header("Location:../../index.php");
					}
				}
			}
		}
		else
		{
			echo "json file not exist";
		}
	}
?>


<html>
	<head>
		<title>Registration</title>
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
							<a href="../../index.php"><font color="white">Login</font></a>&nbsp;&nbsp;<font color="white">|</font>&nbsp;&nbsp;
							<a href="reg.php"><font color="white">Registration</font></a>
						</td>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
			<table border="0" width="100%">
				<tr height="7" bgcolor="#3d1f05">
					<td width="20%"></td>
					<td width="40" height="40">
						<a href="homePage.php">
							<img src="../Logos/homepagelogo.png" width="40" height="40">
						</a>
					</td>
					<td>
						<font color="lightBlue"> <h3>Registration</h3> </font>
					</td>
					<td width="20%"></td>
				</tr>
			</table>
			<table border="0" width="100%">
				<td width="20%"></td>
				<td>
					<table border="1" width="100%" align="center">
                        <tr> <!-- create a table row -->
                            <td align="right">First name:</td> <!-- set table data -->
                            <td><input type="text" name="firstName" placeholder="Please enter your First name" /> <font color="red"><label><?=$error?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Last name:</td>
                            <td><input type="text" name="lastName" placeholder="Please enter your last name" /> <font color="red"><label><?=$error1?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">DOB:</td>
                            <td><input type="date" name="date" /> <font color="red"><label><?=$error2?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Gender:</td>
                            <td><input type="radio" name="gender" value="Male" />Male
                                <input type="radio" name="gender" value="Female" />Female
								<font color="red"><label><?=$error3?></label></font> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Phone no:</td>
                            <td><input type="text" name="phnNo" value="+880" size="1" readonly />
                                <input type="text" name="phnNo1" id="phnNo1" size="13" onblur="searchphn()">
								 <font color="red"><label><?=$error4?></label> <label id="p"></label>
								 </font> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Email:</td>
                            <td><input type="text" name="email" id="email" placeholder="Please enter your email" onblur="search()" /> <font color="red"><label id="e"><?=$error5?></label> <label id="e"></label> </font> </td>
							 
                        </tr>
                        <tr>
                            <td align="right">Password:</td>
                            <td><input type="password" name="password" /> <font color="red"><label><?=$error6?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Confirm Password:</td>
                            <td><input type="password" name="confirmPassword" /> <font color="red"><label><?=$error7?></label></font> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="submit" />  </td>
                        </tr>
					</table>
					<script>
						function search()
						{
							let emails=document.getElementById('email');
							let emailerror=document.getElementById('e');

							let ajax=new XMLHttpRequest();
							ajax.onreadystatechange=function()
							{
								if(this.readyState==4 && this.status==200)
								{
									let data=JSON.parse(ajax.responseText);
									for(var i=0;i<data.length;i++)
									{
										if(data[i].email==emails.value)
										{
											emailerror.innerHTML="Email already exists";
											break;
										}
										else
										{
											emailerror.innerHTML="";
											break;
										}
									}
								}
							}
							ajax.open("GET","../../core/user_list.json",true);
							ajax.send();
						}

						function searchphn()
						{
							
							let phnerror=document.getElementById('p');
							let phn=document.getElementById('phnNo1');

							let ajax=new XMLHttpRequest();
							ajax.onreadystatechange=function()
							{
								if(this.readyState==4 && this.status==200)
								{
									let data=JSON.parse(ajax.responseText);
									for(var i=0;i<data.length;i++)
									{
										if(data[i].phoneNo.substr(4,14)==phn.value)
										{
											phnerror.innerHTML="phone number already exists";
											break;
										}
										else
										{
											phnerror.innerHTML="";
											break;
										}
									}
								}
							}
							ajax.open("GET","../../core/user_list.json",true);
							ajax.send();
						}
					</script>
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



