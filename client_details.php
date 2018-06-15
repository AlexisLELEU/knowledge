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

                <div class='details-option'>
                    <div class='details-option__info'>
                        <p class='details-option__client'><?= $clientInfo['firstname']; ?> <?= $clientInfo['lastname'] ?></p>
                    </div>
                    <button type="submit" class='ticket-state__seeMore js-element-btnCreateTicket'>
                        <p>Créer un ticket</p>
                    </button>
                </div>

                <div class='details-container__userInfo'>
                    <p class="changeAction">Editer les informations</p>
                    
                        <form class='details-userInfo__form' action="">
                            <div class='details-form__pers'>
                                <div class='labelInput-content pers-content__phone'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Téléphone</label>
                                    <input type="text" class='client-form__input' value='0612735941' disabled="disabled">
                                 </div>
                                 <div class='labelInput-content pers-content__email'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Email</label>
                                    <input type="text" class='client-form__input pers-input__email' value='monemail@gamil.com' disabled="disabled">
                                </div>
                                <div class='labelInput-content pers-content__city'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Ville</label>
                                    <input type="text" class='client-form__input pers-input__city' value='Paris' disabled="disabled">
                                </div>
                            </div>
                            <div class='details-form__home'>
                                <div class='labelInput-content  home-input__address'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Adresse</label>
                                    <input type="text" class='client-form__input' value='12 avenue de la Victoire' disabled="disabled">
                                </div>
                                <div class='labelInput-content  home-input__comp'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Complément d’adresse</label>
                                    <input type="text" class='client-form__input' value='Bat C' disabled="disabled">
                                </div>
                                <div class='labelInput-content  home-input__postCode'>
                                    <label class='client-form__label' for=""><i class="fas fa-building"></i>Code postal</label>
                                    <input type="text" class='client-form__input' value='75350' disabled="disabled">
                                </div>
                            </div>
                            <div class='details-form__validate'>Valider</div>
                        </form>
                    </div>

                <div class='details-container'>
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
                        <a href="#"><div class='details-ticket__info'>
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
                                        <p><i class="fas fa-user-circle"></i>  <?= $ticket['owner'] ?></p>
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
                            </div>
                            <?php } ?>
                        </div></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-ticket js-element-modal-ticket">
                    <div class="modal-ticket-container">
                        <button class="modal-ticket-close js-element-close-ticket">CLOSE</button>
                    </div>
                </div>
                <div class="modal-create-ticket js-element-modal-createTicket">
                    <div>
                    <div class="modal-create-ticket-container">
                        <div class="modal-create-ticket__titleContainer">
                            <h3 class="modal-create-ticket__title">Création de ticket </h3>
                            <button class="modal-create-ticket-close js-element-close-createTicket"></button>
                        </div>
                        <form method="post" class="modal-create-ticket-form form" action="createticket.php/?id=<?= $_GET['id'] ?>">
                            <div class="form__wrapper">
                                <label for="reference">References</label>
                                <select class="form__input" name="reference" id="reference">
                                    <?php foreach($orders as $order) { ?>
                                        <option value="<?= $order["reference"] ?>"><?= $order["reference"] ?> - <?= $order["product"] ?></option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form__wrapper">
                            <label for="type">Type de ticket</label>
                                <select class="form__input" name="type" id="type">
                                    <option value="livraison">Delai de livraison</option>
                                    <option value="abimé">Produit abimé</option>
                                    <option value="incomplet">Commande incomplète</option>
                                    <option value="pas commander">Produit pas commandé</option>
                                    <option value="mauvais produit">Mauvais produit dans la livraison</option>
                                    <option value="annulation">Annulation commande</option>
                                </select>
                            </div>
                            <div class="form__wrapper">
                                <label for="status">Status</label>
                                <select class="form__input" name"status" id="status">
                                    <option value="0">Clos</option>
                                    <option value="10">En cours</option>
                                    <option value="20">Urgence</option>
                                </select>
                            </div>
                            <div class="form__wrapper">
                                <label for="name">Nom du ticket</label>
                                <input class="form__input" name="name" id="name" type="text" placeholder="Precisez le problème" />
                            </div>
                            <div class="form__wrapper">
                                <label for="refs">Reference du ticket</label>
                                <input class="form__input" name="refs" id="refs" type="text" placeholder="Reference du ticket (#refXXX)" />
                            </div>
                            <div class="form__wrapper">
                                <label for="owner">Proprietaire du ticket</label>
                                <input class="form__input" name="owner" id="owner" type="text" placeholder="Proprietaire du ticket" />
                            </div>
                            <div class="form__wrapper">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="desc" placeholder="Décrivez la nature de votre problème"></textarea>
                            </div>
                            <div class="form__wrapper--right">
                                <button class="ticket-state__seeMore" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </main>
            <script src='asset/js/app.js'></script>

            <script>
            
                var actionChange = document.querySelector('.changeAction')
                var input = document.querySelectorAll('.client-form__input')
                var label = document.querySelectorAll('.client-form__label')
                var validate = document.querySelector('.details-form__validate');

                actionChange.addEventListener('click', function(e){
                    validate.style.display = 'block';
                    for (let i = 0; i < input.length; i++){
                        input[i].disabled = false;
                        input[i].classList.add('input-border');
                        label[i].style.top = '-20px';
                        label[i].style.left = '0';
                    }
                })

                validate.addEventListener('click', function(e){
                    validate.style.display = 'none';
                    for (let i = 0; i < input.length; i++){
                        input[i].disabled = true;
                        input[i].classList.remove('input-border');
                        label[i].style.top = '-8px';
                        label[i].style.left = '10px';
                    }
                })
            
            
            </script>
        </body> 
    </html>
