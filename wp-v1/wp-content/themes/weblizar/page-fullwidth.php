<?php //Template Name:Full-Width Page
get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
                <h1 class="h1-page-title"><?php the_title(); ?></h1>				
            </div>
        </div>
    </div>
</div>
<div class="space-sep20"></div>
<div class="content-wrapper">
	<div class="body-wrapper">
		<div class="container">
			<div class="row">
			<?php the_post(); ?>
				<div class="col-md-12 col-sm-6">
					<!-- Blog Post -->
					<?php get_template_part('content'); ?>
					<!-- //Blog Post// -->						
					<!-- Comments -->				
					<?php comments_template('',true); ?>
				</div>			
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>