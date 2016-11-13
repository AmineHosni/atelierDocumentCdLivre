<html>
<head>
	<meta charset="utf-8">
	<script src="../jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../styleTableau.css">
</head>

<body>
	<h1>Recherche Livre</h1>
		<input type="text" placeholder="référence Livre" name="search" id="search" autocomplete="off">
		<div id="here"></div>
		<div id="result"></div>
</body>
</html>

<script>
	$(document).ready(function(){

		$('#search').keyup(function(){
			$('#result').hide();
			$('#here').show();
			var x = $(this).val();
			$.ajax({
				type:'GET',
				url:'livesearch.php',
				data:'q='+x,
				success:function(data){
					$('#here').html(data)
				}
			});
		});
		

			
	});
</script>
<script>
	function showResults(str)
	{
		if($('#search').lenght==0)
		{
			$('#result').hide();
		}
		var xhr = new XMLHttpRequest();
		xhr.open("GET","recherche.php?ref="+str,true);
		xhr.send();

		xhr.onreadystatechange = function(){
			$('#result').show();
			document.getElementById("result").innerHTML = xhr.responseText;
		};
		$('#here').hide();
	}
</script>