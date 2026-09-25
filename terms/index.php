<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Terms of Service
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'terms';
$pageTitle       = 'Terms of Service | ' . $siteName;
$metaDescription = 'Terms of Service governing use of the Express Pro Cleaning Services website and engagement of our cleaning services.';
$pageDescription = $metaDescription;
$canonicalUrl    = $siteUrl . '/terms/';
$lastUpdated     = date('F j, Y');

$companyEntityType = 'LLC';
$companyState      = 'California';
$companyCounty     = 'Sacramento County';

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
                    'name' => 'Terms of Service',
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

  <section class="hero hero--legal" aria-label="Terms of Service">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Terms of Service</h1>
      <span class="section-subtitle">governing use of our site and services</span>
      <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">Terms of Service</li>
      </ol>
    </div>
  </nav>

  <article class="legal-prose">

    <h2>1. Agreement to Terms</h2>
    <p>By accessing or using <?php echo e($domain); ?> or engaging <?php echo e($siteName); ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

    <h2>2. Use of This Website</h2>
    <ul>
      <li>You may use this Site for personal, non-commercial purposes to learn about our services and contact us.</li>
      <li>You may not use the Site for unlawful purposes, attempt to access non-public systems, scrape or copy content without written permission, submit false information through our contact form, or use automated systems to extract data.</li>
    </ul>

    <h2>3. Service Estimates and Quotes</h2>
    <p>All estimates are based on information provided and conditions visible at the time of consultation. Final pricing may differ if:</p>
    <ul>
      <li>Project scope changes (customer requests additional services or areas)</li>
      <li>Hidden conditions are discovered (damage, excessive soiling, biohazard conditions)</li>
      <li>Material or supply costs change between estimate and service date</li>
      <li>Access conditions differ from initial assumptions (locked gates, pets, occupancy status)</li>
    </ul>
    <p>Verbal quotes are non-binding. Only written, signed contracts constitute a final agreement.</p>

    <h2>4. Service Work</h2>
    <ul>
      <li>Work is governed by a written service agreement or work order specific to each job.</li>
      <li>We comply with applicable <?php echo $companyState; ?> state and local health and safety regulations.</li>
      <li>Work is performed by <?php echo e($siteName); ?> employees and qualified subcontractors.</li>
      <li>All workers carry workers' compensation insurance as required by <?php echo $companyState; ?> law.</li>
      <li>We are licensed and insured to operate in the state of <?php echo $companyState; ?>.</li>
    </ul>

    <h2>5. Warranties</h2>
    <p>We stand behind the quality of our work. If you are not satisfied with a cleaning service within 24 hours of completion, contact us and we will return to address the issue at no additional charge. This satisfaction guarantee excludes:</p>
    <ul>
      <li>Issues arising from conditions beyond our control (acts of nature, accidents after service completion)</li>
      <li>Damage from neglect, misuse, or alteration by others after our work is complete</li>
      <li>Pre-existing conditions disclosed and acknowledged prior to service</li>
    </ul>

    <h2>6. Payment Terms</h2>
    <p>Payment terms are specified in your service agreement. Standard terms include:</p>
    <ul>
      <li>Deposit (if required) at contract signing</li>
      <li>Payment upon completion for one-time services</li>
      <li>Recurring services billed on agreed schedule (weekly, bi-weekly, monthly)</li>
    </ul>
    <p>We accept check, cash, electronic transfer, and credit card. Past-due balances may accrue interest as permitted by <?php echo $companyState; ?> law.</p>

    <h2>7. Cancellation</h2>
    <p>Cancellation terms are specified in your contract. Generally:</p>
    <ul>
      <li>Cancellation 24+ hours before scheduled service: no charge, deposit refunded</li>
      <li>Cancellation less than 24 hours before scheduled service: may incur cancellation fee</li>
      <li>Cancellation after team arrives: full service charge applies</li>
      <li>Recurring services: 30-day notice required to discontinue</li>
    </ul>

    <h2>8. Liability and Insurance</h2>
    <p>We carry general liability insurance and workers' compensation insurance as required by <?php echo $companyState; ?> law. Our liability for any claim is limited to the amount you paid for the specific service giving rise to the claim.</p>
    <p>We are not liable for:</p>
    <ul>
      <li>Damage to items not disclosed to us prior to service (fragile items, heirlooms, valuables)</li>
      <li>Pre-existing damage or wear revealed during cleaning</li>
      <li>Loss or damage to items left unsecured during service</li>
      <li>Indirect, incidental, special, or consequential damages</li>
    </ul>

    <h2>9. Customer Responsibilities</h2>
    <p>To ensure safe and efficient service, customers agree to:</p>
    <ul>
      <li>Provide accurate information about the property and cleaning requirements</li>
      <li>Secure or remove fragile, valuable, or personal items before service</li>
      <li>Disclose any biohazard conditions, pest infestations, or safety hazards</li>
      <li>Provide safe access to all areas to be cleaned</li>
      <li>Secure pets or notify us of pets on premises</li>
      <li>Notify us of any special requirements or concerns before service begins</li>
    </ul>

    <h2>10. Intellectual Property</h2>
    <p>All content on this Site — text, graphics, photographs, logos — is owned by <?php echo e($siteName); ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

    <h2>11. Governing Law and Disputes</h2>
    <p>These Terms are governed by the laws of the State of <?php echo $companyState; ?> without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in <?php echo $companyCounty; ?>, <?php echo $companyState; ?>.</p>

    <h2>12. Changes to These Terms</h2>
    <p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

    <h2>13. Contact Us</h2>
    <p>For questions about these Terms:</p>
    <p>
      <strong><?php echo e($siteName); ?></strong><br>
      Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a><br>
      Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a><br>
      Address: <?php echo e($address['street']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> <?php echo e($address['zip']); ?>
    </p>

    <div class="legal-disclaimer">
      This Terms of Service document is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal law.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
