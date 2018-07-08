<?php
// Global functions

function woo_wines_css() {
    wp_register_style('woo-wines-styles', plugin_dir_url(__FILE__) . 'css/styles.css', '', 1.0, 'all');
    wp_enqueue_style('woo-wines-styles');
}