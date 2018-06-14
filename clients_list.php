<?php
require_once 'connect_file/connect.php';
require_once 'DriverPrestashop.php';
session_start();


if (is_null($_SESSION['id'])){
    header('Location: ../connect_file/connexion.php');
}

?>

<html>
        <head>
            <title></title>
            <link rel="stylesheet" href="style/style.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
        </head>
        <body>
            <?php
                require_once 'asset/includes/header.php';
            ?>
            <main>
                <div class='search-container'>
                        <div class='search-container__search'>
                            <h3 class="search-container__title">Rechercher un client</h3>
                            <div class="search-container__content">
                                <input class="search search-container__action" type="text" placeholder="Chercher un client par son nom, prénom ou téléphone"/>
                                <a href="" class="search-container__btn"><i class="fas fa-search"></i></a>
                            </div>                            
                            <div class="result-search-container">
                                <div class="result-search"></div>
                            </div>     
                        </div>
                    </div>

                   

                   <div class='ticketList-container'>
                        <h3 class='ticketList-container__title'>Clients</h3>

                        <div class='list-client_client'>
                            <div class='list-client__info'>
                                <p class='list-client__name'>Eugene Grant</p>
                                <p class='list-client__phone'>+33634891256</p>
                            </div>
                            <div class='ticket-state__color'></div>
                        </div>

                        <div class='list-client_client'>
                            <div class='list-client__info'>
                                <p class='list-client__name'>Owen Hodges</p>
                                <p class='list-client__phone'>+33634838252</p>
                            </div>
                            <div class='ticket-state__color'></div>
                        </div>

                        <div class='list-client_client'>
                            <div class='list-client__info'>
                                <p class='list-client__name'>Maggie klein</p>
                                <p class='list-client__phone'>+33634891035</p>
                            </div>
                            <div class='ticket-state__color'></div>
                        </div>

                        <div class='list-client_client'>
                            <div class='list-client__info'>
                                <p class='list-client__name'>Lillie Thomas</p>
                                <p class='list-client__phone'>+33634891851</p>
                            </div>
                            <div class='ticket-state__color'></div>
                        </div>
                    </div>

                

                

            </main>
            <script src='asset/app.js'></script>
        </body> 
    </html>
