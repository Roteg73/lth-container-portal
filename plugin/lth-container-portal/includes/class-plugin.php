<?php
/**
 * Core plugin bootstrap.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Plugin')) {
    /**
     * Registers the plugin hooks needed for the current task.
     */
    final class LTHCP_Plugin
    {
        private static ?LTHCP_Plugin $instance = null;

        private LTHCP_Assets $assets;

        private LTHCP_Admin_Menu $admin_menu;

        private function __construct()
        {
            $this->assets     = new LTHCP_Assets();
            $this->admin_menu = new LTHCP_Admin_Menu();
        }

        public static function instance(): self
        {
            if (null === self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function run(): void
        {
            add_action('admin_menu', array($this->admin_menu, 'register_menu'));
            add_action('admin_enqueue_scripts', array($this->assets, 'enqueue_admin_assets'));
            add_action('wp_enqueue_scripts', array($this->assets, 'register_public_assets'));
        }
    }
}
