<?php
$popularDestination_cursor = $m->popularDestination(["_id" => ['$ne' => null]], 2);
$greatcruiseleaving_cursor = $m->greatcruiseleaving(["_id" => ['$ne' => null]], 2);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading2">Popular Cruise Destinations</div>
    </div>
    <!-- Slider -->
    <div class="carousel-container">
        <div id="new-slider" class="owl-carousel owl-theme">
            <?php foreach ($popularDestination_cursor as $popularCruise): ?>
                <div class="slider-wrapper">
                    <div class="imgCard ">
                        <div class="imgtext">
                            <?php echo $popularCruise["title"]; ?>
                        </div>
                        <img src="<?php echo $popularCruise["img"]; ?>" alt="Popular Cruise Image1">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- deaprture Port -->
<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading3">Departure Port with Great Cruises Leaving From</div>
    </div>
    <!-- Slider -->
    <div class="carousel-container">
        <div id="new-slider2" class="owl-carousel owl-theme">
            <?php foreach ($greatcruiseleaving_cursor as $bestDepartData): ?>
                <div class="">
                    <div class="imgCard imgCard2">
                        <div class="imgtext">
                            <?php echo $bestDepartData["title"]; ?>
                        </div>
                        <img src="<?php echo $bestDepartData["img"]; ?>" alt="Popular Cruise Image1">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading3">Our Best Ports</div>
    </div>
    <!-- Slider -->
    <div class="img-carousel">
        <?php foreach ($popularDestination_cursor as $popularCruise): ?>
            <div class="carousel-item1">
                <div class="carousel-box">
                    <div class="title"><?php echo $popularCruise["title"]; ?></div>
                    <div class="num"><?php echo $popularCruise["number"]; ?></div>
                    <img src="<?php echo $popularCruise["img"]; ?>" />
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="cursor"></div>
    <div class="cursor cursor2"></div>
</div>