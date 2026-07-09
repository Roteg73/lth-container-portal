<?php
/**
 * Shared helper functions.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('lthcp_get_version')) {
    function lthcp_get_version(): string
    {
        return defined('LTHCP_VERSION') ? (string) LTHCP_VERSION : '0.0.0';
    }
}

if (!function_exists('lthcp_get_template_path')) {
    function lthcp_get_template_path(string $template): string
    {
        $template = ltrim($template, '/\\');

        return LTHCP_PLUGIN_DIR . 'templates/' . $template;
    }
}
