<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Services Overview
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/';
$pageTitle       = 'Cleaning Services in Sacramento, CA | ' . $siteName;
$metaDescription = 'Complete cleaning services for Sacramento homes and businesses: house cleaning, deep cleans, move-outs, office cleaning, gutter cleaning and more. Family-owned since 1991. Call ' . formatPhone($phone) . '.';

// Service categories with metadata
$serviceCategories = [
    [
        'name'        => 'Cleaning Services',
        'slug'        => 'cleaning-services',
        'icon'        => 'home',
        'description' => 'Residential and specialty cleaning across Sacramento — house cleaning, deep cleans, move-in/move-out turnovers, recurring maintenance, plus carpet, window, blind and pressure washing.',
        'services'    => [
            'House Cleaning',
            'Deep Cleaning',
            'Move-In / Move-Out Cleaning',
            'Recurring House Cleaning',
            'Post-Construction Cleaning',
            'Carpet Cleaning',
            'Window Cleaning',
            'Blind Cleaning',
            'Pressure Washing',
        ],
    ],
    [
        'name'        => 'Seasonal Services',
        'slug'        => 'seasonal-services',
        'icon'        => 'snowflake',
        'description' => 'Seasonal and commercial add-ons for Sacramento homes and businesses, including office cleaning and professional Christmas light installation.',
        'services'    => [
            'Office Cleaning',
            'Christmas Light Installation',
        ],
    ],
    [
        'name'        => 'Gutter Cleaning',
        'slug'        => 'gutter-cleaning',
        'icon'        => 'droplets',
        'description' => 'Professional gutter cleaning for Sacramento homes — clearing debris and blockages to protect roofs, fascia and foundations before the rainy season.',
        'services'    => [
            'Gutter Cleaning',
        ],
    ],
];

// @graph schema: BreadcrumbList
$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $canonicalUrl]
        ])
    ]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Services Overview page — composition
   ============================================================================ */

/* Service category cards */
.services-overview {
  display: grid;
  gap: var(--space-xl);
  margin-top: var(--space-xl);
}

.category-card {
  position: relative;
  background: var(--color-surface);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: var(--transition);
  overflow: hidden;
}
.category-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, var(--color-accent), var(--color-accent-light));
}
.category-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.category-header {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  margin-bottom: var(--space-md);
}
.category-icon {
  display: inline-flex;
  width: 64px;
  height: 64px;
  border-radius: var(--radius);
  background: linear-gradient(135deg, var(--color-accent-light), var(--color-accent));
  color: white;
  align-items: center;
  justify-content: center;
  flex: 0 0 auto;
}
.category-header h2 {
  font-size: 1.8rem;
  margin: 0;
  color: var(--color-ink);
}

.category-card p {
  font-size: 1.05rem;
  color: var(--color-muted);
  line-height: 1.6;
  margin-bottom: var(--space-md);
}

.category-services {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: var(--space-sm);
  margin: var(--space-md) 0;
  padding: var(--space-md) 0;
  border-top: 1px solid var(--color-border);
}
.category-services li {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: 0.95rem;
  color: var(--color-muted);
}
.category-services li svg {
  color: var(--color-accent);
  flex: 0 0 auto;
}

.category-card .btn {
  margin-top: var(--space-md);
}

/* Why choose section */
.why-choose-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-lg);
}
.why-item {
  text-align: center;
  padding: var(--space-lg);
}
.why-item__icon {
  display: inline-flex;
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary-light), var(--color-primary));
  color: white;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
}
.why-item h3 {
  font-size: 1.2rem;
  margin-bottom: var(--space-sm);
  color: var(--color-ink);
}
.why-item p {
  font-size: 0.95rem;
  color: var(--color-muted);
  line-height: 1.6;
}

@media (max-width: 900px) {
  .category-services {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior">
  <div class="container">
    <div class="hero-content">
      <span class="eyebrow">Sacramento, CA</span>
      <h1 class="hero-title">Cleaning services in Sacramento</h1>
      <p class="hero-answer">
        Express Pro Cleaning Services handles the full range of residential and commercial cleaning across Sacramento: house cleaning, deep cleans, move-outs, recurring service, office cleaning, gutter cleaning and more — from a family team serving the area since 1991.
      </p>
      <div class="hero-actions">
        <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
        <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
          <?php echo icon('phone', 18); ?>
          <span>or call <?php echo formatPhone($phone); ?></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE CATEGORIES ============================ -->
<section class="section section--light" aria-label="Service categories">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What cleaning services can you book with <span class="text-accent">Express Pro</span>?</h2>
      <p class="answer-block">
        Express Pro Cleaning Services organizes its work into three categories: residential cleaning (house cleaning, deep cleans, move-outs, carpets, windows, pressure washing), seasonal services (office cleaning and Christmas lights), and gutter cleaning. Each category has its own service page with details, pricing and FAQ.
      </p>
    </div>

    <div class="services-overview">
      <?php foreach ($serviceCategories as $i => $cat): ?>
      <article class="category-card reveal-up reveal-delay-<?php echo min($i + 1, 3); ?>">
        <div class="category-header">
          <div class="category-icon">
            <?php echo icon($cat['icon'], 32); ?>
          </div>
          <h2><?php echo e($cat['name']); ?></h2>
        </div>

        <p><?php echo e($cat['description']); ?></p>

        <ul class="category-services">
          <?php foreach ($cat['services'] as $svc): ?>
          <li>
            <?php echo icon('check', 18); ?>
            <span><?php echo e($svc); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>

        <a href="/services/<?php echo e($cat['slug']); ?>/" class="btn btn-primary">
          Learn more about <?php echo e($cat['name']); ?>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ WHY CHOOSE ============================ -->
<section class="section on-dark texture-grain edge-curve-top" aria-label="Why choose Express Pro">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Express Pro</span>
      <h2>Why do Sacramento homeowners and businesses choose <span class="text-accent">Express Pro Cleaning Services</span>?</h2>
      <p class="answer-block">
        Express Pro is family-owned and hands-on — no franchise system, no rotating crews — with 35 years cleaning Sacramento homes and offices. We bring our own eco-friendly supplies, we speak English, Ukrainian and Russian, and we make it right if something is not perfect before we leave the job.
      </p>
    </div>

    <div class="why-choose-grid">
      <div class="why-item reveal-up reveal-delay-1">
        <div class="why-item__icon">
          <?php echo icon('users', 32); ?>
        </div>
        <h3>Family team, not strangers</h3>
        <p>Owner-operated family business. You deal with the same people every time, not rotating contractors or a call center.</p>
      </div>

      <div class="why-item reveal-up reveal-delay-2">
        <div class="why-item__icon">
          <?php echo icon('calendar-check', 32); ?>
        </div>
        <h3>35 years in Sacramento</h3>
        <p>Started in 1991 as Express Mini Blind & Window Cleaning. Three decades later, still family-run, still local.</p>
      </div>

      <div class="why-item reveal-up reveal-delay-3">
        <div class="why-item__icon">
          <?php echo icon('leaf', 32); ?>
        </div>
        <h3>Eco-friendly products</h3>
        <p>All cleaning supplies are non-toxic and safe for kids, pets and people with sensitivities. No upcharge for green products.</p>
      </div>

      <div class="why-item reveal-up reveal-delay-4">
        <div class="why-item__icon">
          <?php echo icon('globe', 32); ?>
        </div>
        <h3>Three languages</h3>
        <p>We work in English, Ukrainian and Russian. Book and communicate in whichever language you prefer.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="section section--light" aria-label="Get a free estimate">
  <div class="container cta-final">
    <div class="cta-content reveal-up">
      <h2>Get a free cleaning estimate for your Sacramento home or business</h2>
      <p>Call <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply the same day with a clear quote. Serving Sacramento since 1991.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get my free estimate</button>
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg">
          <?php echo icon('phone', 20); ?>
          <span>Call now</span>
        </a>
      </div>
    </div>
  </div>
</section>

<script type="application/ld+json">
<?php echo json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
