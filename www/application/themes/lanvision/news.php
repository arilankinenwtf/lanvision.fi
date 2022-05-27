<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main class="news-page" id="main-content">
  <?php
  $main_image = '';
  if($c->getAttribute('main_image')) {
    $main_image = $c->getAttribute('main_image');
    $main_image = $main_image->getURL(); 
  }

  $title = '';
  if($c->getCollectionName()) { $title = $c->getCollectionName(); }

  $description = '';
  if($c->getCollectionDescription()) { $description = $c->getCollectionDescription(); }

  $date = '';
  if($c->getCollectionDatePublic()) { $date = $c->getCollectionDatePublicObject()->format('j.n.Y'); }
  ?>
  <div class="news-wrapper">
    <div class="news-content container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-breadcrumbs">
            <?php
            $a = new Area('Breadcrumbs');
            $a->display($c);
            ?>
          </div>
          <div class="news-date">
            <span class="icon icon-small icon-calendar"></span><?php echo $date; ?>
          </div>
          <div class="news-title">
            <h1><?php echo $title; ?></h1>
          </div>
          <span class="ingress"><?php echo $description; ?></span>
          <?php
          $a = new Area('Main');
          $a->enableGridContainer();
          $a->display($c);
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="news-read-more-list mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php
          $a = new GlobalArea('News Read More');
          $a->display($c);
          ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
$site = Site::getSite();
$siteLogo = '';
if($site->getAttribute('site_logo')) {
  $siteLogo = $site->getAttribute('site_logo')->getURL();
}
$schemaDate = $c->getCollectionDatePublicObject()->format('Y-m-d');
$pageUrl = $c->getCollectionLink();

$schema = [
  "@context" => "https://schema.org",
  "@type" => "Article",
  "mainEntityOfPage" => [
    "@type" => "WebPage",
    "@id" => $pageUrl,
  ],
  "headline" => $title,
  "image" => [
    "@type" => "ImageObject",
    "url" => $main_image,
  ],
  //"author" => [
  //  "@type" => "Person",
  //  "name" => $userName,
  //],
  "publisher" => [
    "@type" => "Organization",
    "name" => Config::get('concrete.site'),
    "logo" => [
      "@type" => "ImageObject",
      "url" => $siteLogo,
    ]
  ],
  "datePublished" => $schemaDate
]
?>

<script type="application/ld+json">
  <?php echo json_encode($schema); ?>
</script>

<?php  $this->inc('elements/footer.php'); ?>
