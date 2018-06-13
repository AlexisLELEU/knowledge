<?php
require_once 'connect_file/connect.php';
require_once 'DriverPrestashop.php';
session_start();
if (is_null($_SESSION['id'])){
    header('Location: ../connect_file/connexion.php');
}
$driver = new DriverPrestashop();
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
            <header class="header">
                <nav class="header__nav">
                    <ul class="header-nav__ul">
                        <li class="header-nav__li">Accueil</li>
                        <li class="header-nav__li">Tickets</li>
                        <li class="header-nav__li">Clients</li>
                    </ul>
                </nav>
            </header>
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

                <div class="ticket-container">
                    <div class="ticket-container__block">
                        <h3 class='ticket-block__title'>Urgences</h3>
                        <div class='ticket-block__content'>
                            <?php 
                                $req = "SELECT `titre`, `owner`, `status`, `userId`, `reference`, `date` FROM tickets WHERE `userId` = :id";
                                $sql = $pdo->prepare($req);
                                $sql->bindValue(':id', $_GET['id'] , PDO::PARAM_STR);
                                $sql->execute();
                                $tickets = $sql->fetchAll();
                            ?>
                            <?php foreach ($tickets as $ticket) { ?>
                            <div class='ticket-block__ticket'>
                                <div class='ticket-block__state'>
                                    <p class='ticket-state__ref'><?= $ticket["reference"] ?></p>
                                    <p class='ticket-state__name'><i class="fas fa-user-circle"></i><?= $ticket["owner"]; ?></p>
                                </div>
                                <p class='ticket-block__problem'><?= $ticket['titre'] ?></p>
                                <p class='ticket-block__date'><?= $ticket["date"] ?></p>
                                <div class="<?= $ticket["status"] === '0' ? "ticket-block__status" : ( $ticket["status"] === "10" ? "ticket-block__status ticket-block__status--orange" : ( $ticket["status"] === "20" ? "ticket-block__status ticket-block__status--grey" : '' ) ) ?>"></div>
                            </div>
                            <?php } ?>
                            <div class='ticket-block__seemore'>
                                <p class='ticket-seemore__text'>Voir plus</p>   
                            </div> 
                        </div>
                    </div>
                    <div class="ticket-container__block">
                    <h3 class='ticket-block__title'>Ajoutés récemments</h3>
                    <div class='ticket-block__content'>
                            <?php 
                                $req_sort = "SELECT `titre`, `owner`, `status`, `userId`, `reference`, `date` FROM tickets WHERE `userId` = :id ORDER BY `date` DESC";
                                $sql = $pdo->prepare($req_sort);
                                $sql->bindValue(':id', $_GET['id'] , PDO::PARAM_STR);
                                $sql->execute();
                                $tickets_sort = $sql->fetchAll();
                            ?>
                            <?php foreach ($tickets_sort as $ticket) { ?>
                            <div class='ticket-block__ticket'>
                                <div class='ticket-block__state'>
                                    <p class='ticket-state__ref'><?= $ticket["reference"] ?></p>
                                    <p class='ticket-state__name'><i class="fas fa-user-circle"></i><?= $ticket["owner"]; ?></p>
                                </div>
                                <p class='ticket-block__problem'><?= $ticket['titre'] ?></p>
                                <p class='ticket-block__date'><?= $ticket["date"] ?></p>
                            </div>
                            <?php } ?>
                            <div class='ticket-block__seemore'>
                                <p class='ticket-seemore__text'>Voir plus</p>   
                            </div>
                            
                        </div>
                    </div>
                </div>
                <a href="./connect_file/logOut.php">Se deconnecter</a><br>   
                <a href="./client_details.php">details</a><br>   
            </main>
            <script src='js/app.js'></script>
        </body> 
    </html>

<?php
// }
