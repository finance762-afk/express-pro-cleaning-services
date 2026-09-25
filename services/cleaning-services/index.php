<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Cleaning Services
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'cleaning-services';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/cleaning-services/';
$pageTitle       = 'House Cleaning Services Sacramento, CA | ' . $siteName;
$metaDescription = 'Deep cleans, move-outs, recurring cleaning, carpets, windows and more for Sacramento homes. Family-owned since 1991. Call ' . formatPhone($phone) . ' for a free estimate.';
$pageDescription = $metaDescription;

// Services covered on this page
$pageServices = [
    'House Cleaning',
    'Deep Cleaning',
    'Move-In / Move-Out Cleaning',
    'Recurring House Cleaning',
    'Post-Construction Cleaning',
    'Carpet Cleaning',
    'Window Cleaning',
    'Blind Cleaning',
    'Pressure Washing',
];

// FAQ content (drives visible FAQ AND FAQPage schema)
$faqs = [
    [
        'q' => 'How much does deep cleaning cost in Sacramento?',
        'a' => 'Deep cleaning costs in Sacramento typically range from $200 to $600 depending on home size, condition and what you need cleaned. Express Pro Cleaning Services gives you a clear flat quote after a quick phone walkthrough of your space, usually the same day you call.',
    ],
    [
        'q' => 'What is included in a move-out cleaning?',
        'a' => 'Our move-out cleaning covers every surface in the empty home: inside cabinets and drawers, inside appliances, baseboards, light fixtures, windows, floors and bathrooms scrubbed from grout to ceiling. The goal is a space that passes the landlord or buyer walkthrough.',
    ],
    [
        'q' => 'How long does a deep clean take?',
        'a' => 'A deep clean for a typical Sacramento home takes 4 to 8 hours depending on square footage and how much built-up grime the team finds. We give you a time estimate when we quote the job so you know what to expect.',
    ],
    [
        'q' => 'Do you bring your own cleaning supplies and equipment?',
        'a' => 'Yes. Express Pro Cleaning Services brings all cleaning supplies, tools and equipment needed for the job. We use eco-friendly, non-toxic products safe for families and pets. If you prefer we use a specific product you supply, just let us know when booking.',
    ],
    [
        'q' => 'Can I set up weekly or bi-weekly recurring house cleaning?',
        'a' => 'Yes. We build recurring house cleaning plans on a weekly, every-other-week or monthly schedule across Sacramento. Recurring clients get the same team and the same routine each visit so your home stays consistently clean without you managing it.',
    ],
    [
        'q' => 'Do you clean carpets and windows?',
        'a' => 'Yes. Express Pro Cleaning Services offers professional carpet cleaning (steam or dry extraction) and window cleaning (inside and out) as standalone services or as add-ons to a house cleaning. We started as a blind and window cleaning company in 1991, so glass is still a specialty.',
    ],
    [
        'q' => 'What areas around Sacramento do you serve?',
        'a' => 'We serve Sacramento and surrounding communities within about 30 miles: North Highlands, Rio Linda, Citrus Heights, Carmichael, Elk Grove, Roseville and Folsom. Call (916) 983-9274 to confirm we cover your area.',
    ],
];

// @graph schema: Service + FAQPage + BreadcrumbList
$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        // Service schema
        [
            '@type' => 'Service',
            '@id' => $siteUrl . '/services/cleaning-services/#service',
            'name' => 'Residential Cleaning Services',
            'description' => 'House cleaning, deep cleans, move-in/move-out, recurring maintenance, carpet cleaning, window cleaning and more for Sacramento homes.',
            'provider' => ['@id' => $siteUrl . '/#organization'],
            'areaServed' => [
                '@type' => 'City',
                'name' => $address['city'],
                'containedInPlace' => [
                    '@type' => 'State',
                    'name' => $address['state']
                ]
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Cleaning Services',
                'itemListElement' => array_map(function($svc) {
                    return [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $svc
                        ]
                    ];
                }, $pageServices)
            ]
        ],
        // FAQPage schema
        generateFAQSchema($faqs),
        // BreadcrumbList schema
        generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => $siteUrl . '/'],
            ['name' => 'Cleaning Services', 'url' => $canonicalUrl]
        ])
    ]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Cleaning Services page — composition
   ============================================================================ */

/* Problem/pain section with bento card grid */
.problem-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: var(--space-md);
  margin-top: var(--space-lg);
}
.problem-card {
  position: relative;
  background: var(--color-surface);
  border: 1px solid var(--color-border);
  border-radius: var(--radius);
  padding: var(--space-lg);
  transition: var(--transition);
}
.problem-card:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}
.problem-card__icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  border-radius: var(--radius-sm);
  background: linear-gradient(135deg, var(--color-accent-light), var(--color-accent));
  color: white;
  margin-bottom: var(--space-sm);
}
.problem-card h3 {
  font-size: 1.1rem;
  margin-bottom: var(--space-xs);
  color: var(--color-ink);
}
.problem-card p {
  font-size: 0.95rem;
  color: var(--color-muted);
  line-height: 1.5;
}

/* Service breakdown with checklist */
.service-breakdown {
  display: grid;
  gap: var(--space-xl);
}
.service-category {
  border-left: 3px solid var(--color-accent);
  padding-left: var(--space-md);
}
.service-category h3 {
  font-size: 1.35rem;
  margin-bottom: var(--space-sm);
  color: var(--color-ink);
}
.service-category ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: var(--space-xs);
}
.service-category li {
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  font-size: 0.95rem;
  color: var(--color-muted);
}
.service-category li svg {
  flex: 0 0 auto;
  color: var(--color-accent);
  margin-top: 2px;
}

/* Process timeline */
.process-timeline {
  position: relative;
  padding-left: var(--space-xl);
  border-left: 2px solid var(--color-border);
}
.process-step {
  position: relative;
  margin-bottom: var(--space-xl);
}
.process-step::before {
  content: attr(data-step);
  position: absolute;
  left: calc(-1 * var(--space-xl) - 18px);
  top: 0;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: var(--color-accent);
  color: white;
  display: grid;
  place-items: center;
  font-weight: 700;
  font-family: var(--font-accent);
  font-size: 0.95rem;
}
.process-step h3 {
  font-size: 1.25rem;
  margin-bottom: var(--space-xs);
  color: var(--color-ink);
}
.process-step p {
  color: var(--color-muted);
  line-height: 1.6;
}

/* Why choose cards */
.why-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-lg);
}
.why-card {
  background: var(--color-surface);
  border-radius: var(--radius);
  padding: var(--space-lg);
  border-left: 4px solid var(--color-accent);
}
.why-card h3 {
  font-size: 1.2rem;
  margin-bottom: var(--space-sm);
  color: var(--color-ink);
}
.why-card p {
  font-size: 0.95rem;
  color: var(--color-muted);
  line-height: 1.6;
}

@media (max-width: 900px) {
  .problem-grid,
  .why-grid {
    grid-template-columns: 1fr;
  }
  .process-timeline {
    padding-left: var(--space-lg);
  }
  .process-step::before {
    left: calc(-1 * var(--space-lg) - 14px);
    width: 28px;
    height: 28px;
    font-size: 0.85rem;
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
        <h1 class="hero-title">House cleaning services in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services handles deep cleans, move-outs, recurring visits, post-construction, carpet and window cleaning across Sacramento — from a family team that has cleaned local homes since 1991.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <?php echo icon('phone', 18); ?>
            <span>or call <?php echo formatPhone($phone); ?></span>
          </a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('calendar-check', 16); ?> Since 1991</li>
          <li><?php echo icon('users', 16); ?> Family owned</li>
          <li><?php echo icon('check-circle', 16); ?> Free estimates</li>
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
        Express Pro Cleaning Services handles the full range of residential cleaning in Sacramento: one-time deep cleans, move-in and move-out turnovers, recurring house cleaning, post-construction dust cleanup, carpet steam cleaning, window cleaning (inside and out), blind cleaning and pressure washing for driveways and siding.
      </p>
    </div>

    <div class="service-breakdown reveal-up">
      <div class="service-category">
        <h3>House Cleaning & Deep Cleaning</h3>
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
        <h3>Specialty Cleaning</h3>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Carpet cleaning: steam or dry extraction for traffic lanes and stains</span></li>
          <li><?php echo icon('check', 18); ?><span>Window cleaning: interior and exterior panes, screens, frames</span></li>
          <li><?php echo icon('check', 18); ?><span>Blind cleaning: each slat wiped or ultrasonically cleaned off-site</span></li>
          <li><?php echo icon('check', 18); ?><span>Post-construction: dust removal from every surface after remodels</span></li>
          <li><?php echo icon('check', 18); ?><span>Pressure washing: driveways, walkways, siding, decks</span></li>
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
        You call or send the contact form with a description of the job, Express Pro gives you a flat quote usually the same day, we schedule around your calendar, our family team shows up with all supplies and cleans to a consistent checklist, and we walk through the finished work with you before leaving.
      </p>
    </div>

    <div class="process-timeline reveal-up">
      <div class="process-step" data-step="1">
        <h3>Contact us with the details</h3>
        <p>Call <?php echo formatPhone($phone); ?> or send the estimate form. Tell us what you need cleaned — one-time deep clean, recurring service, move-out, carpet or window work. We ask a few questions about square footage, current condition and any problem areas.</p>
      </div>

      <div class="process-step" data-step="2">
        <h3>Get a flat quote, same day</h3>
        <p>We give you a clear price based on the job scope — no hourly guessing. Most quotes go out within a few hours of the initial contact. No obligation, no pressure to book.</p>
      </div>

      <div class="process-step" data-step="3">
        <h3>Schedule around your calendar</h3>
        <p>We work with your availability. Most Sacramento house cleaning jobs happen during business hours, but we can arrange evenings or weekends when needed. Recurring clients get a standing time slot.</p>
      </div>

      <div class="process-step" data-step="4">
        <h3>We arrive with all supplies</h3>
        <p>Our team brings eco-friendly cleaning products, tools and equipment. You do not need to supply anything. We use non-toxic cleaners safe for kids and pets unless you prefer we use a specific product you provide.</p>
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
        Express Pro Cleaning Services is family-owned and hands-on — no franchise system, no rotating crews. We have cleaned Sacramento homes since 1991, we bring our own eco-friendly supplies, we speak English, Ukrainian and Russian, and we make it right if something is not perfect before we leave the job.
      </p>
    </div>

    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1">
        <h3>Family team, not strangers</h3>
        <p>You deal with the same owner-operated family every time. No rotating contractors, no call centers. If you have a question, you talk to the people who actually cleaned your home.</p>
      </div>

      <div class="why-card reveal-up reveal-delay-2">
        <h3>35 years serving Sacramento</h3>
        <p>We started in 1991 as Express Mini Blind & Window Cleaning and grew into a full-service residential cleaning company. Three decades in the same city means we know the neighborhoods, the housing stock and what Sacramento families need.</p>
      </div>

      <div class="why-card reveal-up reveal-delay-3">
        <h3>Eco-friendly, non-toxic products</h3>
        <p>All cleaning supplies we bring are safe for children, pets and people with sensitivities. We use effective, environmentally responsible products as the default — not an upcharge option.</p>
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
      <p class="prose">Clear answers on pricing, what is covered, timing and scheduling. Still have a question? Call <?php echo formatPhone($phone); ?>.</p>
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
      <h2>Get a free house cleaning estimate for your Sacramento home</h2>
      <p>Call <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply the same day with a clear flat quote. No obligation, no pressure.</p>
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
