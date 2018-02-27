<?php
use common\helpers\Url;
// 1. вывести категории в виде списка <ul>
// 2. У каждой категории должна быть ссылка /product/category/#id
// var_dump($categories);
?>
<ul>
<?php foreach($categories as $cat) : ?>
    <li><a href="<?= Url::to('product/index', [$catId => $cat->id]) ?>"><?= $cat->name ?></a></li>
<?php endforeach; ?>
</ul>