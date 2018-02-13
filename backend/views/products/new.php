<?php
if ($created)
    echo 'Товар добавлен. Добавляйте ещё:<br>';
?>
<form action="" method="post">

<label for="">
    Название <input type="text" name="Product[name]">
</label><br>
<label for="">
    Категория <input type="text" name="Product[category_id]">
</label><br>
<label for="">
    Код <input type="text" name="Product[code]">
</label><br>
<label for="">
    Цена <input type="text" name="Product[price]">
</label><br>
<label for="">
    Наличие <input type="text" name="Product[availability]">
</label><br>
<label for="">
    Бренд <input type="text" name="Product[brand]">
</label><br>

<input type="submit" value="Сохранить">
</form>