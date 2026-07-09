<?php
/**
 * Plugin activation handling.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Activator')) {
    /**
     * Keeps activation side effects intentionally minimal for Task 001.
     */
    final class LTHCP_Activator
    {
        public static function activate(): void
        {
            do_action('lthcp_activated');
        }
    }
}
