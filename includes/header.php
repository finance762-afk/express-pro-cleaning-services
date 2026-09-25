<body>
  <!-- Skip to content (accessibility) -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <!-- Header / Navbar -->
  <header class="site-header" data-header>
    <nav class="navbar" role="navigation" aria-label="Main navigation">
      <div class="navbar-inner container">
        <!-- Logo -->
        <a href="/" class="site-logo" aria-label="<?php echo e($siteName); ?> Home">
          <img src="/assets/images/logo.png" alt="<?php echo e($siteName); ?>" width="358" height="110" class="logo--wordmark">
        </a>

        <!-- Desktop Navigation -->
        <ul class="navbar-links">
          <li><a href="/" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a></li>

          <li class="has-dropdown">
            <a href="/services/" <?php if (isActivePage('services')) echo 'aria-current="page"'; ?>>
              Services
              <span class="dropdown-arrow" aria-hidden="true">▾</span>
            </a>
            <ul class="dropdown" role="menu" style="display:none">
              <?php foreach ($services as $navSvc): ?>
              <li role="menuitem">
                <a href="/<?php echo getServiceSlug($navSvc['slug']); ?>/">
                  <?php echo e($navSvc['name']); ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </li>

          <li><a href="/about/" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a></li>
          <li><a href="/contact/" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a></li>
        </ul>

        <!-- Desktop CTA -->
        <div class="navbar-cta">
          <a href="tel:<?php echo $phoneRaw; ?>" class="btn-phone">
            <?php echo icon('phone', 18); ?>
            <span><?php echo formatPhone($phone); ?></span>
          </a>
          <a href="#estimate" class="btn btn-primary" data-open-estimate>
            Free Estimate
          </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="hamburger" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
        </button>
      </div>
    </nav>
  </header>

  <!-- Mobile Menu (outside header to avoid backdrop-filter containing block issue) -->
  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-menu-inner">
      <ul class="mobile-menu-links">
        <li><a href="/" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a></li>

        <?php foreach ($services as $navSvc): ?>
        <li>
          <a href="/<?php echo getServiceSlug($navSvc['slug']); ?>/" <?php if (isActivePage($navSvc['slug'])) echo 'aria-current="page"'; ?>>
            <?php echo e($navSvc['name']); ?>
          </a>
        </li>
        <?php endforeach; ?>

        <li><a href="/about/" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a></li>
        <li><a href="/contact/" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a></li>
      </ul>

      <div class="mobile-menu-cta">
        <a href="tel:<?php echo $phoneRaw; ?>" class="btn btn-secondary btn-block">
          <?php echo icon('phone', 20); ?>
          <span>Call Now</span>
        </a>
        <a href="#estimate" class="btn btn-primary btn-block" data-open-estimate>
          Free Estimate
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main id="main-content">
