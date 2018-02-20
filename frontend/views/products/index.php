<?php
use \common\helpers\Url;
?>

<?php include 'categories.php' ?>

<h1>Все товары</h1>
<form action="" method="POST">
    <label>Название:
        <?php $value = isset($_POST['Product']['name']) ? $_POST['Product']['name'] : '' ?>
        <input type="text" name="Product[name]" value="<?= $value ?>">
    </label>
    <div>Бренд:
        <ul>
            <?php foreach($brands as $brand) : ?>
                <li>
                    <?php 
                        $checked = '';
                        if (isset($_POST['Product']['brand']) && array_search($brand->name, $_POST['Product']['brand']) !== false) {
                            $checked = ' checked';
                        }
                    ?>
                    <label><input 
                                type="checkbox" 
                                name="Product[brand][]" 
                                value="<?= $brand->name ?>"<?= $checked ?>>
                        <?= $brand->name ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- <input type="text" name="Product[brand]"> -->
    </div>
    <input type="submit">
</form>

<table>
<?php foreach($products as $prod) : ?>
    <tr>
        <td><?= $prod->id ?></td>
        <td>
            <a href="<?= Url::to('product/view', ['id' => $prod->id]) ?>"><?= $prod->name ?></a>
        </td>
        <td><?= $prod->brand ?></td>
        <td><?= $prod->price ?></td>
        <td><?= $prod->availability ?></td>
    </tr>
<?php endforeach; ?>
</table>