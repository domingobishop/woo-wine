<?php
/**
 * WooCommerce functions
 */

function woocommerce_support()
{
    add_theme_support('woocommerce');
}

function woo_wine_wrapper_start()
{
    echo '<main id="main" class="main" role="main">';
    echo '<div id="content" class="content"><div class="container"><div class="row">';
    echo '<nav class="shop-nav"><div class="col-md-12">';
    wp_nav_menu(array('menu' => 'shop', 'items_wrap' => '<ul class="nav navbar-nav navbar-right" role="menu">%3$s</ul>', 'container' => false));
    echo '</div></nav>';
    echo '<div class="col-md-12">';
}

function woo_wine_wrapper_end()
{
    echo '</div></div></div></div></main>';
}

function woo_wine_bottle_thumbnail()
{
    add_filter('woocommerce_placeholder_img_src', 'bottle_placeholder_img_src');

    function bottle_placeholder_img_src( $src )
    {
        $src = plugin_dir_url(__FILE__) . '/img/bottle-thumb.png';

        return $src;
    }
}

function woo_wine_remove_related_products($args)
{
    return array();
}

function woo_wine_remove_reviews_tab($tabs)
{
    unset($tabs['reviews']);
    unset($tabs['additional_information']);
    return $tabs;
}

function woo_wine_rename_tabs($tabs)
{
    $tabs['description']['title'] = __('Tasting notes');
    return $tabs;
}

function woo_wine_change_product_description_tab_heading($title)
{
    return __('Tasting notes');
}

function woo_wine_add_continue_shopping_button_to_cart()
{
    $shop_page_url = get_permalink(wc_get_page_id('shop'));

    echo '<div class="woocommerce-message">';
    echo ' <a href="' . $shop_page_url . '" class="button">Continue Shopping →</a>';
    echo '</div>';
}