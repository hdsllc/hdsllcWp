<?php
/*
Template Name: HeaderHome
*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="keywords" content="health delivery science, healthdeliveryscience, healthdeliveryscience.com, healthcare delivery, value, health, healthcare, healthcare consulting, healthcare value, medicine, doctors, MD, MDs, qualified, solution design, implement, strategies, healthcare readmissions, ACO, ACOs, Accountable Care Organiation, Accountable Care Organizations, primary-care, primary care, specialty-care, specialty care, primary specialty care bridge, bridging, community partnerships, care-coordination, care coordination, coordination, chronic disease management, military health systems, tribal health systems, palliative care, palliative, pcmh, patient centerd medical home, patient-centered medical home, post-acute, post-acute transitions, post-acute care transitions, after-hospital transitions, post-hospital transitions, post-hospital care, after-hospital care, readmissions, Naylor, Coleman, transitional care, care transitions, re-engineered discharge, re-engineering discharge, project RED, projectRED, RED, reducing readmissions, readmissions reduction, rural medicine" />
	<meta name="description" content="Health Delivery Science: Better Value. Better Results. Better Care.  With a unique combination of health care experience and expertise, Health Delivery Science helps design, implement, and evaluate strategies for delivering health care value to patients, providers, purchasers, and payers." />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">

			<nav id="menu" class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home"><img class="logo" src="<?php echo get_attachment_url_by_slug('logo-white'); ?>" /></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <?php /* Primary navigation */
							wp_nav_menu( array(
							  'menu' => 'Main Navigation',
							  'depth' => 1,
							  'container' => false,
							  'menu_class' => 'nav navbar-nav navbar-right',
							  //Process nav menu using our custom nav walker
							  'walker' => new wp_bootstrap_navwalker())
							);
						?>


			      <!-- <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Link</a></li>
			        <li><a href="#">Link</a></li>
			        <li><a href="#">Link</a></li>
			        <li><a href="#">Link</a></li>
			        <li><a href="#">Link</a></li>
			      </ul> -->
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

		</header>
	<div id="container">