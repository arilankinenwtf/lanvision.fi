<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
<main class="main-content" id="main-content">
    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    // tai $a->setAreaGridMaximumColumns(12);
    $a->display($c);
    ?>
</main>
<?php  $this->inc('elements/footer.php'); ?>
