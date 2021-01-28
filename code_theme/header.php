<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header role="banner">
        <div class="c-header">
            <div class="container">
				<div class="row">
					<div class="col-lg-6">
						<?php if(has_custom_logo( )) {
							the_custom_logo();
						} else { ?>
							<a class="c-header_logo" href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html(bloginfo( 'name' )); ?></a>
						<?php } ?>
					</div>
					<div class="col-lg-6 text-right">
						<?php get_search_form( true ); ?>
					</div>
	
                </div>
            </div>	
		<div class="mobile-menu-area d-lg-none d-block fix">
		
            <div class="container">
                <div class="row">
				
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                              	<?php wp_nav_menu( array('theme_location' => 'main-menu') ) ?>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
					<div class="d-none  d-lg-block d-xl-block fix">

			<div class="container ">
				<div class="row">
					<div class="col-lg-12">        
						<div class="c-navigation">
							<div class="o-container">
								<nav class="header-nav" role="navigation" aria-label="<?php esc_html_e( 'Main Navigation', '_themename' ) ?>">
									<?php wp_nav_menu( array('theme_location' => 'main-menu') ) ?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
     </div>
    </header> 