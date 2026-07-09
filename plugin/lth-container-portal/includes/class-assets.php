<?php
/**
 * Asset registration and enqueueing.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Assets')) {
    /**
     * Handles plugin assets without loading public files globally yet.
     */
    final class LTHCP_Assets
    {
        private const ADMIN_HOOKS = array(
            'toplevel_page_lth-container-portal',
            'lth-container-portal_page_lth-container-portal-status',
        );

        public function enqueue_admin_assets(string $hook_suffix): void
        {
            if (!$this->is_plugin_admin_page($hook_suffix)) {
                return;
            }

            wp_enqueue_style(
                'lthcp-admin',
                LTHCP_PLUGIN_URL . 'assets/css/admin.css',
                array(),
                LTHCP_VERSION
            );

            wp_enqueue_script(
                'lthcp-admin',
                LTHCP_PLUGIN_URL . 'assets/js/admin.js',
                array(),
                LTHCP_VERSION,
                true
            );
        }

        public function register_public_assets(): void
        {
            wp_register_style(
                'lthcp-public',
                LTHCP_PLUGIN_URL . 'assets/css/public.css',
                array(),
                LTHCP_VERSION
            );

            wp_register_script(
                'lthcp-public',
                LTHCP_PLUGIN_URL . 'assets/js/public.js',
                array(),
                LTHCP_VERSION,
                true
            );
        }

        private function is_plugin_admin_page(string $hook_suffix): bool
        {
            return in_array($hook_suffix, self::ADMIN_HOOKS, true);
        }
    }
}
