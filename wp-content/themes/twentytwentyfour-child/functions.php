<?php
/**
 * Twenty Twenty-Four Child Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue parent theme and child theme styles
 */
function twentytwentyfour_child_enqueue_styles() {
    // 載入父主題樣式
    wp_enqueue_style('twentytwentyfour-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme('twentytwentyfour')->get('Version')
    );

    // 載入子主題樣式
    wp_enqueue_style('twentytwentyfour-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwentyfour-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles');

/**
 * 子主題設置
 */
function twentytwentyfour_child_setup() {
    // 添加翻譯支持
    load_child_theme_textdomain('twentytwentyfour-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'twentytwentyfour_child_setup');

function twentytwentyfour_child_enqueue_assets() {
    // 獲取主題目錄 URL
    $theme_uri = get_stylesheet_directory_uri();
    
    // 註冊字體
    wp_enqueue_style(
        'cardo-font',
        $theme_uri . '/assets/fonts/cardo/cardo.css',
        array(),
        '1.0.0'
    );
    
    // 如果有自定義 CSS
    wp_enqueue_style(
        'custom-styles',
        $theme_uri . '/assets/css/custom.css',
        array(),
        '1.0.0'
    );
    
    // 如果需要在區塊編輯器中也使用這些資源
    add_editor_style( array(
        '/assets/fonts/cardo/cardo.css',
        '/assets/css/custom.css'
    ) );
}
add_action('wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_assets'); 