<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">

        <title><?= $titre ?></title>
    </head>
    <body class="">
        <header class="header_container">
            <!-- <div class="container text-center"> -->
                <div class="row">
                    <div class="col text-right text-light">
                        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                            <div class="container-fluid">
                                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="#">Mon panier</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Adminsitrateur
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="index.php?action=listing_instruments">Liste des produits & catégories</a></li>
                                                <li><a class="dropdown-item" href="index.php?action=listing_livraisons">Liste des livraisons</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="row text-center">
                    <a href="index.php"><p class="display-6 text-decoration-none" id="titreShop">My e-shop Musical instruments</p></a>
                    <p class ="fs-2 text-light">Des dernières nouveautés aux instruments anciens, venez découvrir nos offres</p>
                </div>
            <!-- </div> -->
        </header>