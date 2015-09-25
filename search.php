<? 
include('includes/config.php');
include("header.php"); 

?>
		
<!-- Google Search Result Snippet Begins -->
	<div id="cse" style="width: 98%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  function parseQueryFromUrl () {
    var queryParamName = "q";
    var search = window.location.search.substr(1);
    var parts = search.split('&');
    for (var i = 0; i < parts.length; i++) {
      var keyvaluepair = parts[i].split('=');
      if (decodeURIComponent(keyvaluepair[0]) == queryParamName) {
        return decodeURIComponent(keyvaluepair[1].replace(/\+/g, ' '));
      }
    }
    return '';
  }

  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl(
      '<?=$search_code?>');

    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    customSearchControl.draw('cse');
    var queryFromUrl = parseQueryFromUrl();
    if (queryFromUrl) {
      customSearchControl.execute(queryFromUrl);
    }
  }, true);
</script>
<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
<? include("footer.php"); ?>