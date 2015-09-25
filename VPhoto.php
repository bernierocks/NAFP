<? include "header.php"; ?>

	<hr>
<script language="php">
$org_id = "CCAA";


if (!isset($_GET['page']))
	{
	$page_file = "photos/".$org_id."_photo_index.htm";
	}
else
	{
	$page_file = "photos/".$org_id."_photo_".$_GET['page'].".htm";
	}

if (file_exists($page_file))
	include ($page_file);</script>
	
	
<? include "footer.php"; ?>