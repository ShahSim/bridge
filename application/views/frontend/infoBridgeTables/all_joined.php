<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<table id="all_joined_dt_responsive" class="table nowrap w-100">
    <thead>
        <tr>
            <th>ID</th>
            <th>Bridge Name</th>
            <th>Division</th>
            <th>Road</th>
            <th>Road No</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Demand Letter</th>
            <th>BIWTA Clearance</th>
            <th>Google Map Link</th>
            <th>Checklist</th>
            <th>Topo Survey</th>
            <th>X Section</th>
            <th>Soil Test</th>
            <th>Pictures</th>
            <th>Existing Bridge Dimension</th>
            <th>Design</th>
            <th>E nothi sent</th>
            <th>E nothi approved</th>
            <th>Sent with covering letter</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all_joined as $key) : ?>
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
            <th>Bridge Name</th>
            <th>Division</th>
            <th>Road</th>
            <th>Road No</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Demand Letter</th>
            <th>BIWTA Clearance</th>
            <th>Google Map Link</th>
            <th>Checklist</th>
            <th>Topo Survey</th>
            <th>X Section</th>
            <th>Soil Test</th>
            <th>Pictures</th>
            <th>Existing Bridge Dimension</th>
            <th>Design</th>
            <th>E nothi sent</th>
            <th>E nothi approved</th>
            <th>Sent with covering letter</th>
            <th></th>
    </tfoot>
</table>