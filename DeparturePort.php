<?php
$greatcruiseleaving_cursor = $m->greatcruiseleaving(["_id" => ['$ne' => null]], 2);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading3">Departure Port with Great Cruises Leaving From</div>
    </div>
    <section class="game-section">
        <div class="owl-carousel custom-carousel owl-theme">
            <?php $i = 0;
            foreach ($greatcruiseleaving_cursor as $bestDepartData):
                $i++;
                $active = $i == 1 ? "active" : "";
                ?>
                <div class="item <?php echo $active ?>"
                    style="background-image: url(<?php echo $bestDepartData["img"]; ?>);">
                    <div class="item-desc">
                        <h3><?php echo $bestDepartData["title"]; ?></h3>
                        <p><?php echo $bestDepartData["description"]; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <nav class='nav1'>
            <ion-icon class='btn1 prev1' name='arrow-back-outline'></ion-icon>
            <ion-icon class='btn1 next1' name='arrow-forward-outline'></ion-icon>
        </nav>
    </section>
</div>