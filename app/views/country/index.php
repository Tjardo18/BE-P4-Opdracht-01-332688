<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Country</title>
</head>

<body>

    <header>
        <a href="<?= URLROOT; ?>" class="logo">
            <i class="ri-home-3-fill"></i>
            <span>TJARDO</span>
        </a>

        <ul class="navbar">
            <li><a href="<?= URLROOT; ?>">Home</a></li>
            <li><a href="<?= URLROOT; ?>/country" class="active">Country</a></li>
            <li><a href="<?= URLROOT; ?>/zangeres">Zangeressen</a></li>
        </ul>

        <div class="main">
            <a href="#" class="user">
                <i class="ri-user-fill"></i>
                Sign In
            </a>
            <a href="#">Register</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <h3><?= $data['title']; ?></h3>

    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Naam</th>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>

    <script src="<?= URLROOT; ?>/js/nav.js"></script>

</body>

</html>