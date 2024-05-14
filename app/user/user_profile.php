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
	$error3="";
	$error4="";
    $error5="";
    $user=loadUser($_SESSION['email']);
    $userFirstName=$user['firstName'];
    $userLastNamme=$user['lastName'];
    $userPhn=substr($user['phnNo'],4,14);
    $userEmail=$user['email'];
    $userid=$user['uid'];
	if(isset($_POST['update']))
	{
		$fName=$_POST['firstName'];
		$lName=$_POST['lastName'];
		$pNo=$_POST['phnNo1'];
		$email=$_POST['email'];
		$phnNum=$_POST['phnNo'].$_POST['phnNo1']; 
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
        if($_SERVER['REQUEST_METHOD']=="POST"){     
            $result=updateUser($fName,$lName,$phnNum,$email,$userid);
            if($result)
            {
                header("Location:user_home.php");
            }
        }
    }
    if(isset($_POST['delete']))
    {
        $result1=removeUser($userid);
        $result2=removeUserFromLog($_SESSION['email']);

        $data = file_get_contents('../../core/user_list.json');
        $json_arr = json_decode($data, true);
        $arr_index = array();
        foreach ($json_arr as $key => $value) {
            if ($value['email'] == $_SESSION['email']) {
                $arr_index[] = $key;
            }
        }
        foreach ($arr_index as $i) {
            unset($json_arr[$i]);
        }
        $json_arr = array_values($json_arr);
        file_put_contents('../../core/user_list.json', json_encode($json_arr));
        
        if($result1 && $result2)
        {
            header("Location:../../index.php");
        }
    }	
?>


<html>
	<head>
		<title>My Profile</title>
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
                            <td align="right">First name:</td> <!-- set table data -->
                            <td><input type="text" name="firstName" placeholder="Please enter your First name" value="<?=$userFirstName;?>" /> <font color="red"><label><?=$error?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Last name:</td>
                            <td><input type="text" name="lastName" placeholder="Please enter your last name" value="<?=$userLastNamme;?>" /> <font color="red"><label><?=$error1?></label></font> </td>
                        </tr>
                        <tr>
                            <td align="right">Phone no:</td>
                            <td><input type="text" name="phnNo" value="+880" size="1" readonly />
                                <input type="text" name="phnNo1" id="phnNo1" size="13" value="<?=$userPhn;?>" onblur="searchphn()">
								 <font color="red"><label><?=$error4?></label> <label id="p"></label>
								 </font> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Email:</td>
                            <td><input type="text" name="email" id="email" placeholder="Please enter your email" value="<?=$userEmail;?>" onblur="search()" /> <font color="red"><label id="e"><?=$error5?></label> <label id="e"></label> </font> </td>
							 
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update" value="Update" />
                                <input type="submit" name="delete" value="Delete" />
                            </td>
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



