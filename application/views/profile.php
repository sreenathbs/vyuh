<html><head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="/vyuh/assets/css/profile.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="/vyuh/assets/js/profile.js"></script>

<!-- Include the above in your HEAD tag -->
</head>

<body>

<div class="container" style="padding-top: 5px;">
  <h1 class="page-header">Profile</h1>
  <div class="row">
      
    <!-- edit form column -->
    <div class="col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        <span id="message">Invalid Details may lead to elimination from the Game! Details may be verified before Rewards.
        </span>
      </div>

      <h3>Personal info</h3>
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
        <div class="form-group">
          <label class="col-lg-3 control-label">Mobile No:</label>
          <div class="col-lg-8">
            <input class="form-control" name="mobile" value="<?php echo @$mobile ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Semester:</label>
          <div class="col-md-8">
            <input class="form-control" name="semester" value="<?php echo @$semester ?>" type="number" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Department:</label>
          <div class="col-lg-8">
            <input class="form-control" name="branch" value="<?php echo @$branch ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">College:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_time_zone" name="college" class="form-control" disabled>
                <option value="Hawaii">(GMT-10:00) Hawaii</option>
                <option value="Alaska">(GMT-09:00) Alaska</option>
                <option value="Pacific Time (US & Canada)">(GMT-08:00) Pacific Time (US & Canada)</option>
                <option value="Arizona">(GMT-07:00) Arizona</option>
                <option value="Mountain Time (US & Canada)">(GMT-07:00) Mountain Time (US & Canada)</option>
                <option value="<?php echo @$college ?>" selected="selected">(GMT-06:00) Central Time (US & Canada)</option>
                <option value="Eastern Time (US & Canada)">(GMT-05:00) Eastern Time (US & Canada)</option>
                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">City:</label>
          <div class="col-md-8">
            <input class="form-control" name="city" value="<?php echo @$city ?>" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
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
</div>


</body>
</html>