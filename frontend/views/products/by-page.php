<ul>
<?php foreach($products as $prod) : ?>
    <li><a href="/?r=product/view&id=<?= $prod->id ?>"><?= $prod->name ?></a></li>
<?php endforeach; ?>
</ul>

Страница: <?= $page ?>

<div class="pagination">
<?php for($i = 1; $i <= $pageCount; $i++) : ?>
    <?php if ($i == $page) : ?> 
        <span class="current"><?= $i ?></span>
    <?php else: ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>
</div>