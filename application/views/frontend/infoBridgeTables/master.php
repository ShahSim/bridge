<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<table id="master_dt_responsive" class="table nowrap w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Bridge Name</th>
            <th>Division</th>
            <th>Road</th>
            <th>Road No</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($master as $key) : ?>
            <tr>
                <?php foreach ($key as $value):?>
                    <td class="align-middle"><?= $value?></td>
                <?php endforeach;?>
                <td  class="align-middle text-right">
                    <a href="<?= base_url('edit_bridge/').$key->id ?>" class="btn btn-sm btn-icon btn-success edit-modal"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a>
                    <button type="button" value="<?= $key->id ?>" class="btn btn-sm btn-icon btn-danger confirm-delete"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                </td>  
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Bridge Name</th>
            <th>Division</th>
            <th>Road</th>
            <th>Road No</th>
            <th></th>
        </tr>
    </tfoot>
</table>