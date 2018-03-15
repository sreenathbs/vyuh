<link href="<?php echo base_url(); ?>assets/css/proximity.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/css/ranklist.css" rel="stylesheet"">

<!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/sb/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">
    <h3 class="ranklist">Proxi Meter</h3>
    <hr>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-6 col-xs-12 panel-start panel-primary filterable">

<div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fas fa-dollar-sign"></i>
        <span id="message">Updated Coin Balance : <?php echo $this->session->userdata('coins'); ?>
        </span>
</div>
            
<div class="wrapper-p">
  <div class="green-p">
    <div class="progress-p">
      <div class="inner-p">
        <div class="percent-p"><span><?php echo $percentage; ?></span>%</div>
        <div class="water-p"></div>
        <div class="glare-p"></div>
      </div>
    </div>
  </div>
</div>
    
<link href="<?php echo base_url(); ?>assets/css/game.css" rel="stylesheet">


<div style="padding-top: 30px;" class="ansform wrap">
  <form class="form" action="answer" method="post">
    <div class="non-pm"><input style="color: black;" class="input" name="answer" type="text" placeholder="Enter your answer..." required>
        <button class="button" name="submit" value="0" type="submit">Submit</button>
    </div>
    <?php if ($this->session->userdata('coins') >= 10) {echo '<button class="pm button" name="submit" value="1" type="submit">Use Proxi Meter</button>';} ?>
  </form>
</div>

</div></div></div>

        
<script>
var colorInc = 100 / 3;

$(function()
{

  $(document).ready(function()
  {
    var val = <?php echo $percentage; ?>;
    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box").val(0);
        $(".progress .percent").text(0 + "%");
      }
      else $(".progress .percent").text(valOrig + "%");
      
      $(".progress").parent().removeClass();
      $(".progress .water").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $(".progress").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $(".progress").parent().addClass("orange");
      else
        $(".progress").parent().addClass("green");
    }
    else
    {
      $(".progress").parent().removeClass();
      $(".progress").parent().addClass("green");
      $(".progress .water").css("top", 100 - 67 + "%");
      $(".progress .percent").text(67 + "%");
      $("#percent-box").val("");
    }
  });
});
</script>