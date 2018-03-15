<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">


<div class="container" id="login">
  <div class="banner"></div>
  <div class="description">
    <div class='writeup' id='writeup1'></div>
    <!--<p>login with facebook to play</p>-->
    
    <a href='<?php echo $loginURL; ?>'><img style="width:200px;" class="login-button" src="<?php echo base_url(); ?>assets/images/fb.png"></a>
  </div>
<!--
<ul class="benefits">
  <li>
    <i class="fa fa-bolt" aria-hidden="true"></i>
    <p>fast</p>
  </li>
  <li>
    <i class="fa fa-users" aria-hidden="true"></i>
    <p>1 K+</p>
  </li>
  <li>
    <i class="fa fa-coffee" aria-hidden="true"></i>
    <p>4 days</p>
  </li>
  <li>
    <i class="fa fa-dollar" aria-hidden="true"></i>
    <p>10 K</p>
  </li>
</ul>
</div>-->


<script>
    new TypeIt('#writeup1', {
     strings: ["VYUH is back with a bang!", "VYUH is an Online Treasure Hunt", "Got the Guts.....?", "Come, Let's witness the Saga!"],
     speed: 60,
     breakLines: false,
     autoStart: false,
     loop: true,
     cursor: false
    });
</script>

</body>
</html>
