<?php
defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\Area\ContainerArea;

?>
<div class="container custom-container two-column-container">
    <div class="row">
        <div class="col-12 col-md-6 two-column-left">
            <?php
            $area = new ContainerArea($container, 'Vasen sarake');
            $a->setAreaGridMaximumColumns(12);
            $area->display($c);
            ?>
        </div>
        <div class="col-12 col-md-6 two-column-right">
            <?php
            $area = new ContainerArea($container, 'Oikea sarake');
            $a->setAreaGridMaximumColumns(12);
            $area->display($c);
            ?>
        </div>
    </div>
</div>