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
