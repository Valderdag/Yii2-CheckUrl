<?php
$this->title = 'Checked Links';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
    <body>
    <div class="container-fluid">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Проверенные адреса</th>
                </tr>
                <?php foreach ($checked as $check) { ?>
                    <tr>
                        <td><a href="index.php?r=site/checkinfo&url=<?= $check->url ?> " ><?= $check->url ?></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </body>
    </html>
<?php

