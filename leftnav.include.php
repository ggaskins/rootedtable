<?php include('data.inc.php'); ?>
<div class="panel panel-info">
    <div class="panel-heading">Continents</div>
    <ul class="list-group">
        <?php
        foreach ($regions as $region) {
            echo '<li class="list-group-item"><a href="#">' . $region . '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- end continents panel -->

<div class="panel panel-info">
    <div class="panel-heading">Popular</div>
    <ul class="list-group">
        <?php
        foreach ($counties as $county => $iso) {
            echo generateLink('photos.php?iso=' . $county, $iso, 'list-group-item');
        }
        ?>
    </ul>
</div>