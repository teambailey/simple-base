<?php get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
                <h1 class="h1-page-title"><?php echo __('Blog Detail','weblizar') ?></h1>				
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
				<div class="col-md-9 col-sm-9">
						<!-- Blog Post -->
						<?php get_template_part('content'); ?>
					<!-- Blog Post -->
						<!-- Comments -->				
					<?php comments_template('',true); ?>
				</div>   
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>