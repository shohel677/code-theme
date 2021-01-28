<?php

function _codetheme_post_meta(){

		printf(
			esc_html__(' Posted on: %s', '_codetheme'), '<a href="' . esc_url(get_permalink()) . '" ><time datetime= "' . esc_attr(get_the_date('c')) . '"> ' . esc_html(get_the_date()) . '</time></a>'
		
	);

	printf(
		esc_html__(' By %s', '_codetheme'), '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
	);



}

function _codetheme_readmore(){
		echo '<a  href = "' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '" >';
		printf( 
			wp_kses(
				__('Read more <span class="u-screen-reader-text"> About %s</span>', '_codetheme'), 
				
				[
				'span' => [
					'class' => []
				]
				]
					),
				
				
				get_the_title() 
		
		);
		
	
		echo '</a>';
}






function _codetheme_delete_post() {
    $url = add_query_arg([
        'action' => '_codetheme_delete_post',
        'post' => get_the_ID(),
        'nonce' => wp_create_nonce( '_codetheme_delete_post_' . get_the_ID() )
    ], home_url());
    if(current_user_can( 'delete_post', get_the_ID() )) {
        return "<a href='" . esc_url($url) . "'>" . esc_html__( 'Delete Post', '_codetheme' ) . "</a>";
    }
}


function _themename_meta( $id, $key, $default) {
    $value = get_post_meta( $id, $key, true );
    if(!$value && $default) {
        return $default;
    }
    return $value;
}





?>