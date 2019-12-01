<?php
if (session_status() == PHP_SESSION_NONE) {
    session_name("ClubStephenKing");
    session_start();
}
if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] !== true) {
    header('Location: /connexion.php');
    exit;
}
$page = '';
$title = 'Edition';
require "requires/functions.php";
include "includes/head.php";
$id = (isset($_GET["id"]) && !empty($_GET["id"])) ? $_GET["id"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (isset($_POST["id"]) && !empty($_POST["id"])) ? $_POST["id"] : null;
}
$contact = getContactById($id);
$date_created = $contact["created_at"];
$dateCreated = new DateTime($date_created);
createHeader($page); ?>
<div class="container">
    <div class="row mt-3">
        <h3 class="col-12 text-center">Voir les détails du mail</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <div class="jumbotron">
                <h1 class="display-4"><?= $contact["mail"] ?></h1>
                <p class="lead"><?= $contact["content"] ?></p>
                <hr class="my-4">
                <p><?= $contact["fname"] ?>  <?= $contact["lname"] ?> Envoyé le <?= $dateCreated->format('d/m/Y'); ?> à <?= $dateCreated->format('H:i'); ?></p>
                <a class="btn btn-primary btn-lg" href="admin.php" role="button">Retour</a>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php"; ?>