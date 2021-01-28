<?php get_header(); ?>
<?php
    $layout = _themename_meta( get_the_ID(), '__codetheme_post_layout', 'full' );
    $sidebar = is_active_sidebar( 'primary-sidebar' );
    if($layout === 'sidebar' && !$sidebar) {
        $layout = 'full';
    }
?>

<div class="container single-post-<?php echo $layout; ?>">
	<div class="row">
		<div class="col-lg-<?php echo $layout === 'sidebar' ? '8' : '12' ?>">
		<div class="post-art">
			<?php if(have_posts()) {?>
				<?php while(have_posts()) { ?>
					<?php the_post();?>
					<div class="post-sub">
						<?php
							/*
							 <h2>
							<a href="<?php the_permalink()?>" title="<? the_title_attribute(); ?>"><?php the_title()?></a>
						</h2>
						<div>
						<?php _codetheme_post_meta();?>
						</div> */?>
						<div>
							<?php the_content();?>
						</div>
			
						</div>
				<?php }?>

			<?php } else { ?>

			<p> <?php esc_html_e('Sorry, No Post found', '_codetheme') ?></p>

			<?php } ?>			</div>
		</div>
		<?php if( $layout === 'sidebar') { ?>		
		<div class="col-lg-4">
		<?php get_sidebar(); ?>
		</div>
		<?php } ?>
			
	</div>
</div>


<?php get_footer(); ?>