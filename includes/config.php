<?php
/**
 * includes/config.php — single source of truth for site-wide variables.
 * Values sourced from build-plan.json. Included at the top of every page
 * (before any output) via: include $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
 *
 * Pages set their own $canonicalUrl, $pageTitle, $metaDescription, $pageType,
 * (and $serviceSlug / $citySlug where relevant) BEFORE including head.php.
 */

/* ---------------------------------------------------------------------------
 * IDENTITY
 * ------------------------------------------------------------------------- */
$slug     = 'express-pro-cleaning-services';   // MUST equal this build's directory name
$siteName = 'Express Pro Cleaning Services';
$tagline  = 'Family-owned cleaning services in Sacramento and surrounding areas';  // client-supplied 2026-10-10
$industry = 'janitorial';

/* ---------------------------------------------------------------------------
 * DOMAIN / URLS
 * build-plan.json has no `production_domain` field, so default to the preview host.
 * ------------------------------------------------------------------------- */
$domain  = 'express-pro-cleaning-services.pageone.cloud';
$siteUrl = 'https://' . $domain;   // always a valid absolute URL

/* ---------------------------------------------------------------------------
 * CONTACT
 * ------------------------------------------------------------------------- */
$phone          = '(916) 983-9274';
$phoneSecondary = '';
$phoneRaw       = '+19169839274';   // tel:/sms: E.164 form
$email          = 'expressprocleanings@gmail.com';

$address = [
    'street' => '205 Sumatra Dr',
    'city'   => 'Sacramento',
    'state'  => 'CA',
    'zip'    => '95838',
];
$addressPublic = false;   // client requested address not be publicly displayed

$businessHours = 'Mon–Fri 7:00 AM–8:00 PM, Sat 7:00 AM–6:00 PM, Sun closed';

/* ---------------------------------------------------------------------------
 * COMPANY FACTS (proof strip / about / schema)
 * ------------------------------------------------------------------------- */
$yearEstablished  = 1989;   // founded 1989 as Express Mini Blind & Window Cleaning (client, 2026-10-10)
$familyOwnedSince = 1998;   // taken over by a family member in 1998; family-owned ever since
$yearsInBusiness  = 37;
$ownerName       = 'Anna Piontkevych';
$usps = [
    'Family-owned since 1998',
    'Home of the original Express Mini Blind & Window Cleaning',
    'Service in English, Ukrainian and Russian',
];

/* ---------------------------------------------------------------------------
 * SEO
 * ------------------------------------------------------------------------- */
$primaryKeyword     = 'house cleaning Sacramento';
$secondaryKeywords  = [
    'deep cleaning Sacramento CA',
    'move out cleaning Sacramento',
    'window cleaning Sacramento',
    'pressure washing Sacramento',
    'gutter cleaning Sacramento CA',
];
$targetRadius = 30; // miles

/* ---------------------------------------------------------------------------
 * SERVICES
 * Standard tier: services are grouped into pages (build-plan.json → service_grouping).
 * Each entry is a service PAGE with slug, name, description, keywords, and the
 * sub-services it covers. Nav, services grid, and schema read from this array.
 * ------------------------------------------------------------------------- */
$services = [
    [
        'name'        => 'Window Cleaning Services',
        'slug'        => 'window-cleaning',
        'short'       => 'Window Cleaning',
        'description' => 'Window, blind and screen cleaning for Sacramento homes and businesses, plus screen and blind repairs — the work Express Pro has done since it opened as Express Mini Blind & Window Cleaning.',
        'keywords'    => ['window cleaning Sacramento', 'blind cleaning Sacramento CA'],
        'services'    => [
            'Window Cleaning',
            'Blind Cleaning',
            'Screen Cleaning',
            'Screen & Blind Repairs',
        ],
    ],
    [
        'name'        => 'House Cleaning Services',
        'slug'        => 'house-cleaning',
        'short'       => 'House Cleaning',
        'description' => 'Deep cleans, move-in and move-out turnovers, post-construction cleanup and recurring maintenance cleaning for Sacramento homes.',
        'keywords'    => ['house cleaning Sacramento', 'deep cleaning Sacramento CA', 'move out cleaning Sacramento'],
        'services'    => [
            'Deep Cleaning',
            'Move-In / Move-Out Cleaning',
            'Post-Construction Cleaning',
            'Recurring Maintenance Cleaning',
        ],
    ],
    [
        'name'        => 'Gutter and Roof Cleaning',
        'slug'        => 'gutter-roof-cleaning',
        'short'       => 'Gutter & Roof Cleaning',
        'description' => 'Gutter cleaning, solar panel cleaning and roof debris removal for Sacramento homes — keeping water moving, panels producing and rooflines clear.',
        'keywords'    => ['gutter cleaning Sacramento CA', 'solar panel cleaning Sacramento'],
        'services'    => [
            'Gutter Cleaning',
            'Solar Panel Cleaning',
            'Roof Debris Cleaning',
        ],
    ],
    [
        'name'        => 'Pressure / Soft Washing',
        'slug'        => 'pressure-washing',
        'short'       => 'Pressure Washing',
        'description' => 'Pressure washing and low-pressure soft washing for houses, roofs, driveways, patios, porches, decks and fences across Sacramento.',
        'keywords'    => ['pressure washing Sacramento', 'soft washing Sacramento CA'],
        'services'    => [
            'House Washing',
            'Roof Soft Washing',
            'Driveway & Walkway Washing',
            'Patio, Porch & Deck Washing',
            'Fence Washing',
        ],
    ],
    [
        'name'        => 'Seasonal Services',
        'slug'        => 'seasonal-services',
        'short'       => 'Seasonal Services',
        'description' => 'Christmas light installation and takedown for Sacramento homes and businesses — hung with proper clips, taken down after the holidays.',
        'keywords'    => ['christmas light installation Sacramento CA'],
        'services'    => [
            'Christmas Light Installation',
            'Christmas Light Takedown',
        ],
    ],
];

// Full flat service list for schema / entity copy (client's five categories, 2026-10-10).
$allServices = [
    'Window Cleaning',
    'Blind Cleaning',
    'Screen Cleaning',
    'Screen & Blind Repairs',
    'Deep Cleaning',
    'Move-In / Move-Out Cleaning',
    'Post-Construction Cleaning',
    'Recurring Maintenance Cleaning',
    'Gutter Cleaning',
    'Solar Panel Cleaning',
    'Roof Debris Cleaning',
    'Pressure Washing',
    'Soft Washing',
    'Christmas Light Installation & Takedown',
];

/* ---------------------------------------------------------------------------
 * SERVICE AREAS (Standard tier: single combined service-area page)
 * ------------------------------------------------------------------------- */
$serviceAreas = [
    'Sacramento',
    'North Highlands',
    'Rio Linda',
    'Citrus Heights',
    'Carmichael',
    'Elk Grove',
    'Roseville',
    'Folsom',
];

/* ---------------------------------------------------------------------------
 * SOCIAL / INTEGRATIONS
 * ------------------------------------------------------------------------- */
$socialLinks = [];  // none provided in intake

$gbpPlaceId       = 'ChIJMSEujaMo6QoRWnRzoKtdDIo';
$gbpProfileUrl    = 'https://www.google.com/maps/place/?q=place_id:ChIJMSEujaMo6QoRWnRzoKtdDIo';
$gbpMapEmbed      = null;  // not supplied in intake
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJMSEujaMo6QoRWnRzoKtdDIo';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJMSEujaMo6QoRWnRzoKtdDIo';
$acceptsSms       = null;  // unknown — treat as declined until confirmed

/* ---------------------------------------------------------------------------
 * ANALYTICS
 * ------------------------------------------------------------------------- */
$googleAnalyticsId = 'G-XXXXXXXXXX';  // placeholder — replace at launch

/* ---------------------------------------------------------------------------
 * BRAND COLORS
 * Provisional cleaning-industry palette — refined in Phase 2 from logo analysis
 * (build-plan.json → design.colors.extracted_from_logo = true, no hex yet).
 * head.php injects these as CSS custom properties overriding framework defaults.
 * ------------------------------------------------------------------------- */
$colors = [
    'primary'      => '#0f6fb8',   // professional blue
    'primary_dark' => '#0b527f',
    'primary_rgb'  => '15, 111, 184',
    'secondary'    => '#14a39a',   // fresh teal
    'secondary_rgb'=> '20, 163, 154',
    'accent'       => '#f4a71d',   // warm amber CTA
    'accent_rgb'   => '244, 167, 29',
];

/* ---------------------------------------------------------------------------
 * FORMS
 * ------------------------------------------------------------------------- */
$formAction = 'https://db.pageone.cloud/functions/v1/leads/express-pro-cleaning-services';

/* ---------------------------------------------------------------------------
 * ASSET CACHE-BUST — single source of truth. Bump on every framework.css change.
 * Pages must NEVER define their own $cssVersion.
 * ------------------------------------------------------------------------- */
$cssVersion = '2';

/* ---------------------------------------------------------------------------
 * LEAD ATTRIBUTION (v6.3) — sets the first-touch cookie and provides
 * p1_attribution_fields(). Must load before any output. Do not edit attribution.php.
 * ------------------------------------------------------------------------- */
require_once __DIR__ . '/attribution.php';

/* ---------------------------------------------------------------------------
 * HELPER FUNCTIONS
 * ------------------------------------------------------------------------- */
require_once __DIR__ . '/functions.php';
