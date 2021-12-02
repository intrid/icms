<p>Магазин:<?php echo $shops->name?> </p>
<p>Адрес:<?php echo $shops->address?> </p>
<table>
    <tr>
        <th>Название</th>
        <th>Характеристики</th>
        <th>Кол-во</th>
        <th>Ед. изм.</th>
    </tr>
    <?php foreach ($models as $model):?>
    <tr>
        <td><a href="<?=$model['url']?>"><?=$model['name']?></a></td>
        <td><?=$model['property']?></td>
        <td><?=$model['count']?></td>
        <td><?=$model['unit']?></td>
    </tr>
    <?php endforeach;?>
</table>