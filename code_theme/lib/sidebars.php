<?php

function _themename_sidebar_widgets() {
    register_sidebar( array(
        'id' => 'primary-sidebar',
        'name' => esc_html__( 'Primary Sidebar', '_codetheme' ),
        'description' => esc_html__( 'This sidebar appears in the blog posts page.', '_codetheme' ),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ) );
}


$footer_layout = sanitize_text_field(get_theme_mod('_codetheme_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);


foreach ($columns as $i => $column) {
    register_sidebar( array(
        'id' => 'footer-sidebar-' . ($i + 1),
        'name' => sprintf(esc_html__( 'Footer Widgets Column %s', '_codetheme' ), $i +1),
        'description' => esc_html__( 'Footer widgets', '_codetheme' ),
        'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ) );
}
add_action('widgets_init', '_themename_sidebar_widgets');
?>