<?php 
/*
Template Name: Differebt header
*/
get_header('new'); ?>


<div class="container single-post">
	<div class="row">
		<div class="col-lg-12">
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
	
			
	</div>
</div>


<?php get_footer(); ?>