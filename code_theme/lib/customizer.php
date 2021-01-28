<?php

function _codetheme_customize_register( $wp_customize ) {



    /*##################  SINGLE SETTINGS ########################*/

    $wp_customize->add_section('_codetheme_single_blog_options', array(
        'title' => esc_html__( 'Single Blog Options', '_codetheme' ),
        'description' => esc_html__( 'You can change single blog options from here.', '_codetheme' ),
        'active_callback' => '_codetheme_show_single_blog_section'
    ));

    $wp_customize->add_setting('_codetheme_display_author_info', array(
        'default' => true,
        'sanitize_callback' => '_codetheme_sanitize_checkbox'
    ));

    $wp_customize->add_control('_codetheme_display_author_info', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Author Info', '_codetheme' ),
        'section' => '_codetheme_single_blog_options'
    ));

    function _codetheme_sanitize_checkbox( $checked ) {
        return (isset($checked) && $checked === true) ? true : false;
    }

    function _codetheme_show_single_blog_section() {
        global $post;
        return is_single() && $post->post_type === 'post';
    }

    /*################## GENERAL SETTINGS ########################*/

    $wp_customize->add_section('_codetheme_general_options', array(
        'title' => esc_html__( 'General Options', '_codetheme' ),
        'description' => esc_html__( 'You can change general options from here.', '_codetheme' )
    ));

    $wp_customize->add_setting('_themename_accent_colour', array(
        'default' => '#16582d',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_themename_accent_colour', array(
        'label' => __( 'Accent Color', '_codetheme' ),
        'section' => '_codetheme_general_options',
    )));    
    $wp_customize->add_setting('_body_accent_colour', array(
        'default' => '#949292',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_body_accent_colour', array(
        'label' => __( 'Body Color', '_codetheme' ),
        'section' => '_codetheme_general_options',
    )));    

    /*################## FOOTER SETTINGS ########################*/



    $wp_customize->add_section('_codetheme_footer_options', array(
        'title' => esc_html__( 'Footer Options', '_codetheme' ),
        'description' => esc_html__( 'You can change footer options from here.', '_codetheme' )
    ));

    $wp_customize->add_setting('_codetheme_site_info', array(
        'default' => '',
        'sanitize_callback' => '_codetheme_sanitize_site_info',
    ));

    $wp_customize->add_control('_codetheme_site_info', array(
        'type' => 'text',
        'label' => esc_html__( 'Site Info', '_codetheme' ),
        'section' => '_codetheme_footer_options'
    ));



    $wp_customize->add_setting('_codetheme_footer_layout', array(
        'default' => '3,3,3,3',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_codetheme_validate_footer_layout'
    ));

    $wp_customize->add_control('_codetheme_footer_layout', array(
        'type' => 'text',
        'label' => esc_html__( 'Footer Layout', '_codetheme' ),
        'section' => '_codetheme_footer_options'
    ));
    
}

add_action( 'customize_register', '_codetheme_customize_register' );


function _codetheme_validate_footer_layout( $validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid', '_codetheme' ));
    }
    return $validity;
}

function _codetheme_sanitize_site_info( $input ) {
    $allowed = array('a' => array(
        'href' => array(),
        'title' => array()
    ));
    return wp_kses($input, $allowed);
}