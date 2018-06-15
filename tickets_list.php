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
                        <h3 class='ticketList-container__title'>Tickets</h3>
                        <div class="details-container__ticketList">
                            

                                <?php 
                                $req = "SELECT `titre`, `owner`, `status`, `userId`, `reference`, `date` FROM tickets WHERE `userId` = :id";
                                $sql = $pdo->prepare($req);
                                $sql->bindValue(':id', $_GET['id'] , PDO::PARAM_STR);
                                $sql->execute();
                                $tickets = $sql->fetchAll();
                                ?>


                                <?php foreach ($tickets as $ticket) { ?>
                                    <a href="#" class="details-ticket__link">
                                    <div class='details-ticket__info'>
                                        <div class='ticket-info__description'>
                                            <?php if ($ticket['reference'] || $ticket['owner'] || $ticket['date']) { ?>
                                                <div class='ticket-description__details'>
                                                    <?php if ($ticket['reference']) {  ?>
                                                        <div class='ticket-details__ref'>
                                                            <p><?= $ticket["reference"] ?></p>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($ticket['date']) { ?>
                                                        <div class='ticket-details__date'>
                                                            <p><?= $ticket['date'] ?></p>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($ticket['owner']) { ?>    
                                                        <div class='ticket-details__user'>
                                                            <p><i class="fas fa-user-circle"></i><?= $ticket["owner"]; ?></p>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            <?php } ?>

                                            <?php if ($ticket['titre']) { ?>
                                                <div class='ticket-description__text'>
                                                    <p><?= $ticket['titre'] ?></p>
                                                </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>

                        </div>
                    </div>

                    

                    
                </div>

                

            </main>
            <script src='asset/js/app.js'></script>
        </body> 
    </html>
