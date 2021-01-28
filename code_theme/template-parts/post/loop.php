		
			
			
			<?php if(have_posts()) {?>
				<?php while(have_posts()) { ?>
					<?php the_post();?>
					<div class="post-sub">
						<?php if(get_the_post_thumbnail() !== '') { ?>
						<div class="c-post__thumbnail wp-block-image img">
							<a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large' ) ?></a>
						</div>
						<?php } ?>
						<h2>
							<a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>"><?php the_title()?></a>
						</h2>
						<div>
						<?php _codetheme_post_meta();?>
						</div>
						<div>
							<?php the_excerpt();?>
						</div>
						<?php _codetheme_readmore();?>
						<?php echo _codetheme_delete_post();?>
						</div>
				<?php }?>
				<?php the_posts_pagination()?>

			<?php } else { ?>

			<p> <?php esc_html_e('Sorry, No Post found', '_codetheme') ?></p>

			<?php } ?>