<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<table id="google_map_link_dt_responsive" class="table nowrap w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($google_map_link as $key) : ?>
            <tr>
                <?php foreach ($key as $value):?>
                    <td class="align-middle"><?= $value?></td>
                <?php endforeach;?> 
                <td  class="align-middle text-right">
                    <a href="<?= base_url('edit_bridge/').$key->id ?>" class="btn btn-sm btn-icon btn-success edit-modal"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th></th>
        </tr>
    </tfoot>
</table>