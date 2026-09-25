<?php
/**
 * sitemap.php — dynamic XML sitemap that builds from config.php
 * .htaccess rewrites /sitemap.xml → /sitemap.php, so external links
 * still reference the canonical /sitemap.xml URL.
 *
 * Auto-includes new services/areas when config.php changes.
 */
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <!-- Homepage -->
  <url>
    <loc><?php echo e($siteUrl); ?>/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>

  <!-- Services Pages -->
  <?php foreach ($services as $svc): ?>
  <url>
    <loc><?php echo e($siteUrl); ?>/services/<?php echo e($svc['slug']); ?>/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <?php endforeach; ?>

  <!-- Services Index -->
  <url>
    <loc><?php echo e($siteUrl); ?>/services/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <!-- Service Areas (Standard tier: combined page) -->
  <url>
    <loc><?php echo e($siteUrl); ?>/service-areas/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <!-- About -->
  <url>
    <loc><?php echo e($siteUrl); ?>/about/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>

  <!-- Contact -->
  <url>
    <loc><?php echo e($siteUrl); ?>/contact/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>

  <!-- Legal/Compliance Pages (priority 0.3, changefreq yearly) -->
  <url>
    <loc><?php echo e($siteUrl); ?>/privacy-policy/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo e($siteUrl); ?>/terms/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo e($siteUrl); ?>/cookie-policy/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>

  <url>
    <loc><?php echo e($siteUrl); ?>/accessibility/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.3</priority>
  </url>
</urlset>
