<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Thank You
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'thank-you';
$noindex         = true; // Do not index thank-you pages
$pageTitle       = 'Thank You | ' . $siteName;
$metaDescription = 'Thank you for contacting Express Pro Cleaning Services. We will respond to your inquiry shortly.';
$pageDescription = $metaDescription;
$canonicalUrl    = $siteUrl . '/thank-you/';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================================
   Thank You Page — composition
   ============================================================================ */

.thank-you-page {
  min-height: calc(100vh - var(--nav-height) - 200px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem var(--space-xl);
}
.thank-you-content {
  max-width: 700px;
  text-align: center;
}
.thank-you-icon {
  width: 80px;
  height: 80px;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  border-radius: 50%;
  display: grid;
  place-items: center;
  margin: 0 auto 1.5rem;
  color: #fff;
  animation: scaleIn 0.5s ease-out;
}
@keyframes scaleIn {
  from {
    transform: scale(0);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}
.thank-you-content h1 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  color: var(--color-ink);
  margin-bottom: 1rem;
}
.thank-you-content > p {
  color: var(--color-muted);
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 2rem;
}
.next-steps-box {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: 2rem;
  margin: 2rem 0;
  text-align: left;
}
.next-steps-box h2 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.3rem;
  color: var(--color-ink);
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.6rem;
}
.next-steps-box svg {
  color: var(--color-accent);
}
.next-steps-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: grid;
  gap: 1rem;
}
.next-steps-list li {
  display: flex;
  gap: 0.8rem;
  align-items: flex-start;
}
.next-steps-list .step-number {
  width: 28px;
  height: 28px;
  background: var(--color-primary);
  color: #fff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 0.9rem;
  flex-shrink: 0;
}
.next-steps-list .step-text {
  flex: 1;
  padding-top: 2px;
}
.next-steps-list strong {
  display: block;
  color: var(--color-ink);
  margin-bottom: 0.25rem;
}
.next-steps-list span {
  color: var(--color-muted);
  font-size: 0.95rem;
  line-height: 1.5;
}
.thank-you-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: center;
  align-items: center;
  margin-top: 2rem;
}
.contact-urgent {
  margin-top: 2rem;
  padding: 1.5rem;
  background: var(--color-bg);
  border: 2px solid var(--color-border);
  border-radius: var(--radius-lg);
}
.contact-urgent h3 {
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 1.1rem;
  color: var(--color-ink);
  margin-bottom: 0.8rem;
}
.contact-urgent p {
  color: var(--color-muted);
  margin-bottom: 1rem;
  font-size: 0.95rem;
}
.contact-urgent a {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  text-decoration: none;
  transition: color var(--transition);
}
.contact-urgent a:hover {
  color: var(--color-accent);
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">
  <div class="thank-you-page">
    <div class="thank-you-content">
      <div class="thank-you-icon">
        <?php echo icon('check', 40); ?>
      </div>

      <h1>Thank you for reaching out!</h1>
      <p>
        Your message has been received. A member of the Express Pro Cleaning Services team will get back to you shortly.
      </p>

      <div class="next-steps-box">
        <h2>
          <?php echo icon('list-checks', 24); ?>
          <span>What happens next</span>
        </h2>
        <ol class="next-steps-list">
          <li>
            <span class="step-number">1</span>
            <div class="step-text">
              <strong>We review your request</strong>
              <span>A member of the Express Pro team will call or email you to confirm the details.</span>
            </div>
          </li>
          <li>
            <span class="step-number">2</span>
            <div class="step-text">
              <strong>We provide a clear quote</strong>
              <span>You will receive a flat-rate estimate based on your cleaning needs — no hidden fees, no pressure.</span>
            </div>
          </li>
          <li>
            <span class="step-number">3</span>
            <div class="step-text">
              <strong>We schedule your cleaning</strong>
              <span>Once approved, we find a time that works for you. Flexible scheduling available.</span>
            </div>
          </li>
        </ol>
      </div>

      <div class="thank-you-actions">
        <a href="/" class="btn btn-primary btn-lg">
          <?php echo icon('home', 20); ?>
          <span>Return to homepage</span>
        </a>
        <a href="/services/" class="btn btn-secondary btn-lg">
          <?php echo icon('list', 20); ?>
          <span>View our services</span>
        </a>
      </div>

      <div class="contact-urgent">
        <h3>Need immediate assistance?</h3>
        <p>If your cleaning request is urgent, feel free to call us directly:</p>
        <a href="tel:<?php echo $phoneRaw; ?>">
          <?php echo icon('phone', 24); ?>
          <span><?php echo formatPhone($phone); ?></span>
        </a>
      </div>

      <?php if ($reviewRequestUrl): ?>
      <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--color-border);">
        <p style="color: var(--color-muted); font-size: 0.95rem; margin-bottom: 1rem;">
          Been happy with Express Pro Cleaning Services in the past? We would appreciate your review:
        </p>
        <a href="<?php echo e($reviewRequestUrl); ?>" class="btn btn-accent" target="_blank" rel="noopener">
          <?php echo icon('star', 20); ?>
          <span>Leave us a Google review</span>
        </a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
