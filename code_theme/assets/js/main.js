jQuery(document).ready(function( $ ) {

$('.c-navigation').on('mouseenter', '.menu-item-has-children', (e) => {
    if(!$(e.currentTarget).parents('.sub-menu').length) {
        $('.menu > .menu-item.open').find('> a > .menu-button').trigger('click');
    }
    $(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', (e) => {
    $(e.currentTarget).removeClass('open');
})

});

// hide or display the mobile menu
    /*----------------------------
     Jquery MeanMenu
    ------------------------------ */
    jQuery('#mobile-menu-active').meanmenu();
    

    

 

    /*Category accordion*/


