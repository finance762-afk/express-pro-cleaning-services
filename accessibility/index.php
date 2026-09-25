<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Accessibility Statement
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'accessibility';
$pageTitle       = 'Accessibility Statement | ' . $siteName;
$metaDescription = 'Our commitment to digital accessibility and WCAG 2.1 AA conformance for the Express Pro Cleaning Services website.';
$pageDescription = $metaDescription;
$canonicalUrl    = $siteUrl . '/accessibility/';
$lastUpdated     = date('F j, Y');

$companyState = 'California';

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
                    'name' => 'Accessibility',
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

  <section class="hero hero--legal" aria-label="Accessibility Statement">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Accessibility Statement</h1>
      <span class="section-subtitle">our commitment to digital accessibility</span>
      <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">Accessibility</li>
      </ol>
    </div>
  </nav>

  <article class="legal-prose">

    <h2>1. Our Commitment</h2>
    <p><?php echo e($siteName); ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo e($domain); ?>.</p>

    <h2>2. Conformance Status</h2>
    <p>This site is designed to conform with Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities. Our site partially conforms with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

    <h2>3. Accessibility Features</h2>
    <p>Our website includes the following accessibility features:</p>
    <ul>
      <li>Semantic HTML5 markup with proper landmark regions (header, nav, main, footer)</li>
      <li>Skip-to-content link at the top of every page for keyboard navigation</li>
      <li>Visible keyboard focus indicators on all interactive elements</li>
      <li>Alt text on all meaningful images</li>
      <li>Sufficient color contrast for body text and interactive elements (minimum WCAG AA)</li>
      <li>Responsive design that works across screen sizes and zoom levels</li>
      <li>prefers-reduced-motion support — animations disabled for users who request reduced motion</li>
      <li>ARIA labels on navigation and form elements</li>
      <li>Form field labels associated with inputs</li>
      <li>Headings in logical order (H1 → H2 → H3)</li>
      <li>Text resizable up to 200% without loss of content or functionality</li>
    </ul>

    <h2>4. Known Issues</h2>
    <p>We are aware of these areas needing improvement:</p>
    <ul>
      <li>Some third-party embeds (maps, widgets, social media) may not fully meet WCAG standards. We provide alternative ways to access this information (call us, email us).</li>
      <li>Some PDF documents may not be fully accessible. Contact us for alternative formats.</li>
    </ul>

    <h2>5. Feedback and Reporting Issues</h2>
    <p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within 5 business days.</p>
    <p>Contact us:</p>
    <ul>
      <li>Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></li>
      <li>Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a></li>
    </ul>
    <p>When reporting an issue, please include:</p>
    <ul>
      <li>The page URL where you encountered the barrier</li>
      <li>A description of the issue</li>
      <li>The assistive technology you were using (if applicable)</li>
    </ul>

    <h2>6. Alternative Contact Methods</h2>
    <p>If our website is not accessible to you, you can reach us by phone or mail. We will provide service information in alternative formats on request, including:</p>
    <ul>
      <li>Large print</li>
      <li>Email or phone communication</li>
      <li>In-person consultation</li>
    </ul>

    <h2>7. Third-Party Content</h2>
    <p>We work to ensure accessibility of third-party content and embeds, but some content (maps, social media widgets, review platforms) is controlled by external services. If you experience difficulty with third-party content, contact us and we will provide the information in an alternative format.</p>

    <h2>8. Ongoing Efforts</h2>
    <p>We are committed to ongoing accessibility improvements, including:</p>
    <ul>
      <li>Regular accessibility audits of new content and features</li>
      <li>Staff training on accessibility best practices</li>
      <li>Testing with assistive technologies</li>
      <li>Incorporating user feedback into design and development</li>
    </ul>

    <h2>9. Changes to This Statement</h2>
    <p>We may update this Accessibility Statement from time to time. The "Last Updated" date at the top will reflect the most recent change.</p>

    <h2>10. Contact Us</h2>
    <p>For accessibility questions or to report barriers:</p>
    <p>
      <strong><?php echo e($siteName); ?></strong><br>
      Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a><br>
      Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a><br>
      Address: <?php echo e($address['street']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> <?php echo e($address['zip']); ?>
    </p>

    <div class="legal-disclaimer">
      This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal law.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
