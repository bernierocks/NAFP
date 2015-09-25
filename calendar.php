<? 
$title = "Calendar of Events";
include "header.php"; ?>

<p align="center">
<a href="http://www.<? echo $svr_name; ?>/members/calendar2.php?org_id=<? echo $org_id; ?>">Click here for a Calendar-format version</a>
</p>
	       <table border="0" cellpadding="4" cellspacing="4" width="100%">
            <tr>
              <td width="48%" align="left"><font color="#000000" face="Verdana" size="2">Event</font></th>
              <td width="17%" align="left"><font color="#000000" face="Verdana" size="2">Date</font></th>
              <td width="15%" align="left"><font color="#000000" face="Verdana" size="2">Time</font></th>
              <td width="20%" align="left"><font color="#000000" face="Verdana" size="2">Contact</font></th>
            </tr>
            <tr>
              <td width="48%"></td>
              <td width="17%"></td>
              <td width="15%"></td>
              <td width="20%"></td>
            </tr>
            
<script language="php">
include ("cal".$org_id."2.htm");
</script>

			</table><br>
			<br>
<p align="center">
<a href="http://www.<? echo $svr_name; ?>/members/calendar2.php?org_id=<? echo $org_id; ?>">Click here for a Calendar-format version</a>
</p>

<? include "footer.php"; ?>