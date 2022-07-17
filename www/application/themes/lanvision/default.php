<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
<main class="main-content" id="main-content">
    <div class="stellarium">
        <div id="particles-js"></div>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    </div>

    <!-- <div class="earth" >
        <img src="/application/files/3316/5807/7346/earth.jpg" alt="">
    </div> -->

    <div class="planets">
        <div class="venus"></div>
        <div class="earth"></div>
        <div class="jupiter"></div>
        <div class="saturnus"></div>
    </div>

    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    // tai $a->setAreaGridMaximumColumns(12);
    $a->display($c);
    ?>
    
</main>
<?php  $this->inc('elements/footer.php'); ?>
