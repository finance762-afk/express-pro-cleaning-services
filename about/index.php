<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — About
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'about';
$canonicalUrl    = $siteUrl . '/about/';
$pageTitle       = 'About Us | ' . $siteName . ' | Family-Owned Since 1991';
$metaDescription = 'Express Pro Cleaning Services is a family-owned Sacramento cleaning business since 1991. Learn about our story, values, and commitment to quality service in English, Ukrainian and Russian.';
$pageDescription = $metaDescription;

// Breadcrumb schema
$breadcrumbs = [
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'About', 'url' => $canonicalUrl],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $metaDescription,
        ],
        generateBreadcrumbSchema($breadcrumbs),
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   About Page — composition
   ============================================================================ */

/* Timeline evolution (larger version) */
.about-timeline {
  position: relative;
  padding-left: 2.5rem;
  display: grid;
  gap: 2rem;
  max-width: 600px;
}
.about-timeline::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
  border-radius: 2px;
}
.timeline-item {
  position: relative;
}
.timeline-item::before {
  content: "";
  position: absolute;
  left: -2.9rem;
  top: 0.3rem;
  width: 14px;
  height: 14px;
  border-radius: 50%;
  background: var(--color-accent);
  border: 3px solid var(--color-bg);
  box-shadow: 0 0 0 2px var(--color-accent);
}
.timeline-item__year {
  font-family: var(--font-accent);
  font-weight: 700;
  font-size: 1.5rem;
  letter-spacing: 0.02em;
  color: var(--color-primary);
  margin-bottom: 0.25rem;
  text-transform: uppercase;
}
.timeline-item__title {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.15rem;
  color: var(--color-ink);
  margin-bottom: 0.5rem;
}
.timeline-item__desc {
  color: var(--color-muted);
  line-height: 1.6;
}

/* Values grid */
.values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}
.value-card {
  background: var(--color-bg);
  border: 2px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
  transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
}
.value-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
  border-color: var(--color-primary);
}
.value-card__icon {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  border-radius: var(--radius);
  display: grid;
  place-items: center;
  color: #fff;
  margin-bottom: 1rem;
}
.value-card h3 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.25rem;
  color: var(--color-ink);
  margin-bottom: 0.5rem;
}
.value-card p {
  color: var(--color-muted);
  line-height: 1.6;
  margin: 0;
}

/* Certifications/credentials */
.credentials-list {
  display: grid;
  gap: 1rem;
  margin-top: 1.5rem;
}
.credential-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  background: var(--color-bg);
  border: 2px solid var(--color-border);
  border-radius: var(--radius);
  padding: 1rem;
}
.credential-item svg {
  color: var(--color-accent);
  flex-shrink: 0;
}
.credential-item__text {
  flex: 1;
}
.credential-item strong {
  display: block;
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--color-ink);
  margin-bottom: 0.25rem;
}
.credential-item span {
  color: var(--color-muted);
  font-size: 0.92rem;
}

/* Team approach section (asymmetric) */
.team-approach {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}
@media (max-width: 900px) {
  .team-approach {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
}
.team-approach__panel {
  position: relative;
  background: linear-gradient(150deg, var(--color-primary), color-mix(in srgb, var(--color-primary) 55%, black));
  color: #fff;
  border-radius: var(--radius-lg);
  padding: clamp(1.5rem, 3vw, 2.5rem);
  box-shadow: var(--shadow-lg);
}
.team-approach__panel h3 {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #fff;
}
.team-approach__panel ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: 0.8rem;
}
.team-approach__panel li {
  display: flex;
  gap: 0.7rem;
  align-items: flex-start;
  font-size: 0.95rem;
  color: rgba(255, 255, 255, 0.92);
}
.team-approach__panel svg {
  color: var(--color-accent-bright);
  flex-shrink: 0;
  margin-top: 2px;
}

/* Owner section */
.owner-highlight {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: 2rem;
  margin-top: 2rem;
  border-left: 4px solid var(--color-accent);
}
.owner-highlight h3 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.3rem;
  color: var(--color-ink);
  margin-bottom: 0.5rem;
}
.owner-highlight .eyebrow {
  font-family: var(--font-accent);
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  font-size: 0.78rem;
  color: var(--color-accent);
  margin-bottom: 0.5rem;
  display: block;
}
.owner-highlight p {
  color: var(--color-muted);
  line-height: 1.7;
  margin-bottom: 0.75rem;
}
.owner-highlight p:last-child {
  margin-bottom: 0;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior">
  <div class="container">
    <div class="hero-text">
      <span class="eyebrow">About Express Pro Cleaning Services</span>
      <h1>A Sacramento cleaning company built on trust since 1991</h1>
      <p class="hero-answer">
        Express Pro Cleaning Services is a family-owned business that has served Sacramento homes and offices for over three decades. We show up when we say we will, keep the same routine every visit, and clean the details most crews skip.
      </p>
      <div class="hero-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get a free estimate</button>
        <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
          <?php echo icon('phone', 18); ?>
          <span>or call <?php echo formatPhone($phone); ?></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================ BREADCRUMB ============================ -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">About</li>
    </ol>
  </div>
</nav>

<!-- ============================ OUR STORY ============================ -->
<section class="section section--light">
  <div class="container">
    <div class="grid-asymmetric">
      <div class="reveal-left">
        <span class="eyebrow-label">Our Story</span>
        <h2>From window cleaning to full-service: <span class="text-accent">35 years in Sacramento</span></h2>
        <p>
          Express Pro Cleaning Services began in 1991 as Express Mini Blind & Window Cleaning, a small Sacramento operation focused on blinds and glass. Owner Anna Piontkevych saw an opportunity to serve local families and businesses with reliable, hands-on work that showed up on time and cleaned the way customers actually wanted it done.
        </p>
        <p>
          As customers asked for more — deep cleans, move-outs, carpets, recurring visits — the company grew service by service. Today Express Pro Cleaning Services covers the full range of home and office cleaning across the Sacramento area, still owner-run, still local, and still built on the same principle: treat every place like it belongs to the family.
        </p>
        <p>
          Three decades later, Express Pro serves customers in English, Ukrainian and Russian, keeping the same team on recurring jobs so you see familiar faces every visit. The name changed from Express Mini Blind & Window Cleaning to Express Pro Cleaning Services, but the commitment stayed the same.
        </p>
      </div>
      <div class="reveal-right">
        <div class="about-timeline">
          <div class="timeline-item">
            <div class="timeline-item__year">1991</div>
            <div class="timeline-item__title">Founded in Sacramento</div>
            <p class="timeline-item__desc">
              Started as Express Mini Blind & Window Cleaning, specializing in blinds and glass for Sacramento homes.
            </p>
          </div>
          <div class="timeline-item">
            <div class="timeline-item__year">Growth</div>
            <div class="timeline-item__title">Services expanded</div>
            <p class="timeline-item__desc">
              Added house cleaning, deep cleans, carpets, move-outs and commercial work as local demand grew.
            </p>
          </div>
          <div class="timeline-item">
            <div class="timeline-item__year">Rebranding</div>
            <div class="timeline-item__title">Became Express Pro</div>
            <p class="timeline-item__desc">
              Rebranded to Express Pro Cleaning Services to reflect the full suite of residential and commercial offerings.
            </p>
          </div>
          <div class="timeline-item">
            <div class="timeline-item__year">Today</div>
            <div class="timeline-item__title">Serving Greater Sacramento</div>
            <p class="timeline-item__desc">
              Continues as a family-owned business serving Sacramento, North Highlands, Rio Linda, Citrus Heights, Carmichael, Elk Grove, Roseville and Folsom in three languages.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ VALUES ============================ -->
<section class="section on-dark texture-grain edge-curve-top">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Values</span>
      <h2>What makes Express Pro <span class="text-accent">different</span></h2>
      <p class="prose">
        These are the principles that guide how we work on every job, from a one-time deep clean to a recurring office contract.
      </p>
    </div>

    <div class="values-grid">
      <div class="value-card reveal-up reveal-delay-1">
        <div class="value-card__icon">
          <?php echo icon('users', 24); ?>
        </div>
        <h3>Family Owned & Operated</h3>
        <p>
          We are a family business, not a franchise. You deal with the owners and the same crew every visit, not a rotating cast of strangers.
        </p>
      </div>

      <div class="value-card reveal-up reveal-delay-2">
        <div class="value-card__icon">
          <?php echo icon('check-circle', 24); ?>
        </div>
        <h3>Consistent Quality</h3>
        <p>
          We use detailed checklists on every job so nothing gets skipped. If you have specific requests, we add them to the routine and keep them there.
        </p>
      </div>

      <div class="value-card reveal-up reveal-delay-3">
        <div class="value-card__icon">
          <?php echo icon('globe', 24); ?>
        </div>
        <h3>Multilingual Service</h3>
        <p>
          Our team works in English, Ukrainian and Russian. Book, ask questions and give instructions in whichever language is easiest for you.
        </p>
      </div>

      <div class="value-card reveal-up reveal-delay-1">
        <div class="value-card__icon">
          <?php echo icon('clock', 24); ?>
        </div>
        <h3>Reliable Scheduling</h3>
        <p>
          We show up when we say we will. Evenings and weekends available for offices so we work around your schedule, not through it.
        </p>
      </div>

      <div class="value-card reveal-up reveal-delay-2">
        <div class="value-card__icon">
          <?php echo icon('shield-check', 24); ?>
        </div>
        <h3>Trust & Transparency</h3>
        <p>
          Clear, flat quotes before we start. No upsells, no hidden fees. If the scope changes we talk to you first, not after.
        </p>
      </div>

      <div class="value-card reveal-up reveal-delay-3">
        <div class="value-card__icon">
          <?php echo icon('home', 24); ?>
        </div>
        <h3>Sacramento Rooted</h3>
        <p>
          We have cleaned Sacramento neighborhoods for 35 years. We know the homes, the weather, the routines that work here.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ TEAM APPROACH ============================ -->
<section class="section section--light">
  <div class="container">
    <div class="team-approach">
      <div class="reveal-left">
        <span class="eyebrow-label">How We Work</span>
        <h2>The Express Pro <span class="text-accent">cleaning standard</span></h2>
        <p>
          Express Pro Cleaning Services treats every home and office the same way: as if it belongs to us. That means showing up on schedule, following the checklist every time, and checking the details before we leave.
        </p>
        <p>
          On recurring jobs we keep the same crew so you see familiar faces and the team knows your space and your preferences. We bring our own equipment and supplies unless you have specific product requests. For move-outs and deep cleans we work section by section, finishing each area completely before moving to the next.
        </p>
        <p>
          If you notice something we missed, tell us — we want to hear about it. That is how we have built a word-of-mouth business across Sacramento for over three decades.
        </p>
      </div>
      <div class="reveal-right">
        <div class="team-approach__panel">
          <h3>What you can expect</h3>
          <ul>
            <li><?php echo icon('calendar-check', 20); ?><span>Scheduled appointments kept — we call ahead if anything changes</span></li>
            <li><?php echo icon('clipboard-check', 20); ?><span>Room-by-room checklist completed on every visit</span></li>
            <li><?php echo icon('users', 20); ?><span>Same crew on recurring jobs — no rotating strangers</span></li>
            <li><?php echo icon('sparkles', 20); ?><span>We bring all equipment and supplies unless you prefer otherwise</span></li>
            <li><?php echo icon('eye', 20); ?><span>Walkthrough before we leave so you can verify the work</span></li>
            <li><?php echo icon('globe', 20); ?><span>Book and communicate in English, Ukrainian or Russian</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ OWNER / CREDENTIALS ============================ -->
<section class="section">
  <div class="container content-narrow">
    <div class="owner-highlight reveal-up">
      <span class="eyebrow">Meet the owner</span>
      <h3><?php echo e($ownerName); ?></h3>
      <p>
        Anna Piontkevych founded Express Mini Blind & Window Cleaning in 1991 and grew it into the full-service operation it is today. She still runs the business day-to-day, handles estimates personally, and keeps the same standard on every job: if it would not pass inspection in her own home, it does not pass.
      </p>
      <p>
        Anna and the Express Pro team serve Sacramento families and businesses in English, Ukrainian and Russian, making it easy for customers to communicate in the language they prefer.
      </p>
    </div>

    <div class="reveal-up" style="margin-top: 3rem;">
      <span class="eyebrow-label">What Sets Us Apart</span>
      <h2>Credentials & commitments</h2>
      <div class="credentials-list">
        <div class="credential-item">
          <?php echo icon('calendar-check', 24); ?>
          <div class="credential-item__text">
            <strong>35+ Years in Business</strong>
            <span>Serving Sacramento since 1991</span>
          </div>
        </div>
        <div class="credential-item">
          <?php echo icon('users', 24); ?>
          <div class="credential-item__text">
            <strong>Family Owned & Operated</strong>
            <span>Owner-run, not a franchise</span>
          </div>
        </div>
        <div class="credential-item">
          <?php echo icon('globe', 24); ?>
          <div class="credential-item__text">
            <strong>Multilingual Team</strong>
            <span>Service in English, Ukrainian and Russian</span>
          </div>
        </div>
        <div class="credential-item">
          <?php echo icon('sparkles', 24); ?>
          <div class="credential-item__text">
            <strong>Full-Service Cleaning</strong>
            <span>Homes, offices, carpets, windows, blinds and gutters</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="cta-band on-dark texture-grain">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content reveal-up">
      <h2>Ready to schedule a cleaning?</h2>
      <p>Call <?php echo formatPhone($phone); ?> or send a quick request and we will get back to you with a clear, flat-rate quote.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg">
          <?php echo icon('phone', 20); ?>
          <span>Call now</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
