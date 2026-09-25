<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  // Page-specific variables (set before including this file):
  // $pageTitle, $metaDescription, $canonicalUrl, $pageType, $noindex (optional)
  // $heroPreload (optional) — ['srcset' => '...', 'sizes' => '...']

  $fullTitle = $pageTitle ?? ($siteName . ' | ' . $primaryKeyword . ' | ' . $address['city'] . ', ' . $address['state']);
  $description = $metaDescription ?? 'Professional cleaning services in ' . $address['city'] . ', CA. Family-owned since 1991. Call ' . $phone . ' for a free estimate.';
  $canonical = $canonicalUrl ?? $siteUrl . $_SERVER['REQUEST_URI'];
  $canonical = rtrim($canonical, '/') . '/'; // Ensure trailing slash
  ?>

  <title><?php echo e($fullTitle); ?></title>
  <meta name="description" content="<?php echo e($description); ?>">
  <?php if (isset($noindex) && $noindex): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php endif; ?>

  <link rel="canonical" href="<?php echo e($canonical); ?>">

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo e($fullTitle); ?>">
  <meta property="og:description" content="<?php echo e($description); ?>">
  <meta property="og:url" content="<?php echo e($canonical); ?>">
  <meta property="og:image" content="<?php echo $siteUrl; ?>/assets/images/logo.png">
  <meta property="og:site_name" content="<?php echo e($siteName); ?>">
  <meta property="og:locale" content="en_US">

  <!-- Font preload (above-the-fold heading face only) -->
  <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Critical CSS (inline) + async framework.css (v6.3) -->
  <style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>
  <link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>

  <?php if (!empty($heroPreload)): ?>
  <!-- Hero image preload (v6.3 — AVIF, fetchpriority high) -->
  <link rel="preload" as="image" type="image/avif" imagesrcset="<?php echo $heroPreload['srcset']; ?>" imagesizes="<?php echo $heroPreload['sizes']; ?>" fetchpriority="high">
  <?php endif; ?>

  <!-- JSON-LD Schema -->
  <script type="application/ld+json">
  <?php
  // LocalBusiness schema on homepage, referenced via @id on other pages
  if (!isset($pageType)) $pageType = 'other';

  if ($pageType === 'home') {
    // Full LocalBusiness schema
    $schema = [
      '@context' => 'https://schema.org',
      '@type' => 'LocalBusiness',
      '@id' => $siteUrl . '/#organization',
      'name' => $siteName,
      'image' => $siteUrl . '/assets/images/logo.png',
      'url' => $siteUrl,
      'telephone' => $phone,
      'email' => $email,
      'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => $address['city'],
        'addressRegion' => $address['state'],
        'postalCode' => $address['zip'],
      ],
      'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => 38.6551,
        'longitude' => -121.3621
      ],
      'areaServed' => array_map(function($city) use ($address) {
        return [
          '@type' => 'City',
          'name' => $city,
          'containedInPlace' => [
            '@type' => 'State',
            'name' => $address['state']
          ]
        ];
      }, $serviceAreas),
      'priceRange' => '$$',
      'openingHoursSpecification' => [
        [
          '@type' => 'OpeningHoursSpecification',
          'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
          'opens' => '07:00',
          'closes' => '20:00'
        ],
        [
          '@type' => 'OpeningHoursSpecification',
          'dayOfWeek' => 'Saturday',
          'opens' => '07:00',
          'closes' => '18:00'
        ]
      ],
      'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Cleaning Services',
        'itemListElement' => array_map(function($svc) use ($siteUrl) {
          return [
            '@type' => 'Offer',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => $svc
            ]
          ];
        }, $allServices)
      ]
    ];

    // Add hasMap and directions only when GBP data exists
    if (!empty($gbpProfileUrl)) {
      $schema['hasMap'] = $gbpProfileUrl;
    }

    echo json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  } else {
    // BreadcrumbList for non-homepage
    // Pages will add their own schema (@graph with BreadcrumbList + page-specific types)
    // This is just a placeholder — pages override by echoing their own schema in page <head>
  }
  ?>
  </script>

  <!-- Google Analytics (placeholder — replace at launch) -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $googleAnalyticsId; ?>');
  </script> -->
</head>
