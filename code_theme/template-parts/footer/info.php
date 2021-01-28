<?php
    $site_info = _codetheme_sanitize_site_info(get_theme_mod('_codetheme_site_info', ''));
?>
<?php if($site_info) { ?>
<div class="c-site-info">
    <div class="container">
        <div class="row">  
        <div class="col-lg-12">  
            <div class="c-site-info_text text-center">
                <?php 
                $allowed = array('a' => array(
                    'href' => array(),
                    'title' => array()
                ));
                echo wp_kses( $site_info, $allowed ); ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>