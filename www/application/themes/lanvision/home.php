<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main class="main-content home-page" id="main-content">
  <?php
  if($c->getAttribute('main_image')) {
    $main_image = $c->getAttribute('main_image');
    $main_image = $main_image->getURL(); 
    $mainImgTag = "style=\"background-image: url('" . $main_image . "'; ?>');\"";
  } else {
    $main_image = '';
  }
  ?>
  <div class="home-hero header-image" <?php echo $mainImgTag; ?>>
    <div class="home-hero-title hero-title">
      <?php
      $a = new Area('Page Header Title');
      $a->setAreaGridMaximumColumns(12);
      $a->display($c);
      ?>
    </div>
  </div>

  <?php
  $a = new Area('Main');
  $a->enableGridContainer();
  $a->display($c);
  ?>
</main>

<?php
// Hakukoneoptimointiin liittyen structured data määrityksiä
$site = Site::getSite();
$siteUrl = BASE_URL;

$siteOrganization = '';
if($site->getAttribute('site_organization')) { $siteOrganization = $site->getAttribute('site_organization'); }

$siteLogo = '';
if ($site->getAttribute('site_logo')) { $siteLogo = $site->getAttribute('site_logo')->getURL(); }

$schema = [
  "@context" => "https://schema.org/",
  "@graph" => [
    [
      "@type" => "WebSite",
      "@id" => $siteUrl . "/#website",
      "name" => Config::get('concrete.site'),
      "url" => $siteUrl
    ],
    [
      "@type" => "Organization",
      "@id" => $siteUrl . "/#organization",
      "name" => $siteOrganization,
      "url" => $siteUrl,
      "logo" => [
        "@type" => "ImageObject",
        "url" => $siteLogo,
      ]
    ]
  ]
]
?>

<script type="application/ld+json">
  <?php echo json_encode($schema); ?>
</script>

<?php  $this->inc('elements/footer.php'); ?>
