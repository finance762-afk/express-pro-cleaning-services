<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Contact
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'contact';
$canonicalUrl    = $siteUrl . '/contact/';
$pageTitle       = 'Contact Us | ' . $siteName . ' | Sacramento, CA';
$metaDescription = 'Contact Express Pro Cleaning Services for a free cleaning estimate in Sacramento. Call ' . $phone . ' or fill out our quick form. Same-day response guaranteed.';
$pageDescription = $metaDescription;

// Breadcrumb schema
$breadcrumbs = [
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Contact', 'url' => $canonicalUrl],
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
   Contact Page — composition
   ============================================================================ */

.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: start;
}
@media (max-width: 900px) {
  .contact-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
}

.contact-form {
  background: var(--color-bg);
  border: 2px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: clamp(1.5rem, 3vw, 2rem);
  box-shadow: var(--shadow);
}
.contact-form h2 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.5rem;
  color: var(--color-ink);
  margin-bottom: 0.5rem;
}
.contact-form .form-intro {
  color: var(--color-muted);
  margin-bottom: 1.5rem;
  line-height: 1.6;
}

.contact-info {
  display: grid;
  gap: 2rem;
}
.contact-section h3 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.25rem;
  color: var(--color-ink);
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.6rem;
}
.contact-section svg {
  color: var(--color-accent);
}
.contact-list {
  display: grid;
  gap: 0.8rem;
  list-style: none;
  margin: 0;
  padding: 0;
}
.contact-list li {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  font-size: 0.95rem;
}
.contact-list svg {
  color: var(--color-primary);
  flex-shrink: 0;
}
.contact-list a {
  color: var(--color-primary);
  text-decoration: none;
  transition: color var(--transition);
}
.contact-list a:hover {
  color: var(--color-accent);
  text-decoration: underline;
}

.map-embed {
  margin-top: 1.5rem;
  border-radius: var(--radius);
  overflow: hidden;
  border: 2px solid var(--color-border);
  background: var(--color-bg-alt);
  min-height: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.map-placeholder {
  text-align: center;
  padding: 2rem;
  color: var(--color-muted);
}
.map-placeholder svg {
  color: var(--color-border);
  margin-bottom: 1rem;
}

.hours-grid {
  display: grid;
  gap: 0.6rem;
  background: var(--color-bg-alt);
  border-radius: var(--radius);
  padding: 1rem;
}
.hours-row {
  display: flex;
  justify-content: space-between;
  font-size: 0.92rem;
}
.hours-row__day {
  font-weight: 600;
  color: var(--color-ink);
}
.hours-row__time {
  color: var(--color-muted);
}

.service-areas-list {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  list-style: none;
  margin: 1rem 0 0;
  padding: 0;
}
.service-areas-list li {
  background: var(--color-bg-alt);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-sm);
  padding: 0.4rem 0.8rem;
  font-size: 0.88rem;
  color: var(--color-ink);
  display: flex;
  align-items: center;
  gap: 0.4rem;
}
.service-areas-list svg {
  color: var(--color-accent);
  width: 14px;
  height: 14px;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior">
  <div class="container">
    <div class="hero-text">
      <span class="eyebrow">Get in Touch</span>
      <h1>Contact Express Pro Cleaning Services</h1>
      <p class="hero-answer">
        Call <?php echo formatPhone($phone); ?> for immediate assistance, or fill out the form below and we will get back to you the same day with a clear, flat-rate quote. No pressure, no upsells.
      </p>
    </div>
  </div>
</section>

<!-- ============================ BREADCRUMB ============================ -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Contact</li>
    </ol>
  </div>
</nav>

<!-- ============================ CONTACT CONTENT ============================ -->
<section class="section section--light">
  <div class="container">
    <div class="contact-grid">
      <!-- LEFT: Contact Form -->
      <div class="contact-form reveal-left">
        <h2>Send us a message</h2>
        <p class="form-intro">
          Tell us about your cleaning needs and we will respond the same day — usually within a few hours.
        </p>

        <form action="<?php echo e($formAction); ?>" method="POST">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo e($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('contact'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo e($_SERVER['REQUEST_URI']); ?>">

          <div class="form-grid">
            <div class="field full">
              <label for="contact-name">Your Name</label>
              <input type="text" id="contact-name" name="name" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="contact-phone">Phone</label>
              <input type="tel" id="contact-phone" name="phone" autocomplete="tel" required>
            </div>
            <div class="field">
              <label for="contact-email">Email</label>
              <input type="email" id="contact-email" name="email" autocomplete="email" required>
            </div>
            <div class="field full">
              <label for="contact-service">Service Needed</label>
              <select id="contact-service" name="service">
                <option value="">Select a service</option>
                <?php foreach ($allServices as $contactSvc): ?>
                <option value="<?php echo e($contactSvc); ?>"><?php echo e($contactSvc); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="field full">
              <label for="contact-message">Tell us about your project</label>
              <textarea id="contact-message" name="message" rows="5" placeholder="What type of cleaning do you need? When would you like us to start? Any specific requirements?"></textarea>
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
              <span class="consent-label">I have read and agree to the <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and <a href="/terms/" target="_blank" rel="noopener">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-block">Send my request</button>
        </form>
      </div>

      <!-- RIGHT: Contact Information -->
      <div class="contact-info reveal-right">
        <div class="contact-section">
          <h3>
            <?php echo icon('phone', 24); ?>
            <span>Call or Text</span>
          </h3>
          <ul class="contact-list">
            <li>
              <?php echo icon('phone', 20); ?>
              <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>
            </li>
            <li>
              <?php echo icon('mail', 20); ?>
              <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a>
            </li>
          </ul>
          <p style="margin-top: 1rem; color: var(--color-muted); font-size: 0.9rem;">
            We respond to all inquiries the same day, typically within a few hours. Call for immediate assistance.
          </p>
        </div>

        <div class="contact-section">
          <h3>
            <?php echo icon('clock', 24); ?>
            <span>Business Hours</span>
          </h3>
          <div class="hours-grid">
            <div class="hours-row">
              <span class="hours-row__day">Monday – Friday</span>
              <span class="hours-row__time">7:00 AM – 8:00 PM</span>
            </div>
            <div class="hours-row">
              <span class="hours-row__day">Saturday</span>
              <span class="hours-row__time">7:00 AM – 6:00 PM</span>
            </div>
            <div class="hours-row">
              <span class="hours-row__day">Sunday</span>
              <span class="hours-row__time">Closed</span>
            </div>
          </div>
          <p style="margin-top: 1rem; color: var(--color-muted); font-size: 0.9rem;">
            Flexible scheduling available. We can work evenings and weekends for offices and commercial spaces.
          </p>
        </div>

        <div class="contact-section">
          <h3>
            <?php echo icon('map-pin', 24); ?>
            <span>Service Areas</span>
          </h3>
          <p style="color: var(--color-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 0.8rem;">
            Express Pro Cleaning Services serves the greater Sacramento area within approximately 30 miles:
          </p>
          <ul class="service-areas-list">
            <?php foreach ($serviceAreas as $area): ?>
            <li>
              <?php echo icon('map-pin', 14); ?>
              <span><?php echo e($area); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
          <p style="margin-top: 1rem; color: var(--color-muted); font-size: 0.9rem;">
            Not sure if we cover your area? Call <?php echo formatPhone($phone); ?> and we will confirm availability.
          </p>
        </div>

        <?php if ($gbpPlaceId): ?>
        <div class="contact-section">
          <h3>
            <?php echo icon('navigation', 24); ?>
            <span>Find Us</span>
          </h3>
          <div class="map-embed">
            <div class="map-placeholder">
              <?php echo icon('map-pin', 48); ?>
              <p>Serving <?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> and surrounding areas</p>
              <a href="<?php echo e($directionsUrl); ?>" class="btn btn-secondary btn-sm" target="_blank" rel="noopener">
                <?php echo icon('external-link', 18); ?>
                <span>Get directions</span>
              </a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="cta-band on-dark texture-grain">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content reveal-up">
      <h2>Prefer to talk first?</h2>
      <p>Call <?php echo formatPhone($phone); ?> and speak with a member of the Express Pro team directly. We are happy to answer questions before you commit to anything.</p>
      <div class="cta-actions">
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
          <?php echo icon('phone', 20); ?>
          <span>Call now</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
