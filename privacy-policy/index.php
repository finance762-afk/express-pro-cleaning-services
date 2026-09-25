<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Privacy Policy
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'privacy-policy';
$pageTitle       = 'Privacy Policy | ' . $siteName;
$metaDescription = 'How Express Pro Cleaning Services collects, uses, and protects your information. Privacy practices for our website and contact forms.';
$canonicalUrl    = $siteUrl . '/privacy-policy/';
$lastUpdated     = date('F j, Y');

$companyEntityType = 'LLC';
$companyState      = 'California';

// Breadcrumb schema
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
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/'
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Privacy Policy',
                    'item' => $canonicalUrl
                ],
            ]
        ],
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

  <section class="hero hero--legal" aria-label="Privacy Policy">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Privacy Policy</h1>
      <span class="section-subtitle">your data, our commitments</span>
      <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">Privacy Policy</li>
      </ol>
    </div>
  </nav>

  <article class="legal-prose">

    <h2>1. Introduction</h2>
    <p>This Privacy Policy explains how <?php echo e($siteName); ?> ("we", "us", "our") collects, uses, and protects your personal information when you visit <?php echo e($domain); ?> or interact with our services.</p>

    <h2>2. Information We Collect</h2>
    <ul>
      <li><strong>Information you provide:</strong> name, email, phone, service address, project details (via contact forms, phone, or in-person estimates)</li>
      <li><strong>Photo uploads:</strong> if you submit project images or property photos through our forms</li>
      <li><strong>Automatically collected:</strong> IP address, browser type, device info, pages visited, referring URL, timestamps (via Google Analytics 4)</li>
      <li><strong>Cookies and similar technologies:</strong> see our <a href="/cookie-policy/">Cookie Policy</a></li>
    </ul>

    <h2>3. How We Use Your Information</h2>
    <ul>
      <li>Respond to inquiries and provide requested cleaning services</li>
      <li>Schedule estimates, appointments, and cleaning visits</li>
      <li>Communicate during active service periods</li>
      <li>Send service-related communications (including phone calls and SMS messages where you have consented)</li>
      <li>Improve our website and services</li>
      <li>Comply with legal obligations (business licensing, tax)</li>
    </ul>

    <h2>4. How We Share Your Information</h2>
    <ul>
      <li>We do <strong>NOT</strong> sell personal information.</li>
      <li><strong>Service providers:</strong> Google Analytics (analytics), form processing, our hosting provider, and Page One Insights, LLC (our web design partner — receives copies of contact form submissions for lead-tracking purposes).</li>
      <li><strong>Subcontractors and suppliers:</strong> as necessary to complete your cleaning project.</li>
      <li><strong>Legal compliance:</strong> if required by <?php echo $companyState; ?> or federal law.</li>
      <li><strong>Business transfers:</strong> in the event of a merger, acquisition, or sale of business assets.</li>
    </ul>

    <h2>5. Your Privacy Rights</h2>

    <h3 id="state-rights"><?php echo $companyState; ?> Residents</h3>
    <p>You may request access to or deletion of personal information we hold about you. Contact us using the methods below.</p>

    <h3 id="ccpa-rights">California Residents (CCPA / CPRA)</h3>
    <p>If you are a California resident, you have the following rights under the California Consumer Privacy Act (CCPA) and California Privacy Rights Act (CPRA):</p>
    <ul>
      <li><strong>Right to know</strong> what personal information we collect, use, disclose, and sell.</li>
      <li><strong>Right to delete</strong> personal information we have collected from you, subject to certain exceptions.</li>
      <li><strong>Right to correct</strong> inaccurate personal information.</li>
      <li><strong>Right to opt-out of sale or sharing</strong> of personal information. (We do not sell personal information, but you may still submit an opt-out request for our records.)</li>
      <li><strong>Right to limit use</strong> of sensitive personal information.</li>
      <li><strong>Right to non-discrimination</strong> — we will not deny you services or charge different prices based on exercising your rights.</li>
    </ul>
    <p><strong>How to exercise your rights:</strong> Email <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a> or call <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>. We will respond within 45 days of receipt.</p>

    <h3>Other State Residents</h3>
    <p>Residents of Colorado, Virginia, Connecticut, Utah, and Texas have similar rights under their respective state privacy laws. Contact us using the same methods above to exercise your rights.</p>

    <h2>6. SMS and Phone Communications (TCPA)</h2>
    <p>When you submit our contact form and check the consent box, you agree to receive phone calls and SMS text messages from us about your cleaning service request. Standard message and data rates may apply. Consent is not a condition of purchase. You can opt out of SMS communications at any time by replying STOP to any text message. You can opt out of phone communications at any time by telling our representative or emailing us at <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a>.</p>

    <h2>7. Data Retention</h2>
    <p>We retain contact form submissions and service records for as long as necessary to provide services and comply with legal obligations, typically 5–7 years for business and warranty records. Photos uploaded via contact forms are deleted after the related project is closed unless retained for warranty or legal purposes.</p>

    <h2>8. Data Security</h2>
    <p>We use reasonable administrative, technical, and physical safeguards including SSL encryption on all form submissions and secure hosting infrastructure. No system is 100% secure. We cannot guarantee absolute security, but we work to minimize risks.</p>

    <h2>9. Children's Privacy</h2>
    <p>This site is not directed to children under 13. We do not knowingly collect information from children. If you believe a child has provided us information, contact us and we will delete it.</p>

    <h2>10. Third-Party Links</h2>
    <p>Our website may link to third-party sites (Facebook, LinkedIn, Yelp, Google Business Profile, etc.). We are not responsible for the privacy practices of these sites. Review their privacy policies separately.</p>

    <h2>11. Changes to This Policy</h2>
    <p>We may update this Privacy Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

    <h2>12. Contact Us</h2>
    <p>For privacy questions or to exercise your rights:</p>
    <p>
      <strong><?php echo e($siteName); ?></strong><br>
      Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a><br>
      Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a><br>
      Address: <?php echo e($address['street']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> <?php echo e($address['zip']); ?>
    </p>

    <div class="legal-disclaimer">
      This Privacy Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal privacy laws.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
