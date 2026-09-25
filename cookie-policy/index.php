<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * PAGE SETUP — Cookie Policy
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'cookie-policy';
$pageTitle       = 'Cookie Policy | ' . $siteName;
$metaDescription = 'How Express Pro Cleaning Services uses cookies and tracking technologies on our website.';
$pageDescription = $metaDescription;
$canonicalUrl    = $siteUrl . '/cookie-policy/';
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
                    'name' => 'Cookie Policy',
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

  <section class="hero hero--legal" aria-label="Cookie Policy">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Cookie Policy</h1>
      <span class="section-subtitle">how we use cookies and tracking</span>
      <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">Cookie Policy</li>
      </ol>
    </div>
  </nav>

  <article class="legal-prose">

    <h2>1. What Are Cookies?</h2>
    <p>Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

    <h2>2. Cookies We Use</h2>

    <h3>Strictly Necessary</h3>
    <p>Essential for site functionality (form submission, security). These cannot be disabled. Example: session cookies during form submission, localStorage flags for dismissing notices.</p>

    <h3>Analytics (Google Analytics 4)</h3>
    <p>We use Google Analytics 4 to understand how visitors use our site. GA4 sets cookies prefixed with <code>_ga</code> and <code>_gid</code>. Data is anonymized via IP truncation. This helps us improve site navigation, content, and user experience.</p>

    <h3>Third-Party Embeds</h3>
    <p>Our site may embed tools and content from third parties (Google Maps, review widgets, social media feeds, etc.). These services may set their own cookies subject to their own privacy policies. We do not control third-party cookies.</p>

    <h2>3. How to Control Cookies</h2>
    <p>Most browsers allow you to view, delete, or block cookies. You can:</p>
    <ul>
      <li>Block third-party cookies while allowing first-party cookies</li>
      <li>Block all cookies (note: site functionality may break)</li>
      <li>Delete cookies after each browsing session</li>
      <li>View which cookies are stored and delete individual cookies</li>
    </ul>
    <p>Browser-specific instructions are available from <a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a>, <a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener">Mozilla Firefox</a>, <a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Apple Safari</a>, and <a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Microsoft Edge</a>.</p>

    <h2>4. Opt Out of Google Analytics</h2>
    <p>You can opt out of GA4 tracking site-wide by installing the Google Analytics Opt-out Browser Add-on at <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">https://tools.google.com/dlpage/gaoptout</a>.</p>

    <h2>5. Our Cookie Notice</h2>
    <p>We display a brief banner notifying visitors of our cookie use. Once dismissed, the banner is suppressed for future visits via localStorage. You can re-enable the banner by clearing your browser's site data for <?php echo e($domain); ?>.</p>

    <h2>6. Changes to This Policy</h2>
    <p>We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Continued use of the site after changes constitutes acceptance of the updated policy.</p>

    <h2>7. Contact Us</h2>
    <p>For questions about this Cookie Policy:</p>
    <p>
      <strong><?php echo e($siteName); ?></strong><br>
      Email: <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a><br>
      Phone: <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>
    </p>

    <div class="legal-disclaimer">
      This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal law.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
