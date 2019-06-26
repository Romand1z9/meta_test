<a href="/admin/logout" class="btn btn-lg btn-danger admin-logout"><?=lang('admin.logout_button_title');?></a>
<?php if (!empty($users)): ?>
    <br><br><h3 align="center"><?=lang('admin.registered_users');?></h3><br>

    <table class="table table-bordered table-users">
        <thead>
            <tr>
            <?php if (!empty($columns_table)):?>
                <?php foreach ($columns_table as $column):?>
                    <th><?=lang('user.'.$column);?></th>
                <?php endforeach;?>
            <?php endif;?>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $user):?>
            <tr>
            <?php if (!empty($columns_table)):?>
                <?php foreach ($columns_table as $column): ?>
                    <?php if(!empty($user[$column])): ?>
                        <td><?=$user[$column];?></td>
                    <?php else:?>
                        <td> - </td>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <br>
    <a href="/app/storage/users.csv" class="btn btn-lg btn-info download-csv"><?=lang('admin.download_users_list');?></a>
<?php else: ?>
    <br><br><h3 align="center"><?=lang('admin.no_users');?></h3>
<?php endif;?>