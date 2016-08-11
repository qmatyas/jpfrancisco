<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" hola_ext_inject="disabled">
	<head>   
	 	<title>
	 	</title>   
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>	
    	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    	<link href="<?php echo get_template_directory_uri(); ?>/src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   

    	<?php wp_head(); ?>
	    <!--[if lt IE 9]>
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
    
	</head> 
	 <body <?php body_class(); ?>>
	 	<nav class="navbar">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Jean-Pierre Francisco</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        	<li id="nav-link"><a href="#about">Parcours</a></li>
		            <li id="nav-link" ><a href="#project">Projets</a></li>
		            <li id="nav-link" ><a href="#diplome">Diplôme</a></li>
		            <li id="nav-link" ><a href="#stage">Stages</a></li>
		            <li id="nav-link" ><a href="#contact">Contact</a></li>
		      </ul>
		    </div>
		    <div class="hidden-xs navbar-contact">
		    	<p>
		    		dansejazzone@free.fr <br>
		    		tel : 06 80 64 52 94
		    	</p>
		    </div>
		  </div>
		</nav>