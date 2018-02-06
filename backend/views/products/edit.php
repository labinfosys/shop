<?php

// var_dump($product);

?>

<form action="" method="post">

<label for="">
    Название <input type="text" name="Product[name]" value="<?= $product->name ?>">
</label><br>
<label for="">
    Категория <input type="text" name="Product[category_id]" value="<?= $product->category_id?>">
</label><br>
<label for="">
    Код <input type="text" name="Product[code]" value="<?= $product->code ?>">
</label><br>
<label for="">
    Цена <input type="text" name="Product[price]" value="<?= $product->price ?>">
</label><br>

<input type="submit" value="Сохранить">
</form>