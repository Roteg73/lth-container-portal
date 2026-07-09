<?php
/**
 * WordPress admin menu registration.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Admin_Menu')) {
    /**
     * Adds the initial status page for the plugin.
     */
    final class LTHCP_Admin_Menu
    {
        private const MENU_SLUG = 'lth-container-portal';

        private const STATUS_SLUG = 'lth-container-portal-status';

        public function register_menu(): void
        {
            add_menu_page(
                __('LTH Container Portal', 'lth-container-portal'),
                __('LTH Container Portal', 'lth-container-portal'),
                'manage_options',
                self::MENU_SLUG,
                array($this, 'render_status_page'),
                'dashicons-building',
                58
            );

            add_submenu_page(
                self::MENU_SLUG,
                __('Status', 'lth-container-portal'),
                __('Status', 'lth-container-portal'),
                'manage_options',
                self::STATUS_SLUG,
                array($this, 'render_status_page')
            );
        }

        public function render_status_page(): void
        {
            if (!current_user_can('manage_options')) {
                wp_die(esc_html__('Du saknar behorighet att visa denna sida.', 'lth-container-portal'));
            }

            $status_page = LTHCP_PLUGIN_DIR . 'admin/views/status-page.php';

            if (is_readable($status_page)) {
                require $status_page;
                return;
            }

            echo '<div class="wrap">';
            echo '<h1>' . esc_html__('LTH Container Portal', 'lth-container-portal') . '</h1>';
            echo '<p>' . esc_html__('Statussidan kunde inte laddas.', 'lth-container-portal') . '</p>';
            echo '</div>';
        }
    }
}
