<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Homepage
 * ------------------------------------------------------------------------- */
$pageType        = 'home';
$currentPage     = 'home';
$canonicalUrl    = $siteUrl . '/';
$pageTitle       = 'House & Office Cleaning in Sacramento, CA | ' . $siteName;
$metaDescription = 'Family-owned house & office cleaning in Sacramento since 1991. Deep cleans, move-outs, recurring service, carpets, windows and more. Call ' . $phone . ' for a free estimate.';
$pageDescription = $metaDescription;

// FAQ content (drives the visible FAQ section AND the FAQPage schema)
$faqs = [
    [
        'q' => 'What areas around Sacramento does Express Pro Cleaning Services cover?',
        'a' => 'Express Pro Cleaning Services covers Sacramento and the surrounding region, including North Highlands, Rio Linda, Citrus Heights, Carmichael, Elk Grove, Roseville and Folsom. If you are within about 30 miles of Sacramento, call (916) 983-9274 and we will confirm availability.',
    ],
    [
        'q' => 'How long has Express Pro Cleaning Services been in business?',
        'a' => 'Express Pro Cleaning Services has cleaned Sacramento homes and businesses since 1991. The company started as Express Mini Blind & Window Cleaning and grew into a full-service residential and commercial cleaning business run by the same local family.',
    ],
    [
        'q' => 'Do you offer recurring house cleaning?',
        'a' => 'Yes. Express Pro Cleaning Services builds recurring house cleaning on a weekly, every-other-week or monthly schedule, and keeps the same routine each visit so your home stays consistently clean. Call to set a plan that fits your household.',
    ],
    [
        'q' => 'Can you handle move-in and move-out cleaning?',
        'a' => 'Yes. Move-in and move-out cleaning is one of our most-requested services in Sacramento. We deep clean empty homes and apartments — kitchens, bathrooms, floors, insides of cabinets and appliances — so the space is ready for a walkthrough or new tenants.',
    ],
    [
        'q' => 'Do you clean offices and commercial spaces?',
        'a' => 'Yes. Express Pro Cleaning Services cleans offices and commercial spaces around Sacramento with flexible scheduling, including evenings and weekends so we work around your operating hours rather than through them.',
    ],
    [
        'q' => 'Which languages does your team speak?',
        'a' => 'Our family team serves customers in English, Ukrainian and Russian, so you can book, ask questions and give instructions in whichever language is easiest for you.',
    ],
];

// FAQPage schema (LocalBusiness is emitted by head.php on $pageType === 'home')
$schemaMarkup = generateFAQSchema($faqs);

// Icon + tint mapping for the three service groups (adjacent tints/icons differ)
$svcMeta = [
    'cleaning-services' => ['icon' => 'house',     'tint' => 1, 'cover' => 1, 'bullets' => ['Deep, recurring & one-time cleans', 'Move-in & move-out turnovers', 'Carpets, windows & blinds']],
    'seasonal-services' => ['icon' => 'snowflake', 'tint' => 2, 'cover' => 2, 'bullets' => ['Office & commercial cleaning', 'Christmas light install & takedown', 'Scheduled around your calendar']],
    'gutter-cleaning'   => ['icon' => 'droplets',  'tint' => 3, 'cover' => 3, 'bullets' => ['Full debris & blockage clearing', 'Done before the rainy season', 'Protects roof, fascia & foundation']],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Homepage — page-specific composition (warm-human archetype)
   Brand tokens only; no hardcoded colors/shadows/spacing.
   ============================================================================ */

/* Branded service-card covers (no client work photos on file — a designed,
   brand-colored panel with the service icon replaces a stock photo). */
.svc-cover { position: absolute; inset: 0; display: grid; place-items: center; overflow: hidden; }
.svc-cover svg { width: 76px; height: 76px; color: rgba(255,255,255,.94); position: relative; z-index: 1; }
.svc-cover::before { content: ""; position: absolute; inset: 0; background: radial-gradient(130% 120% at 12% 0%, rgba(255,255,255,.22), transparent 55%); }
.svc-cover::after { content: ""; position: absolute; right: -30px; bottom: -30px; width: 150px; height: 150px; border: 18px solid rgba(255,255,255,.10); border-radius: 50%; }
.svc-cover--1 { background: linear-gradient(140deg, color-mix(in srgb, var(--color-primary) 82%, black), var(--color-primary)); }
.svc-cover--2 { background: linear-gradient(140deg, var(--color-secondary), color-mix(in srgb, var(--color-secondary) 62%, black)); }
.svc-cover--3 { background: linear-gradient(140deg, var(--color-accent), var(--color-accent-dark)); }
.svc-tags { display: flex; flex-wrap: wrap; gap: .4rem; margin-top: .3rem; }

/* Signature "since 1991" story band — the one section that does not repeat */
.story-band { overflow: clip; }
.story-band .pull-quote { color: #fff; margin: .4rem 0 1rem; }
.story-band .pull-quote::before { color: var(--color-accent-bright); }
.story-lead { max-width: 40ch; }
.story-band .timeline { border-left-color: rgba(255,255,255,.22); }
.story-band .timeline b { display: block; font-family: var(--font-accent); font-size: 1.35rem; letter-spacing: .02em; color: var(--color-accent-bright); }
.story-band .timeline p { margin: .15rem 0 0; color: rgba(255,255,255,.82); font-size: .95rem; }

/* About / process — branded panel stands in for a job photo (asymmetric column) */
.about-panel { position: relative; z-index: 1; border-radius: var(--radius-lg); overflow: hidden; padding: clamp(1.5rem, 3vw, 2.25rem); color: #fff; background: linear-gradient(150deg, var(--color-primary), color-mix(in srgb, var(--color-primary) 55%, black)); box-shadow: var(--shadow-lg); display: grid; gap: 1rem; }
.about-panel__eyebrow { font-family: var(--font-accent); font-weight: 700; letter-spacing: .14em; text-transform: uppercase; font-size: .78rem; color: var(--color-accent-bright); }
.about-panel__quote { font-family: var(--font-heading); font-weight: 800; font-size: 1.45rem; line-height: 1.25; margin: 0; }
.about-panel__list { list-style: none; margin: 0; padding: .4rem 0 0; display: grid; gap: .7rem; border-top: 1px solid rgba(255,255,255,.16); }
.about-panel__list li { display: flex; gap: .6rem; align-items: flex-start; font-size: .95rem; color: rgba(255,255,255,.9); }
.about-panel__list svg { color: var(--color-accent-bright); flex: 0 0 auto; margin-top: 2px; }
.about-right .about-stat-card { color: var(--color-ink); }

/* Estimate section left card keeps the form legible on paper */
#estimate .estimate .card { align-content: start; }
#estimate .next-steps { margin-top: 1.1rem; }

@media (max-width: 900px) {
  .about-right .about-stat-card { position: static; margin: 1rem 0 0; width: max-content; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--light">
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow">Sacramento, CA · Family-owned since 1991</span>
        <h1 class="hero-title">Family-run house cleaning in Sacramento</h1>
        <p class="hero-answer">
          Express Pro Cleaning Services has cleaned Sacramento homes and offices since 1991 — deep cleans, move-outs, recurring visits, carpets, windows and gutter cleaning from a family team fluent in English, Ukrainian and Russian. We handle residential and commercial properties with flexible scheduling and same-day quotes.
        </p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
          <a class="link-call" href="tel:<?php echo $phoneRaw; ?>">
            <?php echo icon('phone', 18); ?>
            <span>or call <?php echo formatPhone($phone); ?></span>
          </a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('users', 16); ?> Family owned since 1991</li>
          <li><?php echo icon('calendar-check', 16); ?> 35+ years in Sacramento</li>
          <li><?php echo icon('globe', 16); ?> English · Українська · Русский</li>
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
            <label class="sr-only" for="hero-service">Service</label>
            <select id="hero-service" name="service">
              <option value="">What do you need?</option>
              <?php foreach ($allServices as $heroSvc): ?>
              <option value="<?php echo e($heroSvc); ?>"><?php echo e($heroSvc); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label class="consent">
            <input type="checkbox" name="terms_accepted" value="yes" required>
            <span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span>
          </label>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>
    </div>
  </div>
</section>

<!-- ============================ TICKER ============================ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <span><?php echo icon('calendar-check', 18); ?> Serving Sacramento since 1991</span>
    <span><?php echo icon('users', 18); ?> Family owned &amp; operated</span>
    <span><?php echo icon('home', 18); ?> Homes &amp; offices</span>
    <span><?php echo icon('star', 18); ?> Deep &amp; move-out cleans</span>
    <span><?php echo icon('waves', 18); ?> Carpets · Windows · Blinds</span>
    <span><?php echo icon('globe', 18); ?> English · Ukrainian · Russian</span>
    <span><?php echo icon('check-circle', 18); ?> Free estimates</span>
    <span><?php echo icon('map-pin', 18); ?> Greater Sacramento area</span>
    <!-- duplicate set for seamless loop -->
    <span><?php echo icon('calendar-check', 18); ?> Serving Sacramento since 1991</span>
    <span><?php echo icon('users', 18); ?> Family owned &amp; operated</span>
    <span><?php echo icon('home', 18); ?> Homes &amp; offices</span>
    <span><?php echo icon('star', 18); ?> Deep &amp; move-out cleans</span>
    <span><?php echo icon('waves', 18); ?> Carpets · Windows · Blinds</span>
    <span><?php echo icon('globe', 18); ?> English · Ukrainian · Russian</span>
    <span><?php echo icon('check-circle', 18); ?> Free estimates</span>
    <span><?php echo icon('map-pin', 18); ?> Greater Sacramento area</span>
  </div>
</div>

<!-- ============================ PROOF STRIP ============================ -->
<section class="stats-band texture-grain slant-top" aria-label="Why Sacramento chooses Express Pro">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span>1991</span></span>
        <span class="stat-label">Serving Sacramento since</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Family</span>-Owned</span>
        <span class="stat-label">Local, hands-on team</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>3</span> Languages</span>
        <span class="stat-label">English, Ukrainian, Russian</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>12</span> Services</span>
        <span class="stat-label">Homes &amp; businesses</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICES ============================ -->
<section class="section section--light" aria-label="Cleaning services">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>Which cleaning services can you book in <span class="text-accent">Sacramento</span>?</h2>
      <p class="hero-answer">
        Express Pro Cleaning Services handles the full range of home and business cleaning across Sacramento: regular house cleaning, deep cleans, move-in and move-out turnovers, recurring maintenance, offices, plus carpets, windows, blinds, pressure washing, gutters and seasonal Christmas lights.
      </p>
      <span class="section-subtitle">One local family, twelve ways to get it clean</span>
    </div>

    <div class="services-grid">
      <?php foreach ($services as $card):
        $meta = $svcMeta[$card['slug']]; ?>
      <article class="service-card-with-image card-tint-<?php echo $meta['tint']; ?> reveal-up reveal-delay-<?php echo $meta['tint']; ?>">
        <div class="service-card__image">
          <span class="svc-cover svc-cover--<?php echo $meta['cover']; ?>" aria-hidden="true"><?php echo icon($meta['icon'], 76); ?></span>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($meta['icon'], 22); ?></div>
          <h3><?php echo e($card['name']); ?></h3>
          <p class="service-card__desc"><?php echo e($card['description']); ?></p>
          <ul>
            <?php foreach ($meta['bullets'] as $bullet): ?>
            <li><?php echo e($bullet); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/<?php echo e($card['slug']); ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ SIGNATURE: OUR STORY ============================ -->
<section class="section on-dark texture-grain edge-curve-top story-band" aria-label="Our story">
  <span class="grain-layer" aria-hidden="true"></span>
  <span class="floating-ring" style="right:-90px; top:-50px;" aria-hidden="true"></span>
  <div class="container grid-asymmetric">
    <div class="reveal-left">
      <span class="eyebrow">Our Story</span>
      <blockquote class="pull-quote">Same family, same standards, same city — since 1991.</blockquote>
      <p class="story-lead">
        Express Pro Cleaning Services began in 1991 as Express Mini Blind &amp; Window Cleaning and has grown into a full-service cleaning company for Sacramento homes and offices. Three decades later it is still owner-run, still local, and still built on knowing the neighborhoods it serves.
      </p>
    </div>
    <ul class="timeline reveal-right">
      <li>
        <b>1991</b>
        <p>Founded in Sacramento as Express Mini Blind &amp; Window Cleaning, specializing in blinds and glass.</p>
      </li>
      <li>
        <b>Growth</b>
        <p>Added house cleaning, deep cleans, carpets, move-outs and commercial work as customers asked for more.</p>
      </li>
      <li>
        <b>Today</b>
        <p>Express Pro Cleaning Services serves the greater Sacramento area in English, Ukrainian and Russian.</p>
      </li>
    </ul>
  </div>
</section>

<!-- ============================ ABOUT / PROCESS ============================ -->
<section class="section section--light" aria-label="About and how we work">
  <div class="container about-split">
    <div class="about-copy reveal-left">
      <span class="eyebrow-label">The Express Pro Way</span>
      <h2>A Sacramento cleaning company that treats your place like its own</h2>
      <p>
        Express Pro Cleaning Services is a family-owned business based in Sacramento, California, serving homes and businesses across the region since 1991. We show up when we say we will, keep the same routine every visit, and clean the details most crews skip.
      </p>
      <p>
        Whether it is a one-time deep clean, a move-out that has to pass a walkthrough, weekly upkeep or an office after hours, you deal with the same people who have built this business by word of mouth in the Sacramento area for over thirty years.
      </p>
      <ol class="process-steps">
        <li>
          <b>Tell us the job</b>
          <span>Call or send the form — we ask a few quick questions about your space.</span>
        </li>
        <li>
          <b>Free estimate</b>
          <span>We give you a clear, no-obligation price, usually the same day.</span>
        </li>
        <li>
          <b>We clean</b>
          <span>Our family team arrives on schedule and works to a consistent checklist.</span>
        </li>
        <li>
          <b>Walkthrough</b>
          <span>We check the details with you and make it right before we leave.</span>
        </li>
      </ol>
    </div>

    <div class="about-right reveal-right">
      <div class="about-panel">
        <span class="about-panel__eyebrow">Since 1991</span>
        <p class="about-panel__quote">Local, family-run, and easy to talk to in the language you prefer.</p>
        <ul class="about-panel__list">
          <li><?php echo icon('users', 20); ?><span>Owner-operated family team — no rotating strangers</span></li>
          <li><?php echo icon('globe', 20); ?><span>We work in English, Ukrainian and Russian</span></li>
          <li><?php echo icon('home', 20); ?><span>Homes, apartments and offices across Sacramento</span></li>
        </ul>
      </div>
      <div class="about-stat-card">
        <span class="stat-number"><span>35</span>+</span>
        <span class="stat-label">Years serving Sacramento</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<script type="application/ld+json">
<?php echo json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<section class="section" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good to Know</span>
      <h2>Questions Sacramento customers ask <span class="text-accent">before booking</span></h2>
      <p class="prose">Straight answers on where we work, what we clean and how pricing works. Still have a question? Call <?php echo formatPhone($phone); ?>.</p>
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

<!-- ============================ ESTIMATE ============================ -->
<section class="section section--light" id="estimate" aria-label="Request a free estimate">
  <div class="container estimate">
    <div class="card reveal-up">
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Tell us about the job</h2>
      <p class="prose">Send a few details and Express Pro Cleaning Services will get back to you the same day with a clear price. No obligation, no pressure.</p>

      <form action="<?php echo e($formAction); ?>" method="POST">
        <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
        <input type="hidden" name="_next" value="<?php echo e($siteUrl); ?>/thank-you">
        <?php echo p1_attribution_fields('estimate-section'); ?>
        <input type="hidden" name="consent_version" value="v2.1">
        <input type="hidden" name="consent_page" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">

        <div class="form-grid">
          <div class="field full">
            <label for="est-name">Your Name</label>
            <input type="text" id="est-name" name="name" autocomplete="name" required>
          </div>
          <div class="field">
            <label for="est-phone">Phone</label>
            <input type="tel" id="est-phone" name="phone" autocomplete="tel" required>
          </div>
          <div class="field">
            <label for="est-email">Email</label>
            <input type="email" id="est-email" name="email" autocomplete="email" required>
          </div>
          <div class="field full">
            <label for="est-service">Service Needed</label>
            <select id="est-service" name="service">
              <option value="">Select a service</option>
              <?php foreach ($allServices as $estSvc): ?>
              <option value="<?php echo e($estSvc); ?>"><?php echo e($estSvc); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="field full">
            <label for="est-message">How can we help?</label>
            <textarea id="est-message" name="message" rows="4"></textarea>
          </div>
        </div>

        <fieldset class="form-consent-fieldset">
          <legend class="form-consent-legend">Communication Consent</legend>
          <label class="form-consent-item">
            <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
            <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo e($siteName); ?> about my inquiry, services and promotions. I can unsubscribe anytime by emailing <?php echo e($email); ?>.</span>
          </label>
          <label class="form-consent-item">
            <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
            <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive text messages from <?php echo e($siteName); ?> at the number I provided. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
          </label>
          <label class="form-consent-item form-consent-required">
            <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
            <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
          </label>
        </fieldset>

        <button type="submit" class="btn btn-primary btn-block">Send my request</button>
      </form>
    </div>

    <div class="reveal-right">
      <h3>What happens next</h3>
      <ol class="next-steps">
        <li><strong>We call you back — same day.</strong> A member of the family, not a call center.</li>
        <li><strong>Quick walkthrough &amp; flat quote.</strong> We size up the job and give you a clear price.</li>
        <li><strong>We schedule around you.</strong> Evenings and weekends available for offices.</li>
      </ol>

      <div class="nap">
        <div>
          <?php echo icon('phone', 20); ?>
          <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>
        </div>
        <div>
          <?php echo icon('mail', 20); ?>
          <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a>
        </div>
        <div>
          <?php echo icon('map-pin', 20); ?>
          <span><?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> — serving the greater Sacramento area</span>
        </div>
        <div>
          <?php echo icon('clock', 20); ?>
          <span><?php echo e($businessHours); ?></span>
        </div>
      </div>

      <p class="prose" style="margin-top:1.2rem; color:var(--color-muted); font-size:.9rem;">
        Express Pro Cleaning Services serves <?php echo e(implode(', ', array_slice($serviceAreas, 0, -1))); ?> and <?php echo e(end($serviceAreas)); ?>.
      </p>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
