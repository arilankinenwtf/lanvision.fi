<?php use Concrete\Core\Validation\CSRF\Token;

defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 footer-first">
        <?php
        $a = new GlobalArea('Footer First');
        $a->display();
        ?>
      </div>
      <div class="col-md-6 footer-second">
        <?php
        $a = new GlobalArea('Footer Second');
        $a->display();
        ?>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-md-6 footer-image">
        <?php
        $a = new GlobalArea('Footer Image');
        $a->display();
        ?>
      </div>
    </div> -->
  </div>
</div>

<?php $this->inc('elements/footer_bottom.php');?>
