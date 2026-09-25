<?php
/**
 * includes/functions.php — helper functions for templates, schema, SEO
 * Included in config.php before any page output.
 */

/**
 * Check if the current page matches the given page slug
 * @param string $page The page slug to check (e.g., 'home', 'services', 'about')
 * @return bool
 */
function isActivePage($page) {
    $currentPath = $_SERVER['REQUEST_URI'];
    $currentPath = strtok($currentPath, '?'); // Strip query string
    $currentPath = rtrim($currentPath, '/');

    if ($page === 'home') {
        return $currentPath === '' || $currentPath === '/index.php';
    }

    return strpos($currentPath, '/' . $page) === 0;
}

/**
 * Format phone number for display
 * @param string $phone Raw phone number
 * @return string Formatted phone number
 */
function formatPhone($phone) {
    // Remove all non-numeric characters
    $cleaned = preg_replace('/[^0-9]/', '', $phone);

    // Format as (XXX) XXX-XXXX
    if (strlen($cleaned) === 10) {
        return sprintf('(%s) %s-%s',
            substr($cleaned, 0, 3),
            substr($cleaned, 3, 3),
            substr($cleaned, 6, 4)
        );
    }

    return $phone; // Return original if not 10 digits
}

/**
 * Generate slug from service name
 * @param string $name Service name
 * @return string URL-safe slug
 */
function getServiceSlug($name) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
}

/**
 * Generate slug from area/city name
 * @param string $city City name
 * @return string URL-safe slug
 */
function getAreaSlug($city) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $city), '-'));
}

/**
 * Generate Service schema markup
 * @param array $service Service data with name, description
 * @return array Schema.org Service object
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $address;

    return [
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'] ?? '',
        'provider' => [
            '@id' => $siteUrl . '/#organization'
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $address['city'],
            '@type' => 'State',
            'name' => $address['state']
        ]
    ];
}

/**
 * Generate FAQPage schema markup
 * @param array $faqs Array of FAQ items with 'q' and 'a' keys
 * @return array Schema.org FAQPage object
 */
function generateFAQSchema($faqs) {
    global $siteUrl;

    $mainEntity = [];
    foreach ($faqs as $faq) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];
}

/**
 * Generate BreadcrumbList schema
 * @param array $crumbs Array of breadcrumb items [['name' => '', 'url' => ''], ...]
 * @return array Schema.org BreadcrumbList object
 */
function generateBreadcrumbSchema($crumbs) {
    global $siteUrl;

    $itemListElement = [];
    foreach ($crumbs as $index => $crumb) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['name'],
            'item' => $crumb['url']
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];
}

/**
 * Render inline SVG icon from references/lucide-icons
 * @param string $name Icon name (e.g., 'phone', 'mail', 'check')
 * @param int $size Icon size in pixels (default 24)
 * @return string SVG markup
 */
function icon($name, $size = 24) {
    $iconPath = '/home/calvin/crm/references/lucide-icons/' . $name . '.svg';

    if (!file_exists($iconPath)) {
        return '<!-- icon not found: ' . htmlspecialchars($name) . ' -->';
    }

    $svg = file_get_contents($iconPath);

    // Add aria-hidden and size attributes
    $svg = str_replace('<svg', '<svg aria-hidden="true" width="' . $size . '" height="' . $size . '"', $svg);

    return $svg;
}

/**
 * Escape and format text for safe HTML output
 * @param string $text Text to escape
 * @return string HTML-safe text
 */
function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
