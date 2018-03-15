<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<link href="http://localhost/vyuhcss/level.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="http://localhost/vyuhcss/ranklist.js"></script>
<script src="http://localhost/vyuhcss/level.js"></script>

<!-- Include the above in your HEAD tag -->

<div class="container">
    <h3>Manage Level</h3>
    <hr>
    <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        <span id="message">Invalid Details may lead to elimination from the Game! Details may be verified before Rewards.
        </span>
    </div>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Treasure Hunt 2018</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    <button id="add" class="btn btn-default btn-xs btn-add"><span class="glyphicon glyphicon-plus"></span> Add</button>
                    <button id="save" class="display-none btn btn-default btn-xs btn-save"><span class="glyphicon glyphicon-send"></span> Save</button>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" name="level_id" class="form-control" placeholder="Level ID" disabled></th>
                        <th><input type="text" name="serial_number" class="form-control" placeholder="Serial Number" disabled></th>
                        <th><input type="text" name="question" class="form-control" placeholder="Question" disabled></th>
                        <th><input type="text" name="answer" class="form-control" placeholder="Answer" disabled></th>
                        <th><input type="text" name="active" class="form-control" placeholder="Active" disabled></th>
                        <th><input type="text" name="type" class="form-control" placeholder="Type" disabled></th>
                        <th><input type="text" name="hint" class="form-control" placeholder="Hint" disabled></th>
                        <th><input type="text" name="hint_status" class="form-control" placeholder="Hint Status" disabled></th>
                    </tr>
                </thead>
                <tbody>


                <?php $i=1; ?>
                <?php foreach ($levelData_admin as $level): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $level['level_no']; ?></td>
                        <td><?php echo $level['question']; ?></td>
                        <td><?php echo $level['answer']; ?></td>
                        <td><?php echo $level['active']; ?></td>
                        <td><?php echo $level['type']; ?></td>
                        <!--<td><?php echo @$level['hint']; ?></td>-->
                        <!--<td><?php echo @$level['hint_status']; ?></td>-->
                        <td><span style="padding-right: 30px;" class="glyphicon glyphicon-eye-open"></span><span class="glyphicon glyphicon-plus"></span></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
