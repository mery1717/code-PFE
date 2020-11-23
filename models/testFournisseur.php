<!DOCTYPE html>
<html lang ="en">
<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>testFournisseur</title>	
</head>
<body>
	<h2>Sample table</h2>
	<div id="result"></div>
</body>
<script src="jquery-3.1.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		showPost();
		$(document).on('click','.delete',function(){
			var id=$(this).val();
			$.ajax({
				type: "POST",
				url:"delete.php",
				data:{
					id: id,
					delpost: 1,
				},
				success: function(){
					showPost();
				}
			});
		});
		/****************  ****/
	});
	function showPost(){
		$.ajax({
			url: 'show_table.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(reponse){

				$('#result').html(reponse);
			}
		});
	}
</script>
</html>