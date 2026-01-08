<?php
/**
 * Plugin Name: Admin Performance Widget
 * Description: Adds a dashboard widget showing basic system and WordPress info.
 * Version: 1.0
 * Author: Janhavi Takale
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_dashboard_setup', 'apw_register_widget');

function apw_register_widget() {
    wp_add_dashboard_widget(
        'apw_dashboard_widget',
        'System Overview',
        'apw_render_widget'
    );
}

function apw_render_widget() {
    echo '<ul>';
    echo '<li><strong>WordPress Version:</strong> ' . esc_html(get_bloginfo('version')) . '</li>';
    echo '<li><strong>PHP Version:</strong> ' . esc_html(PHP_VERSION) . '</li>';
    echo '<li><strong>Active Theme:</strong> ' . esc_html(wp_get_theme()->get('Name')) . '</li>';
    echo '<li><strong>Memory Limit:</strong> ' . esc_html(WP_MEMORY_LIMIT) . '</li>';
    echo '<li><strong>Active Plugins:</strong> ' . esc_html(count(get_option('active_plugins'))) . '</li>';
    echo '</ul>';
}
