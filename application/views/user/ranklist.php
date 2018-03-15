<link href="<?php echo base_url(); ?>assets/css/ranklist.css" rel="stylesheet"">

<script src="/vyuh/assets/js/ranklist.js"></script>

<div class="container">
    <h3 class="ranklist">Score Board</h3>
    <hr>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-6 col-xs-12 panel-start panel-primary filterable">
            <div class="panel-heading">
                <h3 class="text-center panel-title">VYUH 2018</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="theader form-control text-center" placeholder="#" disabled></th>
                        <th><input type="text" class="theader form-control text-center" placeholder="Name" disabled></th>
                        <th><input type="text" class="theader form-control text-center" placeholder="College" disabled></th>
<!--                        <th><input type="text" class="form-control" placeholder="City" disabled></th>-->
                        <th><input type="text" class="theader form-control text-center" placeholder="Level" disabled></th>
                    </tr>
                </thead>
                <tbody>


                <?php $i=1; ?>
                <?php foreach ($ranklist as $ranklist_item): ?>
                    <tr class="trow">
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-center"><?php echo $ranklist_item['name']; ?></td>
                        <td class="text-center"><?php echo $ranklist_item['college']; ?></td>
<!--                        <td><?php echo $ranklist_item['city']; ?></td>-->
                        <td class="text-center"><?php echo $ranklist_item['level']; ?></td>
                    </tr>
                <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>