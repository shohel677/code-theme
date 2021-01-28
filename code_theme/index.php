<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-<?php echo is_active_sidebar('primary-sidebar')?'8' : '12'?>">
		<div <?php post_class('post-art'); ?>>
				<?php get_template_part('template-parts/post/loop')?>
			</div>
		</div>
		<?php  if(is_active_sidebar('primary-sidebar')) {?>
		<div class="col-lg-4">
		<?php get_sidebar(); ?>
		</div>
		<?php } ?>
			
	</div>
</div>


<?php get_footer(); ?>