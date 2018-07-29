<?php
/**
 * Plugin Name: WooWine
 * Plugin URI: https://github.com/domingobishop/woowine
 * Description: A Woocommerce plugin for wine.
 * Version: 0.1 beta
 * Author: Chris Bishop
 * Author URI: https://github.com/domingobishop
 * License: GPL2
 */

// Included functions
include 'functions-global.php';
include 'functions-woo.php';

add_action('wp_enqueue_scripts', 'woo_wine_styles');
add_action('after_setup_theme', 'woocommerce_support');
add_action('woocommerce_before_main_content', 'woo_wine_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'woo_wine_wrapper_end', 10);
add_action('init', 'woo_wine_bottle_thumbnail');
add_action('woocommerce_before_cart_table', 'woo_wine_add_continue_shopping_button_to_cart');

add_filter('woocommerce_related_products_args', 'woo_wine_remove_related_products', 10);
add_filter('woocommerce_product_tabs', 'woo_wine_remove_reviews_tab', 98);
add_filter('woocommerce_product_tabs', 'woo_wine_rename_tabs', 98);
add_filter('woocommerce_product_description_heading', 'woo_wine_change_product_description_tab_heading', 10, 1);

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
