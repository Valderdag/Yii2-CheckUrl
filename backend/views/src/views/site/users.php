<?php
$this->title = 'Users';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
    <body>
    <div class="container-fluid">
        <div class="row">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Register</th>
                    <th>Last vizit</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= date('d-m-Y', $user->created_at) ?></td>
                        <td><?= date('d-m-Y', $user->updated_at) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </body>
    </html>
<?php

