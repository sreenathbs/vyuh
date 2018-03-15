<link href="/vyuh/assets/css/profile.css" rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<div class="container">
  <div class="row">
      
    <!-- edit form column -->
    <div class="col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-6 col-xs-12 personal-info">
      <div class="hidden-xs alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        <span id="message">Invalid Details may lead to elimination from the Game! Details may be verified before Rewards.
        </span>
      </div>

      <h3 class="profile-title">Personal info</h3>
      <form id="profile_form" class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name: </label>
          <div class="col-lg-8">
            <input class="form-control" name="name" value="<?php echo @$name ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Gender:</label>
          <div class="col-md-8">
            <input class="form-control" name="gender"value="Male" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email Id:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" value="<?php echo @$email ?>" type="text" disabled>
          </div>
        </div>
<!--        <div class="form-group">
          <label class="col-lg-3 control-label">Mobile No:</label>
          <div class="col-lg-8">
            <input class="form-control" name="mobile" value="<?php echo @$mobile ?>" type="text" disabled>
          </div>
        </div>-->
<!--        <div class="form-group">
          <label class="col-md-3 control-label">Semester:</label>
          <div class="col-md-8">
            <input class="form-control" name="semester" value="<?php echo @$semester ?>" type="number" disabled>
          </div>
        </div>-->
<!--        <div class="form-group">
          <label class="col-lg-3 control-label">Department:</label>
          <div class="col-lg-8">
            <input class="form-control" name="branch" value="<?php echo @$branch ?>" type="text" disabled>
          </div>
        </div>-->
<!--        <div class="form-group">
          <label class="col-lg-3 control-label">College:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_time_zone" name="college" class="form-control" disabled>
                <option>College 1</option>
                <option>College 2</option>
                <option>College 3</option>
                <option>College 4</option>
                <option>College 5</option>
                <option value="<?php echo @$college ?>" selected="selected">College 6</option>
                <option>College 7</option>
                <option>College 8</option>
              </select>
            </div>
          </div>
        </div>-->
        <div class="form-group">
          <label class="col-lg-3 control-label">College/Work:</label>
          <div class="col-lg-8">
            <input class="form-control" name="college" value="<?php echo @$mobile ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">City:</label>
          <div class="col-md-8">
            <input class="form-control" name="city" value="<?php echo @$city ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8">
            <input id="edit" class="btn btn-primary" value="Edit" type="button">
            <input id="save" class="display-profile btn btn-primary" value="Submit" type="button">
            <!-- <span></span> -->
            <input id="cancel" class="display-profile btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
    <div class="visible-xs alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        <span id="message">Invalid Details may lead to elimination from the Game!
        </span>
    </div>
</div>


<script src="/vyuh/assets/js/profile.js"></script>