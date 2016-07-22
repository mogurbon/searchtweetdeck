

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title>Complex Layout Demo</title>

	<!-- DEMO styles - specific to this page -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/complex.css" />
	<!--[if lte IE 7]>
		<style type="text/css"> body { font-size: 85%; } </style>
	<![endif]-->

	<script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery.layout-latest.js"></script>
	 
	<script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/complex.js"></script>
	<!--<script type="text/javascript" src="/lib/js/debug.js"></script> -->

<script type="text/javascript">


</script>

<style type="text/css">
	.column {float: left; height: 100%;}
</style>
</head>
<body>

<div class="ui-layout-west">

	<div class="header">Busqueda</div>
 
	<div class="content">
		<h3><b></b></h3>
		<form id="form">
			<input type="text" name="busqueda" id="busqueda">
			<br>
			<input type="button" name="buscar" id="buscar" value="Buscar">
		</form>
	</div> 

	<div class="footer">busqueda</div>

</div>


<div id="mainContent">
	<!-- DIVs for the INNER LAYOUT -->

	<div class="ui-layout-center">
		<h3 class="header">Tweets</h3>
		 <div class="ui-layout-content" id="content_tweets">
			<div class="column">1</div>
			<div class="column">2</div>
			<div class="column">3</div>
		</div>
		
	</div>

	
</div>


</body>


<script type="text/javascript">
	$(document).ready(function() {
		$('#buscar').click(function(event) {
			event.preventDefault();
			$.ajax({
			  method: "POST",
			  url: "<?php echo site_url(['inicio','searchTweets']) ?>",
			  data: { word: $('#busqueda').val()},
			  dataType: "json"
			})
			  .done(function( data ) {
			      
			      
			      var cont =1;
			      var num=1;
			      var total=data.length;
			      
			      var html ='<div class="column"><ul>';
			      $.each( data, function( key, val ) {
				    
				    	html += "<li id='" + num  + "'>" + val.screen_name + ":"+ val.text+" </li>";
				    	if (cont==10 ){
				    		html+='</ul></div><div class="column">';
				    		cont=1;
				    	}
				    	if(num==total){
				    		html+='</ul></div>';
				    	}
				    	cont++;
				    	num++;
				  });
				  //console.log(html);
				  $('#content_tweets').html(html);
				  
			  });
		});
	});
</script>
</html> 