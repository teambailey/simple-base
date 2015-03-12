<?php
/*	*Theme Name	: Weblizar
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('WL_TEMPLATE_DIR', get_template_directory());
	define('WL_TEMPLATE_DIR_CORE' , WL_TEMPLATE_DIR . '/core');
	
	require( WL_TEMPLATE_DIR_CORE . '/menu/wp_bootstrap_navwalker.php' ); // for Default Menus
	require( WL_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' ); // for Default Menus
	require( WL_TEMPLATE_DIR_CORE . '/comment-box/comment-function.php' ); //for comments
	require( WL_TEMPLATE_DIR_CORE . '/plugin-activation.php');
	
	//Sane Defaults
	
	function weblizar_default_settings()
	{
		$ImageUrl1 = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
		$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
		$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";
		$wl_theme_options=array(
				//Logo and Fevicon header			
				'upload_image_logo'=>'',
				'height'=>'55',
				'width'=>'150',
				'text_title'=>'off',
				'upload_image_favicon'=>'',			
				'custom_css'=>'',
				'slide_image' => $ImageUrl1,
				'slide_title' => 'Neque porro ',
				'slide_desc' => ' dolorem ipsum quia dolor sit amet,',
				'slide_btn_text' => 'Read More',
				'slide_btn_link' => '#',
				'slide_image_1' => $ImageUrl2,
				'slide_title_1' => 'Vonsectetur, adipisci velit...',
				'slide_desc_1' => 'satu fakta bahawa pembaca akan terganggus',
				'slide_btn_text_1' => 'Read More',
				'slide_btn_link_1' => '#',
				'slide_image_2' => $ImageUrl3,
				'slide_title_2' => 'echo establecido hace demasia.',
				'slide_desc_2' => 'es simplemente el texto de relleno de las imprentas y archivos de texto.',
				'slide_btn_text_2' => 'Read More',
				'slide_btn_link_2' => '#',
				
				
				'site_intro_title'=>'We are weblizar',
				'site_intro_text'=>"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.",
				'blog_title'=>'Latest Blog',
				'blog_text'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry..",
				
				//Social media links
				'social_media_in_contact_page_enabled'=>'on',
				'footer_section_social_media_enbled'=>'on',
				'social_media_twitter_link' =>"https://twitter.com/",
				'social_media_facebook_link' =>"https://facebook.com",
				'social_media_linkedin_link' =>"http://linkedin.com/",
				'social_media_google_plus' =>"https://plus.google.com/",

				'footer_customizations' => ' @ 2014 Weblizar Theme',
				'developed_by_text' => 'Theme Developed By',
				'developed_by_weblizar_text' => 'weblizar',
				'developed_by_link' => 'http://weblizar.com/',
				
				'service_1_title'=>"Idea",
				'service_1_icons'=>"fa fa-pagelines",
				'service_1_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
				'service_1_link'=>"#",
				
				'service_2_title'=>"Design",
				'service_2_icons'=>"fa fa-eye",
				'service_2_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
				'service_2_link'=>"#",
				
				'service_3_title'=>"management",
				'service_3_icons'=>"fa fa-users",
				'service_3_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
				'service_3_link'=>"#",
				
				'service_4_title'=>"Development",
				'service_4_icons'=>"fa fa-code",
				'service_4_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
				'service_4_link'=>"#"			
			);
			return apply_filters( 'weblizar_options', $wl_theme_options );
	}

	//Function To get the Options-DATA
	function weblizar_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'weblizar_options', array() ), 
        weblizar_default_settings() 
    );
	}
	//wp title tag starts here
	function wl_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'weblizar' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'wl_head', 10,2 );	
	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 720; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'weblizar', WL_TEMPLATE_DIR_CORE . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'weblizar' ) );
		// theme support 	
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args); 
		add_theme_support( 'automatic-feed-links'); 
		require_once('options-reset.php');
		require( WL_TEMPLATE_DIR_CORE . '/theme-options/option-panel.php' ); // for Weblizar Options-Panel
			
	}
	
	function weblizar_scripts()
	{	//** font-awesome-3.2.1 **//
		wp_enqueue_style('font-awesome-css-3.2.1', WL_TEMPLATE_DIR_URI. '/css/font-awesome-3.2.1/css/font-awesome.css');
		wp_enqueue_style('font-awesome-min-css-3.2.1', WL_TEMPLATE_DIR_URI. '/css/font-awesome-3.2.1/css/font-awesome.min.css');
		//** font-awesome-4.2.0 **//
		wp_enqueue_style('font-awesome-css', WL_TEMPLATE_DIR_URI. '/css/font-awesome-4.2.0/css/font-awesome.css');
		wp_enqueue_style('font-awesome-min-css', WL_TEMPLATE_DIR_URI. '/css/font-awesome-4.2.0/css/font-awesome.min.css');
		wp_enqueue_style('bootstrap-min', WL_TEMPLATE_DIR_URI . '/css/bootstrap.min.css');
		wp_enqueue_style('responsive', WL_TEMPLATE_DIR_URI . '/css/responsive.css');
		wp_enqueue_style('flat-blue', WL_TEMPLATE_DIR_URI . '/css/skins/flat-blue.css');	
		wp_enqueue_style('theme-menu', WL_TEMPLATE_DIR_URI . '/css/theme-menu.css');
		wp_enqueue_style('carousel', WL_TEMPLATE_DIR_URI . '/css/carousel.css');
		
		// Js
		wp_enqueue_script('menu', WL_TEMPLATE_DIR_URI .'/js/menu/menu.js', array('jquery'));
		wp_enqueue_script('bootstrap-min-js', WL_TEMPLATE_DIR_URI .'/js/menu/bootstrap.min.js');
		wp_enqueue_script('docs-js', WL_TEMPLATE_DIR_URI .'/js/docs.min.js');				
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts'); 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<div class="blog-post-details-item blog-read-more"><a href="'.get_permalink().'">Read More...</a></div>';
	}   
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'weblizar' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'weblizar' ),
			'before_widget' => '<div class="sidebar-block">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="h3-sidebar-title sidebar-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'weblizar' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'weblizar' ),
			'before_widget' => '<div class="col-md-3 col-sm-3 footer-col">',
			'after_widget' => '</div>',
			'before_title' => '<div class="footer-title">',
			'after_title' => '</div>',
		) );             
	}
	
	/*
	* Image resize and crop
	*/
	 if ( ( 'add_image_size' ) ) 
	 { 
		add_image_size('wl_media_sidebar_img',54,54,true);
		add_image_size('wl_media_blog_img',800,400,true);
		add_image_size('wl_blog_img',350,150,true);
	}
	// code for home slider post types 
	add_filter( 'intermediate_image_sizes', 'weblizar_image_presets');
	function weblizar_image_presets($sizes){
	   $type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value)
		{	if($type=='post'  &&  $value != 'wl_media_blog_img' &&  $value != 'wl_media_sidebar_img' && $value != 'wl_blog_img')
			{   unset($sizes[$key]);      }		 
		}
		return $sizes;	 
	}
?>