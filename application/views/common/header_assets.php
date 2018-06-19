
<!DOCTYPE html>

<html lang="en">
	<head>

		<title><?=$title?></title>




	<!-- ########################################## META TAG START  ########################################-->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- ########################################## META TAG END########################################-->




	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////  -->



	<!-- ########################################## FONT SRC START  ########################################-->

			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
			<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
			crossorigin="anonymous">

	<!-- ########################################## FONT SRC END##################################################-->







	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////  -->






	<!-- ########################################## STYLESHEET START  #############################################-->

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?=site_url('assets/phasons/owl/docs.theme.min.css')?>">
			<link rel="stylesheet" type="text/css" href="<?=site_url('assets/phasons/main.css')?>">
			<link rel="stylesheet" type="text/css" href="<?=site_url('assets/phasons/login.css')?>">
	<?php
	  if(!empty($css))
	  {  
	  	foreach ($css as $key => $value)
	  	{
	     ?>

	     	<link rel="stylesheet" type="text/css" href="<?= $value ?>">

	     <?
	  	}
	  }
	?>
	<!-- Owl Stylesheets -->
			<link rel="stylesheet" href="<?=site_url('assets/phasons/owl/owl.carousel.min.css')?>">

	<!-- ########################################## STYLESHEET END ###########################################-->






	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->






	<!-- ########################################## JAVASCRIPT SRC START  ########################################-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- owl js -->
		<script src="<?=site_url('assets/phasons/owl/owl.carousel.js')?>"></script>
		<script type="text/javascript" src="<?=site_url('assets/js/main.js')?>"></script>

<?php
  if(!empty($js))
  {
  	foreach ($js as $key => $value) {
       ?>

         <script type="text/javascript" src="<?=$value?>"></script>

       <?		
  	}
  }
?>

		<script type="text/javascript">
            function base_url()	{ return "<?= base_url()?>"; }
            function site_url(uri) { return base_url() + "index.php/" + uri; }
        </script>

	<!-- ########################################## JAVASCRIPT SRC END  ########################################-->

	
	</head>