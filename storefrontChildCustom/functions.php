<?php
function add_class_on_scroll() {
    echo '<script>
        jQuery(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 120) {
                    $("#masthead-sticky").addClass("sticky-active");
                } else {
                    $("#masthead-sticky").removeClass("sticky-active");
                }
            });
        });
    </script>';
}
add_action('wp_footer', 'add_class_on_scroll');

// Hoocking functions to action storefront_header_sticky which was added in custom child theme header.php
add_action( 'storefront_header_sticky', 'storefront_header_container', 0 );
add_action( 'storefront_header_sticky', 'storefront_skip_links', 5 );
// add_action( 'storefront_header_sticky', 'storefront_site_branding', 20 );
add_action( 'storefront_header_sticky', 'storefront_secondary_navigation', 30 );
add_action( 'storefront_header_sticky', 'storefront_header_container_close', 41 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation_wrapper', 42 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation', 50 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation_wrapper_close', 68 );
add_action( 'storefront_header_sticky', 'storefront_header_cart', 60 );

?>