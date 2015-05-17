<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>XAMPP</title>
<script type="text/javascript" src="xampp-js/jquery-1.11.3.min.js"></script>
<style>
body {
	background-image:url('img/Batman.jpg');
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center center;
}
a {
	text-decoration:none;
}
.hostname {
	padding:20px;
	font-size: 350%;
	font-weight:600;
	color:#0266C8;
	text-align:center;
	display:block;
}
.header {
	display:inline-block;
	width:75%;
	margin:0px 10%;
	
}
.google {
	float:left;
	margin-bottom:10px;
}
.phpmyadmin {
	float:right;
	margin-bottom:10px;
}
.util-logo {
	display:block;
	font-size:130%;
}
.search {
	margin:0px 37%;
}
.search-input {
	width:300px;
	height:50px;
	font-size:150%;
}
.dir-list {
	display:inline-block;
}
.a_link {
	display:inline-block;
	min-width:20%;
	height:30px;
	background-color:#E3E3E3;
	border:1px solid #eee;
	border-radius:20px;
	padding:10px;margin:5px 5%;
	font-size:130%;
	text-align:center;
	color: #D63333;
}
</style>
</head>
<body>
<div class="hostname">
<?php 
	echo gethostname().'<br/>';
?>
</div>
	
<div class="header">
	
	<a class="google" href="http://google.com/">
		<div class="util-logo">
			<img src="http://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Logo_Google_2013_Official.svg/251px-Logo_Google_2013_Official.svg.png" alt="Google" width="164" />
		</div>
	</a>
		
	<a class="phpmyadmin" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/phpmyadmin">
		<div class="util-logo">
			<img src="https://cp6.awardspace.net/phpMyAdmin/themes/awardspace/img/logo_right.png" alt="PHP-MyAdmin" width="164" height="56" />
		</div>
	</a>
	
	<div class="search">
		<input class="search-input" type="text"  id="input_text" placeholder="Search Here..">
	</div>	
	
</div>

<div class="dir-list">
<?php
if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {

?>		

<?php		
			$id1	=	str_replace('.', '_', $entry);
			$id		=	str_replace(' ', '_', $id1);
			$id		=	strtolower($id);
            echo '<a target="_blank" href="http://'.$_SERVER['HTTP_HOST'].'/'.$entry.'" ><div id="'.$id.'" class="a_link"><em>'.$entry.'</em></div></a>';
?>
     
<?php
		}
    }
    closedir($handle);
}
?>
</div>

<footer>
<script>
$( document ).ready(function() {
	$( "#input_text" ).focus();
	$( "#input_text" ).keyup(function() {
	$( ".a_link" ).show();
	
	in_text	=	this.value;
	in_text2	=	in_text.replace('.', '_');
	in_text3	=	in_text2.replace(' ', '_');
	input_text	=	in_text3.toLowerCase();
		  $( ".a_link" ).each(function() {
			var div_id	=	$(this).attr('id');
				var pattern = new RegExp(input_text);
				var result = pattern.test(div_id);
				if(result === false){
					// console.log(div_id+'  '+input_text);
					$('#'+div_id).hide();
				}else{
					// console.log(div_id+'  '+input_text);
					$('#'+div_id).show();
				}
			});
	});
});

</script>
</footer>	
</body>
</html>
