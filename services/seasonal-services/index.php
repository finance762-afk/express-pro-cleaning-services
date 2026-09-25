<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Seasonal Services
 * ------------------------------------------------------------------------- */
$pageType        = 'service';
$serviceSlug     = 'seasonal-services';
$currentPage     = 'services';
$canonicalUrl    = $siteUrl . '/services/seasonal-services/';
$pageTitle       = 'Office Cleaning & Christmas Lights Sacramento | ' . $siteName;
$metaDescription = 'Office cleaning and Christmas light installation for Sacramento businesses and homes. Flexible scheduling, professional results. Call ' . formatPhone($phone) . ' for a free estimate.';

// Services covered on this page
$pageServices = [
    'Office Cleaning',
    'Christmas Light Installation',
];

// FAQ content
$faqs = [
    [
        'q' => 'What types of offices and commercial spaces do you clean in Sacramento?',
        'a' => 'Express Pro Cleaning Services cleans offices, retail stores, medical facilities, warehouses and multi-tenant commercial buildings throughout Sacramento. We tailor service frequency and tasks to your facility type and traffic volume.',
    ],
    [
        'q' => 'Can you clean after business hours or on weekends?',
        'a' => 'Yes. We schedule office cleaning around your operating hours — evenings, early mornings or weekends — so we do not disrupt your business. Most Sacramento commercial clients prefer us to work when the office is closed.',
    ],
    [
        'q' => 'How much does office cleaning cost?',
        'a' => 'Office cleaning pricing depends on square footage, frequency and scope of work. Typical Sacramento offices pay $150 to $800 per visit for weekly or bi-weekly service. We give you a flat quote based on a walkthrough of your space.',
    ],
    [
        'q' => 'Do you provide janitorial supplies or do we need to stock them?',
        'a' => 'Express Pro Cleaning Services brings all cleaning supplies and equipment. You do not need to stock paper towels, soap, trash bags or cleaning chemicals. We use eco-friendly products as the standard unless your facility has a specific product requirement.',
    ],
    [
        'q' => 'How does Christmas light installation work?',
        'a' => 'We visit your Sacramento home or business in November, design a lighting plan based on your roofline and preferences, install all lights using professional clips and hangers, and return after the holidays to take everything down and store the lights safely until next year.',
    ],
    [
        'q' => 'Do I need to provide the Christmas lights or do you supply them?',
        'a' => 'We can install lights you already own or provide commercial-grade LED lights as part of the service. Most Sacramento clients prefer our lights because they are brighter, longer-lasting and covered by our installation warranty.',
    ],
    [
        'q' => 'When should I book Christmas light installation?',
        'a' => 'Book in October or early November for best availability. Sacramento homeowners and businesses typically want lights up the week before Thanksgiving, and our schedule fills quickly as the season gets closer.',
    ],
];

// @graph schema: Service + FAQPage + BreadcrumbList
$schemaMarkup = [
    '@context' => 'https://schema.org',
    '@graph' => [
        // Service schema
        [
            '@type' => 'Service',
            '@id' => $siteUrl . '/services/seasonal-services/#service',
            'name' => 'Seasonal Services - Office Cleaning & Christmas Lights',
            'description' => 'Professional office cleaning and Christmas light installation for Sacramento businesses and homes.',
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
                'name' => 'Seasonal Services',
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
            ['name' => 'Seasonal Services', 'url' => $canonicalUrl]
        ])
    ]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Seasonal Services page — composition
   ============================================================================ */

/* Two-service split cards */
.service-split {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
  gap: var(--space-xl);
  margin-top: var(--space-lg);
}
.service-box {
  position: relative;
  background: var(--color-surface);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  overflow: hidden;
}
.service-box::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 4px;
  background: linear-gradient(90deg, var(--color-accent), var(--color-accent-light));
}
.service-box h3 {
  font-size: 1.6rem;
  margin-bottom: var(--space-sm);
  color: var(--color-ink);
}
.service-box p {
  color: var(--color-muted);
  line-height: 1.6;
  margin-bottom: var(--space-md);
}
.service-box ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: var(--space-xs);
}
.service-box li {
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  font-size: 0.95rem;
  color: var(--color-muted);
}
.service-box li svg {
  flex: 0 0 auto;
  color: var(--color-accent);
  margin-top: 2px;
}

/* Office benefits grid */
.benefits-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: var(--space-md);
  margin-top: var(--space-lg);
}
.benefit-card {
  background: linear-gradient(135deg, var(--color-surface), var(--color-bg-alt));
  border-radius: var(--radius);
  padding: var(--space-lg);
  border-left: 3px solid var(--color-accent);
}
.benefit-card h4 {
  font-size: 1.15rem;
  margin-bottom: var(--space-xs);
  color: var(--color-ink);
}
.benefit-card p {
  font-size: 0.92rem;
  color: var(--color-muted);
  line-height: 1.5;
}

/* Lights timeline */
.lights-timeline {
  display: grid;
  gap: var(--space-lg);
  margin-top: var(--space-lg);
}
.timeline-item {
  display: grid;
  grid-template-columns: 80px 1fr;
  gap: var(--space-md);
  align-items: start;
}
.timeline-badge {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
  color: white;
  display: grid;
  place-items: center;
  font-weight: 700;
  font-family: var(--font-accent);
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  text-align: center;
  line-height: 1.2;
  padding: var(--space-xs);
}
.timeline-content h4 {
  font-size: 1.25rem;
  margin-bottom: var(--space-xs);
  color: var(--color-ink);
}
.timeline-content p {
  color: var(--color-muted);
  line-height: 1.6;
}

@media (max-width: 900px) {
  .service-split {
    grid-template-columns: 1fr;
  }
  .timeline-item {
    grid-template-columns: 60px 1fr;
    gap: var(--space-sm);
  }
  .timeline-badge {
    width: 60px;
    height: 60px;
    font-size: 0.75rem;
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
        <h1 class="hero-title">Office cleaning and Christmas lights in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services handles commercial office cleaning year-round and professional Christmas light installation every holiday season for Sacramento businesses and homes — from a family team serving the area since 1991.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <?php echo icon('phone', 18); ?>
            <span>or call <?php echo formatPhone($phone); ?></span>
          </a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('building', 16); ?> Offices & commercial</li>
          <li><?php echo icon('snowflake', 16); ?> Holiday lighting</li>
          <li><?php echo icon('calendar', 16); ?> Flexible scheduling</li>
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

<!-- ============================ SERVICE SPLIT ============================ -->
<section class="section section--light" aria-label="Two seasonal services">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Year-Round & Seasonal</span>
      <h2>What seasonal services does Express Pro offer in <span class="text-accent">Sacramento</span>?</h2>
      <p class="answer-block">
        Express Pro Cleaning Services provides two seasonal and commercial services in Sacramento: office cleaning scheduled around your business hours with flexible frequency, and professional Christmas light installation each holiday season with design, install and takedown included.
      </p>
    </div>

    <div class="service-split">
      <div class="service-box reveal-left">
        <h3><?php echo icon('building', 28); ?> Office Cleaning</h3>
        <p>Professional janitorial service for Sacramento offices, retail stores, medical facilities and commercial buildings — scheduled evenings, early mornings or weekends so we work around your operating hours.</p>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Trash removal and liner replacement</span></li>
          <li><?php echo icon('check', 18); ?><span>Restrooms sanitized and restocked</span></li>
          <li><?php echo icon('check', 18); ?><span>Break rooms and kitchenettes cleaned</span></li>
          <li><?php echo icon('check', 18); ?><span>Floors vacuumed and mopped</span></li>
          <li><?php echo icon('check', 18); ?><span>Desks, counters and high-touch surfaces wiped</span></li>
          <li><?php echo icon('check', 18); ?><span>Glass doors and interior windows cleaned</span></li>
          <li><?php echo icon('check', 18); ?><span>Daily, weekly or bi-weekly service plans</span></li>
        </ul>
      </div>

      <div class="service-box reveal-right">
        <h3><?php echo icon('snowflake', 28); ?> Christmas Light Installation</h3>
        <p>Full-service holiday lighting for Sacramento homes and businesses — we design the layout, install commercial-grade LED lights, maintain them throughout the season and return after New Year to take everything down.</p>
        <ul>
          <li><?php echo icon('check', 18); ?><span>Custom lighting plan for your roofline</span></li>
          <li><?php echo icon('check', 18); ?><span>Commercial-grade LED lights (or we install yours)</span></li>
          <li><?php echo icon('check', 18); ?><span>Professional clips and hangers — no staples or nails</span></li>
          <li><?php echo icon('check', 18); ?><span>Timers and extension cords included</span></li>
          <li><?php echo icon('check', 18); ?><span>Mid-season service if a bulb goes out</span></li>
          <li><?php echo icon('check', 18); ?><span>Full takedown and storage after the holidays</span></li>
          <li><?php echo icon('check', 18); ?><span>Book in October for best availability</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ OFFICE CLEANING BENEFITS ============================ -->
<section class="section" aria-label="Office cleaning benefits">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Outsource</span>
      <h2>Why do Sacramento businesses hire a cleaning service instead of handling it <span class="text-accent">in-house</span>?</h2>
      <p class="answer-block">
        Businesses outsource office cleaning because it keeps employees focused on their actual jobs instead of taking out trash and scrubbing restrooms, ensures professional results with commercial-grade equipment and products, and provides flexible scheduling that works around operating hours without disrupting the workday.
      </p>
    </div>

    <div class="benefits-grid">
      <div class="benefit-card reveal-up reveal-delay-1">
        <h4>Work around your schedule</h4>
        <p>We clean evenings, early mornings or weekends — whatever time keeps us out of your employees' and customers' way. Most Sacramento offices prefer after-hours service so the space is fresh when the team arrives each morning.</p>
      </div>

      <div class="benefit-card reveal-up reveal-delay-2">
        <h4>Consistent, accountable results</h4>
        <p>Every visit follows a written checklist. If something is not right, you call the same family-owned company that cleaned your facility. No call centers, no finger-pointing between rotating contractors.</p>
      </div>

      <div class="benefit-card reveal-up reveal-delay-3">
        <h4>Professional supplies included</h4>
        <p>We bring all cleaning chemicals, tools, trash bags, paper products and equipment. You do not stock supplies or manage inventory. We use eco-friendly products as the default unless your facility requires something specific.</p>
      </div>

      <div class="benefit-card reveal-up reveal-delay-4">
        <h4>Custom frequency and scope</h4>
        <p>Daily service for high-traffic facilities, weekly or bi-weekly for smaller offices, monthly deep cleans added to regular upkeep — we build a plan around your space, budget and needs.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ LIGHTS TIMELINE ============================ -->
<section class="section section--light" aria-label="Christmas lights process">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Holiday Lighting</span>
      <h2>How does the Christmas light installation process work in <span class="text-accent">Sacramento</span>?</h2>
      <p class="answer-block">
        Express Pro Cleaning Services visits your Sacramento home or business in November, designs a lighting plan based on your roofline and preferences, installs commercial-grade LED lights using professional clips, checks mid-season if any bulbs fail, and returns in January to take down and store everything until next year.
      </p>
    </div>

    <div class="lights-timeline">
      <div class="timeline-item reveal-up reveal-delay-1">
        <div class="timeline-badge">Oct–Nov</div>
        <div class="timeline-content">
          <h4>Book early for best availability</h4>
          <p>Contact Express Pro in October or early November. We visit your property, measure the roofline, discuss your lighting preferences (all white, multicolor, icicle style, etc.) and give you a flat quote for install, maintenance and takedown.</p>
        </div>
      </div>

      <div class="timeline-item reveal-up reveal-delay-2">
        <div class="timeline-badge">Late Nov</div>
        <div class="timeline-content">
          <h4>Installation week</h4>
          <p>Most Sacramento customers want lights up the week before Thanksgiving. Our team installs commercial-grade LED lights using clips that attach to gutters and fascia without nails or staples, runs timers and extension cords, and tests everything before leaving.</p>
        </div>
      </div>

      <div class="timeline-item reveal-up reveal-delay-3">
        <div class="timeline-badge">Dec–Jan</div>
        <div class="timeline-content">
          <h4>Mid-season check and support</h4>
          <p>If a section goes dark or a bulb burns out during the season, call and we come back to fix it at no extra charge. Your lights stay bright through New Year.</p>
        </div>
      </div>

      <div class="timeline-item reveal-up reveal-delay-4">
        <div class="timeline-badge">Jan</div>
        <div class="timeline-content">
          <h4>Takedown and storage</h4>
          <p>After the holidays, we return to carefully remove all lights and clips, coil and label each strand, and store everything safely until next season. You are not climbing ladders or untangling 300 feet of LED wire in January cold.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento businesses and homeowners ask about <span class="text-accent">seasonal services</span></h2>
      <p class="prose">Clear answers on office cleaning scheduling, Christmas light timelines and pricing. Call <?php echo formatPhone($phone); ?> for details specific to your facility or property.</p>
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
      <h2>Get a free estimate for office cleaning or holiday lights</h2>
      <p>Call <?php echo formatPhone($phone); ?> or send the form and Express Pro Cleaning Services will reply the same day with a clear quote. Serving Sacramento businesses and homes since 1991.</p>
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
