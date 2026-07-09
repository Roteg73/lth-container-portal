<?php
/**
 * Admin status page.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wrap lthcp-status-page">
    <h1><?php echo esc_html__('LTH Container Portal', 'lth-container-portal'); ?></h1>

    <div class="lthcp-status-card">
        <h2><?php echo esc_html__('Status', 'lth-container-portal'); ?></h2>
        <p class="lthcp-status-ok"><?php echo esc_html__('LTH Container Portal är aktivt', 'lth-container-portal'); ?></p>

        <table class="widefat striped lthcp-status-table">
            <tbody>
                <tr>
                    <th scope="row"><?php echo esc_html__('Pluginversion', 'lth-container-portal'); ?></th>
                    <td><?php echo esc_html(lthcp_get_version()); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('WordPress-version', 'lth-container-portal'); ?></th>
                    <td><?php echo esc_html(get_bloginfo('version')); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('PHP-version', 'lth-container-portal'); ?></th>
                    <td><?php echo esc_html(PHP_VERSION); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
