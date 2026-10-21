<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Pressure / Soft Washing
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'pressure-washing';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/pressure-washing/';
$pageTitle       = 'Pressure Washing & Soft Washing Sacramento, CA | ' . $siteName;
$metaDescription = 'Pressure washing and soft washing for Sacramento houses, roofs, driveways, patios, porches, decks and fences. Right pressure for each surface. Call or text ' . formatPhone($phone) . '.';
$pageDescription = $metaDescription;

$pageServices = [
    'House Washing',
    'Roof Soft Washing',
    'Driveway & Walkway Washing',
    'Patio, Porch & Deck Washing',
    'Fence Washing',
];

$faqs = [
    [
        'q' => 'What is the difference between pressure washing and soft washing?',
        'a' => 'Pressure washing uses high-pressure water to lift grime from hard surfaces such as concrete driveways and walkways. Soft washing uses low pressure and a cleaning solution to remove algae, mildew and dirt from surfaces that high pressure would damage — roofs, stucco, painted siding, wood decks and fences. Express Pro matches the method to the surface.',
    ],
    [
        'q' => 'Is it safe to pressure wash my roof?',
        'a' => 'No — high pressure strips the granules off asphalt shingles and forces water under tile. Roofs are soft washed: a low-pressure rinse with a solution that kills the moss and algae, which then weather away.',
    ],
    [
        'q' => 'Will washing damage my plants or paint?',
        'a' => 'We pre-wet and rinse landscaping around the work area and keep the pressure appropriate to the surface. Loose or failing paint will come off under any washing, and we point that out before we start.',
    ],
    [
        'q' => 'How long does a driveway or house wash take?',
        'a' => 'Most Sacramento driveways take an hour or two; a full house wash is usually half a day depending on size and how much algae has built up on the shaded sides.',
    ],
    [
        'q' => 'Do I need to be home?',
        'a' => 'No. We need access to an outdoor spigot and the areas being washed. Move cars, grills and furniture off the surfaces beforehand, or ask us to.',
    ],
    [
        'q' => 'How often should exterior surfaces be washed here?',
        'a' => 'Once a year keeps most Sacramento homes clean. North-facing walls, shaded patios and fences under trees grow algae faster and may need washing every six to nine months.',
    ],
];

$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'Pressure / Soft Washing',
            'description' => 'Pressure washing and soft washing for houses, roofs, driveways, patios, porches, decks and fences in Sacramento.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => ['@type' => 'City', 'name' => $address['city'], 'containedInPlace' => ['@type' => 'State', 'name' => $address['state']]],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Pressure / Soft Washing',
                'itemListElement' => array_map(fn($svc) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $svc]], $pageServices),
            ],
        ],
        generateFAQSchema($faqs),
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $siteUrl . '/services/'],
            ['name' => 'Pressure / Soft Washing', 'url' => $canonicalUrl],
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
        <h1 class="hero-title">Pressure washing and soft washing in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services washes houses, roofs, driveways, patios, porches, decks and fences across Sacramento — high pressure where the surface can take it, low-pressure soft washing where it cannot.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <?php echo phoneCallText(18, 'link-call'); ?>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('waves', 16); ?> Right pressure for each surface</li>
          <li><?php echo icon('home', 16); ?> House, roof &amp; concrete</li>
          <li><?php echo icon('fence', 16); ?> Decks &amp; fences</li>
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

<!-- ============================ SURFACES ============================ -->
<section class="section section--light" aria-label="What we wash">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Surfaces Covered</span>
      <h2>What can Express Pro <span class="text-accent">wash</span>?</h2>
      <p class="answer-block">
        Seven surfaces: house exteriors, roofs, driveways, patio areas, porches, decks and fences. Concrete and pavers get pressure; stucco, siding, roofing and wood get a soft wash so the finish stays intact.
      </p>
    </div>
    <div class="service-breakdown reveal-up" data-p1-dynamic>
      <div class="service-category">
        <h3>House &amp; Roof — soft wash</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Stucco, painted siding, trim and eaves rinsed at low pressure</span></li>
          <li><?php echo icon('check', 18); ?><span>Algae and mildew on shaded north walls treated, not blasted</span></li>
          <li><?php echo icon('check', 18); ?><span>Roof moss and black streaks killed with a soft-wash solution</span></li>
          <li><?php echo icon('check', 18); ?><span>Windows rinsed free of overspray before we leave</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Driveways, Walkways &amp; Patios — pressure wash</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Concrete and pavers surface-cleaned in even passes, no zebra stripes</span></li>
          <li><?php echo icon('check', 18); ?><span>Oil, tire marks and rust spots pre-treated</span></li>
          <li><?php echo icon('check', 18); ?><span>Patio areas and porches cleaned with furniture moved and returned</span></li>
          <li><?php echo icon('check', 18); ?><span>Dirty water kept out of planting beds where possible</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Decks &amp; Fences — soft wash</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Wood decks and fences washed at low pressure to avoid furring the grain</span></li>
          <li><?php echo icon('check', 18); ?><span>Grey, weathered boards brightened before a stain or seal</span></li>
          <li><?php echo icon('check', 18); ?><span>Vinyl and composite fencing cleaned of green film</span></li>
          <li><?php echo icon('check', 18); ?><span>Plants pre-wet and rinsed on both sides of the fence</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ METHOD ============================ -->
<section class="section" aria-label="Pressure versus soft washing">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">The Right Method</span>
      <h2>Why does the pressure have to match the <span class="text-accent">surface</span>?</h2>
      <p class="answer-block">
        Because the same machine that lifts years of grime from concrete will strip paint, etch wood and knock the granules off a shingle roof. Hard, mineral surfaces take pressure. Everything else is cleaned by the solution and a gentle rinse.
      </p>
    </div>
    <div class="damage-grid">
      <div class="damage-card reveal-up reveal-delay-1">
        <div class="damage-card__icon"><?php echo icon('waves', 28); ?></div>
        <h3>Pressure washing</h3>
        <p>Driveways, walkways, patio slabs, pavers and block walls. The surface cleaner keeps passes even so the concrete comes up uniform rather than striped.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-2">
        <div class="damage-card__icon"><?php echo icon('droplets', 28); ?></div>
        <h3>Soft washing</h3>
        <p>Roofs, stucco, siding, decks and fences. A low-pressure rinse carries a cleaning solution that kills algae and mildew at the root, so the surface stays clean longer than a blast would.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-3">
        <div class="damage-card__icon"><?php echo icon('shield-check', 28); ?></div>
        <h3>What we check first</h3>
        <p>Loose paint, cracked stucco, open window seals and plants in the splash zone. We walk the property with you and point out anything washing could reveal before we turn the water on.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Simple Process</span>
      <h2>How does booking exterior washing in Sacramento <span class="text-accent">work</span>?</h2>
      <p class="answer-block">
        Tell us which surfaces, get a flat quote, clear the cars and furniture, and we wash in one visit — usually a morning for concrete, half a day for a full house.
      </p>
    </div>
    <ol class="process-horizontal" data-p1-dynamic>
      <li class="process-card reveal-up reveal-delay-1"><div class="process-card__number">1</div><h4>Tell us the surfaces</h4><p>Call or text <?php echo formatPhone($phone); ?> or send the form. House, roof, driveway, patio, deck, fence — or all of them.</p></li>
      <li class="process-card reveal-up reveal-delay-2"><div class="process-card__number">2</div><h4>Flat quote</h4><p>One price for the surfaces listed, based on size and build-up. No obligation.</p></li>
      <li class="process-card reveal-up reveal-delay-3"><div class="process-card__number">3</div><h4>Prep and walkthrough</h4><p>Cars and furniture moved, plants pre-wet, trouble spots flagged with you before we start.</p></li>
      <li class="process-card reveal-up reveal-delay-4"><div class="process-card__number">4</div><h4>Wash and rinse</h4><p>Pressure where it belongs, soft wash where it does not, and a final rinse of windows and walkways.</p></li>
    </ol>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento homeowners ask about <span class="text-accent">pressure and soft washing</span></h2>
      <p class="prose">Still have a question? Call or text <?php echo formatPhone($phone); ?>. A house wash pairs naturally with <a href="/services/gutter-roof-cleaning/">gutter and roof cleaning</a> or <a href="/services/window-cleaning/">window cleaning</a> on the same visit.</p>
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
      <h2>Bring the outside of your Sacramento home back to clean</h2>
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
