<?php include('data.inc.php'); ?>
<div class="panel panel-info">
    <div class="panel-heading">Continents</div>
    <ul class="list-group">
        <?php
        foreach ($continents as $continent) {
            echo '<li class="list-group-item"><a href="#">' . $continent . '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- end continents panel -->

<div class="panel panel-info">
    <div class="panel-heading">Popular</div>
    <ul class="list-group">
        <?php
        foreach ($countries as $country => $iso) {
            echo generateLink('photos.php?iso=' . $country, $iso, 'list-group-item');
        }
        ?>
    </ul>
</div>