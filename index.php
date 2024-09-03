<?php
include_once 'db.php';
$m = new monogd();
$num = mt_rand(100000, 999999);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtkt: Cheap Cruise Tickets | Amazing Offers & Deals</title>
    <link rel="shortcut icon" href="images/cruise-fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/owl.carousel.min.css?v=0.0.01">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=0.0.10" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="css/bootstrap.min.css?v=0.0.01" rel="stylesheet">
    <link href="css/bootstrap-select.min.css?v=0.0.07" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- Owl Carousel Default Theme CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->
    <style>
        .tble_titie td {
            display: table-cell;
            min-height: 35px;
            padding: 15px 0px 15px 10px;
            border-bottom: 1px solid #e4e4e4;
            line-height: 22px;
        }

        .bor_right {
            border: 1px solid #e4e4e4;
            border-bottom: 0px;
        }
    </style>
</head>

<body>
    <div id="main_ctr" style="overflow-x: hidden;">
        <div class="cfgInner">
            <!-- header -->
            <?php include_once 'cruiseHeader.php' ?>
            <!-- cruiseNav -->
            <?php include_once 'cruiseNav.php' ?>
            <!-- cruise From -->
            <?php include_once 'cruiseForm.php' ?>
            <!-- enquiry -->
            <?php include_once 'enquiry.php' ?>
            <!-- top cruise -->
            <?php include_once 'topCruiseLine.php' ?>
            <!-- new component -->
            <?php include_once 'middlepart.php' ?>
            <!-- popularDest -->
            <?php include_once 'popularDest.php' ?>
            <!-- DeparturePort.php -->
            <?php include_once 'DeparturePort.php' ?>
            <!-- F & Q -->
            <?php include_once 'F&Q.php' ?>
            <!-- footer -->
            <?php include_once 'cruiseFooter.php' ?>
            <!-- end -->
        </div>
    </div>
    <!-- <script src="js/index.js"></script> -->
    <script src="js/jquery.min.js?v=0.0.01"></script>
    <script src="js/owl.carousel.min.js?v=0.0.01"></script>
    <script src="js/popper.min.js?v=0.0.01"></script>
    <script src="js/bootstrap.min.js?v=0.0.01"></script>
    <script src="js/index.js?v=0.0.04"></script>
    <script src="js/customscript.js?v=0.0.07"></script>
    <script src="js/customDate.js?v=0.0.04"></script>
    <script src="js/validation.js?v=0.0.06"></script>
    <script src="js/bootstrap-select.min.js?v=0.0.01"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>


        // $(document).ready(function () {
        //     $(".custom-carousel").owlCarousel({
        //         autoWidth: true,
        //         loop: false,
        //         // nav: true,
        //     });
        //     $(".custom-carousel .item").click(function () {
        //         $(".custom-carousel .item").not($(this)).removeClass("active");
        //         $(this).toggleClass("active");
        //     });
        //     $('.prev1').click(function () {
        //         $(".custom-carousel").trigger('prev.owl.carousel');

        //     })
        //     $('.next1').click(function () {
        //         $(".custom-carousel").trigger('next.owl.carousel');
        //     })
        // });

        $(document).ready(function () {
            var $carousel = $(".custom-carousel");
            $carousel.owlCarousel({
                items: 2, // Show two items at a time
                loop: true, // Enable looping
                nav: false, // Disable default navigation
                margin: 350, // Add margin between items
                mouseDrag: false, // Disable mouse dragging on desktop
                responsive: {
                    0: {
                        items: 3, 
                        mouseDrag: false 
                    },
                    600: {
                        items: 3, 
                        mouseDrag: false 
                    },
                    991:{
                        items: 2, 
                        mouseDrag: false 
                    }
                }
            });

            // Function to update active class
            function updateActiveClass() {
                $('.custom-carousel .item').removeClass('active');
                var currentIndex = $carousel.find('.owl-item.active').index();
                $carousel.find('.item').eq(currentIndex).addClass('active');
            }

            // Initial setup: set the first item as active
            updateActiveClass();

            // Go to the previous item
            $('.prev1').click(function () {
                $carousel.trigger('prev.owl.carousel');
                updateActiveClass();
            });

            // Go to the next item
            $('.next1').click(function () {
                $carousel.trigger('next.owl.carousel');
                updateActiveClass();
            });

            // Listen for the 'changed' event to update active class
            $carousel.on('changed.owl.carousel', function (event) {
                updateActiveClass();
            });
        });



        // !Script for sidebar nav start
        $(window).resize(function () {
            if ($(window).width() < 768) {
                document.getElementById("mySidenav").style.width = "0";
            } else {
                document.getElementById("mySidenav").style.width = "auto";
            }
        });
        function openNav() {
            console.log("hello")
            event.stopPropagation();
            $(".hambrg").hide();
            $(".hambrg").addClass("open");
            if ($(".hambrg").hasClass("open")) {
                $("#main_ctr").addClass("noscroll");
            } else {
                $("#main_ctr").removeClass("noscroll");
            }
            document.getElementById("mySidenav").style.width = "180px";
            document.getElementById("main_ctr").style.marginLeft = "-180px";
        }

        function closeNav() {
            event.stopPropagation();
            $(".hambrg").show();
            $(".hambrg").removeClass("open");
            if ($(".hambrg").hasClass("open")) {
                $("#main_ctr").addClass("noscroll");
            } else {
                $("#main_ctr").removeClass("noscroll");
            }
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main_ctr").style.marginLeft = "0";
        }
    </script>
    <style>
        .error {
            border: 1px solid red;
            /* Red border for error input */
        }

        .noscroll {
            position: fixed;
        }
    </style>

</body>

</html>