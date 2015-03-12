<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="block ui-tabs-panel active" id="option-general" >	
	<form method="post" id="weblizar_theme_options_general">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td cols=2 ><h2><?php _e('General Settings','weblizar');?></h2></td>
				<td style="width:30%;">
					<div class="weblizar_settings_loding" id="weblizar_loding_general_image"></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_general_success" ><?php _e('Options Data updated','weblizar');?></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_general_reset" ><?php _e('Options data Reset','weblizar');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('general');">
					<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('general')" >
				</td>
				</tr>
			</table>			
		</div>	
		<div class="section">
			<div class="panel-group" id="accordion">
		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						 <?php _e('Theme Color Schemes','weblizar'); ?>
						</a>
						<a href="http://weblizar.com/themes/weblizar-premium-theme/" target="_blank" class="btn btn-success btn_upsell"><?php _e('GET PREMIUM ','weblizar'); ?></a>
					  </h4>					  
					</div>
					
					<div id="collapseOne" class="panel-collapse collapse in">
					  <div class="panel-body">
						<?php $stylesheet= ' ' ;?>
						<select id="style_sheet" name="style_sheet" class="webriti_inpute">
								<option <?php echo selected($stylesheet, 'light-blue.css' ); ?> value="light-blue.css" ><?php _e('light-blue','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'green.css' ); ?> value="green.css" ><?php _e('green','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'red.css' ); ?> value="red.css" ><?php _e('red','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'pink.css' ); ?> value="pink.css" ><?php _e('pink','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'light-purple.css' ); ?> value="light-purple.css" ><?php _e('light-purple','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'orange.css' ); ?> value="orange.css" ><?php _e('orange','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'bright-green.css' ); ?> value="bright-green.css" ><?php _e('bright-green','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'dark-blue.css' ); ?> value="dark-blue.css" ><?php _e('dark-blue','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'oil.css' ); ?> value="oil.css" ><?php _e('oil','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'black.css' ); ?> value="black.css"  ><?php _e('black','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'light-brown.css' ); ?> value="light-brown.css" ><?php _e('light-brown','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'coffee.css' ); ?> value="coffee.css" ><?php _e('coffee','weblizar'); ?></option>
								<option <?php echo selected($stylesheet, 'flat-blue.css' ); ?> value="flat-blue.css"  ><?php _e('flat-blue','weblizar'); ?></option>
						</select>
						<span class="explain"><?php  _e('Select OUT of 10+ Color Schemes','weblizar'); ?></span>
					  </div>
					</div>
				  </div> 
			</div>	
		</div>	
		<div class="section">
			<h3><?php _e('Add Your Company Logo','weblizar'); ?></h3>
			<input class="weblizar_inpute" id="weblizar_inpute4" type="text" value="<?php if($wl_theme_options['upload_image_logo']!='') { echo esc_url($wl_theme_options['upload_image_logo']); } ?>"  name="upload_image_logo" size="36" class="upload has-file"/>
			<input type="button" id="upload_button4" value="Upload" class="btn btn-primary upload_image_button" onclick="show_re(4)" />
			<input type="button" id="preview_image4" value="Preview" class="btn btn-success " onclick="preview_image(4)" />
			<input type="button" id="remove_button4" value="Remove" class="btn btn-danger remove_button" style="<?php if($wl_theme_options['upload_image_logo']=='') { ?> display:none<?php } ?>" onclick="remove_image(4);" />
			<span class="explain" id="no_slide_media4" style="display:none"><?php _e('No media Selected','weblizar');?> </span>
			<span class="explain"><?php _e('Add Company logo from here suggested size is 150X50','weblizar');?></span>	
			<img class="weblizar-prev-img" id="slide-img4"  src="" />
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','weblizar'); ?></h3>
			<input class="weblizar_inpute"  type="text" name="height" id="height" value="<?php echo esc_html($wl_theme_options['height']); ?>" >	
			<span class="explain"><?php  _e('Default Logo Height : 55px, if you want to increase than specify your value','weblizar'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="width" id="width"  value="<?php echo esc_html($wl_theme_options['width']); ?>" >	
			<span class="explain"><?php  _e('Default Logo Width : 150px, if you want to increase than specify your value','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Your Blog Title','weblizar'); ?></h3>
			<input type="checkbox" <?php if($wl_theme_options['text_title']=='on') echo "checked='checked'"; ?> id="text_title" name="text_title" > <span class="explain"><?php _e('Enable Blog-Title as a Logo for your . Setup title','weblizar');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('Click Here','weblizar');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Add Your Company Fevicon','weblizar'); ?></h3>
			<input class="weblizar_inpute" id="weblizar_inpute5" type="text" value="<?php if($wl_theme_options['upload_image_favicon']!='') { echo esc_url($wl_theme_options['upload_image_favicon']); } ?>"  name="upload_image_favicon" size="36" class="upload has-file"/>
			<input type="button" id="upload_button5" value="Upload" class="btn btn-primary upload_image_button" onclick="show_re(5)" />
			<input type="button" id="preview_image5" value="Preview" class="btn btn-success " onclick="preview_image(5)" />
			<input type="button" id="remove_button5" value="Remove" class="btn btn-danger remove_button" onclick="remove_image(5);" style="<?php if($wl_theme_options['upload_image_favicon']=='') { ?> display:none<?php } ?>"  />
			<span class="explain" id="no_slide_media5" style="display:none">No media Selected </span>
			<span class="explain"><?php _e('Add Company fevicon from here suggested size is 32X32','weblizar');?></span>	
			<img class="weblizar-prev-img" id="slide-img5"  src="" />
		</div>		
		<div class="section">
			<h3><?php _e('Custom css','weblizar'); ?></h3>
			<textarea rows="8" cols="8" id="custom_css" name="custom_css"><?php if($wl_theme_options['custom_css']!='') { echo esc_attr($wl_theme_options['custom_css']); } ?></textarea>
			<div class="explain"><?php _e('This is a powerful feature provided here. No need to use custom css plugin, just paste your css code and see the magic.','weblizar'); ?><br></div>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_general" name="weblizar_settings_save_general" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('general');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('general')" >
		</div>
	</form>	
</div>

<!-------- Home slider setting -------->
<div class="block ui-tabs-panel deactive" id="option-home-image" >
	<form method="post" id="weblizar_theme_options_home-image">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td cols=2 ><h2><?php _e('Slide show Settings','weblizar');?></h2></td>
				<td style="width:30%;">
					<div class="weblizar_settings_loding" id="weblizar_loding_home-image_image"></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_home-image_success" ><?php _e('Options Data updated','weblizar');?></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_home-image_reset" ><?php _e('Options data Reset','weblizar');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('home-image');">
					<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('home-image')" >
				</td>
				</tr>
			</table>			
		</div>	
			
		
		<div class="panel-group" id="1accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#1accordion" href="#collapse11">
						<?php _e('Slide Detail One','weblizar'); ?>
						</a>						
					  </h4>					  
					</div>
		<div id="collapse11" class="panel-collapse collapse in">
		<div class="panel-body">			
		<div class="section">		
			<h3><?php _e('Home Feature Image One','weblizar'); ?></h3>
			<input class="weblizar_inpute" id="weblizar_inpute1" type="text" value="<?php if($wl_theme_options['slide_image']!='') { echo esc_url($wl_theme_options['slide_image']); } ?>"  name="slide_image" size="36" class="upload has-file"/>
			
			<input type="button" id="upload_button1" value="Upload" class="btn btn-primary upload_image_button" onclick="show_re(1)" />
			<input type="button" id="preview_image1" value="Preview" class="btn btn-success " onclick="preview_image(1)" />
			<input type="button" id="remove_button1" value="Remove" class="btn btn-danger remove_button" style="<?php if($wl_theme_options['slide_image']=='') { ?> display:none<?php } ?>" onclick="remove_image(1);" />
			<span class="explain" id="no_slide_media1" style="display:none"><?php _e('No media Selected','weblizar'); ?> </span>
			<span class="explain"><?php _e('Add Home Feature image here, size suggestion is 1900X525.','weblizar'); ?></span>	
			<img class="weblizar-prev-img" id="slide-img1"  src="" />
			
			
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Title One','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_title" id="slide_title"  value="<?php if($wl_theme_options['slide_title']!='') { echo esc_html($wl_theme_options['slide_title']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Title Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Description One','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_desc" id="slide_desc"  value="<?php if($wl_theme_options['slide_desc']!='') { echo esc_attr($wl_theme_options['slide_desc']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Description Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Text One','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_text" id="slide_btn_text"  value="<?php if($wl_theme_options['slide_btn_text']!='') { echo esc_attr($wl_theme_options['slide_btn_text']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Text Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Link One','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_link" id="slide_btn_link"  value="<?php if($wl_theme_options['slide_btn_link']!='') { echo esc_url($wl_theme_options['slide_btn_link']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Link Here','weblizar');?></span>
		</div>
		</div>
		</div>
		</div> 
		</div>
		<!-- Home Feature 2 -->
		<div class="section"></div>
		<div class="panel-group" id="2accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#2accordion" href="#collapse12">
						<?php _e('Slide Detail Two','weblizar'); ?>
						</a>						
					  </h4>					  
					</div>
		<div id="collapse12" class="panel-collapse collapse">
		<div class="panel-body">
		<div class="section">
			<h3><?php _e('Home Feature Image Two','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" id="weblizar_inpute2" value="<?php if($wl_theme_options['slide_image_1']!='') { echo esc_url($wl_theme_options['slide_image_1']); } ?>"  name="slide_image_1" size="36" class="upload has-file"/>
			<input type="button" id="upload_button2" value="Upload" class="btn btn-primary upload_image_button" onclick="show_re(2)" />
			<input type="button" id="preview_image2" value="Preview" class="btn btn-success " onclick="preview_image(2)" />
			<input type="button" id="remove_button2" value="Remove" class="btn btn-danger remove_button" style="<?php if($wl_theme_options['slide_image_1']=='') { ?> display:none<?php } ?>" onclick="remove_image(2);" />
			<span class="explain" id="no_slide_media2" style="display:none">No media Selected </span>
			<span class="explain"><?php _e('Add Home Feature image here, size suggestion is 1900X525.','weblizar');?></span>	
			<img class="weblizar-prev-img" id="slide-img2"  src="" />
		</div>
		<div class="section">
			<h3><?php _e('Home Feature Image Title Two','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_title_1" id="slide_title_1"  value="<?php if($wl_theme_options['slide_title_1']!='') { echo esc_html($wl_theme_options['slide_title_1']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Title Here','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Home Feature Image Description Two','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_desc_1" id="slide_desc_1"  value="<?php if($wl_theme_options['slide_desc_1']!='') { echo esc_attr($wl_theme_options['slide_desc_1']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Description Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Text Two','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_text_1" id="slide_btn_text_1"  value="<?php if($wl_theme_options['slide_btn_text_1']!='') { echo esc_attr($wl_theme_options['slide_btn_text_1']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Text Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Link Two','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_link_1" id="slide_btn_link_1"  value="<?php if($wl_theme_options['slide_btn_link_1']!='') { echo esc_url($wl_theme_options['slide_btn_link_1']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Link Here','weblizar');?></span>
		</div>
		</div>
		</div>
		</div> 
		</div>
		<!-- Home Feature 3 -->
		<div class="section"></div>
		<div class="panel-group" id="3accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#3accordion" href="#collapse13">
						 </span> <?php _e('Slide Detail Three','weblizar'); ?> 
						</a>							
					  </h4>					  
					</div>
		<div id="collapse13" class="panel-collapse collapse">
		<div class="panel-body">
		<div class="section">
			<h3><?php _e('Home Feature Image Three','weblizar'); ?></h3>
			<input class="weblizar_inpute" id="weblizar_inpute3" type="text" value="<?php if($wl_theme_options['slide_image_2']!='') { echo esc_url($wl_theme_options['slide_image_2']); } ?>"  name="slide_image_2" size="36" class="upload has-file"/>
			<input type="button" id="upload_button3" value="Upload" class="btn btn-primary upload_image_button" onclick="show_re(3)" />
			<input type="button" id="preview_image3" value="Preview" class="btn btn-success " onclick="preview_image(3)" />
			<input type="button" id="remove_button3" value="Remove" class="btn btn-danger remove_button" style="<?php if($wl_theme_options['slide_image_2']=='') { ?> display:none<?php } ?>" onclick="remove_image(3);" />
			<span class="explain" id="no_slide_media3" style="display:none">No media Selected </span>
			<span class="explain"><?php _e('Add Home Feature image here, size suggestion is 1900X525.','weblizar');?></span>	
			<img class="weblizar-prev-img" id="slide-img3"  src="" />
		</div>
		<div class="section">
			<h3><?php _e('Home Feature Image Title Three','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_title_2" id="slide_title_2"  value="<?php if($wl_theme_options['slide_title_2']!='') { echo esc_attr($wl_theme_options['slide_title_2']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Title Here','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Home Feature Image Description Three','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_desc_2" id="slide_desc_2"  value="<?php if($wl_theme_options['slide_desc_2']!='') { echo esc_attr($wl_theme_options['slide_desc_2']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Description Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Text Three','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_text_2" id="slide_btn_text_2"  value="<?php if($wl_theme_options['slide_btn_text_2']!='') { echo esc_attr($wl_theme_options['slide_btn_text_2']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Text Here','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Feature Image Button Link Three','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="slide_btn_link_2" id="slide_btn_link_2"  value="<?php if($wl_theme_options['slide_btn_link_2']!='') { echo esc_url($wl_theme_options['slide_btn_link_2']); } ?>" >	
			<span class="explain"><?php  _e('Type Home Feature Image Button Link Here','weblizar');?></span>
		</div>
		</div>
		</div>
		</div> 
		</div>	
		<div class="section">
			<div class="panel-group" id="accordion1">
		
			  <div class="panel panel-default">		 
				<div class="panel-heading">
				 
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo">
					 <?php _e('More Slides','weblizar'); ?>
					</a>
					<a href="http://weblizar.com/themes/weblizar-premium-theme/" target="_blank" class="btn btn-success btn_upsell"><?php _e('GET PREMIUM','weblizar'); ?></a>
				  </h4>
				  
				</div>
				
				<div id="collapsetwo" class="panel-collapse collapse in">
				  <div class="panel-body">
				   
					<span class="explain"><?php  _e('Add Unlimited slides for your sideshow ','weblizar'); ?></span>
				  </div>
				</div>
			  </div> 
			</div>
		</div>
		<!---Save DATA -->
		
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_home-image" name="weblizar_settings_save_home-image" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('home-image');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('home-image')" >
		</div>
	</form>	
</div>

<!-------- Home site info and blog setting ------------>
<div class="block ui-tabs-panel deactive" id="option-site-info" >
	<form method="post" id="weblizar_theme_options_site-info">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td cols=2 ><h2><?php _e('Site Info Settings','weblizar');?></h2></td>
				<td style="width:30%;">
					<div class="weblizar_settings_loding" id="weblizar_loding_site-info_image"></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_site-info_success" ><?php _e('Options Data updated','weblizar');?></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_site-info_reset" ><?php _e('Options data Reset','weblizar');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('site-info');">
					<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('site-info')" >
				</td>
				</tr>
			</table>			
		</div>			
		<div class="section">
			<h3><?php _e('Site Intro Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="site_intro_title" id="site_intro_title"  value="<?php if($wl_theme_options['site_intro_title']!='') { echo esc_html($wl_theme_options['site_intro_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your site information text','weblizar');?></span>
		</div>		
		
		<div class="section">
			<h3><?php _e('Site Description','weblizar'); ?></h3>
			<textarea rows="8" cols="8" id="site_intro_text" name="site_intro_text"><?php if($wl_theme_options['site_intro_text']!='') { echo esc_attr($wl_theme_options['site_intro_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your site description.','weblizar'); ?><br></div>
		</div>
		
		<div class="section">
			<h3><?php _e('Blog Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="blog_title" id="blog_title"  value="<?php if($wl_theme_options['blog_title']!='') { echo esc_html($wl_theme_options['blog_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your blog title','weblizar');?></span>
		</div>		
		
		<div class="section">
			<h3><?php _e('Blog Description','weblizar'); ?></h3>
			<textarea rows="8" cols="8" id="blog_text" name="blog_text"><?php if($wl_theme_options['blog_text']!='') { echo esc_attr($wl_theme_options['blog_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your Blog description.','weblizar'); ?><br></div>
		</div>
		<div class="section">
			<div class="panel-group" id="accordion2">
		
			  <div class="panel panel-default">		 
				<div class="panel-heading">
				 
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapsethree">
					 <?php _e('More Sections','weblizar'); ?>
					</a>
					<a href="http://weblizar.com/themes/weblizar-premium-theme/" target="_blank" class="btn btn-success btn_upsell"><?php _e('GET PREMIUM','weblizar'); ?></a>
				  </h4>
				  
				</div>
				
				<div id="collapsethree" class="panel-collapse collapse in">
				  <div class="panel-body">				   
					<span class="explain"><?php  _e('Add More Sections and More Features on your website.','weblizar'); ?></span>
				  </div>
				</div>
			  </div> 
			</div>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_site-info" name="weblizar_settings_save_site-info" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('site-info');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('site-info')" >
		</div>
	</form>	
</div>

<!--------------- service settings ------------>
<div class="block ui-tabs-panel deactive" id="option-home-service" >
	<form method="post" id="weblizar_theme_options_home-service">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td cols=2 ><h2><?php _e('Service Settings','weblizar');?></h2></td>
				<td style="width:30%;">
					<div class="weblizar_settings_loding" id="weblizar_loding_home-service_image"></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_home-service_success" ><?php _e('Options Data updated','weblizar');?></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_home-service_reset" ><?php _e('Options data Reset','weblizar');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('home-service');">
					<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('home-service')" >
				</td>
				</tr>
			</table>			
		</div>
		<div class="panel-group" id="4accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#4accordion" href="#collapse14">
						 </span> <?php _e('Service Detail One','weblizar'); ?><span class="glyphicon glyphicon-arrow-down btn_upsell_arrow"></span> 
						</a>							
					  </h4>					  
					</div>
		<div id="collapse14" class="panel-collapse collapse in">
		<div class="panel-body">
		<div class="section">
			<h3><?php _e('Service One','weblizar'); ?></h3>
			<hr>
			<h3><?php _e('Service Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_1_title" id="service_1_title"  value="<?php if($wl_theme_options['service_1_title']!='') { echo esc_html($wl_theme_options['service_1_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
			<h3><?php _e('Service  Icons','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_1_icons" id="service_1_icons"  value="<?php if($wl_theme_options['service_1_icons']!='') { echo esc_attr($wl_theme_options['service_1_icons']); } ?>" >	
			<br>
			<span class="explain"><?php  _e('Service Icon (Using Font-Awesome icons name) like: fa fa-angellist','weblizar'); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"> <?php _e('Get your Font-Awesome icons','weblizar'); ?>.</a> </span>
			<h3><?php _e('Service Description','weblizar'); ?></h3>			
			<textarea rows="8" cols="8" id="service_1_text" name="service_1_text"><?php if($wl_theme_options['service_1_text']!='') { echo esc_attr($wl_theme_options['service_1_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br></div>
			<h3><?php _e('Service  Link','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_1_link" id="service_1_link"  value="<?php if($wl_theme_options['service_1_link']!='') { echo esc_url($wl_theme_options['service_1_link']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
		</div></div></div></div></div>
		
		<div class="section"></div>
		<div class="panel-group" id="5accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#5accordion" href="#collapse15">
						 <?php _e('Service Detail Two','weblizar'); ?><span class="glyphicon glyphicon-arrow-down btn_upsell_arrow"></span> 
						</a>							
					  </h4>					  
					</div>
		<div id="collapse15" class="panel-collapse collapse">
		<div class="panel-body">
		
		<div class="section">
			<h3><?php _e('Service Two','weblizar'); ?></h3>
			<hr>
			<h3><?php _e('Service Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_2_title" id="service_2_title"  value="<?php if($wl_theme_options['service_2_title']!='') { echo esc_html($wl_theme_options['service_2_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
			<h3><?php _e('Service  Icons','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_2_icons" id="service_2_icons"  value="<?php if($wl_theme_options['service_2_icons']!='') { echo esc_attr($wl_theme_options['service_2_icons']); } ?>" >	
			<br>
			<span class="explain"><?php  _e('Service Icon (Using Font-Awesome icons name) like: fa fa-angellist','weblizar'); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('Get your Font-Awesome icons','weblizar'); ?>.</a> </span>
			<h3><?php _e('Service Description','weblizar'); ?></h3>			
			<textarea rows="8" cols="8" id="service_2_text" name="service_2_text"><?php if($wl_theme_options['service_2_text']!='') { echo esc_attr($wl_theme_options['service_2_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br></div>
			<h3><?php _e('Service  Link','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_2_link" id="service_2_link"  value="<?php if($wl_theme_options['service_2_link']!='') { echo esc_url($wl_theme_options['service_2_link']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class="section"></div>
		<div class="panel-group" id="7accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#7accordion" href="#collapse17">
						 <?php _e('Service Detail Three','weblizar'); ?><span class="glyphicon glyphicon-arrow-down btn_upsell_arrow"></span>
						</a>							
					  </h4>					  
					</div>
		<div id="collapse17" class="panel-collapse collapse">
		<div class="panel-body">
		<div class="section">
			<h3><?php _e('Service Three','weblizar'); ?></h3>
			<hr>
			<h3><?php _e('Service Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_3_title" id="service_3_title"  value="<?php if($wl_theme_options['service_3_title']!='') { echo esc_html($wl_theme_options['service_3_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
			<h3><?php _e('Service  Icons','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_3_icons" id="service_3_icons"  value="<?php if($wl_theme_options['service_3_icons']!='') { echo esc_attr($wl_theme_options['service_3_icons']); } ?>" >	
			<br>
			<span class="explain"><?php  _e('Service Icon (Using Font-Awesome icons name) like: fa fa-angellist','weblizar'); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('Get your Font-Awesome icons','weblizar'); ?>.</a> </span>
			<h3><?php _e('Service Description','weblizar'); ?></h3>			
			<textarea rows="8" cols="8" id="service_3_text" name="service_3_text"><?php if($wl_theme_options['service_3_text']!='') { echo esc_attr($wl_theme_options['service_3_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br></div>
			<h3><?php _e('Service  Link','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_3_link" id="service_3_link"  value="<?php if($wl_theme_options['service_3_link']!='') { echo esc_url($wl_theme_options['service_3_link']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class="section"></div>
		<div class="panel-group" id="8accordion">		
				  <div class="panel panel-default">				 
					<div class="panel-heading">					 
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#8accordion" href="#collapse18">
						 <?php _e('Service Detail Four','weblizar'); ?><span class="glyphicon glyphicon-arrow-down btn_upsell_arrow"></span> 
						</a>							
					  </h4>					  
					</div>
		<div id="collapse18" class="panel-collapse collapse">
		<div class="panel-body">
		<div class="section">
			<h3><?php _e('Service Four','weblizar'); ?></h3>
			<hr>
			<h3><?php _e('Service Title','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_4_title" id="service_4_title"  value="<?php if($wl_theme_options['service_4_title']!='') { echo esc_html($wl_theme_options['service_4_title']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
			<h3><?php _e('Service  Icons','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_4_icons" id="service_4_icons"  value="<?php if($wl_theme_options['service_4_icons']!='') { echo esc_attr($wl_theme_options['service_4_icons']); } ?>" >	
			<br>
			<span class="explain"><?php  _e('Service Icon (Using Font-Awesome icons name) like: fa fa-angellist','weblizar'); ?> <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><?php _e('Get your Font-Awesome icons','weblizar'); ?>.</a> </span>
			<h3><?php _e('Service Description','weblizar'); ?></h3>			
			<textarea rows="8" cols="8" id="service_4_text" name="service_4_text"><?php if($wl_theme_options['service_4_text']!='') { echo esc_attr($wl_theme_options['service_4_text']); } ?></textarea>
			<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br></div>
			<h3><?php _e('Service  Link','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="service_4_link" id="service_4_link"  value="<?php if($wl_theme_options['service_4_link']!='') { echo esc_url($wl_theme_options['service_4_link']); } ?>" >	
			<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class="section">
			<div class="panel-group" id="accordion3">
		
			  <div class="panel panel-default">		 
				<div class="panel-heading">
				 
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
					 <?php _e('More Services','weblizar'); ?>
					</a>
					<a href="http://weblizar.com/themes/weblizar-premium-theme/" target="_blank" class="btn btn-success btn_upsell"><?php _e('GET PREMIUM','weblizar'); ?></a>
				  </h4>
				  
				</div>
				
				<div id="collapsefour" class="panel-collapse collapse in">
				  <div class="panel-body">				   
					<span class="explain"><?php  _e('Add More Services on your Home Page.','weblizar'); ?></span>
				  </div>
				</div>
			  </div> 
			</div>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_home-service" name="weblizar_settings_save_home-service" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('home-service');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('home-service')" >
			<!--  alert massage when data saved and reset -->
		</div>
	</form>	
</div>

<!-------- Social media link settings ----------->
<div class="block ui-tabs-panel deactive" id="option-social" >	
	<form method="post" id="weblizar_theme_options_social">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Social media','weblizar');?></h2></td>
					<td style="width:30%;">
						<div class="weblizar_settings_loding" id="weblizar_loding_social_image"></div>
						<div class="weblizar_settings_massage" id="weblizar_settings_save_social_success" ><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage" id="weblizar_settings_save_social_reset" ><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align:right;">					
						<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('social');">
						<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('social')" >
					</td>
				</tr>
			</table>	
		</div>		
		<div class="section">
			<h3><?php _e('Enable Social media:','weblizar'); ?>  </h3>			
			<input type="checkbox" <?php if($wl_theme_options['footer_section_social_media_enbled']=='on') echo "checked='checked'"; ?> id="footer_section_social_media_enbled" name="footer_section_social_media_enbled" > <span class="explain"><?php _e('Enable Social media in footer section.','weblizar'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Link:','weblizar');?></h3>
			<input class="weblizar_inpute"  type="text" name="social_media_twitter_link" id="social_media_twitter_link" value="<?php if($wl_theme_options['social_media_twitter_link']!='') { echo esc_url($wl_theme_options['social_media_twitter_link']); } ?>" >
			<span class="explain"><?php  _e('Enter twitter link.','weblizar');?></span>
			</div>
		<div class="section">
			<h3><?php _e('Linkedin Links:','weblizar');?></h3>
			<input class="weblizar_inpute"  type="text" name="social_media_linkedin_link" id="social_media_linkedin_link" value="<?php if($wl_theme_options['social_media_linkedin_link']!='') { echo esc_url($wl_theme_options['social_media_linkedin_link']); } ?>" >
			<span class="explain"><?php  _e('Enter linkedin link.','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Facebook Links:','weblizar');?></h3>
			<input class="weblizar_inpute"  type="text" name="social_media_facebook_link" id="social_media_facebook_link" value="<?php if($wl_theme_options['social_media_facebook_link']!='') { echo esc_url($wl_theme_options['social_media_facebook_link']); } ?>" >
			<span class="explain"><?php  _e('Enter facebook link.','weblizar');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Google Plus Links:','weblizar');?></h3>
			<input class="weblizar_inpute"  type="text" name="social_media_google_plus" id="social_media_google_plus" value="<?php if($wl_theme_options['social_media_google_plus']!='') { echo esc_url($wl_theme_options['social_media_google_plus']); } ?>" >
			<span class="explain"><?php  _e('Enter google plus link.','weblizar');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_social" name="weblizar_settings_save_social" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('social');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('social')" >
		</div>
	</form>
</div>

<!---------------- footer customization Settings form ------------------------>
<div class="block ui-tabs-panel deactive" id="option-footer" >
	<form method="post" id="weblizar_theme_options_footer">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td cols=2 ><h2><?php _e('Footer Customization','weblizar');?></h2></td>
				<td style="width:30%;">
					<div class="weblizar_settings_loding" id="weblizar_loding_footer_image"></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_footer_success" ><?php _e('Options Data updated','weblizar');?></div>
					<div class="weblizar_settings_massage" id="weblizar_settings_save_footer_reset" ><?php _e('Options data Reset','weblizar');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('footer');">
					<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('footer')" >
				</td>
				</tr>
			</table>			
		</div>	
		<div class="section">
			<h3><?php _e('Footer customization','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="footer_customizations" id="footer_customizations"  value="<?php if($wl_theme_options['footer_customizations']!='') { echo esc_attr($wl_theme_options['footer_customizations']); } ?>" >	
			<span class="explain"><?php  _e('Enter your footer customization text ','weblizar');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Developed by text','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="developed_by_text" id="developed_by_text"  value="<?php if($wl_theme_options['developed_by_text']!='') { echo esc_html($wl_theme_options['developed_by_text']); } ?>" >	
			<span class="explain"><?php  _e('Enter developed by text','weblizar');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Developed by link text','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="developed_by_weblizar_text" id="developed_by_weblizar_text"  value="<?php if($wl_theme_options['developed_by_weblizar_text']!='') { echo esc_attr($wl_theme_options['developed_by_weblizar_text']); } ?>" >	
			<span class="explain"><?php  _e('Enter developed by link text  ','weblizar');?></span>
		</div>		
		<div class="section">
			<h3><?php _e('Developed by link','weblizar'); ?></h3>
			<input  class="weblizar_inpute" type="text" name="developed_by_link" id="developed_by_link"  value="<?php if($wl_theme_options['developed_by_link']!='') { echo esc_url($wl_theme_options['developed_by_link']); } ?>" >	
			<span class="explain"><?php  _e('Enter developed by link','weblizar');?></span>
		</div>			
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_footer" name="weblizar_settings_save_footer" />			
			<input class="button" type="button" name="reset" value="Restore Defaults" onclick="weblizar_option_data_reset('footer');">
			<input class="button button-primary" type="button" value="Save Options" onclick="weblizar_option_data_save('footer')" >
		</div>
	</form>	
</div>
<!---------------- footer customization Settings form ------------------------>
<div class="block ui-tabs-panel deactive" id="option-getpro" >
<div class="plan-name">
        <h2><?php _e('Weblizar Pro Responsive Wordpress Theme','weblizar'); ?></h2>
		<h6><?php _e('Get The Premium Weblizar in Just $29','weblizar'); ?> </h6>
</div>

<div class="row-fluid pricing-table pricing-three-column">
	<div class="col-md-4">
		<div class=" plan ap">
			<div class="plan-name">
				<h2><?php _e('Weblizar Feature','weblizar'); ?></h2>
				
			</div>
			<ul>
				<li class="plan-feature"><?php _e('Easy to customize','weblizar'); ?> </li>
				<li class="plan-feature"><?php _e('Awesome Slider','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Multi Color','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Boxed & Wide','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Widgetized Footer','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Custom Widgets','weblizar'); ?></li>				
				<li class="plan-feature"><?php _e('Shortcode','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Page Templates','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Quick Support','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Custom CSS','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Custom Background','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Logo & Header text','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Portfolio Template','weblizar'); ?></li>
				<li class="plan-feature"><?php _e('Photobox and Lightbox enable Tamplates','weblizar'); ?> </li>
				<li class="plan-feature"><?php _e('Special Gallery Template','weblizar'); ?></li>
			</ul>
		</div>
	</div>
	<div class="col-md-4">
		<div class=" plan bp">
			<div class="plan-name">
				<h2><?php _e('Free','weblizar'); ?></h2>
				
			</div>
			<ul>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature">1</li>
				<li class="plan-feature"><?php _e('WPORG Support','weblizar'); ?></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				
				<li class="plan-feature">
					<a href="#" class="button button-primary button-hero" style="font-size: large; font-weight: bolder;"><i class="fa fa-thumbs-up"></i> <?php _e('Enjoy Theme','weblizar'); ?></a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class=" plan cp">
			<div class="plan-name">
				<h2><?php _e('Pro','weblizar'); ?> - ( $29 )</h2>
				
			</div>
			<ul>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature">15+</li>
				<li class="plan-feature">15+</li>
				<li class="plan-feature"><?php _e('Private Support Forum','weblizar'); ?></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature">
					<a class="btn btn-primary btn-lg" href="http://www.weblizar.com/themes/weblizar-premium-theme/" target="_new" style="font-size: large; font-weight: bolder;"><i class="fa fa-check-circle"></i> <?php _e('Demo','weblizar'); ?></a>
					<a class="btn btn-danger btn-lg" href="http://www.weblizar.com/themes/weblizar-premium-theme/" target="_new" style="font-size: large; font-weight: bolder;"><i class="fa fa-shopping-cart"></i><?php _e(' Buy','weblizar'); ?></a>
				</li>
			</ul>
		</div>
	</div>	
</div>
<style>
    .pricing-table .plan ul li.plan-feature {
        padding: 8px !important;
    }
    .ap .plan-name {
        background-color: #1E8CBE !important;
    }
    .bp .plan-name {
        background-color: #1E8CBE !important;
    }
    .cp .plan-name {
        background-color: #1E8CBE !important;
    }
    li {
        font-size: larger !important;
    }

    .row-fluid .span4 {
        width: 30.624% !important;
    }
	
	ul li img {
		
	}
</style>
</div>
<div class="block ui-tabs-panel deactive" id="option-ourproduct" >
	<div class="row-fluid pricing-table pricing-three-column">
	<div class="plan-name centre"> 
	<a style="margin-bottom:10px;textt-align:center" target="_new" href="http://weblizar.com"><img  src="http://weblizar.com/wp-content/themes/home-theme/images/weblizar2.png" /></a>
	<div class="purchase_btn_div">
	<a href="http://www.weblizar.com" target="_new" class="btn btn-primary btn-lg dmobtn">View Site</a>		
	</div>
	</div>	
	<div class="plan-name">
        <h2>Weblizar's Responsive Wordpress Theme</h2>
		<h6>Get The Premium, And Create your website Beautifully.  </h6>
    </div>
	
	
	<div class="col-md-4  demoftr "> 
		<h2>Enigma-Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_TEMPLATE_DIR_URI.'/core/theme-options/images/enigma.png' ;?>">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModal" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalGreen"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="<?php echo WL_TEMPLATE_DIR_URI.'/core/theme-options/images/enigma.png' ;?>">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Enigma Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Enigma is HTML5 & CSS3 Responsive WordPress Business theme with business style , 7 blog templates , 6 portfolio templates and many more</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/themes/enigma-premium/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/themes/enigma-premium/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="col-md-4  demoftr "> 
		<h2>Green Lantern Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/green-lantern-premium-images/glp-slide-1.jpg">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalGreen" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal" id="myModalGreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"><a data-toggle="modal" data-target="#myModal"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a data-toggle="modal" data-target="#myModalweblizar"  data-dismiss="modal" href="View Detail#"  class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/green-lantern-premium-images/glp-slide-1.jpg">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Green Lantern Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Green Lantern is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office amd others .Cool Blog Layout and full width page also present</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<p></p>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/themes/green-lantern-premium-theme/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/themes/green-lantern-premium-theme/">Purchase Now</a>
					</div>
					
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	<div class="col-md-4 demoftr "> 
		<h2>Weblizar Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/uploads/2014/06/screenshot1.jpg">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalweblizar" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal  -->
	<div class="modal" id="myModalweblizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"><a data-toggle="modal" data-target="#myModalGreen"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a data-toggle="modal" data-target="#myModallightbox"  data-dismiss="modal" href="View Detail#"   class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/uploads/2014/06/screenshot1.jpg">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Weblizar Pro Theme</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page.You can also use it for  portfolio, blogging or any type of site. Built with Twitter bootstrap</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Html5 & Css3 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multi-purpose Theme
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Multiple Templates 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Powerful Option Panel
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Coming Soon Mode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Custom Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects and lightbox
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<p></p>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/themes/weblizar-premium-theme/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new"  href="http://weblizar.com/themes/weblizar-premium-theme/">Purchase Now</a>
					</div>
					
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
	</div>
	
	
	<div class="row-fluid pricing-table pricing-three-column">
	<div class="plan-name">
        <h2>Weblizar's Responsive Wordpress Plugins</h2>
		<h6>Get the Plugin and create beautiful Galleries and Slideshow.</h6>
    </div>
	<div class="col-md-6 demoftr">
		<h2>Lightbox Slider Pro</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/lightbox/fancy.jpg">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModallightbox" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!-- Modal  -->
	<div class="modal " id="myModallightbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalweblizar"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a> <a class="pro-dir-button" data-toggle="modal" data-target="#myModalresponsive"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-right fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/lightbox/fancy.jpg">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">LightBox Slider Pro</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">Lightbox Slider is premium wordpress plugin to create gallery with lightbox slide</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Ultimate Lightbox   
							</p>
							<p>
								<i class="fa fa-angle-right"></i>5 Gallery Layout 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>500+ Fonts Styles
							</p>
							<p>
								<i class="fa fa-angle-right"></i>10 Color Opacity
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Lightbox 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Gallery Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects
							</p>
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/lightbox-slider-pro/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/lightbox-slider-pro/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="col-md-6 demoftr">
		<h2>Reponsive Photo Gallery</h2>
		<div class="img-wrapper">
			<div class="enigma_home_portfolio_showcase">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/gallery-pro.png">
				<div class="enigma_home_portfolio_showcase_overlay">
					<div class="enigma_home_portfolio_showcase_overlay_inner ">
						<div class="enigma_home_portfolio_showcase_icons">
							<a title="Link" data-toggle="modal" data-target="#myModalresponsive" href="View Detail#">View Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!-- Modal  -->
	<div class="modal " id="myModalresponsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content ">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel"> <a class="pro-dir-button" data-toggle="modal" data-target="#myModallightbox"  data-dismiss="modal" href="View Detail#" class="pro-dir-button"><i style="color:#000;line-height:1.5" class="fa fa-angle-left fa-2x"></i></a>
			</h4>
		  </div>
		  <div class="modal-body">
			<div class="col-md-6">
				<img class="enigma_img_responsive ftr_img"  src="http://weblizar.com/wp-content/themes/home-theme/images/gallery-pro.png">
			</div>
			<div class="col-md-6">
				<div class="theme-info">
					<h3 class="theme-name">Responsive Photo Gallery</h3>
					<h4 class="theme-author">By <a href="http://weblizar.com/" title="Visit author homepage">weblizar</a></h4>
					<p class="theme-description">A Highly Animated Image Gallery Plugin For WordPress</p>
					<h4  style="margin-top:20px;">Features</h4>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Responsive Design
							</p>
							<p>
								<i class="fa fa-angle-right"></i>8 Animation Effect  
							</p>
							<p>
								<i class="fa fa-angle-right"></i>5 Gallery Layout 
							</p>
							<p>
								<i class="fa fa-angle-right"></i>500+ Fonts Styles
							</p>
							<p>
								<i class="fa fa-angle-right"></i>10 Color Opacity
							</p>
							<p>
								<i class="fa fa-angle-right"></i>2 Lightbox 
							</p>
						
						</div>
					</div>
					<div class="col-md-6">
						<div class="enigma_sidebar_link">
							<p>
								<i class="fa fa-angle-right"></i>Gallery Shortcode
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Unlimited Color Schemes
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Retina Ready
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Isotope Effects
							</p>
							<p>
								<i class="fa fa-angle-right"></i>All Browser Support
							</p>
							<p>
								<i class="fa fa-angle-right"></i>Fast & Friendly Support 
							</p>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<a class="btn btn-success btn-lg" target="_new" href="http://weblizar.com/plugins/responsive-photo-gallery-pro/">View Demo</a>&nbsp;&nbsp;
						<a  class="btn btn-danger btn-lg" target="_new" href="http://weblizar.com/plugins/responsive-photo-gallery-pro/">Purchase Now</a>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
		
	
	</div>											
	<div class="plan-name centre"> 
	<div class="purchase_btn_div">
	  <a href="http://www.weblizar.com" target="_new" class="btn btn-primary btn-lg dmobtn">View Site</a>		
	</div>
	</div>
</div>