<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — 404 Error
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = '404';
$noindex         = true; // Do not index 404 pages
$pageTitle       = 'Page Not Found | ' . $siteName;
$metaDescription = 'The page you are looking for could not be found. Return to the homepage or contact Express Pro Cleaning Services for assistance.';
$pageDescription = $metaDescription;
$canonicalUrl    = $siteUrl . '/404';

http_response_code(404);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   404 Page — composition
   ============================================================================ */

.error-page {
  min-height: calc(100vh - var(--nav-height) - 200px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem var(--space-xl);
  text-align: center;
}
.error-content {
  max-width: 600px;
}
.error-code {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: clamp(5rem, 12vw, 10rem);
  line-height: 1;
  color: var(--color-primary);
  opacity: 0.1;
  margin-bottom: -2rem;
}
.error-content h1 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  color: var(--color-ink);
  margin-bottom: 1rem;
}
.error-content p {
  color: var(--color-muted);
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 2rem;
}
.error-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: center;
  align-items: center;
}
.popular-pages {
  margin-top: 3rem;
  padding-top: 2rem;
  border-top: 1px solid var(--color-border);
}
.popular-pages h2 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.25rem;
  color: var(--color-ink);
  margin-bottom: 1rem;
}
.popular-links {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8rem;
  justify-content: center;
  list-style: none;
  margin: 0;
  padding: 0;
}
.popular-links a {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: var(--color-bg-alt);
  border: 1px solid var(--color-border);
  border-radius: var(--radius);
  padding: 0.6rem 1.2rem;
  color: var(--color-primary);
  text-decoration: none;
  font-size: 0.95rem;
  transition: background var(--transition), border-color var(--transition), transform var(--transition);
}
.popular-links a:hover {
  background: var(--color-primary);
  color: #fff;
  border-color: var(--color-primary);
  transform: translateY(-2px);
}
.popular-links svg {
  width: 16px;
  height: 16px;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">
  <div class="error-page">
    <div class="error-content">
      <div class="error-code" aria-hidden="true">404</div>
      <h1>Page Not Found</h1>
      <p>
        Sorry, the page you are looking for does not exist or has been moved. You can return to the homepage or explore our popular pages below.
      </p>

      <div class="error-actions">
        <a href="/" class="btn btn-primary btn-lg">
          <?php echo icon('home', 20); ?>
          <span>Go to homepage</span>
        </a>
        <button type="button" class="btn btn-secondary btn-lg" data-open-estimate>
          <?php echo icon('clipboard-list', 20); ?>
          <span>Get a free estimate</span>
        </button>
      </div>

      <div class="popular-pages">
        <h2>Popular Pages</h2>
        <ul class="popular-links">
          <?php foreach ($services as $svc404): ?>
          <li>
            <a href="/<?php echo getServiceSlug($svc404['slug']); ?>/">
              <?php echo icon('arrow-right', 16); ?>
              <span><?php echo e($svc404['name']); ?></span>
            </a>
          </li>
          <?php endforeach; ?>
          <li>
            <a href="/about/">
              <?php echo icon('arrow-right', 16); ?>
              <span>About Us</span>
            </a>
          </li>
          <li>
            <a href="/contact/">
              <?php echo icon('arrow-right', 16); ?>
              <span>Contact</span>
            </a>
          </li>
        </ul>
      </div>

      <p style="margin-top: 2rem; color: var(--color-muted); font-size: 0.95rem;">
        Still can't find what you need? Call us at <a href="tel:<?php echo $phoneRaw; ?>" style="color: var(--color-primary); text-decoration: underline;"><?php echo formatPhone($phone); ?></a>
      </p>
    </div>
  </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
