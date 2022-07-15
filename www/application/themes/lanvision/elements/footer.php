<?php use Concrete\Core\Validation\CSRF\Token;

defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 footer-first py-5">
        <?php
        $a = new GlobalArea('Footer First');
        $a->display();
        ?>
      </div>
      <div class="col-md-4 footer-second">
        <?php
        $a = new GlobalArea('Footer Second');
        $a->display();
        ?>
      </div>
      <div class="col-md-4 footer-third py-5">
        <?php
        $a = new GlobalArea('Footer Third');
        $a->display();
        ?>
      </div>
    </div>
  </div>
</div>

<?php $this->inc('elements/footer_bottom.php');?>
