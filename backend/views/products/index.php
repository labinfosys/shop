<h1>Все товары</h1>

<table>
<?php foreach($products as $prod) : ?>
    <tr>
        <td><?= $prod->id ?></td>
        <td>
            <a href="/?r=product/edit&id=<?= $prod->id ?>"><?= $prod->name ?></a>
        </td>
        <td><?= $prod->brand ?></td>
        <td><?= $prod->price ?></td>
        <td><?= $prod->availability ?></td>
    </tr>
<?php endforeach; ?>
</table>

<a href="?r=product/new">Создать товар</a>