<?php
use yii\widgets\LinkPager;

$this->title = 'Check Info';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
    <body>
    <div class="container-fluid">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Время создания</th>
                    <th>Адрес</th>
                    <th>Код сервера</th>
                    <th>Номер попытки</th>
                    <th>Задержка в секундах</th>
                </tr>
                <?php foreach ($infos as $info) { ?>
                    <tr>
                        <td><?= $info->date ?></td>
                        <td><?= $info->url ?></td>
                        <td><?= $info->status ?></td>
                        <td><?= $info->attempt ?></td>
                        <td><?= $info->delay ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        </div>
    </body>
    </html>
<?php

