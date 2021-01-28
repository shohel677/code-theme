<?php

function _codetheme_add_meta_box() {
    add_meta_box( 
        '_codetheme_post_metabox', 
        'Post Settings', 
        '_codetheme_post_metabox_html', 
        array('post','page'), 
        'normal', 
        'default');
}

add_action( 'add_meta_boxes', '_codetheme_add_meta_box' );

function _codetheme_post_metabox_html($post) {
    $subtitle = get_post_meta($post->ID, '__codetheme_post_subtitle', true);
    $layout = get_post_meta($post->ID, '__codetheme_post_layout', true);
    wp_nonce_field( '_codetheme_update_post_metabox', '_codetheme_update_post_nonce' );
    ?>
    <p>
        <label for="_codetheme_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_codetheme' ); ?></label>
        <br />
        <input class="widefat" type="text" name="_codetheme_post_subtitle_field" id="_codetheme_post_metabox_html" value="<?php echo esc_attr( $subtitle ); ?>" />
    </p>
    <p>
        <label for="_codetheme_post_layout_field"><?php esc_html_e( 'Layout', '_codetheme' ); ?></label>
        <select name="_codetheme_post_layout_field" id="_codetheme_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'full' ); ?> value="full"><?php esc_html_e( 'Full Width', '_codetheme' ); ?></option>
            <option <?php selected( $layout, 'sidebar' ); ?> value="sidebar"><?php esc_html_e( 'Post With Sidebar', '_codetheme' ); ?></option>
        </select>
    </p>
    <?php
}

function _codetheme_save_post_metabox($post_id, $post) {

    $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
    if( !current_user_can( $edit_cap, $post_id )) {
        return;
    }
    if( !isset( $_POST['_codetheme_update_post_nonce']) || !wp_verify_nonce( $_POST['_codetheme_update_post_nonce'], '_codetheme_update_post_metabox' )) {
        return;
    }
    
    if(array_key_exists('_codetheme_post_subtitle_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__codetheme_post_subtitle', 
            sanitize_text_field($_POST['_codetheme_post_subtitle_field'])
        );
    }

    if(array_key_exists('_codetheme_post_layout_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__codetheme_post_layout', 
            sanitize_text_field($_POST['_codetheme_post_layout_field'])
        );
    }
}

add_action( 'save_post', '_codetheme_save_post_metabox', 10, 2 );