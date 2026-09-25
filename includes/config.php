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
$tagline  = 'Family-owned cleaning in Sacramento since 1991';  // no tagline in intake — derived from USPs
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
$yearEstablished = 1991;
$yearsInBusiness = 35;
$ownerName       = 'Anna Piontkevych';
$usps = [
    'Family owned since 1991',
    'Formerly Express Mini Blind & Window Cleaning',
    'Service in English, Ukrainian and Russian',
];

/* ---------------------------------------------------------------------------
 * SEO
 * ------------------------------------------------------------------------- */
$primaryKeyword     = 'house cleaning Sacramento';
$secondaryKeywords  = [
    'deep cleaning Sacramento CA',
    'move out cleaning Sacramento',
    'office cleaning Sacramento',
    'window cleaning Sacramento',
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
        'name'        => 'Cleaning Services',
        'slug'        => 'cleaning-services',
        'description' => 'Residential and specialty cleaning across Sacramento — house cleaning, deep cleans, move-in/move-out turnovers, recurring maintenance, plus carpet, window, blind and pressure washing.',
        'keywords'    => ['house cleaning Sacramento', 'deep cleaning Sacramento CA', 'move out cleaning Sacramento'],
        'services'    => [
            'House Cleaning',
            'Deep Cleaning',
            'Move-In / Move-Out Cleaning',
            'Recurring House Cleaning',
            'Post-Construction Cleaning',
            'Carpet Cleaning',
            'Window Cleaning',
            'Blind Cleaning',
            'Pressure Washing',
        ],
    ],
    [
        'name'        => 'Seasonal Services',
        'slug'        => 'seasonal-services',
        'description' => 'Seasonal and commercial add-ons for Sacramento homes and businesses, including office cleaning and professional Christmas light installation.',
        'keywords'    => ['office cleaning Sacramento', 'christmas light installation Sacramento CA'],
        'services'    => [
            'Office Cleaning',
            'Christmas Light Installation',
        ],
    ],
    [
        'name'        => 'Gutter Cleaning',
        'slug'        => 'gutter-cleaning',
        'description' => 'Professional gutter cleaning for Sacramento homes — clearing debris and blockages to protect roofs, fascia and foundations before the rainy season.',
        'keywords'    => ['gutter cleaning Sacramento CA'],
        'services'    => [
            'Gutter Cleaning',
        ],
        'solo'        => true,
    ],
];

// Full flat service list (all 12 offerings) for schema / entity copy.
$allServices = [
    'House Cleaning',
    'Deep Cleaning',
    'Move-In / Move-Out Cleaning',
    'Recurring House Cleaning',
    'Office Cleaning',
    'Post-Construction Cleaning',
    'Carpet Cleaning',
    'Window Cleaning',
    'Blind Cleaning',
    'Pressure Washing',
    'Gutter Cleaning',
    'Christmas Light Installation',
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
$cssVersion = '1';

/* ---------------------------------------------------------------------------
 * LEAD ATTRIBUTION (v6.3) — sets the first-touch cookie and provides
 * p1_attribution_fields(). Must load before any output. Do not edit attribution.php.
 * ------------------------------------------------------------------------- */
require_once __DIR__ . '/attribution.php';
