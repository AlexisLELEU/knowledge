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
                require_once 'includes/header.php';
            ?>
            <main>
                <div class='search-container'>
                        <div class='search-container__search'>
                            <h3 class="search-container__title">Rechercher un client</h3>
                            <input class="search search-container__action" type="text" placeholder="Chercher un client par son nom, prénom ou téléphone"/>
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

                                    <div class='details-ticket__info'>
                                        <div class='ticket-info__description'>
                                            <div class='ticket-description__details'>




                                                <?php if ($ticket['reference'] || $ticket['owner'] || $ticket['date']) { ?>
                                                <div class='ticket-block__state'>
                                                    
                                                
                                                    <?php if ($ticket['reference']) {  ?>
                                                        <div class='ticket-details__ref'>
                                                            <p><?= $ticket["reference"] ?></p>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                    <?php if ($ticket['date']) { ?>
                                                        <div class='ticket-details__date'>
                                                            <p><?= $ticket["date"] ?></p>
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

                                                <div class='ticket-description__state'>
                                                    <div class="ticket-state__color"></div>
                                                    <button type="submit" class='ticket-state__seeMore js-element-btnModal'>
                                                        <p>Voir le ticket</p>
                                                    </button>
                                                </div>
                                            
                                            
                                
                                            </div>
                                        </div>
                                    </div>              
                                <?php } ?>
                            </div>

                                <!-- <div class='details-ticket__info'>
                                    <div class='ticket-info__description'>
                                        <div class='ticket-description__details'>
                                        
                                            <div class='ticket-details__ref'>
                                                <p>#ref0000</p>
                                            </div>
                                            <div class='ticket-details__date'>
                                                <p>00/00/00></p>
                                            </div>
                                            <div class='ticket-details__user'>
                                                <p>Gérard</p>
                                            </div>
                                        </div>
                                    
                                        <div class='ticket-description__text'>
                                            <p>Retour produit en attente - Problème de soudure</p>
                                        </div>
                                    </div>
                                    <div class='ticket-description__state'>
                                        <div class="ticket-state__color"></div>
                                        <button type="submit" class='ticket-state__seeMore js-element-btnModal'>
                                            <p>Voir le ticket</p>
                                        </button>
                                    </div> -->
                            
                                </div>
                        
                        </div>
                    </div>

                    

                    
                </div>

                

            </main>
            <script src='js/app.js'></script>
        </body> 
    </html>
