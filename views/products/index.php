<h1>Все товары</h1>

<form action="" method="POST">
    <label>Название:
        <input type="text" name="Product[name]">
    </label>
    <label>Бренд:
        <input type="text" name="Product[brand]">
    </label>
    <input type="submit">
</form>

<table>
<?php foreach($products as $prod) : ?>
    <tr>
        <td><?= $prod->id ?></td>
        <td>
            <a href="/?r=product/view&id=<?= $prod->id ?>"><?= $prod->name ?></a>
        </td>
        <td><?= $prod->brand ?></td>
        <td><?= $prod->price ?></td>
        <td><?= $prod->availability ?></td>
    </tr>
<?php endforeach; ?>
</table>