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
						<h2>
							<a href="<?php the_permalink()?>" title="<? the_title_attribute(); ?>"><?php the_title()?></a>
						</h2>
						<div>
						<?php _codetheme_post_meta();?>
						</div>
						<div>
							<?php the_content();?>
						</div>
						<div>
							<?php
							if(has_category()) {
								echo '<div class="c-post__cats">';
								/* translators: used betweeen categories */
								$cats_list = get_the_category_list( esc_html__( ', ', '_codetheme' ) );
								/* translators: %s is the categories list */
								printf(esc_html__( 'Posted in %s', '_codetheme' ), $cats_list);
								echo "</div>";
							}
							if(has_tag()) {
								
								echo '<div class="c-post__tags">';
								$tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
								echo $tags_list;
								echo "</div>";
							}
							?>						
						</div>
						<div>
						<?php 
						if(get_theme_mod( '_codetheme_display_author_info', true )) {

						get_template_part('template-parts/single/author');
						
						}
						?>
						

						</div>
						<div>
						        <?php get_template_part( 'template-parts/single/navigation' ); ?>
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