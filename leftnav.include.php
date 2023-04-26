
<?php
// Popular regions in Virginia
$regions = array(
    'Blue Ridge Highlands',
    'Central Virginia',
    'Chesapeake Bay',
    'Coastal Virginia - Hampton Roads',
    'Shenandoah Valley',
    'Southern Virginia',
);

// Popular counties in Virginia
$counties = array(
    'Arlington County',
    'Fairfax County',
    'Loudoun County',
    'Prince William County',
    'City of Alexandria',
    'City of Fairfax',
    'City of Falls Church',
    'City of Manassas',
    'City of Manassas Park',
);
?>
<div class="panel panel-info">
    <div class="panel-heading">Popular Regions</div>
    <ul class="list-group">
        <?php
        foreach ($regions as $region) {
            echo '<li class="list-group-item"><a href="#">' . $region . '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- end popular regions panel -->

<div class="panel panel-info">
    <div class="panel-heading">Popular Counties</div>
    <ul class="list-group">
        <?php
        foreach ($counties as $county) {
            echo '<li class="list-group-item"><a href="#">' . $county . '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- end popular counties panel -->