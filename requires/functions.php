<?php
require './config/DbPdo.php';

function createHeader($page)
{
    ?>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:black;">
        <a class="navbar-brand" href="accueil.php">
            <img src="../assets/img/veryl.jpg" width="50" height="50" style="border-radius:50%;" class="d-inline-block align-top mr-3" alt="">
            Club Stephen King
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $page === "accueil" ? "active" : ""; ?>">
                    <a class="nav-link" href="accueil.php">Accueil </a>
                </li>
                <li class="nav-item <?= $page === "books" ? "active" : ""; ?>">
                    <a class="nav-link" href="books.php">Nos Livres </a>
                </li>
                <li class="nav-item <?= $page === "presentation" ? "active" : ""; ?>">
                    <a class="nav-link" href="contact.php">Contact </a>
                </li>
                <?php
                    if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] === true) {
                        ?>
                    <li class="nav-item <?= $page === "admin" ? "active" : ""; ?>">
                        <a class="nav-link" href="admin.php">Administration des mails </a>
                    </li>
                    <li class="nav-item <?= $page === "connexion" ? "active" : ""; ?>">
                        <a class="nav-link" href="connexion.php?deconnexion=true">Deconnexion </a>
                    </li>
                <?php
                    } else {
                        ?>
                    <li class="nav-item <?= $page === "connexion" ? "active" : ""; ?>">
                        <a class="nav-link" href="connexion.php">Connexion </a>
                    </li>
                <?php
                    }
                    ?>
            </ul>
        </div>
    </nav>

<?php
}

function createSeparator()
{
    ?>
    <div class="container-fluid">
        <div class="row separator"></div>
    </div>
<?php
}

function createDescription()
{
    ?>
    <div class="container-fluid">
        <div class="row description">
            Bienvenue sur le site des amoureux de Stephen King !<br>

        </div>
        <p>Stephen King [ˈstiːvən kɪŋ]N 1 est un écrivain américain né le 21 septembre 1947 à Portland (Maine).

            Il publie son premier roman en 1974 et devient rapidement célèbre pour ses contributions dans le domaine de l'horreur mais écrit également des livres relevant d'autres genres comme le fantastique, la fantasy, la science-fiction et le roman policier. Tout au long de sa carrière, il écrit et publie plus de soixante romans, dont sept sous le nom de plume de Richard Bachman, et plus de deux cents nouvelles, dont plus de la moitié sont réunies dans dix recueils de nouvelles. Après son grave accident en 1999, il ralentit son rythme d'écriture. Ses livres se sont vendus à plus de 350 millions d'exemplaires à travers le monde1 et il établit de nouveaux records de ventes dans le domaine de l'édition durant les années 1980, décennie où sa popularité atteint son apogée.

            Longtemps dédaigné par les critiques littéraires et les universitaires car considéré comme un auteur « populaire », il acquiert plus de considération depuis les années 1990 même si une partie de ces milieux continue de rejeter ses livres. Il est régulièrement critiqué pour son style familier, son recours au gore et la longueur jugée excessive de certains de ses romans. À l'inverse, son sens de la narration, ses personnages vivants et colorés, et sa faculté à jouer avec les peurs des lecteurs sont salués. Au-delà du caractère horrifique de la plupart de ses livres, il aborde régulièrement les thèmes de l'enfance et de la condition de l'écrivain, et brosse un portrait social très réaliste et sans complaisance des États-Unis à la fin du xxe siècle et au début du siècle suivant.

            Il a remporté de nombreux prix littéraires dont treize fois le prix Bram-Stoker, sept fois le prix British Fantasy, cinq fois le prix Locus, quatre fois le prix World Fantasy, deux fois le prix Edgar-Allan-Poe et une fois le prix Hugo et l'O. Henry Award. Il a reçu en 2003 le National Book Award pour sa remarquable contribution à la littérature américaine. Il a été décoré de la National Medal of Arts en 2015. Ses ouvrages ont souvent été adaptés pour le cinéma ou la télévision avec des fortunes diverses, parfois avec sa contribution en tant que scénariste et, une seule fois, comme réalisateur.</p>
    </div>
<?php
}


function createContent($page, $params = null)
{
    if ($params && is_array($params)) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
    }

    include "content/content_$page.php";
}


function connexionDb()
{
    return DbPDO::pdoConnexion();
}

function user_login($identifiant, $password)
{
    $con = connexionDb();
    $query = $con->prepare("SELECT * FROM `users` WHERE username= :identifiant and password= :password;");
    $query->execute(array(':identifiant' => $identifiant, ':password' => sha1($password)));
    $count = $query->rowCount();
    if ($count == 1) {
        session_start([
            'cookie_lifetime' => 86400,
        ]);
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["userId"] = $row["id"];
            $_SESSION["userUsername"] = $row["username"];
            $_SESSION["userEmail"] = $row["email"];
        }
    }
    return $count == 1;
}

function getAllBooks()
{
    $con = connexionDb();
    $query = $con->prepare("SELECT * FROM books");
    $query->execute();
    $rows = [];
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        array_push($rows, $row);
    }
    return $rows;
}

function getAllContacts()
{
    $con = connexionDb();
    $query = $con->prepare("SELECT * FROM contacts ORDER BY created_at DESC");
    $query->execute();
    $rows = [];
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        array_push($rows, $row);
    }
    return $rows;
}

function getContactById($id)
{
    $con = connexionDb();
    $query = $con->prepare("SELECT * FROM contacts WHERE id = :id");
    $query->execute(array(":id" => $id));
    $contact = $query->fetch(PDO::FETCH_ASSOC);
    return $contact;
}

function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
