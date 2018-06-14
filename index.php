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
            <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
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

                <div class="ticket-container">
                    <div class="ticket-container__block">
                        <div class="ticket-block__tag">Tickets</div>
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
                            <a href="#"><div class='ticket-block__ticket'>
                                <?php if ($ticket['reference'] || $ticket['owner']) { ?>
                                <div class='ticket-block__state'>
                                    <?php if ($ticket['reference']) {  ?>
                                    <p class='ticket-state__ref'><?= $ticket["reference"] ?></p>
                                    <?php } ?>
                                    <?php if ($ticket['owner']) { ?>
                                    <p class='ticket-state__name'><i class="fas fa-user-circle"></i><?= $ticket["owner"]; ?></p>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <?php if ($ticket['titre']) { ?>
                                <p class='ticket-block__problem'><?= $ticket['titre'] ?></p>
                                <?php } ?>
                                <?php if ($ticket['date']) { ?>
                                <p class='ticket-block__date'><?= $ticket["date"] ?></p>
                                <?php } ?>
                                <?php if ($ticket['status'] >= 0) { ?>
                                <div class="<?= $ticket["status"] === "0" ? "ticket-block__status" : ( $ticket["status"] === "10" ? "ticket-block__status ticket-block__status--orange" : ( $ticket["status"] === "20" ? "ticket-block__status ticket-block__status--grey" : '' ) ) ?>"></div>
                                <?php } ?>
                            </div></a>
                        <?php } ?>
                        <a href="#" class="ticket-block__link">Voir plus</a>
                        </div>
                    </div>
                    <div class="ticket-container__block">
                    <div class="ticket-block__tag">Tickets</div>
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
                            <a href="#"><div class='ticket-block__ticket'>
                            <?php if ($ticket['reference'] || $ticket['owner']) { ?>
                                <div class='ticket-block__state'>
                                    <?php if ($ticket['reference']) {  ?>
                                    <p class='ticket-state__ref'><?= $ticket["reference"] ?></p>
                                    <?php } ?>
                                    <?php if ($ticket['owner']) { ?>
                                    <p class='ticket-state__name'><i class="fas fa-user-circle"></i><?= $ticket["owner"]; ?></p>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <?php if ($ticket['titre']) { ?>
                                <p class='ticket-block__problem'><?= $ticket['titre'] ?></p>
                                <?php } ?>
                                <?php if ($ticket['date']) { ?>
                                <p class='ticket-block__date'><?= $ticket["date"] ?></p>
                                <?php } ?>
                            </div></a>
                            <?php } ?>
                            <a href="#" class="ticket-block__link">Voir plus</a>
                        </div>
                    </div>
                </div>
            </main>
            <script src='asset/js/app.js'></script>
        </body> 
    </html>
