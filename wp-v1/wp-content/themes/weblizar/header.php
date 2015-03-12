<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
	<![endif]-->
	<?php $wl_theme_options = weblizar_get_options(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<title><?php wp_title( '|', true, 'right'); ?></title>	
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $wl_theme_options['upload_image_favicon']; ?>" /> 
	<?php } ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div id="menu_wrapper" >
	<div class="top_wrapper">
		<header id="header">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">						
					<div class="col-md-4">
						<div class="navbar-header" id="navbar-header">						  
						  <div class="logo pull-left">							
							<a title="Weblizar" href="<?php echo home_url( '/' ); ?>">
							<?php if($wl_theme_options['text_title'] =="on")
							{ echo get_bloginfo( ); }
							else if($wl_theme_options['upload_image_logo']!='') 
							{ ?>
							<img src="<?php echo $wl_theme_options['upload_image_logo']; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "55"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "150"; } ?>px;" />
							<?php } else { ?> <img src="<?php echo get_template_directory_uri(); ?>/images/web-logo.png" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "55"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "150"; } ?>px;" /><?php  } ?>
							</a>					
						  </div>
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only"><?php _e('Toggle navigation','weblizar'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>
					</div>
					<div class="col-md-8">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <?php wp_nav_menu( array(
							'theme_location'    => 'primary',               
							'container'         => 'nav-collapse collapse navbar-inverse-collapse',							
							'menu_class'        => 'nav navbar-nav navbar-left',
							'fallback_cb'       => 'weblizar_fallback_page_menu',
							'walker'            => new wp_bootstrap_navwalker())
							);  ?>
						</div>
					</div>
					</div>
				</nav>		
			</div>
		</header>
	</div>
</div>