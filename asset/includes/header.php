<header class="header">
                <div class='header-content'>
                    <div class='header-content__menu'>
                        <img class='header-content_logo' src="./asset/images/knowledge.svg" alt="">
                        <nav class="header__nav">
                            <ul class="header-nav__ul">
                                <a href='../index.php?id=<?= $_SESSION['id'] ?>'><li class="header-nav__li">Accueil</li></a>
                                <a href='../tickets_list.php?id=<?= $_SESSION['id'] ?>'><li class="header-nav__li">Tickets</li></a>
                                <a href='../clients_list.php?id=<?= $_SESSION['id'] ?>'><li class="header-nav__li">Clients</li></a>
                            </ul>
                        </nav>
                        </div>
                    <div class='header__select'>
                        <div class='header-select__custom'>
                            <p>Sptam</p>
                            <a href="./connect_file/logOut.php"><img src="./asset/images/Shape.svg" alt=""></a>
                        </div>
                    </div>
                </div>
</header>