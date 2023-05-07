<?php
function add_class_on_scroll() {
    echo '<script>
        jQuery(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 120) {
                    $("header").addClass("sticky-active");
                } else {
                    $("header").removeClass("sticky-active");
                }
            });
        });
    </script>';
}
add_action('wp_footer', 'add_class_on_scroll');
?>