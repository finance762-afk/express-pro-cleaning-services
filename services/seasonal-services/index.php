<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Seasonal Services (Christmas light installation & takedown)
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'seasonal-services';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/seasonal-services/';
$pageTitle       = 'Christmas Light Installation & Takedown Sacramento, CA | ' . $siteName;
$metaDescription = 'Christmas light installation and takedown for Sacramento homes and businesses — hung with proper clips, taken down after the holidays. Call or text ' . formatPhone($phone) . ' to book before the season fills.';
$pageDescription = $metaDescription;

$pageServices = [
    'Christmas Light Installation',
    'Christmas Light Takedown',
];

$faqs = [
    [
        'q' => 'How does Christmas light installation work?',
        'a' => 'We look at the roofline, eaves, columns and trees you want lit, agree a layout, hang the lights with clips made for the job (no staples or nails), test every strand, and come back after the holidays to take everything down.',
    ],
    [
        'q' => 'Do I supply the lights or do you?',
        'a' => 'Either. We can hang lights you already own after testing them, or supply commercial-grade LED strands as part of the quote. Tell us which you prefer when you book.',
    ],
    [
        'q' => 'When should I book?',
        'a' => 'October or early November. Most Sacramento customers want lights up by the week of Thanksgiving, and the calendar fills from the front.',
    ],
    [
        'q' => 'When do you take the lights down?',
        'a' => 'In January, on a date we agree when the lights go up. Takedown is part of the service: we remove the clips, coil the strands and box them so they are ready for next year.',
    ],
    [
        'q' => 'Can you light a storefront or office as well as a home?',
        'a' => 'Yes. We install on homes and commercial buildings across Sacramento, including two-story rooflines, and schedule business installs outside operating hours when needed.',
    ],
    [
        'q' => 'Is it safe to have lights installed on a two-story roof?',
        'a' => 'That is the main reason people hire it out. We work from ladders with fall protection and never ask you to hold the base.',
    ],
];

$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'Seasonal Services — Christmas Light Installation and Takedown',
            'description' => 'Christmas light installation and takedown for Sacramento homes and businesses.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => ['@type' => 'City', 'name' => $address['city'], 'containedInPlace' => ['@type' => 'State', 'name' => $address['state']]],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Seasonal Services',
                'itemListElement' => array_map(fn($svc) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $svc]], $pageServices),
            ],
        ],
        generateFAQSchema($faqs),
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $siteUrl . '/services/'],
            ['name' => 'Seasonal Services', 'url' => $canonicalUrl],
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
        <span class="eyebrow">Sacramento, CA · Seasonal</span>
        <h1 class="hero-title">Christmas light installation and takedown in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services hangs holiday lights on Sacramento homes and businesses with proper clips, tests every strand, and returns in January to take them down and box them — so nobody in your house is on a ladder in December.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <?php echo phoneCallText(18, 'link-call'); ?>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('snowflake', 16); ?> Install &amp; takedown included</li>
          <li><?php echo icon('shield-check', 16); ?> Clips, not staples</li>
          <li><?php echo icon('calendar-check', 16); ?> Book in October</li>
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

<!-- ============================ WHAT IS INCLUDED ============================ -->
<section class="section section--light" aria-label="What is included">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Service Details</span>
      <h2>What does Express Pro's holiday lighting service <span class="text-accent">include</span>?</h2>
      <p class="answer-block">
        A layout agreed with you, installation with roofline clips and gutter hooks rather than staples or nails, every strand tested before we leave, and a scheduled January takedown with the lights coiled and boxed for next year.
      </p>
    </div>
    <div class="clean-checklist reveal-up">
      <h3>Every installation includes:</h3>
      <ul data-p1-dynamic>
        <li><?php echo icon('check', 20); ?><span>Rooflines, eaves, columns, windows, trees and shrubs — you choose the scope</span></li>
        <li><?php echo icon('check', 20); ?><span>Purpose-made clips and hooks; nothing nailed or stapled into the house</span></li>
        <li><?php echo icon('check', 20); ?><span>Your lights tested first, or commercial-grade LED strands supplied</span></li>
        <li><?php echo icon('check', 20); ?><span>Timers set so the display comes on at dusk without you touching it</span></li>
        <li><?php echo icon('check', 20); ?><span>Single-story, two-story and storefront rooflines</span></li>
        <li><?php echo icon('check', 20); ?><span>January takedown on an agreed date, strands coiled and boxed</span></li>
      </ul>
    </div>
  </div>
</section>

<!-- ============================ TIMING BANNER ============================ -->
<section class="section" aria-label="When to book">
  <div class="container">
    <div class="timing-banner reveal-up">
      <h3>Book in October — Sacramento's lighting calendar fills from the front</h3>
      <p>Most customers want their lights up by the week of Thanksgiving. The earlier you book, the better your choice of install date, and the sooner the takedown date is on the calendar too.</p>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate>Reserve my install date</button>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Simple Process</span>
      <h2>How does Christmas light installation in Sacramento <span class="text-accent">work</span>?</h2>
      <p class="answer-block">
        Tell us what you want lit, agree the layout and whether we supply the lights, pick an install date, and we hang, test and set the timer — then return in January to take it all down.
      </p>
    </div>
    <ol class="process-horizontal" data-p1-dynamic>
      <li class="process-card reveal-up reveal-delay-1"><div class="process-card__number">1</div><h4>Tell us the scope</h4><p>Call or text <?php echo formatPhone($phone); ?> or send the form. A photo of the front of the house is enough to start.</p></li>
      <li class="process-card reveal-up reveal-delay-2"><div class="process-card__number">2</div><h4>Layout and quote</h4><p>We agree what gets lit and whether you supply the strands, then give one flat price for install and takedown.</p></li>
      <li class="process-card reveal-up reveal-delay-3"><div class="process-card__number">3</div><h4>Install and test</h4><p>Clips on, strands hung straight, every bulb tested, timer set for dusk.</p></li>
      <li class="process-card reveal-up reveal-delay-4"><div class="process-card__number">4</div><h4>January takedown</h4><p>We remove the clips, coil and box the lights, and leave the roofline as we found it.</p></li>
    </ol>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento customers ask about <span class="text-accent">holiday lighting</span></h2>
      <p class="prose">Still have a question? Call or text <?php echo formatPhone($phone); ?>. Many customers book <a href="/services/gutter-roof-cleaning/">gutter cleaning</a> for the same visit, since we are already on the roofline.</p>
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
      <h2>Lights up by Thanksgiving, down in January — without the ladder</h2>
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
