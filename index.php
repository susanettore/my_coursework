<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("phppot_examples",$conn);
$result = mysql_query("SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_id"] = $row[user_id];
$_SESSION["user_name"] = $row[user_name];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["user_id"])) {
header("Location:user_dashboard.php");
}
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div class="message">?></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2" bgcolor="Blue"><b><h1>Your Details</h1></b></td>
</tr>
<tr class="tablerow" >
<td align="right">Username</td>
<td><input type="text" name="user_name"></td>
</tr>
<tr class="tablerow" >
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Send"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><a href="register.php">Sign Up</a></td>
</tr>
</table>
</form>
</body></html>