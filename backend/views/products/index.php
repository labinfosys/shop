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
        <td><a class="btn-delete" href="?r=product/delete&id=<?= $prod->id ?>">Удалить</a></td>
    </tr>
<?php endforeach; ?>
</table>

<a href="?r=product/new">Создать товар</a>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     var btns = document.querySelectorAll('.btn-delete');
    //     for (var i = 0; i < btns.length; i++) {
    //         btns[i].addEventListener('click', function(e) {
    //             if (!confirm('Удалить товар?'))
    //                 e.preventDefault();
    //         });
    //     }
    // });
</script>