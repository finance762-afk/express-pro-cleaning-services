<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Window Cleaning Services (window, blind, screen + repairs)
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'window-cleaning';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/window-cleaning/';
$pageTitle       = 'Window, Blind & Screen Cleaning Sacramento, CA | ' . $siteName;
$metaDescription = 'Window cleaning, blind cleaning, screen cleaning and screen & blind repairs for Sacramento homes and businesses — the original Express Mini Blind & Window Cleaning. Call or text ' . formatPhone($phone) . '.';
$pageDescription = $metaDescription;

$pageServices = [
    'Window Cleaning',
    'Blind Cleaning',
    'Screen Cleaning',
    'Screen & Blind Repairs',
];

$faqs = [
    [
        'q' => 'Do you clean the inside and the outside of the windows?',
        'a' => 'Yes. Express Pro Cleaning Services cleans interior and exterior glass, wipes frames and sills, and vacuums the tracks. If you only want the exterior done — common for upper floors or recurring visits — we quote that on its own.',
    ],
    [
        'q' => 'Can you clean blinds without taking them down?',
        'a' => 'Most blinds are cleaned in place, slat by slat. Heavily soiled or greasy blinds — kitchens especially — come down for a thorough wash and go back up the same visit. We tell you which approach your blinds need before we start.',
    ],
    [
        'q' => 'Do you repair screens and blinds, or only clean them?',
        'a' => 'Both. Express Pro repairs torn or sagging window screens and fixes blinds with broken cords, slats or tilt mechanisms. Blinds and glass were the company\'s first trade in 1989, so repairs are part of the service, not a referral.',
    ],
    [
        'q' => 'How often should Sacramento windows be cleaned?',
        'a' => 'Twice a year keeps most Sacramento homes clear: once after the winter rains and once after the dry, dusty summer. Homes near busy roads, construction or heavy tree pollen often book quarterly.',
    ],
    [
        'q' => 'Do you clean windows on two-story homes?',
        'a' => 'Yes. We carry the ladders and extension poles for single-story and two-story Sacramento homes, and clean storefront and office glass as well.',
    ],
    [
        'q' => 'Do I need to move furniture or take down curtains first?',
        'a' => 'Clear a path to each window if you can. We move light items and work around curtains and drapes; heavy furniture stays where it is unless you want it moved.',
    ],
];

$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'Window Cleaning Services',
            'description' => 'Window, blind and screen cleaning plus screen and blind repairs for Sacramento homes and businesses.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => ['@type' => 'City', 'name' => $address['city'], 'containedInPlace' => ['@type' => 'State', 'name' => $address['state']]],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Window Cleaning Services',
                'itemListElement' => array_map(fn($svc) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $svc]], $pageServices),
            ],
        ],
        generateFAQSchema($faqs),
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $siteUrl . '/services/'],
            ['name' => 'Window Cleaning Services', 'url' => $canonicalUrl],
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
        <span class="eyebrow">Sacramento, CA · The original Express Mini Blind &amp; Window Cleaning</span>
        <h1 class="hero-title">Window, blind and screen cleaning in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services cleans windows inside and out, cleans blinds and screens, and repairs torn screens and broken blinds for homes and businesses across Sacramento. Glass and blinds were the company's first trade when it opened in 1989 — it is still the work we are asked for most.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <?php echo phoneCallText(18, 'link-call'); ?>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('sun', 16); ?> Inside &amp; outside glass</li>
          <li><?php echo icon('wrench', 16); ?> Screen &amp; blind repairs</li>
          <li><?php echo icon('users', 16); ?> Family-owned since <?php echo $familyOwnedSince; ?></li>
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

<!-- ============================ WHAT WE CLEAN ============================ -->
<section class="section section--light" aria-label="What is included">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Services Covered</span>
      <h2>What does Express Pro's window service <span class="text-accent">include</span>?</h2>
      <p class="answer-block">
        Four things: window cleaning (interior and exterior glass, frames, sills and tracks), blind cleaning (in place or taken down and washed), screen cleaning (removed, washed, dried and refitted), and screen and blind repairs — re-screening torn frames and fixing cords, slats and tilt mechanisms.
      </p>
    </div>

    <div class="service-breakdown reveal-up" data-p1-dynamic>
      <div class="service-category">
        <h3>Window Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Interior and exterior glass, squeegeed streak-free</span></li>
          <li><?php echo icon('check', 18); ?><span>Frames and sills wiped, tracks vacuumed and cleaned</span></li>
          <li><?php echo icon('check', 18); ?><span>Single-story, two-story, storefront and office glass</span></li>
          <li><?php echo icon('check', 18); ?><span>Hard-water spots and paint overspray treated on request</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Blind &amp; Screen Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Horizontal and vertical blinds cleaned slat by slat</span></li>
          <li><?php echo icon('check', 18); ?><span>Greasy or heavily soiled blinds taken down, washed, rehung</span></li>
          <li><?php echo icon('check', 18); ?><span>Window screens removed, washed, dried and refitted</span></li>
          <li><?php echo icon('check', 18); ?><span>Screens labelled so every one goes back on the right window</span></li>
        </ul>
      </div>
      <div class="service-category">
        <h3>Screen &amp; Blind Repairs</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Torn or sagging screens re-screened in the frame</span></li>
          <li><?php echo icon('check', 18); ?><span>Broken cords, ladders and tilt mechanisms replaced</span></li>
          <li><?php echo icon('check', 18); ?><span>Bent or missing slats swapped where a match is available</span></li>
          <li><?php echo icon('check', 18); ?><span>Repairs done on the same visit as the cleaning when possible</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ WHY SACRAMENTO GLASS GETS DIRTY ============================ -->
<section class="section" aria-label="Why windows need regular cleaning">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Local Conditions</span>
      <h2>Why do Sacramento windows look dirty so <span class="text-accent">quickly</span>?</h2>
      <p class="answer-block">
        Three local reasons: hard tap water leaves white mineral spots wherever sprinklers hit the glass, the long dry season coats panes and screens in fine dust and pollen, and winter rain streaks whatever the summer left behind. Cleaning after the rains and again after summer keeps the glass clear year-round.
      </p>
    </div>
    <div class="damage-grid">
      <div class="damage-card reveal-up reveal-delay-1">
        <div class="damage-card__icon"><?php echo icon('droplets', 28); ?></div>
        <h3>Hard-water spotting</h3>
        <p>Sprinkler overspray dries into mineral rings that ordinary glass cleaner will not shift. We treat the spots and recommend adjusting the sprinkler heads so they do not come back.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-2">
        <div class="damage-card__icon"><?php echo icon('wind', 28); ?></div>
        <h3>Dust and pollen on screens</h3>
        <p>Screens act like filters. By late summer they hold a season of dust that blows back into the house every time a window is opened. Washing the screens is what makes a window cleaning last.</p>
      </div>
      <div class="damage-card reveal-up reveal-delay-3">
        <div class="damage-card__icon"><?php echo icon('sun', 28); ?></div>
        <h3>Sun-baked blinds</h3>
        <p>Grease and dust bake onto blind slats in the afternoon sun, especially on west-facing kitchen windows. Those blinds come down for a proper wash rather than a wipe.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Simple Process</span>
      <h2>How does booking window cleaning in Sacramento <span class="text-accent">work</span>?</h2>
      <p class="answer-block">
        Tell us how many windows and whether blinds, screens or repairs are included, get a flat quote, pick a date, and the same family team cleans, repairs and walks the house with you before leaving.
      </p>
    </div>
    <ol class="process-horizontal" data-p1-dynamic>
      <li class="process-card reveal-up reveal-delay-1"><div class="process-card__number">1</div><h4>Tell us the job</h4><p>Call or text <?php echo formatPhone($phone); ?>, or send the form. A rough window count and a note on blinds, screens or repairs is enough to quote.</p></li>
      <li class="process-card reveal-up reveal-delay-2"><div class="process-card__number">2</div><h4>Flat quote</h4><p>One clear price for the scope you described. No hourly guessing and no obligation.</p></li>
      <li class="process-card reveal-up reveal-delay-3"><div class="process-card__number">3</div><h4>We clean and repair</h4><p>Glass, tracks, blinds and screens in one visit, with repairs done on the spot when parts are on the truck.</p></li>
      <li class="process-card reveal-up reveal-delay-4"><div class="process-card__number">4</div><h4>Walkthrough</h4><p>We check every window with you before we leave and fix any streak you can see.</p></li>
    </ol>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento customers ask about <span class="text-accent">window cleaning</span></h2>
      <p class="prose">Still have a question? Call or text <?php echo formatPhone($phone); ?>. Window work pairs well with a <a href="/services/house-cleaning/">deep clean</a> or <a href="/services/pressure-washing/">house washing</a> on the same visit.</p>
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
      <h2>Clear glass, clean blinds, screens that fit — book your Sacramento window service</h2>
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
