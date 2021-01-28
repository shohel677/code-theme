<?php

$inline_styles_selectors = array (
	'body' => array(
        'background-color' => '_body_accent_colour',
    ),

    ':focus' => array(
        'outline-color' => '_themename_accent_colour',
    ),
    '.c-post.sticky' => array(
        'border-left-color' => '_themename_accent_colour',
    )
);

$inline_styles = "";

foreach ($inline_styles_selectors as $selector => $props) {
    $inline_styles .= "{$selector} {";
        foreach ($props as $prop => $value) {
            $inline_styles .= "{$prop}: " . sanitize_hex_color(get_theme_mod( $value, '#16582d' )) . ";";
        }
    $inline_styles .= "} ";
}
