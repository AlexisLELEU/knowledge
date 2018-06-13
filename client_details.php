<?php
require_once 'connect_file/connect.php';
session_start();
// var_dump($_SESSION);
if (is_null($_SESSION['id'])) {
    header('Location: index.php');
}
if (!$_GET['id']){
    // header('Location: client_space.php');
} else {
    $id = $_GET['id'];


    $req_client = "SELECT 
                    `id_client`, 
                    `firstname`, 
                    `lastname`, 
                    `email`, 
                    `phone`, 
                    `address`, 
                    `age`, 
                    `dateBirth` 
                    FROM 
                    client 
                    WHERE
                    `id_client` = :id";
    
    $sql = $pdo->prepare($req_client);
    $sql->bindValue(':id', $id , PDO::PARAM_STR);
    $sql->execute();
    $clientInfo = $sql->fetch();
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
                        <p class='details-option__client'>Zinedine Zidane</p>
                    </div>
                </div>
                <div class='details-container'>


                    <div class='details-container__order'>
                        <h3 class='details__title'>Commandes</h3>

                        <div class='details-order__info'>
                            <div class='order-info__date'>
                                <p>10/06/2018</p>
                            </div>
                            <div class='order-info__ref'>
                                <p>#12ERRFF432</p>
                            </div>
                            <div class='order-info__product'>
                                <p>2 pattes de dérailleur, 1 paire de patins, 1 cadre Giant Escape 3</p>
                            </div>
                            <div class='order-info__state'>
                                <p>Expédié</p>
                            </div>
                        </div>
                        
                        <p class='details-order__archive'>Voir les commandes archivées</p>
                    </div>

                </div>

                
            </main>
            <script src='js/app.js'></script>
        </body> 
    </html>
