  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-top">
      <div class="container">
        <div class="footer-grid">
          <!-- Column 1: About -->
          <div class="footer-col">
            <img src="/assets/images/logo.png" alt="<?php echo e($siteName); ?>" class="footer-logo" width="240" height="74">
            <p class="footer-tagline"><?php echo e($tagline); ?></p>
            <p class="footer-description">
              Professional cleaning services for Sacramento homes and businesses.
              Trusted by families and companies since <?php echo $yearEstablished; ?>.
            </p>
            <div class="footer-badges">
              <div class="badge">
                <?php echo icon('badge-check', 20); ?>
                <span>Family Owned</span>
              </div>
              <div class="badge">
                <?php echo icon('calendar-check', 20); ?>
                <span><?php echo $yearsInBusiness; ?>+ Years</span>
              </div>
              <div class="badge">
                <?php echo icon('check-circle', 20); ?>
                <span>Free Estimates</span>
              </div>
            </div>
          </div>

          <!-- Column 2: Services -->
          <div class="footer-col">
            <h3 class="footer-heading">Services</h3>
            <ul class="footer-links">
              <?php
              $footSvcCount = 0;
              foreach ($services as $footSvc):
                if ($footSvcCount >= 8) break; // Show max 8 in first column
                $footSvcCount++;
              ?>
              <li>
                <a href="/<?php echo getServiceSlug($footSvc['slug']); ?>/">
                  <?php echo e($footSvc['name']); ?>
                </a>
              </li>
              <?php endforeach; ?>
              <?php if (count($services) > 8): ?>
              <li><a href="/services/" class="view-all">View All Services →</a></li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- Column 3: Service Areas -->
          <div class="footer-col">
            <h3 class="footer-heading">Service Areas</h3>
            <ul class="footer-links">
              <?php
              $footAreaCount = 0;
              foreach ($serviceAreas as $footArea):
                if ($footAreaCount >= 8) break;
                $footAreaCount++;
              ?>
              <li>
                <a href="/service-areas/#<?php echo getAreaSlug($footArea); ?>">
                  <?php echo e($footArea); ?>
                </a>
              </li>
              <?php endforeach; ?>
              <?php if (count($serviceAreas) > 8): ?>
              <li><a href="/service-areas/" class="view-all">View All Areas →</a></li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- Column 4: Contact -->
          <div class="footer-col">
            <h3 class="footer-heading">Contact Us</h3>
            <ul class="footer-contact">
              <li>
                <?php echo icon('phone', 20); ?>
                <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>
              </li>
              <li>
                <?php echo icon('mail', 20); ?>
                <a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a>
              </li>
              <li>
                <?php echo icon('map-pin', 20); ?>
                <span><?php echo e($address['city']); ?>, <?php echo e($address['state']); ?> <?php echo e($address['zip']); ?></span>
              </li>
              <li>
                <?php echo icon('clock', 20); ?>
                <span><?php echo e($businessHours); ?></span>
              </li>
            </ul>
            <a href="#estimate" class="btn btn-accent btn-block" data-open-estimate>
              Get Free Estimate
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- AEO Entity Block -->
    <div class="footer-entity" itemscope itemtype="https://schema.org/LocalBusiness">
      <div class="container">
        <meta itemprop="name" content="<?php echo e($siteName); ?>">
        <meta itemprop="url" content="<?php echo $siteUrl; ?>">
        <meta itemprop="telephone" content="<?php echo $phone; ?>">
        <p>
          <strong><?php echo e($siteName); ?></strong> is a family-owned cleaning company serving
          <?php echo e($address['city']); ?>, California and surrounding communities since <?php echo $yearEstablished; ?>.
          We specialize in <?php echo strtolower(implode(', ', array_slice($allServices, 0, 5))); ?> and more.
          Our team delivers reliable, eco-conscious cleaning solutions for homes and businesses throughout
          the Sacramento area. Call <a href="tel:<?php echo $phoneRaw; ?>"><?php echo formatPhone($phone); ?></a>
          for a free estimate today.
        </p>
      </div>
    </div>

    <!-- Footer Legal Row (REQUIRED v6.1) -->
    <div class="footer-legal-row">
      <div class="container">
        <nav aria-label="Legal">
          <a href="/privacy-policy/">Privacy Policy</a>
          <span class="divider" aria-hidden="true">|</span>
          <a href="/terms/">Terms of Service</a>
          <span class="divider" aria-hidden="true">|</span>
          <a href="/cookie-policy/">Cookie Policy</a>
          <span class="divider" aria-hidden="true">|</span>
          <a href="/accessibility/">Accessibility</a>
          <span class="divider" aria-hidden="true">|</span>
          <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
          <span class="divider" aria-hidden="true">|</span>
          <a href="/sitemap.xml">Sitemap</a>
        </nav>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          &copy; <?php echo date('Y'); ?> <?php echo e($siteName); ?>. All rights reserved.
        </p>
        <p class="credit">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design & Hosting by Page One Insights, LLC</a>
        </p>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="Back to top" style="display:none;">
      <?php echo icon('arrow-up', 24); ?>
    </button>
  </footer>

  <!-- Partner Badge (v6.3) -->
  <?php include __DIR__ . '/partner-badge.php'; ?>

  <!-- Mobile Sticky CTA Bar -->
  <div class="mobile-cta-bar">
    <a href="tel:<?php echo $phoneRaw; ?>" class="mobile-cta-btn">
      <?php echo icon('phone', 20); ?>
      <span>Call Now</span>
    </a>
    <?php if ($acceptsSms): ?>
    <a href="sms:<?php echo $phoneRaw; ?>" class="mobile-cta-btn">
      <?php echo icon('message-circle', 20); ?>
      <span>Text Us</span>
    </a>
    <?php endif; ?>
    <a href="#estimate" class="mobile-cta-btn" data-open-estimate>
      <?php echo icon('file-text', 20); ?>
      <span>Estimate</span>
    </a>
  </div>

  <!-- Scripts (all deferred per v6.3) -->
  <script src="/assets/js/main.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>

  <!-- Back to Top functionality (inline) -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const backToTop = document.querySelector('.back-to-top');
      if (!backToTop) return;

      window.addEventListener('scroll', function() {
        if (window.scrollY > 400) {
          backToTop.style.display = 'flex';
        } else {
          backToTop.style.display = 'none';
        }
      });

      backToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  </script>

</body>
</html>
