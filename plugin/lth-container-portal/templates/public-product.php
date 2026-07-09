<?php
/**
 * Public product shortcode template.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$data = isset($data) && is_array($data) ? $data : array();
?>
<section class="lthcp-product" aria-labelledby="lthcp-product-title">
    <div class="lthcp-product__hero">
        <div class="lthcp-product__hero-content">
            <p class="lthcp-product__eyebrow"><?php echo esc_html($data['hero']['eyebrow'] ?? ''); ?></p>
            <h1 id="lthcp-product-title" class="lthcp-product__title"><?php echo esc_html($data['hero']['title'] ?? ''); ?></h1>
            <p class="lthcp-product__intro"><?php echo esc_html($data['hero']['intro'] ?? ''); ?></p>
            <div class="lthcp-product__actions" aria-label="<?php echo esc_attr__('Nästa steg', 'lth-container-portal'); ?>">
                <a class="lthcp-product__button lthcp-product__button--primary" href="<?php echo esc_url($data['hero']['primary_cta']['url'] ?? '#'); ?>">
                    <?php echo esc_html($data['hero']['primary_cta']['label'] ?? ''); ?>
                </a>
                <a class="lthcp-product__button lthcp-product__button--secondary" href="<?php echo esc_url($data['hero']['secondary_cta']['url'] ?? '#'); ?>">
                    <?php echo esc_html($data['hero']['secondary_cta']['label'] ?? ''); ?>
                </a>
            </div>
        </div>
        <div class="lthcp-product__hero-panel" aria-hidden="true">
            <span class="lthcp-product__panel-line"></span>
            <span class="lthcp-product__panel-label"><?php echo esc_html__('Industriell kapacitet', 'lth-container-portal'); ?></span>
        </div>
    </div>

    <div class="lthcp-product__section lthcp-product__section--problem">
        <div class="lthcp-product__section-heading">
            <p class="lthcp-product__section-kicker"><?php echo esc_html__('Problembild', 'lth-container-portal'); ?></p>
            <h2><?php echo esc_html__('När verksamheten behöver mer än en standardlösning', 'lth-container-portal'); ?></h2>
        </div>
        <div class="lthcp-product__problem-grid">
            <?php foreach (($data['problem_items'] ?? array()) as $item) : ?>
                <div class="lthcp-product__problem-item">
                    <span class="lthcp-product__marker" aria-hidden="true"></span>
                    <p><?php echo esc_html($item); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="lthcp-product__section lthcp-product__section--solution">
        <div class="lthcp-product__split">
            <div>
                <p class="lthcp-product__section-kicker"><?php echo esc_html__('Lösningen', 'lth-container-portal'); ?></p>
                <h2><?php echo esc_html__('En flexibel containerlösning byggd för verklig drift', 'lth-container-portal'); ?></h2>
                <p><?php echo esc_html__('Lösningen presenteras på hög nivå och fokuserar på nytta, robusthet och användning i industriella miljöer. Detaljerade specifikationer delas först i rätt sammanhang.', 'lth-container-portal'); ?></p>
            </div>
            <ul class="lthcp-product__check-list">
                <?php foreach (($data['solution_points'] ?? array()) as $point) : ?>
                    <li><?php echo esc_html($point); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="lthcp-product__section">
        <div class="lthcp-product__section-heading">
            <p class="lthcp-product__section-kicker"><?php echo esc_html__('Användningsområden', 'lth-container-portal'); ?></p>
            <h2><?php echo esc_html__('För projekt, drift och tillfällig kapacitet', 'lth-container-portal'); ?></h2>
        </div>
        <div class="lthcp-product__use-grid">
            <?php foreach (($data['use_cases'] ?? array()) as $use_case) : ?>
                <article class="lthcp-product__use-card">
                    <h3><?php echo esc_html($use_case['title'] ?? ''); ?></h3>
                    <p><?php echo esc_html($use_case['text'] ?? ''); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="lthcp-product__section lthcp-product__section--portal">
        <div class="lthcp-product__portal-content">
            <p class="lthcp-product__section-kicker"><?php echo esc_html__('Låst presentationsportal', 'lth-container-portal'); ?></p>
            <h2><?php echo esc_html($data['portal']['title'] ?? ''); ?></h2>
            <p><?php echo esc_html($data['portal']['text'] ?? ''); ?></p>
        </div>
    </div>

    <div id="lthcp-contact" class="lthcp-product__contact">
        <div>
            <p class="lthcp-product__section-kicker"><?php echo esc_html__('Kontakt', 'lth-container-portal'); ?></p>
            <h2><?php echo esc_html($data['contact']['title'] ?? ''); ?></h2>
            <p><?php echo esc_html($data['contact']['text'] ?? ''); ?></p>
        </div>
        <a class="lthcp-product__button lthcp-product__button--primary" href="<?php echo esc_url($data['contact']['cta']['url'] ?? '#'); ?>">
            <?php echo esc_html($data['contact']['cta']['label'] ?? ''); ?>
        </a>
    </div>
</section>
