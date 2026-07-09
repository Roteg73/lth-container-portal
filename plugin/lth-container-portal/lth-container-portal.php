<?php
/**
 * Plugin Name: LTH Container Portal
 * Plugin URI: https://github.com/Roteg73/lth-container-portal
 * Description: Stabil grund for LTH Container Portal som WordPress-plugin.
 * Version: 0.1.0
 * Author: LTH
 * Text Domain: lth-container-portal
 * Requires at least: 6.0
 * Requires PHP: 8.1
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('LTHCP_VERSION')) {
    define('LTHCP_VERSION', '0.1.0');
}

if (!defined('LTHCP_PLUGIN_FILE')) {
    define('LTHCP_PLUGIN_FILE', __FILE__);
}

if (!defined('LTHCP_PLUGIN_DIR')) {
    define('LTHCP_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

if (!defined('LTHCP_PLUGIN_URL')) {
    define('LTHCP_PLUGIN_URL', plugin_dir_url(__FILE__));
}

require_once LTHCP_PLUGIN_DIR . 'includes/helpers.php';
require_once LTHCP_PLUGIN_DIR . 'includes/class-activator.php';
require_once LTHCP_PLUGIN_DIR . 'includes/class-deactivator.php';
require_once LTHCP_PLUGIN_DIR . 'includes/class-assets.php';
require_once LTHCP_PLUGIN_DIR . 'admin/class-admin-menu.php';
require_once LTHCP_PLUGIN_DIR . 'includes/class-plugin.php';

register_activation_hook(LTHCP_PLUGIN_FILE, array('LTHCP_Activator', 'activate'));
register_deactivation_hook(LTHCP_PLUGIN_FILE, array('LTHCP_Deactivator', 'deactivate'));

add_action(
    'plugins_loaded',
    static function (): void {
        LTHCP_Plugin::instance()->run();
    }
);
