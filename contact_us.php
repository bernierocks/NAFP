<? 
  session_start();
  $title = 'Contact';
  include("header.php"); 
?>

<form method="post" action="contact_us_resp.php" class="form-horizontal" id="contact-form">
	<input type="hidden" name="subject" value="<? echo $title; ?>">
  	<div class="form-group">
    	<label for="contactName" class="col-sm-2 control-label">Name: </label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="Contact_Name" id="" placeholder="Name" value="<? echo $_SESSION['ec_Contact_Name']; ?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="contactPhone" class="col-sm-2 control-label">Phone: </label>
    	<div class="col-sm-10">
      		<input type="tel" name="Phone" class="form-control" id="" placeholder="Phone" value="<? echo $_SESSION['ec_Phone']; ?>">
    	</div>
  	</div>  	
  	<div class="form-group">
    	<label for="contactEmail" class="col-sm-2 control-label">Email: </label>
    	<div class="col-sm-10">
      		<input type="email" class="form-control" id="" name="Email" placeholder="Email" value="<? echo $_SESSION['ec_Email']; ?>">
    	</div>
  	</div>  	
  	<div class="form-group">
    	<label for="contactComments" class="col-sm-2 control-label">Comments: </label>
    	<div class="col-sm-10">
      		<textarea name="Question" class="form-control" rows="7"><?echo $_SESSION['ec_Question'];?>
    		</textarea>
    	</div>
  	</div>
	<?
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$i = 0;
	$cap_code = "";
	while ($i <= 4){
		$num = rand(0,25);
		$tmp = substr($chars, $num, 1);
		$cap_code = $cap_code . $tmp;
		$i++;
	}

	$new_code = $cap_code;


	?>
  	<div class="form-group">
    	<label for="contactCaptcha" class="col-sm-2 control-label">
    		<img src="captcha.php?code=<?echo $new_code; ?>" >
    	</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" id="" placeholder="" maxlength="5" name="security_code">
      		<input type="hidden" name="code" value="<? echo $new_code; ?>">
      		<p>Please enter the letters you see in the image</p>
    	</div>
  	</div>
  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
     		 <input type="submit" class="btn btn-default" value="Submit"></input>
    	</div>
  	</div>
</form>

<!-- <img src="captcha.php?code=<? echo $new_code; ?>" border="1" style="margin-bottom:10px;margin-left:1px;"><br>
<input type="hidden" name="code" value="<? echo $new_code; ?>">
<input type="text" size="15" maxlength="5" name="security_code"><br /><font face="Verdana" size="1">&nbsp;(<font color="red">*</font> Please enter the letters you see in the image above)</font>
<br>
</td>
</tr>
<tr>
<td width="35%">&nbsp;</td>
<td width="65%"><input type="submit" value="Submit"></td>
</tr>

</table>
</form> -->
<? include("footer.php"); ?>