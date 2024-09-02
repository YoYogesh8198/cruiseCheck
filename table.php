<?php
include_once 'db.php';
$m = new monogd();
$details_cursor = $m->details(["_id" => ['$ne' => null]], 2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <div class="wrapper">
        <section class="drawers">
            <?php foreach ($details_cursor as $index => $details): ?>
                <input type="checkbox" name="drawer-radios" id="drawer-<?php echo $index ?>" class="sr-only">
                <label for="drawer-<?php echo $index ?>"
                    class="drawer-label"><span>&#10095;</span><?php echo $details["name"] ?></label>
                <div class="drawer">
                    <div class="drawer-content">
                        <p>ID : <?php echo $details["uniqueId"] ?></p>
                        <p>Name : <?php echo $details["name"] ?></p>
                        <p>Email : <?php echo $details["email"] ?></p>
                        <p>Number : <?php echo $details["number"] ?></p>
                        <p>Travelers : <?php echo $details["travelers"] ?></p>
                        <p>
                            Destination : <?php foreach ($details["destination"] as $destination): ?>
                                <?php echo $destination ?>,
                            <?php endforeach ?>
                        </p>
                        <p>
                            Length : <?php foreach ($details["cruise_length"] as $length): ?>
                                <?php echo $length ?>,
                            <?php endforeach ?>
                        </p>
                        <p>Depart Date : <?php echo $details["depart"] ?></p>
                        <p>Flexible Date : <?php echo $details["flexibleDate"] ?></p>
                        <p>
                            Cruise Line : <?php foreach ($details["cruise_line"] as $length): ?>
                                <?php echo $length ?>,
                            <?php endforeach ?>
                        </p>
                        <p>
                            Cruise Ship : <?php foreach ($details["cruise_ship"] as $length): ?>
                                <?php echo $length ?>,
                            <?php endforeach ?>
                        </p>
                        <p>
                            Departure Port : <?php foreach ($details["departure_port"] as $length): ?>
                                <?php echo $length ?>,
                            <?php endforeach ?>
                        </p>
                        <p>Pin Code : <?php echo $details["discount"] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </section>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all drawer labels
            const labels = document.querySelectorAll('.drawer-label');

            // Add click event to each label
            labels.forEach(label => {
                label.addEventListener('click', function () {
                    // Get the ID of the currently clicked drawer
                    const drawerId = this.getAttribute('for');

                    // Close all other drawers
                    labels.forEach(otherLabel => {
                        if (otherLabel.getAttribute('for') !== drawerId) {
                            document.getElementById(otherLabel.getAttribute('for')).checked = false;
                        }
                    });
                });
            });
        });

    </script>
</body>

</html>