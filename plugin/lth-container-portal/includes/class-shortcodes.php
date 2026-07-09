<?php
/**
 * Shortcode registration.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Shortcodes')) {
    /**
     * Registers public shortcodes for the plugin.
     */
    final class LTHCP_Shortcodes
    {
        private LTHCP_Public_Product $public_product;

        private LTHCP_Assets $assets;

        public function __construct(LTHCP_Public_Product $public_product, LTHCP_Assets $assets)
        {
            $this->public_product = $public_product;
            $this->assets         = $assets;
        }

        public function register(): void
        {
            add_shortcode('lth_container_product', array($this, 'render_public_product'));
        }

        /**
         * @param mixed $attributes Shortcode attributes, currently unused.
         */
        public function render_public_product($attributes = array(), ?string $content = null): string
        {
            unset($attributes, $content);

            $this->assets->enqueue_public_assets();

            return $this->public_product->render();
        }
    }
}
