<?php $emails = getAllContacts(); ?>

<header class="container-fluid">
    <div class="row connexion">
        <div class="col-12 col-sm-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Consulter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($emails as $email) {
                        $date_created = $email["created_at"];
                        $dateCreated = new DateTime($date_created);
                        ?>
                    <tr>
                        <td><?= $email["mail"] ?></td>
                        <td>Envoyé le <?= $dateCreated->format('d/m/Y'); ?> à <?= $dateCreated->format('H:i'); ?></td>
                        <td><a href="/mail.php?id=<?= $email["id"]; ?>">
                                        Consulter
                                    </button>
                                </a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</header>
<div style="height:50px;"></div>
