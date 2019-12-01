<?php
$books = getAllBooks();
if (count($books) == 0) {
    ?>
    <div class="prestation-row mt-5 mb-5">
        Aucun livre disponible
    </div>
<?php
}
foreach ($books as $book) {
    ?>
    <div class="gallery">

        <img src="assets/img/<?= $book["imgPath"] ?>" alt="" width="600" height="400">

        <div class="desc"><?= $book["title"] ?></div>
    </div>

<?php
}
?>
<div style="height:700px;">
</div>
</div>