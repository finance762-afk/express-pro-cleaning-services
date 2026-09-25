<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Page setup
$pageTitle = 'Service Areas — Professional Cleaning in Sacramento & Surrounding Communities | ' . $siteName;
$metaDescription = 'Express Pro Cleaning Services serves Sacramento, North Highlands, Rio Linda, Citrus Heights, Carmichael, Elk Grove, Roseville, and Folsom. Family-owned cleaning company since 1991. Call ' . $phone . ' for a free estimate.';
$pageDescription = $metaDescription;
$canonicalUrl = $siteUrl . '/service-areas/';
$pageType = 'other';
$currentPage = 'service-areas';

// Breadcrumb schema
$breadcrumbs = [
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $canonicalUrl]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific schema (BreadcrumbList) -->
<script type="application/ld+json">
<?php echo json_encode(generateBreadcrumbSchema($breadcrumbs), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>
</script>

<style>
  /* Service Areas Page Styles */
  .areas-hero {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: white;
    padding: calc(var(--nav-height) + 3rem) 0 4rem;
    position: relative;
    overflow: hidden;
  }

  .areas-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(circle at 20% 80%, rgba(255,255,255,0.08) 0%, transparent 50%),
      radial-gradient(circle at 80% 20%, rgba(255,255,255,0.06) 0%, transparent 50%);
    pointer-events: none;
  }

  .areas-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100' height='100' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
    opacity: 0.4;
    pointer-events: none;
  }

  .areas-hero .container {
    position: relative;
    z-index: 1;
  }

  .areas-hero .eyebrow {
    font-family: var(--font-accent);
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.9);
    margin-bottom: 1rem;
  }

  .areas-hero h1 {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: 1.5rem;
    text-wrap: balance;
  }

  .areas-hero .hero-answer {
    font-size: 1.125rem;
    line-height: 1.6;
    max-width: 65ch;
    margin-bottom: 2rem;
    color: rgba(255,255,255,0.95);
  }

  .areas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(min(100%, 340px), 1fr));
    gap: 2rem;
    padding: 4rem 0;
  }

  .area-card {
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 2rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .area-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
  }

  .area-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .area-card h3 svg {
    color: var(--color-accent);
    flex-shrink: 0;
  }

  .area-card p {
    color: var(--color-text-light);
    line-height: 1.6;
    margin-bottom: 1rem;
  }

  .area-card .local-details {
    font-size: 0.9375rem;
    color: var(--color-text);
    line-height: 1.7;
    padding: 1rem;
    background: var(--color-bg-alt);
    border-radius: var(--radius-sm);
    border-left: 3px solid var(--color-accent);
  }

  .map-section {
    background: var(--color-bg-alt);
    padding: 4rem 0;
  }

  .map-section h2 {
    text-align: center;
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: 1rem;
  }

  .map-section .section-intro {
    text-align: center;
    max-width: 65ch;
    margin: 0 auto 3rem;
    font-size: 1.125rem;
    color: var(--color-text-light);
  }

  .map-placeholder {
    background: white;
    border-radius: var(--radius);
    padding: 4rem 2rem;
    text-align: center;
    box-shadow: var(--shadow);
    max-width: 800px;
    margin: 0 auto;
  }

  .map-placeholder svg {
    color: var(--color-accent);
    margin-bottom: 1rem;
  }

  .map-placeholder h3 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: var(--color-text);
  }

  .map-placeholder p {
    color: var(--color-text-light);
    margin-bottom: 1.5rem;
  }

  .cta-section {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: white;
    padding: 4rem 0;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100' height='100' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
    opacity: 0.4;
    pointer-events: none;
  }

  .cta-section .container {
    position: relative;
    z-index: 1;
  }

  .cta-section h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    margin-bottom: 1rem;
  }

  .cta-section p {
    font-size: 1.125rem;
    max-width: 60ch;
    margin: 0 auto 2rem;
    opacity: 0.95;
  }

  .cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
  }

  @media (max-width: 768px) {
    .areas-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .cta-buttons {
      flex-direction: column;
      align-items: center;
    }

    .cta-buttons .btn {
      width: 100%;
      max-width: 320px;
    }
  }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero Section -->
<section class="areas-hero">
  <div class="container">
    <div class="eyebrow">Where We Serve</div>
    <h1>Professional Cleaning Services in Sacramento & Surrounding Communities</h1>
    <p class="hero-answer">
      Express Pro Cleaning Services proudly serves Sacramento and the greater metropolitan area,
      bringing 35 years of professional cleaning experience to homes and businesses across eight
      communities. Family-owned and locally operated, we understand the unique needs of each
      neighborhood we serve.
    </p>
  </div>
</section>

<!-- Service Areas Grid -->
<section class="areas-grid container" id="areas">

  <!-- Sacramento -->
  <article class="area-card" id="<?php echo getAreaSlug('Sacramento'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Sacramento
    </h3>
    <p>
      As our home base since 1991, Sacramento is where Express Pro Cleaning Services was founded
      and where we maintain our strongest presence. We serve all neighborhoods throughout the city,
      from Midtown to East Sacramento, Land Park to Natomas.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Historic homes in Curtis Park and Land Park districts
      requiring specialized cleaning for hardwood floors and period details, downtown condos and lofts
      with modern finishes, suburban family homes in North Sacramento and Pocket areas. We understand
      Sacramento's unique climate challenges — from Valley heat dust accumulation to seasonal pollen
      from the Sacramento River corridor.
    </div>
  </article>

  <!-- North Highlands -->
  <article class="area-card" id="<?php echo getAreaSlug('North Highlands'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      North Highlands
    </h3>
    <p>
      Located just northeast of Sacramento, North Highlands is a diverse community where we've served
      residential and commercial clients for decades. Our team knows the area's mix of single-family
      homes, apartment complexes, and small business districts.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Ranch-style homes built in the 1960s–1980s throughout
      neighborhoods like Foothill Farms and Arden-Arcade areas, commercial cleaning for strip malls
      and offices along Watt Avenue and Madison Avenue corridors. The area's mature tree canopy means
      we regularly handle window and gutter cleaning to manage oak and sycamore debris.
    </div>
  </article>

  <!-- Rio Linda -->
  <article class="area-card" id="<?php echo getAreaSlug('Rio Linda'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Rio Linda
    </h3>
    <p>
      Rio Linda's semi-rural character and close-knit community make it a unique service area. We work
      with homeowners on larger lots, horse properties, and agricultural parcels that require different
      cleaning approaches than urban areas.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Properties with barns, workshops, and outbuildings
      requiring post-construction or deep cleaning, homes on acreage with extended outdoor living spaces
      and covered patios needing pressure washing, dust and dirt management from unpaved roads and rural
      conditions common throughout Rio Linda's residential zones north of Elkhorn Boulevard.
    </div>
  </article>

  <!-- Citrus Heights -->
  <article class="area-card" id="<?php echo getAreaSlug('Citrus Heights'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Citrus Heights
    </h3>
    <p>
      Citrus Heights is one of our most active service areas, with a strong mix of residential
      neighborhoods and commercial properties. We've cleaned homes and businesses here since the city's
      incorporation in 1997 and continue to serve hundreds of clients annually.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Tract homes in established neighborhoods like
      Woodside, Mariposa Gardens, and Rusch Park areas, commercial offices and retail spaces in the
      Sunrise Mall district and along Greenback Lane, move-in/move-out cleaning for the area's active
      real estate market. Citrus Heights' 1970s–1990s housing stock often requires carpet deep cleaning
      and blind restoration services.
    </div>
  </article>

  <!-- Carmichael -->
  <article class="area-card" id="<?php echo getAreaSlug('Carmichael'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Carmichael
    </h3>
    <p>
      Carmichael's blend of suburban tranquility and proximity to Sacramento makes it a popular service
      area. We clean homes ranging from modest post-war bungalows to spacious properties along the
      American River Parkway.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Homes with river views requiring specialized window
      cleaning to maintain vistas across the American River Parkway, La Riviera and Fair Oaks Boulevard
      corridor properties with mature landscaping creating unique exterior cleaning needs, Carmichael
      Park area residences with original mid-century design elements requiring careful handling of
      period fixtures and flooring.
    </div>
  </article>

  <!-- Elk Grove -->
  <article class="area-card" id="<?php echo getAreaSlug('Elk Grove'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Elk Grove
    </h3>
    <p>
      Elk Grove is Sacramento County's second-largest city and one of California's fastest-growing
      communities. We serve both established neighborhoods and new developments throughout this
      dynamic city south of Sacramento.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> New construction cleaning for homes in Laguna Ridge,
      Southeast Policy Area, and other master-planned communities, established family homes in Laguna
      West and Elk Grove proper, move-in cleaning for the area's highly active real estate market.
      The prevalence of two-story homes and open-concept floor plans requires specialized equipment
      and techniques we've refined over years of service here.
    </div>
  </article>

  <!-- Roseville -->
  <article class="area-card" id="<?php echo getAreaSlug('Roseville'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Roseville
    </h3>
    <p>
      Roseville's thriving economy and growing residential base make it a key service area. We clean
      everything from historic Old Town properties to brand-new homes in West Roseville's master-planned
      communities.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Office cleaning for businesses in the Galleria area
      and Highway 65 commercial corridor, luxury homes in Woodcreek, West Park, and Fiddyment Ranch
      requiring premium deep cleaning services, post-construction cleaning for Roseville's continuous
      new development. The area's granite countertops and tile work common in newer homes require our
      specialized stone and grout cleaning techniques.
    </div>
  </article>

  <!-- Folsom -->
  <article class="area-card" id="<?php echo getAreaSlug('Folsom'); ?>">
    <h3>
      <?php echo icon('map-pin', 24); ?>
      Folsom
    </h3>
    <p>
      Folsom's mix of historic charm and modern growth creates diverse cleaning needs we're equipped
      to handle. From Historic Folsom's Victorian-era buildings to Folsom Ranch's contemporary homes,
      we serve the entire city.
    </p>
    <div class="local-details">
      <strong>Local expertise includes:</strong> Historic preservation-mindful cleaning for Sutter
      Street properties and older Folsom homes, lake-view properties near Folsom Lake requiring
      specialized window cleaning for expansive glass installations, newer communities like Folsom
      Ranch and Folsom Hills with high-end finishes requiring expert care. Folsom's elevation and
      proximity to the Sierra foothills means more dust and pollen management than valley floor
      locations.
    </div>
  </article>

</section>

<!-- Map Section -->
<section class="map-section">
  <div class="container">
    <h2>Serving Greater Sacramento</h2>
    <p class="section-intro">
      Our service area spans roughly 80 miles around Sacramento, covering these eight communities and surrounding
      areas. If you're located near any of these cities, we can serve you.
    </p>
    <div class="map-placeholder">
      <?php echo icon('map', 48); ?>
      <h3>Interactive Map Coming Soon</h3>
      <p>
        We're currently serving all locations listed above. Call us at
        <a href="tel:<?php echo $phoneRaw; ?>" style="color: var(--color-accent); font-weight: 600;"><?php echo formatPhone($phone); ?></a>
        to confirm coverage for your specific address.
      </p>
      <a href="<?php echo $directionsUrl; ?>" class="btn btn-secondary" target="_blank" rel="noopener">
        <?php echo icon('navigation', 20); ?>
        <span>Get Directions to Our Location</span>
      </a>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Get Started?</h2>
    <p>
      No matter which community you call home, Express Pro Cleaning Services brings the same
      commitment to quality, reliability, and customer satisfaction. Let our family serve yours.
    </p>
    <div class="cta-buttons">
      <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-accent">
        <?php echo icon('phone', 20); ?>
        <span>Call <?php echo formatPhone($phone); ?></span>
      </a>
      <a href="#estimate" class="btn btn-secondary" data-open-estimate>
        <?php echo icon('clipboard-list', 20); ?>
        <span>Get Free Estimate</span>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
