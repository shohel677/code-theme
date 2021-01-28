<?php
    $footer_layout = sanitize_text_field(get_theme_mod('_codetheme_footer_layout', '3,3,3,3'));
    $footer_layout = preg_replace('/\s+/', '', $footer_layout);
    $columns = explode(',', $footer_layout);
    $widgets_active = false;
    foreach ($columns as $i => $column) {
        if( is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
            $widgets_active = true;
        }
    }
?>
<?php if($widgets_active) { ?>
<div class="c-footer">
    <div class="container">
        <div class="row">
            <?php foreach($columns as $i => $column) { ?>
                <div class="col-lg-<?php echo $column ?>">
                    <?php if(is_active_sidebar( 'footer-sidebar-' . ($i + 1) )) {
                        dynamic_sidebar( 'footer-sidebar-' . ($i + 1) );
                    } ?>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<?php } ?>