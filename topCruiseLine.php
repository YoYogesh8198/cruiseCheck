<?php
$topcruiseline_cursor = $m->topcruiseline(["_id" => ['$ne' => null]], 2);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading">
            Top Cruise Lines
        </div>
    </div>
    <div class="row popular_top">
        <?php foreach ($topcruiseline_cursor as $cruise): ?>
            <div class="col-12 col-md-4 mt-4">
                <div class="box_shadow">
                    <img class="w-100 img-fluid" src="<?php echo $cruise["ship_image"]; ?>" alt="Cuise">
                    <div class="priceTagConainer">
                        <div class="priceTag">
                            <p>From</p>
                            <span><?php echo $cruise["ship_price"]; ?></span>
                        </div>
                    </div>
                    <div class="card-content ">
                        <!-- <div class="card-heading"><img src="images/cruise-logo-2.jpg" alt="Top Cruise Logo"> -->
                        <div class="card-heading">
                            <img src="<?php echo $cruise["ship_logo"]; ?>" alt="Top Cruise Logo">
                        </div>
                        <ul class="list">
                            <?php foreach ($cruise["ship_desription"] as $description) { ?>
                                <li>
                                    <h4 class="text-truncate"><?php echo $description["title"] ?></h4>
                                    <p class="text-truncate p-text"> <?php echo $description["text"] ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="actionButton"><a href="#"><?php echo $cruise["ship_name"]; ?>
                                <img src="images/price-arrow.jpg" alt="Price arrow icon"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>