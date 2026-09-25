<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Gutter Cleaning
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'gutter-cleaning';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/gutter-cleaning/';
$pageTitle       = 'Gutter Cleaning Sacramento, CA | ' . $siteName;
$metaDescription = 'Professional gutter cleaning in Sacramento — clear debris and blockages before the rainy season. Protect your roof, fascia and foundation. Call ' . formatPhone($phone) . ' for a free quote.';

// Services covered on this page
$pageServices = [
    'Gutter Cleaning',
];

// FAQ content
$faqs = [
    [
        'q' => 'How much does gutter cleaning cost in Sacramento?',
        'a' => 'Gutter cleaning for a typical Sacramento home costs $120 to $300 depending on the amount of debris, gutter length and roof pitch. Express Pro Cleaning Services gives you a flat quote based on a look at your roofline, usually the same day you call.',
    ],
    [
        'q' => 'How often should I clean my gutters in Sacramento?',
        'a' => 'Most Sacramento homeowners clean gutters twice a year: once in late fall after leaves drop and once in early spring before the heaviest rains. Homes near oak trees or under heavy canopy may need quarterly cleanings to stay clear.',
    ],
    [
        'q' => 'What happens if I don't clean my gutters?',
        'a' => 'Clogged gutters overflow during rain, pouring water down the fascia and siding instead of into downspouts. That water damages the fascia boards, rots the roof edge, floods the foundation and can cause basement or crawlspace leaks.',
    ],
    [
        'q' => 'Do you clean downspouts too?',
        'a' => 'Yes. Express Pro Cleaning Services clears gutters and flushes downspouts to make sure water flows all the way to the ground. If a downspout is jammed with compacted debris, we clear it by hand or with a plumber's snake.',
    ],
    [
        'q' => 'Will you haul away the debris or leave it on the ground?',
        'a' => 'We bag all gutter debris and haul it away as part of the service. You do not need to worry about piles of wet leaves and sludge left in the yard or driveway.',
    ],
    [
        'q' => 'Can you clean gutters on a two-story house?',
        'a' => 'Yes. Express Pro Cleaning Services has the ladders and safety equipment needed to clean gutters on single-story and two-story Sacramento homes safely. Steep pitch or high rooflines are not a problem.',
    ],
    [
        'q' => 'When is the best time to schedule gutter cleaning?',
        'a' => 'Schedule gutter cleaning in late October or November — after the leaves drop but before Sacramento's rainy season begins in earnest. Booking early in the season gives you better availability than waiting until December when everyone remembers the gutters.',
    ],
];

// @graph schema: Service + FAQPage + BreadcrumbList
$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        // Service schema
        [
            '@type' => 'Service',
            '@id' => $siteUrl . '/services/gutter-cleaning/#service',
            'name' => 'Gutter Cleaning',
            'description' => 'Professional gutter cleaning for Sacramento homes — clearing debris and blockages to protect roofs, fascia and foundations before the rainy season.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => [
                '@type' => 'City',
                'name' => $address['city'],
                'containedInPlace' => [
                    '@type' => 'State',
                    'name' => $address['state']
                ]
            ]
        ],
        // FAQPage schema
        generateFAQSchema($faqs),
        // BreadcrumbList schema
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Gutter Cleaning', 'url' => $canonicalUrl]
        ])
    ]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Gutter Cleaning page — composition
   ============================================================================ */

/* Damage scenarios cards */
.damage-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-lg);
}
.damage-card {
  position: relative;
  background: var(--color-surface);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  border-top: 4px solid var(--color-accent);
  box-shadow: var(--shadow-sm);
  transition: var(--transition);
}
.damage-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow);
}
.damage-card__icon {
  display: inline-flex;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-accent-light), var(--color-accent));
  color: white;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-md);
}
.damage-card h3 {
  font-size: 1.25rem;
  margin-bottom: var(--space-sm);
  color: var(--color-ink);
}
.damage-card p {
  font-size: 0.95rem;
  color: var(--color-muted);
  line-height: 1.6;
}

/* What we clean checklist */
.clean-checklist {
  background: var(--color-surface);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  border-left: 4px solid var(--color-accent);
}
.clean-checklist h3 {
  font-size: 1.4rem;
  margin-bottom: var(--space-md);
  color: var(--color-ink);
}
.clean-checklist ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: var(--space-sm);
}
.clean-checklist li {
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  font-size: 1rem;
  color: var(--color-muted);
}
.clean-checklist li svg {
  flex: 0 0 auto;
  color: var(--color-accent);
  margin-top: 3px;
}

/* Seasonal timing banner */
.timing-banner {
  background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
  color: white;
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  text-align: center;
  margin: var(--space-xl) 0;
}
.timing-banner h3 {
  font-size: 1.6rem;
  margin-bottom: var(--space-sm);
  color: white;
}
.timing-banner p {
  font-size: 1.05rem;
  line-height: 1.6;
  max-width: 60ch;
  margin: 0 auto var(--space-md);
  color: rgba(255,255,255,0.95);
}
.timing-banner .btn {
  margin-top: var(--space-sm);
}

/* Process steps horizontal */
.process-horizontal {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-lg);
}
.process-card {
  text-align: center;
  padding: var(--space-lg);
}
.process-card__number {
  display: inline-flex;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: var(--color-accent);
  color: white;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-family: var(--font-accent);
  font-size: 1.5rem;
  margin-bottom: var(--space-md);
}
.process-card h4 {
  font-size: 1.15rem;
  margin-bottom: var(--space-xs);
  color: var(--color-ink);
}
.process-card p {
  font-size: 0.92rem;
  color: var(--color-muted);
  line-height: 1.5;
}

@media (max-width: 900px) {
  .damage-grid,
  .process-horizontal {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior">
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow">Sacramento, CA</span>
        <h1 class="hero-title">Gutter cleaning in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services clears debris and blockages from gutters and downspouts across Sacramento before the rainy season — protecting your roof, fascia and foundation from water damage.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <?php echo icon('phone', 18); ?>
            <span>or call <?php echo formatPhone($phone); ?></span>
          </a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('droplets', 16); ?> Before rainy season</li>
          <li><?php echo icon('shield-check', 16); ?> Roof & foundation protection</li>
          <li><?php echo icon('truck', 16); ?> Debris hauled away</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="estimate-form">
        <h2>Get a free estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo e($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo e($siteUrl); ?>/thank-you">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row">
            <label class="sr-only" for="hero-name">Name</label>
            <input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required>
          </div>
          <div class="form-row">
            <label class="sr-only" for="hero-phone">Phone</label>
            <input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required>
          </div>
          <div class="form-row">
            <label class="sr-only" for="hero-email">Email</label>
            <input id="hero-email" type="email" name="email" placeholder="Email" autocomplete="email" required>
          </div>
          <div class="form-row">
            <label class="sr-only" for="hero-service">Service</label>
            <select id="hero-service" name="service">
              <option value="">What do you need?</option>
              <?php foreach ($pageServices as $heroSvc): ?>
              <option value="<?php echo e($heroSvc); ?>"><?php echo e($heroSvc); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label class="consent">
            <input type="checkbox" name="terms_accepted" value="yes" required>
            <span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a>. *</span>
          </label>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>
    </div>
  </div>
</section>

<!-- ============================ DAMAGE SCENARIOS ============================ -->
<section class="section section--light" aria-label="Why gutter cleaning matters">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why It Matters</span>
      <h2>What happens when gutters clog in <span class="text-accent">Sacramento</span>?</h2>
      <p class="answer-block">
        Clogged gutters overflow during rain, pouring hundreds of gallons of water down your fascia and siding instead of into downspouts. That water rots the fascia boards, damages the roof edge, floods the foundation and can leak into basements or crawlspaces — expensive repairs that cleaning once or twice a year prevents.
      </p>
    </div>

    <div class="damage-grid">
      <div class="damage-card reveal-up reveal-delay-1">
        <div class="damage-card__icon"><?php echo icon('alert-triangle', 28); ?></div>
        <h3>Fascia and soffit rot</h3>
        <p>Overflowing water runs down the fascia boards, soaking the wood. Over time, fascia rots and pulls away from the roofline, requiring expensive carpentry repairs or full board replacement.</p>
      </div>

      <div class="damage-card reveal-up reveal-delay-2">
        <div class="damage-card__icon"><?php echo icon('home', 28); ?></div>
        <h3>Roof edge damage</h3>
        <p>Water backing up in clogged gutters seeps under the roof edge shingles, rotting the decking and rafters. What started as a gutter cleaning becomes a roof repair job.</p>
      </div>

      <div class="damage-card reveal-up reveal-delay-3">
        <div class="damage-card__icon"><?php echo icon('droplets', 28); ?></div>
        <h3>Foundation flooding and cracks</h3>
        <p>Gutters exist to move water away from the foundation. When they overflow, water pools against the foundation walls, causing cracks, leaks into basements or crawlspaces, and settling that shifts the entire structure.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ TIMING BANNER ============================ -->
<section class="section" aria-label="Best time to clean gutters">
  <div class="container">
    <div class="timing-banner reveal-up">
      <h3>Clean gutters in late fall — before Sacramento's rainy season</h3>
      <p>Most Sacramento homeowners schedule gutter cleaning in late October or November, after the leaves drop but before the heaviest winter rains arrive. Waiting until December means clogged gutters during the first big storm and a crowded schedule when everyone remembers at the same time.</p>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate>Schedule my gutter cleaning</button>
    </div>
  </div>
</section>

<!-- ============================ WHAT WE CLEAN ============================ -->
<section class="section section--light" aria-label="What is included">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Service Details</span>
      <h2>What is included in Express Pro's <span class="text-accent">gutter cleaning service</span>?</h2>
      <p class="answer-block">
        Express Pro Cleaning Services clears all debris from gutters by hand, flushes downspouts to confirm water flows freely to the ground, bags and hauls away all leaves and sludge, and inspects for sagging sections or pulled hangers while we are up on the ladder.
      </p>
    </div>

    <div class="clean-checklist reveal-up">
      <h3>Every gutter cleaning includes:</h3>
      <ul>
        <li><?php echo icon('check', 20); ?><span>All leaves, twigs, pine needles and debris removed by hand from gutters</span></li>
        <li><?php echo icon('check', 20); ?><span>Downspouts flushed to clear blockages and confirm free flow</span></li>
        <li><?php echo icon('check', 20); ?><span>Debris bagged and hauled away — no piles left in the yard</span></li>
        <li><?php echo icon('check', 20); ?><span>Gutter hangers and sections inspected for sags or pulls</span></li>
        <li><?php echo icon('check', 20); ?><span>Roof edge checked for visible damage while we are on the ladder</span></li>
        <li><?php echo icon('check', 20); ?><span>Single-story and two-story Sacramento homes — we have the ladders</span></li>
        <li><?php echo icon('check', 20); ?><span>Typically 1-3 hours depending on gutter length and debris volume</span></li>
      </ul>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Simple Process</span>
      <h2>How does booking gutter cleaning in Sacramento <span class="text-accent">work</span>?</h2>
      <p class="answer-block">
        You call or send the estimate form, Express Pro looks at photos of your roofline or visits the property to measure gutter length and assess debris, we give you a flat quote usually the same day, we schedule the cleaning at a time that works for you, and our team clears the gutters and hauls debris away in one visit.
      </p>
    </div>

    <div class="process-horizontal">
      <div class="process-card reveal-up reveal-delay-1">
        <div class="process-card__number">1</div>
        <h4>Contact us</h4>
        <p>Call <?php echo formatPhone($phone); ?> or send the form with a description of your Sacramento home and gutters. Photos of the roofline help if you have them.</p>
      </div>

      <div class="process-card reveal-up reveal-delay-2">
        <div class="process-card__number">2</div>
        <h4>Get a flat quote</h4>
        <p>We give you a clear price based on gutter length, roof pitch and debris volume. Most quotes go out the same day. No obligation.</p>
      </div>

      <div class="process-card reveal-up reveal-delay-3">
        <div class="process-card__number">3</div>
        <h4>Schedule the cleaning</h4>
        <p>We find a date that works for your schedule. Most gutter cleanings take 1 to 3 hours depending on the home size.</p>
      </div>

      <div class="process-card reveal-up reveal-delay-4">
        <div class="process-card__number">4</div>
        <h4>We clean and haul debris</h4>
        <p>Our team clears gutters and downspouts by hand, bags all debris and hauls it away. Your gutters flow freely before we leave.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento homeowners ask about <span class="text-accent">gutter cleaning</span></h2>
      <p class="prose">Clear answers on pricing, timing, what is included and why it matters. Call <?php echo formatPhone($phone); ?> for a quote specific to your home.</p>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $i => $faq): ?>
      <details class="faq"<?php echo $i < 2 ? ' open' : ''; ?>>
        <summary><?php echo e($faq['q']); ?></summary>
        <p><?php echo e($faq['a']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="section on-dark texture-grain slant-top" aria-label="Get a free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container cta-final">
    <div class="cta-content reveal-up">
      <h2>Protect your Sacramento home — schedule gutter cleaning today</h2>
      <p>Call <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply the same day with a clear quote. Serving Sacramento since 1991.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
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
