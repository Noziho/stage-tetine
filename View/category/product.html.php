<h1>Tétines personnalisées</h1>

<div id="category">
    <h3>Animaux</h3>
    <?php
    /* @var Product $product */

    use App\Model\Entity\Product;
    use App\Model\Manager\CategoryManager;

    ?>
    <img src="/public/assets/img/category/Animaux/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?=str_replace(' ', '', $product->getImage()) ?>.jpg" alt="">
    <h3>Disney</h3>
    <h3>Drapeaux</h3>
    <h3>Frère et Soeur</h3>
    <h3>Logo Divers</h3>
    <h3>Marques</h3>
    <h3>Marraine Parrain</h3>
    <h3>Message</h3>
    <h3>Parents</h3>
    <h3>Sport</h3>
</div>






