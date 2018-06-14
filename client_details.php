<?php
require_once './DriverPrestashop.php';
require_once 'connect_file/connect.php';
session_start();
$driver = new DriverPrestashop();
if (is_null($_SESSION['id'])) {
    header('Location: index.php');
}
if (!$_GET['id']){
    header('Location: connect_file/logOut.php');
} else {
    $id = $_GET['id'];
    $req_client = "SELECT `id_client`, `firstname`, `lastname`, `id_eCommerce` FROM client WHERE `id_client` = :id";
    
    $sql = $pdo->prepare($req_client);
    $sql->bindValue(':id', $id);
    $sql->execute();
    $clientInfo = $sql->fetch();
}
    $driver->getCommande($clientInfo['id_eCommerce']);
    
    $req_order = "SELECT `id_order`, `product`, `user_Id`, `delivery`, `expedition`, `date`, `price`, `reference`, `status` FROM `userOder` WHERE `user_id` = :id";
    $sql = $pdo->prepare($req_order);
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    $orders = $sql->fetchAll();


    $req_ticket = "SELECT `id_ticket`, `userId`, `titre`, `status`, `owner`, `date`, `date_limit`, `details`, `reference`, `client_id` FROM `tickets` WHERE `client_id` = :id";
    $sql = $pdo->prepare($req_ticket);
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    $tickets = $sql->fetchAll();
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

                <div class='details-option'>
                    <div class='details-option__info'>
                        <p class='details-option__client'><?= $clientInfo['firstname']; ?> <?= $clientInfo['lastname'] ?></p>
                    </div>
                </div>
                <div class='details-container'>
                    <div class='details-container__userInfo'>
                        <form class='details-userInfo__form' action="">
                            <div class='details-form__pers'>
                                <div class='labelInput-content pers-content__phone'>
                                    <label class='client-form__label' for="">Téléphone</label>
                                    <input type="text" class='client-form__input' value='tetete'>
                                 </div>
                                 <div class='labelInput-content pers-content__email'>
                                    <label class='client-form__label' for="">Email</label>
                                    <input type="text" class='client-form__input pers-input__email' value='tetete'>
                                </div>
                                <div class='labelInput-content pers-content__city'>
                                    <label class='client-form__label' for="">Ville</label>
                                    <input type="text" class='client-form__input pers-input__city' value='tetete'>
                                </div>
                            </div>
                            <div class='details-form__home'>
                                <div class='labelInput-content  home-input__address'>
                                    <label class='client-form__label' for="">Adresse</label>
                                    <input type="text" class='client-form__input' value='tetete'>
                                </div>
                                <div class='labelInput-content  home-input__comp'>
                                    <label class='client-form__label' for="">Complément d’adresse</label>
                                    <input type="text" class='client-form__input' value='tetete'>
                                </div>
                                <div class='labelInput-content  home-input__postCode'>
                                    <label class='client-form__label' for="">Code postal</label>
                                    <input type="text" class='client-form__input' value='tetete'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if (count($orders) > 0) { ?>
                    <div class='details-container__block'>
                        <h3 class='details__title'>Commandes</h3>
                        <?php foreach($orders as $order) {
                            $date = strtotime($order['date']);
                            $formatDate = date('d/m/Y', $date);
                        ?>
                        <div class='details-order__info'>
                            <div class='order-info__date'>
                                <p><?= $formatDate ?></p>
                            </div>
                            <div class='order-info__ref'>
                                <p><?= $order["reference"] ?></p>
                            </div>
                            <div class='order-info__product'>
                                <p><?= $order["product"] ?></p>
                            </div>
                            <div class='order-info__state'>
                                <p><?= $order["status"] ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <p class='details-order__archive'>Voir les commandes archivées</p>
                    </div>
                    <?php } ?>

                     <div class='details-container__block'>
                        <h3 class='details__title'>Tickets</h3>
                        <?php foreach($tickets as $ticket) { 
                            $dateTicket = strtotime($ticket['date']);
                            $formatDateTicket = date("d/m/Y", $dateTicket);
                        ?>
                        <div class='details-ticket__info'>
                            <div class='ticket-info__description'>
                                <div class='ticket-description__details'>
                                    <?php if ($ticket["reference"]) { ?>
                                    <div class='ticket-details__ref'>
                                        <p><?= $ticket['reference'] ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if ($formatDateTicket) { ?>
                                    <div class='ticket-details__date'>
                                        <p><?= $formatDateTicket ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if ($ticket['owner']) { ?>
                                    <div class='ticket-details__user'>
                                        <p><?= $ticket['owner'] ?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php if ($ticket['details']) { ?>
                                <div class='ticket-description__text'>
                                    <p><?= $ticket['details'] ?></p>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if ($ticket['status'] >= 0) { ?>
                            <div class='ticket-description__state'>
                                <div class="<?= $ticket["status"] === "0" ? "ticket-state__color" : ( $ticket["status"] === "10" ? "ticket-state__color ticket-state__color--orange" : ( $ticket["status"] === "20" ? "ticket-state__color ticket-state__color--grey" : '' ) ) ?>"></div>
                                <button type="submit" class='ticket-state__seeMore js-element-btnModal'>
                                    <p>Voir le ticket</p>
                                </button>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-ticket js-element-modal">
                    <div class="modal-ticket-container">
                        <button class="modal-ticket-close js-element-close">CLOSE</button>
                    </div>
                </div>
            </main>
            <script src='js/app.js'></script>
        </body> 
    </html>
