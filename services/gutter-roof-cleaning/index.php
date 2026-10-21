<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Gutter and Roof Cleaning (gutters, solar panels, roof debris)
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'gutter-roof-cleaning';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/gutter-roof-cleaning/';
$pageTitle       = 'Gutter, Solar Panel & Roof Cleaning Sacramento, CA | ' . $siteName;
$metaDescription = 'Gutter cleaning, solar panel cleaning and roof debris removal for Sacramento homes. Keep water moving and panels producing before the rainy season. Call or text ' . formatPhone($phone) . '.';
$pageDescription = $metaDescription;

$pageServices = [
    'Gutter Cleaning',
    'Solar Panel Cleaning',
    'Roof Debris Cleaning',
];

$faqs = [
    [
        'q' => 'How often should gutters be cleaned in Sacramento?',
        'a' => 'Twice a year for most homes: late fall after the leaves drop and early spring before the heaviest rain. Homes under oaks, sycamores or heavy canopy often need a third visit.',
    ],
    [
        'q' => 'Why does solar panel cleaning matter?',
        'a' => 'Dust, pollen and bird droppings build a film on the glass that blocks sunlight from reaching the cells, so dirty panels produce less electricity than clean ones. Sacramento\'s long dry season means panels can go months without rain to rinse them. Regular cleaning keeps the system working as efficiently as it was designed to.',
    ],
    [
        'q' => 'How do you clean solar panels without damaging them?',
        'a' => 'With soft brushes and purified water — no pressure washer, no harsh detergents, no abrasives. We clean early in the day while the glass is cool and never walk on the panels.',
    ],
    [
        'q' => 'What is roof debris cleaning?',
        'a' => 'Removing the leaves, needles, branches and moss that collect in roof valleys, behind chimneys and along the eaves. Left in place, that debris holds moisture against the roofing and clogs the gutters below. We clear it by hand and blower, then clean the gutters it was feeding.',
    ],
    [
        'q' => 'Do you clean downspouts and haul the debris away?',
        'a' => 'Yes. Downspouts are flushed until water runs clear, and every bag of leaves and sludge leaves with us.',
    ],
    [
        'q' => 'Can you work on a two-story roof?',
        'a' => 'Yes. We carry the ladders and fall-protection gear for single-story and two-story Sacramento homes. Steep or high rooflines are quoted after a look at the house.',
    ],
];

$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'Gutter and Roof Cleaning',
            'description' => 'Gutter cleaning, solar panel cleaning and roof debris removal for Sacramento homes.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => ['@type' => 'City', 'name' => $address['city'], 'containedInPlace' => ['@type' => 'State', 'name' => $address['state']]],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Gutter and Roof Cleaning',
                'itemListElement' => array_map(fn($svc) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $svc]], $pageServices),
            ],
        ],
        generateFAQSchema($faqs),
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $siteUrl . '/services/'],
            ['name' => 'Gutter and Roof Cleaning', 'url' => $canonicalUrl],
        ]),
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior">
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow">Sacramento, CA</span>
        <h1 class="hero-title">Gutter, solar panel and roof cleaning in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services clears gutters and downspouts, washes solar panels so they keep producing at full output, and removes the leaves and moss that collect on Sacramento rooflines — one visit, debris hauled away.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <?php echo phoneCallText(18, 'link-call'); ?>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('droplets', 16); ?> Before rainy season</li>
          <li><?php echo icon('sun', 16); ?> Solar panels cleaned safely</li>
          <li><?php echo icon('truck', 16); ?> Debris hauled away</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="estimate-form">
        <h2>Get a free estimate</h2>
        <p class="hero-form-tagline">No obligation. We reply the same business day.</p>
        <form action="<?php echo e($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo e($siteUrl); ?>/thank-you">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row"><label class="sr-only" for="hero-email">Email</label><input id="hero-email" type="email" name="email" placeholder="Email" autocomplete="email" required></div>
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

<!-- ============================ THREE SERVICES ============================ -->
<section class="section section--light" aria-label="What is included">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Services Covered</span>
      <h2>What does gutter and roof cleaning <span class="text-accent">include</span>?</h2>
      <p class="answer-block">
        Three services, booked together or on their own: gutter cleaning with downspouts flushed, solar panel cleaning with soft brushes and purified water, and roof debris cleaning — leaves, needles and moss cleared from valleys, eaves and behind chimneys.
      </p>
    </div>
    <div class="service-breakdown reveal-up" data-p1-dynamic>
      <div class="service-category">
        <h3>Gutter Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Leaves, needles and sludge removed by hand</span></li>
          <li><?php echo icon('check', 18); ?><span>Downspouts flushed until water runs clear</span></li>
          <li><?php echo icon('check', 18); ?><span>Hangers and seams checked for sags and pulls</span></li>
          <li><?php echo icon('check', 18); ?><span>All debris bagged and hauled away</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Solar Panel Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Dust, pollen and droppings removed with soft brushes</span></li>
          <li><?php echo icon('check', 18); ?><span>Purified water rinse — no spots, no detergents, no pressure washer</span></li>
          <li><?php echo icon('check', 18); ?><span>Cleaned while the glass is cool; we never stand on panels</span></li>
          <li><?php echo icon('check', 18); ?><span>Clean panels let more sunlight reach the cells, so the system produces more</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Roof Debris Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Valleys, eaves and chimney crickets cleared of leaves and needles</span></li>
          <li><?php echo icon('check', 18); ?><span>Moss and branch build-up removed by hand and blower</span></li>
          <li><?php echo icon('check', 18); ?><span>Done before the gutters so nothing washes back in</span></li>
          <li><?php echo icon('check', 18); ?><span>Visible roof damage pointed out while we are up there</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SOLAR BANNER ============================ -->
<section class="section" aria-label="Why clean solar panels">
  <div class="container">
    <div class="timing-banner reveal-up">
      <h3>Dirty solar panels work less — clean ones work the way they were designed to</h3>
      <p>Sacramento goes months without rain. Dust, pollen and bird droppings build a film on the glass that blocks sunlight from reaching the cells, and the system quietly produces less than it should. A gentle cleaning restores the output you are paying for — and it is safest done by someone who never walks on the panels.</p>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate>Quote my solar panel cleaning</button>
    </div>
  </div>
</section>

<!-- ============================ WHY IT MATTERS ============================ -->
<section class="section section--light" aria-label="Why gutter cleaning matters">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why It Matters</span>
      <h2>What happens when gutters and rooflines clog in <span class="text-accent">Sacramento</span>?</h2>
      <p class="answer-block">
        Clogged gutters overflow during the first big storm, sending water down the fascia and siding instead of into the downspouts. Debris left on the roof holds moisture against the shingles. The fix is cheap and seasonal; the damage it prevents is not.
      </p>
    </div>
    <div class="damage-grid">
      <div class="damage-card reveal-up reveal-delay-1">
        <div class="damage-card__icon"><?php echo icon('alert-triangle', 28); ?></div>
        <h3>Fascia and soffit rot</h3>
        <p>Overflow runs down the fascia boards every time it rains. Over a few seasons the wood softens, rots and pulls away from the roofline.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-2">
        <div class="damage-card__icon"><?php echo icon('home', 28); ?></div>
        <h3>Roof edge and valley damage</h3>
        <p>Water backing up behind debris seeps under the shingles at the eaves and in the valleys, where most roof leaks start.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-3">
        <div class="damage-card__icon"><?php echo icon('droplets', 28); ?></div>
        <h3>Foundation and crawlspace water</h3>
        <p>Gutters exist to move water away from the house. When they overflow it pools at the foundation and finds its way into crawlspaces.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Simple Process</span>
      <h2>How does booking gutter or roof cleaning <span class="text-accent">work</span>?</h2>
      <p class="answer-block">
        Send a photo of the roofline or tell us the home's size and stories, get a flat quote, pick a date — late October and November book fastest — and we clear, clean, flush and haul in one visit.
      </p>
    </div>
    <ol class="process-horizontal" data-p1-dynamic>
      <li class="process-card reveal-up reveal-delay-1"><div class="process-card__number">1</div><h4>Contact us</h4><p>Call or text <?php echo formatPhone($phone); ?> or send the form. Photos of the roofline and the panels help us quote accurately.</p></li>
      <li class="process-card reveal-up reveal-delay-2"><div class="process-card__number">2</div><h4>Flat quote</h4><p>One price based on gutter length, roof pitch, panel count and debris. No obligation.</p></li>
      <li class="process-card reveal-up reveal-delay-3"><div class="process-card__number">3</div><h4>Schedule</h4><p>Most visits take a morning. Book before the rainy season for the best availability.</p></li>
      <li class="process-card reveal-up reveal-delay-4"><div class="process-card__number">4</div><h4>Clean and haul</h4><p>Roof first, then panels, then gutters and downspouts, then every bag of debris goes with us.</p></li>
    </ol>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento homeowners ask about <span class="text-accent">gutters, solar panels and roofs</span></h2>
      <p class="prose">Still have a question? Call or text <?php echo formatPhone($phone); ?>. Roof and gutter work pairs well with <a href="/services/pressure-washing/">house or driveway washing</a> on the same visit.</p>
    </div>
    <div class="faq-grid" data-p1-dynamic>
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
      <h2>Protect the roof, keep the panels producing — book before the rain</h2>
      <p>Call or text <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply with a flat quote. Family-owned since <?php echo $familyOwnedSince; ?>.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get my free estimate</button>
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg"><?php echo icon('phone', 20); ?><span>Call now</span></a>
        <a href="sms:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-lg"><?php echo icon('message-square', 20); ?><span>or TEXT us</span></a>
      </div>
    </div>
  </div>
</section>

<script type="application/ld+json">
<?php echo json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
