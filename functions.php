add_filter('wp_nav_menu_items','add_custom_in_menu', 10, 2);

// add in Logo in the middle of the menu
//
function add_custom_in_menu( $items, $args )
{
    if( $args->theme_location == 'footer_navigation' )
    {
        $new_item       = array( '<li class="menu-logo"><a href="/"><img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt=""></a></li>' );
        $items          = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );

        $array_items    = explode( ',', $items );
        array_splice( $array_items, 2, 0, $new_item ); // splice in at position 3
        $items          = implode( '', $array_items );
    }
    return $items;
}
