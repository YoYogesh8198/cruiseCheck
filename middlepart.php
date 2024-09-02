<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/middlepart.css">
    <title>Document</title>
</head>

<body>
    <div class="body">
        <main>
            <ul class='slider'>
                <li class='item' style="background-image: url('./images/middle/m1.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Empowering innovation through creativity and collaboration."</h2>
                        <p class='description'> At the heart of our mission is the belief that great ideas come to life
                            when
                            diverse minds work together, pushing the boundaries of what's possible.</p>
                        <button>Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('./images/middle/m2.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Dedicated to turning your vision into reality with precision and passion."
                        </h2>
                        <p class='description'>We are committed to transforming your ideas into impactful solutions,
                            driven
                            by a relentless pursuit of excellence and a deep understanding of your needs.</p>
                        <button>Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('./images/middle/m3.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Where expertise meets creativity to deliver exceptional results."</h2>
                        <p class='description'>Our team blends technical know-how with imaginative thinking to craft
                            solutions that not only meet but exceed your expectations.</p>
                        <button>Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('./images/middle/m4.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Your success is our top priority; we are here to support you every step of
                            the
                            way."</h2>
                        <p class='description'>
                            We partner with you throughout your journey, providing the guidance and support needed to
                            achieve your goals and overcome challenges.
                        </p>
                        <button>Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('./images/middle/m5.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Innovating today for a brighter tomorrow."</h2>
                        <p class='description'>
                            We focus on forward-thinking strategies and cutting-edge solutions to ensure that your
                            business
                            is not just prepared for the future but thrives in it.
                        </p>
                        <button>Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('./images/middle/m2.jpg')">
                    <div class='content'>
                        <h2 class='title'>"Building lasting relationships through trust, integrity, and exceptional
                            service."</h2>
                        <p class='description'>Our approach is centered around fostering strong, reliable connections
                            with
                            our clients, ensuring that each interaction is marked by honesty and outstanding service.
                        </p>
                        <button>Read More</button>
                    </div>
                </li>
            </ul>
            <nav class='nav'>
                <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
                <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const slider = document.querySelector('.slider');

        function activate(e) {
            const items = document.querySelectorAll('.item');
            e.target.matches('.next') && slider.append(items[0])
            e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
        }

        document.addEventListener('click', activate, false);
    </script>
</body>

</html>