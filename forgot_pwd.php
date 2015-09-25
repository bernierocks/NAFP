<? 
$title = "Password Recovery"; 
$aux_1 = ""; 
$parent_title = ""; 
$parent_id = ""; 
$sub_nav_file = ""; 
$keywords = ""; 
$description = ""; 
$site_code = ""; 
include("header.php"); 
require_once('includes/config.php');
?>
<table align="center">
	<tr>
	 	<td width="51%" valign="top">
			<p align="center"><b><font face="Verdana">Forgot Your Password?</font></b></p>
            <form method="POST" action="http://<?=$server_name;?>/members/pwordhint.php">
              <blockquote> 
                <p><font face="Verdana" size="2">Enter your username or email 
                  address and click on the button below to have your password 
                  emailed to you.</font></p>
              </blockquote>
              <p align="center"><font face="Verdana" size="2">Username or Email: 
                </font> 
                <input type="text" name="Username" size="35">

              </p>
              <p align="center"> 
                <input type="submit" value="Email me my password" name="B1">
              </p>
            </form>
    	</td>
  	</tr>
</table>
<?php include ("footer.php"); ?>