<table class="table table-bordered" style="table-layout: auto">
    <tbody>
        <tr>
            <th style="width: 10px"></th>
            <th class="text-center"><span class="fa fa-eye"></span><br /> Просмотр</th>
            <th class="text-center"><span class="fa fa-plus"></span><br /> Добавление</th>
            <th class="text-center"><span class="fa fa-pencil"></span><br /> Редактирование</th>
            <?php if(Yii::$app->user->can('deleteUsers')):?>
            <th class="text-center"><span class="fa fa-trash"></span><br /> Удаление</th>
            <?php endif;?>
        </tr>
        <?php for ($i = 0; $i < count($table); $i++): ?>
            <tr>
                <td><?=$tableName[$i]?></td>
                <td><span class="input-group-addon"><input type="checkbox" value="1" name="Users[permision][view][<?=$table[$i]?>]" <?= $model->permision['permision']['view'][$table[$i]] ? "checked='checked'" : ''; ?>></span></td>
                <td><span class="input-group-addon"><input type="checkbox" value="1" name="Users[permision][create][<?=$table[$i]?>]" <?= $model->permision['permision']['create'][$table[$i]] ? "checked='checked'" : ''; ?>></span></td>
                <td><span class="input-group-addon"><input type="checkbox" value="1" name="Users[permision][update][<?=$table[$i]?>]" <?= $model->permision['permision']['update'][$table[$i]] ? "checked='checked'" : ''; ?>></span></td>

                <?php if(Yii::$app->user->can('deleteUsers')):?>
                <td><span class="input-group-addon"><input type="checkbox" value="1" name="Users[permision][delete][<?=$table[$i]?>]" <?= $model->permision['permision']['delete'][$table[$i]] ? "checked='checked'" : ''; ?>></span></td>
                <?php endif;?>
            </tr>
        <?php endfor; ?>
    </tbody></table>