<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La note enchantée</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&family=Shrikhand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel='stylesheet' href="./css/style.css" type='text/css'>
    <script src="https://kit.fontawesome.com/ece17b4c54.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container2">
        <header>
            <div class="header_return">
                <a href="./index.php"><i class="fa-solid fa-arrow-left"></i></a>
                <a img src="./css/images/logo/ohmyfood.png" alt="logo"></a>
            </div>
        </header>

        <div class="image2">
            <a img class="image" src="./css/images/restaurants/stil-u2Lp8tXIcjw-unsplash.jpg" alt="la_note_enchanté"> </a>
        </div>

        <main>
            <div class="title">
                <h1>La note enchantée</h1>
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid da fa-heart"></i>
            </div>

            <form id="orderForm">
                <div class="plate_container">
                

                </div>
                <button type="submit" class="bouton">Commander</button>
            </form>

        </main>

        <footer>
            <h1>ParisFlavorsFinder</h1>

            <ul>
                <li class="footli1"><i class="fa-solid fa-utensils"></i>Proposer un restaurant</li>
                <li class="footli"><i class="fa-solid fa-handshake-angle"></i>Devenir partenaire</li>
                <li>Mention légales</li>
                <li><a href="mailto:parisflavorfinder@gmail.com">Contact</a></li>
            </ul>

        </footer>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const orderForm = document.getElementById('orderForm');
            const checkboxes = orderForm.querySelectorAll('input[type="checkbox"]');

            orderForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                const selectedItems = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                // You can perform further actions with the selected items, like adding to a cart or sending to a server
                console.log(selectedItems);
            });
        });
    </script>

</body>

</html>
!