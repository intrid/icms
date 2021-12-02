<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <table border="0" cellpadding="0" cellspacing="0" style="margin: 0; padding: 0" width="100%">
            <tbody><tr>
                    <td>
                        <center style="max-width: 600px; width: 100%; margin: 0 auto" data-bind="1">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0; padding: 0;">
                                <tbody>
                                    
                                    <?= $content ?>
                                    
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
            </tbody></table>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


