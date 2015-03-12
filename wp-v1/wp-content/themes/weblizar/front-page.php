<?php get_header(); ?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>        
        <li data-target="#myCarousel" data-slide-to="2"></li>        
      </ol>
      <div class="carousel-inner">
	  <?php $wl_theme_options = weblizar_get_options();
		$ImageUrl1 = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
		$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
		$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";  ?>
        <div class="item active">
			<?php if($wl_theme_options['slide_image']!='') {  ?>
          <img src="<?php echo $wl_theme_options['slide_image']; ?>" class="img-responsive" alt="First slide">
          <?php } else { ?>
		  <img src="<?php echo $ImageUrl1 ?>" class="img-responsive" alt="First slide">
		  <?php } ?>		  
		  <div class="container">
            <div class="carousel-caption">
			<?php if($wl_theme_options['slide_title']!='') {  ?>
              <h1><?php echo $wl_theme_options['slide_title']; ?></h1>
			<?php } 	
			 if($wl_theme_options['slide_desc']!='') {  ?>
			 <p><?php echo $wl_theme_options['slide_desc']; ?></p>
			 <?php }
				if($wl_theme_options['slide_btn_text']!='') { ?>
              <p><a class="btn btn-lg btn-primary" href="<?php if($wl_theme_options['slide_btn_link']!='') { echo $wl_theme_options['slide_btn_link']; } ?>" role="button"><?php echo $wl_theme_options['slide_btn_text']; ?></a></p>
			  <?php } ?>
            </div>
          </div>
        </div>		
        <div class="item">		
			<?php if($wl_theme_options['slide_image_1']!='') {  ?>
          <img src="<?php echo $wl_theme_options['slide_image_1']; ?>" class="img-responsive" alt="Second slide">
          <?php } else { ?>
		  <img src="<?php echo $ImageUrl2 ?>" class="img-responsive" alt="Second slide">
		  <?php } ?>
          <div class="container">
            <div class="carousel-caption">
			<?php if($wl_theme_options['slide_title_1']!='') {  ?>
              <h1><?php echo $wl_theme_options['slide_title_1']; ?></h1>
			<?php } 	
			 if($wl_theme_options['slide_desc_1']!='') {  ?>
			 <p><?php echo $wl_theme_options['slide_desc_1']; ?></p>
			 <?php }
				if($wl_theme_options['slide_btn_text_1']!='') { ?>
              <p><a class="btn btn-lg btn-primary" href="<?php if($wl_theme_options['slide_btn_link_1']!='') { echo $wl_theme_options['slide_btn_link_1']; } ?>" role="button"><?php echo $wl_theme_options['slide_btn_text_1']; ?></a></p>
			  <?php } ?>
            </div>
          </div>
        </div>
		<div class="item">		
			<?php if($wl_theme_options['slide_image_2']!='') {  ?>
          <img src="<?php echo $wl_theme_options['slide_image_2']; ?>" class="img-responsive" alt="Third slide">
          <?php } else { ?>
		  <img src="<?php echo $ImageUrl3 ?>" class="img-responsive" alt="Third slide">
		  <?php } ?>
          <div class="container">
            <div class="carousel-caption">
			<?php if($wl_theme_options['slide_title_2']!='') {  ?>
              <h1><?php echo $wl_theme_options['slide_title_2']; ?></h1>
			<?php } 	
			 if($wl_theme_options['slide_desc_2']!='') {  ?>
			 <p><?php echo $wl_theme_options['slide_desc_2']; ?></p>
			 <?php }
				if($wl_theme_options['slide_btn_text_2']!='') { ?>
              <p><a class="btn btn-lg btn-primary" href="<?php if($wl_theme_options['slide_btn_link_2']!='') { echo $wl_theme_options['slide_btn_link_2']; } ?>" role="button"><?php echo $wl_theme_options['slide_btn_text_2']; ?></a></p>
			  <?php } ?>
            </div>
          </div>
        </div>
		
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
<div class="content-wrapper">    
	<div class="body-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="center-title">
						<?php if($wl_theme_options['site_intro_title']!='') { ?>
						<div class="heading-title">
							<h2 class="h2-section-title"><?php echo $wl_theme_options['site_intro_title']; ?></h2>
						</div>
						<?php } ?>
						<?php if($wl_theme_options['site_intro_text']!='') { ?>
						<p> <?php echo $wl_theme_options['site_intro_text']; ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="space-sep60"></div>	
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if($wl_theme_options['service_1_title']) { ?>
						<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_1_icons']) { echo $wl_theme_options['service_1_icons']; } ?>"></i><?php echo $wl_theme_options['service_1_title'];   ?></h4>
						<?php } ?>
						<div class="content-box-text">
							<?php if($wl_theme_options['service_1_text']) { echo $wl_theme_options['service_1_text']; } ?>
							<div><a href="<?php if($wl_theme_options['service_1_link']) { echo $wl_theme_options['service_1_link']; } ?>" class="read-more "><span><?php _e('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if($wl_theme_options['service_2_title']) { ?>
						<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_2_icons']) { echo $wl_theme_options['service_2_icons']; } ?>"></i><?php echo $wl_theme_options['service_2_title'];   ?></h4>
						<?php } ?>
						<div class="content-box-text">
							<?php if($wl_theme_options['service_2_text']) { echo $wl_theme_options['service_2_text']; } ?>
							<div><a href="<?php if($wl_theme_options['service_2_link']) { echo $wl_theme_options['service_2_link']; } ?>" class="read-more "><span><?php _e('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if($wl_theme_options['service_3_title']) { ?>
						<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_3_icons']) { echo $wl_theme_options['service_3_icons']; } ?>"></i><?php echo $wl_theme_options['service_3_title'];   ?></h4>
						<?php } ?>
						<div class="content-box-text">
							<?php if($wl_theme_options['service_3_text']) { echo $wl_theme_options['service_3_text']; } ?>
							<div><a href="<?php if($wl_theme_options['service_3_link']) { echo $wl_theme_options['service_3_link']; } ?>" class="read-more "><span><?php _e('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="content-box content-style2 anim-opacity animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0.2s" style="-webkit-animation: 1s 0.2s;">	
						<?php if($wl_theme_options['service_4_title']) { ?>
						<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_4_icons']) { echo $wl_theme_options['service_4_icons']; } ?>"></i><?php echo $wl_theme_options['service_4_title'];   ?></h4>
						<?php } ?>
						<div class="content-box-text">
							<?php if($wl_theme_options['service_4_text']) { echo $wl_theme_options['service_4_text']; } ?>
							<div><a href="<?php if($wl_theme_options['service_4_link']) { echo $wl_theme_options['service_4_link']; } ?>" class="read-more "><span><?php _e('read more', 'weblizar'); ?></span></a></div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="space-sep60"></div>			
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="center-title">
						<?php 
							if($wl_theme_options['blog_title']) { ?>
						<div class="heading-title">
							<h2 class="h2-section-title"><?php echo $wl_theme_options['blog_title']; ?></h2>
						</div>
						<?php } ?>
						<?php if($wl_theme_options['blog_text']) { ?>
						<p><?php echo $wl_theme_options['blog_text']; ?> </p>
						<?php } ?>
						<div class="space-sep20"></div>
					</div>
				</div>
			</div>
			<div class="row">
			<?php	
				$args = array( 'post_type' => 'post', 'posts_per_page' => 3,'ignore_sticky_posts' => 1);		
				$post_type_data = new WP_Query( $args );
				while($post_type_data->have_posts()):
				$post_type_data->the_post();
				global $more;	$more = 0; ?>							
				<div class="col-md-4 col-sm-4">
					<div class="feature animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0s" style="-webkit-animation: 1s 0s;">
						<div class="feature-image img-overlay">							
							<?php if(has_post_thumbnail()): ?>
							<?php $default=array('class'=>'img-responsive'); 
								the_post_thumbnail('wl_blog_img', $default); ?>
							<?php endif; ?>		
						</div>			
						<div class="feature-content">
							<h3 class="h3-blog-title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?>	</a></h3>
							
								<?php the_excerpt(); ?>
							
						</div>
						<div class="feature-details">
							<span><i class="icon-picture"></i></span>					
							<span><i class="icon-time"></i><?php echo get_the_date('j'); ?> <?php echo the_time('M'); ?>, <?php echo the_time('Y'); ?></span>
							<span><i class="icon-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></span>					
						</div>		
					</div>
				</div>
			<?php endwhile; ?>		
			</div>
		</div>
	</div>
</div><!--.content-wrapper end -->
<?php get_footer(); ?>