<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — House Cleaning Services (deep, move-in/out, post-construction, recurring)
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'house-cleaning';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/house-cleaning/';
$pageTitle       = 'House Cleaning Services Sacramento, CA | ' . $siteName;
$metaDescription = 'Deep cleaning, move-in/move-out cleaning, post-construction cleanup and recurring maintenance cleaning for Sacramento homes. Family-owned since 1998. Call or text ' . formatPhone($phone) . '.';
$pageDescription = $metaDescription;

$pageServices = [
    'Deep Cleaning',
    'Move-In / Move-Out Cleaning',
    'Post-Construction Cleaning',
    'Recurring Maintenance Cleaning',
];

$faqs = [
    [
        'q' => 'What is the difference between a deep clean and a recurring maintenance clean?',
        'a' => 'A deep clean strips built-up grime: baseboards, grout, cabinet fronts, inside the oven and fridge, window tracks, light fixtures. A recurring maintenance clean keeps a home at that level on a weekly, every-other-week or monthly schedule. Most Sacramento homes start with a deep clean, then move to maintenance.',
    ],
    [
        'q' => 'What is included in a move-out cleaning?',
        'a' => 'Every surface of the empty home: inside cabinets and drawers, inside appliances, baseboards, light fixtures, interior windows, floors, and bathrooms scrubbed from grout to ceiling. The goal is a space that passes the landlord or buyer walkthrough.',
    ],
    [
        'q' => 'Do you do post-construction cleaning after a remodel?',
        'a' => 'Yes. Post-construction cleaning removes drywall and sawdust from every surface, vents and window tracks, wipes down cabinets and fixtures, cleans the glass and finishes the floors so the space is ready to move back into. Tell us when the contractor finishes and we schedule right behind them.',
    ],
    [
        'q' => 'Do you bring your own cleaning supplies and equipment?',
        'a' => 'Yes. Express Pro Cleaning Services brings all supplies, tools and equipment. If you prefer a specific product, leave it out and tell us when booking.',
    ],
    [
        'q' => 'Will the same people clean my home each visit?',
        'a' => 'Yes. Recurring clients get the same family team and the same checklist each visit, so the routine stays consistent and you see familiar faces.',
    ],
    [
        'q' => 'What areas around Sacramento do you serve?',
        'a' => 'Sacramento and surrounding communities within about 30 miles: North Highlands, Rio Linda, Citrus Heights, Carmichael, Elk Grove, Roseville and Folsom. Call or text (916) 983-9274 to confirm your address.',
    ],
];

$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'House Cleaning Services',
            'description' => 'Deep cleaning, move-in/move-out cleaning, post-construction cleaning and recurring maintenance cleaning for Sacramento homes.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => ['@type' => 'City', 'name' => $address['city'], 'containedInPlace' => ['@type' => 'State', 'name' => $address['state']]],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'House Cleaning Services',
                'itemListElement' => array_map(fn($svc) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $svc]], $pageServices),
            ],
        ],
        generateFAQSchema($faqs),
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Services', 'url' => $siteUrl . '/services/'],
            ['name' => 'House Cleaning Services', 'url' => $canonicalUrl],
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
        <h1 class="hero-title">House cleaning services in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services handles deep cleans, move-in and move-out turnovers, post-construction cleanup and recurring maintenance cleaning across Sacramento — from a family team that has cleaned local homes since the 1990s and has been family-owned since 1998.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <?php echo phoneCallText(18, 'link-call'); ?>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('users', 16); ?> Family-owned since <?php echo $familyOwnedSince; ?></li>
          <li><?php echo icon('leaf', 16); ?> All supplies included</li>
          <li><?php echo icon('check-circle', 16); ?> Free estimates</li>
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

<!-- ============================ PROBLEM STATEMENT ============================ -->
<section class="section section--light" aria-label="When you need cleaning help">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Common Situations</span>
      <h2>When do Sacramento homeowners call Express Pro for <span class="text-accent">house cleaning</span>?</h2>
      <p class="answer-block">
        Families call Express Pro when the daily mess has turned into months of buildup they cannot clear in a weekend, when a lease ends and the landlord wants the place spotless, when renovations coat every surface in dust, or when they simply want the house cleaned every two weeks by people they trust.
      </p>
    </div>

    <div class="problem-grid">
      <div class="problem-card reveal-up reveal-delay-1">
        <div class="problem-card__icon"><?php echo icon('home', 24); ?></div>
        <h3>Deep cleans for built-up grime</h3>
        <p>Baseboards thick with dust, grout that has turned gray, kitchen cabinets sticky to the touch — a deep clean strips months or years of buildup in one session.</p>
      </div>
      <div class="problem-card reveal-up reveal-delay-2">
        <div class="problem-card__icon"><?php echo icon('truck', 24); ?></div>
        <h3>Move-outs that pass inspection</h3>
        <p>Landlords check everything before returning deposits. Our move-out service scrubs insides of ovens, cabinets, drawers and appliances so the walkthrough is clean.</p>
      </div>
      <div class="problem-card reveal-up reveal-delay-3">
        <div class="problem-card__icon"><?php echo icon('repeat', 24); ?></div>
        <h3>Recurring upkeep on autopilot</h3>
        <p>Weekly or bi-weekly service means you never spend a Saturday scrubbing floors. Same team, same checklist, same standard every visit.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICE BREAKDOWN ============================ -->
<section class="section" aria-label="What we clean">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Services Covered</span>
      <h2>What cleaning services can you book with <span class="text-accent">Express Pro</span>?</h2>
      <p class="answer-block">
        Four services: one-time deep cleans, move-in and move-out turnovers, post-construction dust cleanup after a remodel, and recurring maintenance cleaning on a weekly, every-other-week or monthly schedule. Windows, blinds, gutters and exterior washing have their own pages.
      </p>
    </div>

    <div class="service-breakdown reveal-up" data-p1-dynamic>
      <div class="service-category">
        <h3>Deep Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Kitchen: appliances, counters, sinks, backsplash, cabinet fronts</span></li>
          <li><?php echo icon('check', 18); ?><span>Bathrooms: toilets, showers, tubs, tile, grout, mirrors, fixtures</span></li>
          <li><?php echo icon('check', 18); ?><span>Bedrooms and living areas: dusting, vacuuming, baseboards</span></li>
          <li><?php echo icon('check', 18); ?><span>Floors: mopped, vacuumed or swept depending on surface</span></li>
          <li><?php echo icon('check', 18); ?><span>Deep clean add-ons: inside cabinets, inside fridge/oven, window tracks</span></li>
        </ul>
      </div>

      <div class="service-category">
        <h3>Move-In / Move-Out Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Empty-home scrub: all surfaces, insides of closets and cabinets</span></li>
          <li><?php echo icon('check', 18); ?><span>Appliances cleaned inside and out (oven, fridge, dishwasher)</span></li>
          <li><?php echo icon('check', 18); ?><span>Baseboards, light fixtures, ceiling fans, door frames wiped</span></li>
          <li><?php echo icon('check', 18); ?><span>Windows washed inside, sills and tracks cleaned</span></li>
          <li><?php echo icon('check', 18); ?><span>Floors vacuumed and mopped — ready for walkthrough</span></li>
        </ul>
      </div>

      <div class="service-category">
        <h3>Post-Construction &amp; Recurring Maintenance</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Post-construction: drywall and sawdust removed from every surface, vent and track</span></li>
          <li><?php echo icon('check', 18); ?><span>Cabinets, fixtures and glass wiped down; floors finished for move-in</span></li>
          <li><?php echo icon('check', 18); ?><span>Recurring maintenance: weekly, every-other-week or monthly standing slot</span></li>
          <li><?php echo icon('check', 18); ?><span>Same team, same checklist each visit — note problem areas once</span></li>
          <li><?php echo icon('check', 18); ?><span>Floors vacuumed and mopped on every visit</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="How it works">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Our Process</span>
      <h2>How does booking and getting the house cleaned <span class="text-accent">actually work</span>?</h2>
      <p class="answer-block">
        You call or send the contact form with a description of the job, Express Pro gives you a flat quote, we schedule around your calendar, our family team shows up with all supplies and cleans to a consistent checklist, and we walk through the finished work with you before leaving.
      </p>
    </div>

    <div class="process-timeline reveal-up">
      <div class="process-step" data-step="1">
        <h3>Contact us with the details</h3>
        <p>Call or text <?php echo formatPhone($phone); ?>, or send the estimate form. Tell us what you need — deep clean, move-out, post-construction or recurring service. We ask about square footage, current condition and problem areas.</p>
      </div>

      <div class="process-step" data-step="2">
        <h3>Get a flat quote</h3>
        <p>We give you a clear price based on the job scope — no hourly guessing. No obligation, no pressure to book.</p>
      </div>

      <div class="process-step" data-step="3">
        <h3>Schedule around your calendar</h3>
        <p>We work with your availability. Most Sacramento house cleaning jobs happen during business hours, but we can arrange evenings or weekends when needed. Recurring clients get a standing time slot.</p>
      </div>

      <div class="process-step" data-step="4">
        <h3>We arrive with all supplies</h3>
        <p>Our team brings the cleaning products, tools and equipment for the job. You do not need to supply anything, unless you prefer we use a specific product you provide.</p>
      </div>

      <div class="process-step" data-step="5">
        <h3>Clean to a checklist, walkthrough when done</h3>
        <p>Every job follows a written checklist so nothing gets missed. When we finish, we walk through the space with you to make sure you are satisfied before we leave. If something needs a touch-up, we handle it on the spot.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ WHY CHOOSE ============================ -->
<section class="section on-dark texture-grain edge-wave-top" aria-label="Why choose Express Pro">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Express Pro</span>
      <h2>What makes Express Pro different from other <span class="text-accent">Sacramento cleaning companies</span>?</h2>
      <p class="answer-block">
        Express Pro Cleaning Services is family-owned and hands-on — no franchise system, no rotating crews. The company has served Sacramento since 1989 and has been in the same family's hands since 1998. We bring our own supplies, we speak English, Ukrainian and Russian, and we make it right before we leave the job.
      </p>
    </div>

    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1">
        <h3>Family team, not strangers</h3>
        <p>You deal with the same owner-operated family every time. No rotating contractors, no call centers. If you have a question, you talk to the people who actually cleaned your home.</p>
      </div>

      <div class="why-card reveal-up reveal-delay-2">
        <h3>Family-owned since 1998</h3>
        <p>Express Pro started in 1989 as Express Mini Blind &amp; Window Cleaning and has been run by the same family since 1998. Decades in one city means we know the neighborhoods, the housing stock and what Sacramento families need.</p>
      </div>

      <div class="why-card reveal-up reveal-delay-3">
        <h3>All supplies included</h3>
        <p>We bring the cleaning supplies, tools and equipment for every job — nothing for you to buy or stock. If you prefer a specific product, tell us when booking.</p>
      </div>

      <div class="why-card reveal-up reveal-delay-4">
        <h3>Serve in three languages</h3>
        <p>Our team works in English, Ukrainian and Russian. Book, ask questions and give instructions in whichever language you are most comfortable speaking.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento homeowners ask before booking <span class="text-accent">house cleaning</span></h2>
      <p class="prose">Clear answers on what is covered, timing and scheduling. Still have a question? Call or text <?php echo formatPhone($phone); ?>. Many deep cleans pair with <a href="/services/window-cleaning/">window and blind cleaning</a> on the same visit.</p>
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
      <h2>Get a free house cleaning estimate for your Sacramento home</h2>
      <p>Call or text <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply with a clear flat quote. No obligation, no pressure.</p>
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
