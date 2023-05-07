<?php
function add_class_on_scroll() {
    echo '<script>
        jQuery(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 100) {
                    $("#masthead-sticky").addClass("sticky-displayed");
                } else {
                    $("#masthead-sticky").removeClass("sticky-displayed");
                }

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

if ( ! function_exists( 'storefront_primary_navigation_sticky' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation_sticky() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'storefront' ); ?>">
		<button id="site-navigation-menu-toggle-sticky" class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_html( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'primary-navigation',
				)
			);

			wp_nav_menu(
				array(
					'theme_location'  => 'handheld',
					'container_class' => 'handheld-navigation',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

// Hoocking functions to action storefront_header_sticky which was added in custom child theme header.php
add_action( 'storefront_header_sticky', 'storefront_header_container', 0 );
add_action( 'storefront_header_sticky', 'storefront_skip_links', 5 );
// add_action( 'storefront_header_sticky', 'storefront_site_branding', 20 );
add_action( 'storefront_header_sticky', 'storefront_secondary_navigation', 30 );
add_action( 'storefront_header_sticky', 'storefront_header_container_close', 41 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation_wrapper', 42 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation_sticky', 50 );
add_action( 'storefront_header_sticky', 'storefront_primary_navigation_wrapper_close', 68 );
add_action( 'storefront_header_sticky', 'storefront_header_cart', 60 );



if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		$links_output = '';

		if ( apply_filters( 'storefront_credit_link', true ) ) {
			if ( storefront_is_woocommerce_activated() ) {
				$links_output .= '<a href="https://woocommerce.com" target="_blank" title="' . esc_attr__( 'WooCommerce - The Best eCommerce Platform for WordPress', 'storefront' ) . '" rel="noreferrer">' . esc_html__( 'Built with Storefront &amp; WooCommerce', 'storefront' ) . '</a>.';
			} else {
				$links_output .= '<a href="https://woocommerce.com/storefront/" target="_blank" title="' . esc_attr__( 'Storefront -  The perfect platform for your next WooCommerce project.', 'storefront' ) . '" rel="noreferrer">' . esc_html__( 'Built with Storefront', 'storefront' ) . '</a>.';
			}
		}

		if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
			$separator    = '<span role="separator" aria-hidden="true"></span>';
			$links_output = get_the_privacy_policy_link( '', ( ! empty( $links_output ) ? $separator : '' ) ) . $links_output;
		}

		$links_output = apply_filters( 'storefront_credit_links_output', $links_output );
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>
<!-- 
			<?php if ( ! empty( $links_output ) ) { ?>
				<br />
				<?php echo wp_kses_post( $links_output ); ?>
			<?php } ?> 
-->
		</div>
		<?php
	}
}


function add_on_sticky_btn_click() {
    echo '<script>
        jQuery(document).ready(function($) {
            $("#site-navigation-menu-toggle-sticky").on("click", function() {
                if ($(".main-navigation").hasClass("toggled")) {
                    $(".main-navigation").removeClass("toggled");
                } else {
                    $(".main-navigation").addClass("toggled");
                };
            });
        });
    </script>';
}
add_action('wp_footer', 'add_on_sticky_btn_click');


?>