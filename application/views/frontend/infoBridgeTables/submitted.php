<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<table id="submitted_dt_responsive" class="table nowrap w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Demand Letter</th>
            <th>BIWTA Clearance</th>
            <th>Google Map Link</th>
            <th>Checklist</th>
            <th>Topo Survey</th>
            <th>X Section</th>
            <th>Soil Test</th>
            <th>Pictures</th>
            <th>Existing Bridge Dimension</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($submitted as $key) : ?>
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
            <th>Demand Letter</th>
            <th>BIWTA Clearance</th>
            <th>Google Map Link</th>
            <th>Checklist</th>
            <th>Topo Survey</th>
            <th>X Section</th>
            <th>Soil Test</th>
            <th>Pictures</th>
            <th>Existing Bridge Dimension</th>
            <th></th>
        </tr>
    </tfoot>
</table>