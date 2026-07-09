<?php
/**
 * Plugin deactivation handling.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Deactivator')) {
    /**
     * Keeps deactivation non-destructive.
     */
    final class LTHCP_Deactivator
    {
        public static function deactivate(): void
        {
            do_action('lthcp_deactivated');
        }
    }
}
