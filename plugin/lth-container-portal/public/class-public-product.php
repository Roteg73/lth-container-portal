<?php
/**
 * Public product presentation rendering.
 *
 * @package LTH_Container_Portal
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('LTHCP_Public_Product')) {
    /**
     * Builds data for the public product template.
     */
    final class LTHCP_Public_Product
    {
        public function render(): string
        {
            $template = lthcp_get_template_path('public-product.php');

            if (!is_readable($template)) {
                return '';
            }

            $data = $this->get_template_data();

            ob_start();
            require $template;

            return (string) ob_get_clean();
        }

        /**
         * @return array<string, mixed>
         */
        private function get_template_data(): array
        {
            return array(
                'hero' => array(
                    'eyebrow'       => __('LTH Container Portal', 'lth-container-portal'),
                    'title'         => __('Flexibel containerlösning för industri, drift och projekt', 'lth-container-portal'),
                    'intro'         => __('En robust och professionell lösning för verksamheter som behöver mobil kapacitet, säker förvaring och tydligare materialflöden utan att bygga fast infrastruktur.', 'lth-container-portal'),
                    'primary_cta'   => array(
                        'label' => __('Kontakta oss för presentation', 'lth-container-portal'),
                        'url'   => '#lthcp-contact',
                    ),
                    'secondary_cta' => array(
                        'label' => __('Begär tillgång till kundportal', 'lth-container-portal'),
                        'url'   => '#lthcp-contact',
                    ),
                ),
                'problem_items' => array(
                    __('Tillfällig kapacitet vid projekt, omställning eller expansion.', 'lth-container-portal'),
                    __('Säker och nära förvaring av verktyg, material och driftkritisk utrustning.', 'lth-container-portal'),
                    __('Mobila lösningar för service, underhåll och etablering på flera platser.', 'lth-container-portal'),
                    __('Bättre ordning i material- och verktygsflöden utan lång startsträcka.', 'lth-container-portal'),
                ),
                'solution_points' => array(
                    __('Robust grund som kan anpassas efter användningsområde och arbetsmiljö.', 'lth-container-portal'),
                    __('Flexibel placering nära produktion, byggarbetsplats eller serviceflöde.', 'lth-container-portal'),
                    __('Tydlig presentationsyta för nästa steg, från behovsbild till genomgång.', 'lth-container-portal'),
                ),
                'use_cases' => array(
                    array(
                        'title' => __('Industri', 'lth-container-portal'),
                        'text'  => __('Stöd för drift, produktion och lokala förbättringsprojekt.', 'lth-container-portal'),
                    ),
                    array(
                        'title' => __('Bygg och projekt', 'lth-container-portal'),
                        'text'  => __('Praktisk etablering när behovet är tidsbegränsat eller flyttbart.', 'lth-container-portal'),
                    ),
                    array(
                        'title' => __('Service och drift', 'lth-container-portal'),
                        'text'  => __('Nära åtkomst till utrustning, reservdelar och arbetsmaterial.', 'lth-container-portal'),
                    ),
                    array(
                        'title' => __('Tillfällig etablering', 'lth-container-portal'),
                        'text'  => __('Snabbare kapacitet utan permanent byggnation i första steget.', 'lth-container-portal'),
                    ),
                    array(
                        'title' => __('Material- och verktygsflöde', 'lth-container-portal'),
                        'text'  => __('Bättre struktur för daglig hantering, utlämning och återställning.', 'lth-container-portal'),
                    ),
                ),
                'portal' => array(
                    'title' => __('Låst presentationsportal när ni vill gå vidare', 'lth-container-portal'),
                    'text'  => __('Efter kontakt kan mer detaljerat material delas i en låst miljö, till exempel presentation, bilder, PDF och tekniska dokument. Den publika sidan visar bara övergripande information.', 'lth-container-portal'),
                ),
                'contact' => array(
                    'title' => __('Vill ni se hela lösningen?', 'lth-container-portal'),
                    'text'  => __('Kontakta oss så ordnar vi en genomgång.', 'lth-container-portal'),
                    'cta'   => array(
                        'label' => __('Kontakta oss för presentation', 'lth-container-portal'),
                        'url'   => '#',
                    ),
                ),
            );
        }
    }
}
