<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="./">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30"  class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item"><a class='btn btn-dark' style='font-size: 12px;' aria-current="page" href="./">Home</a></li>
                    </ul>
                </div>
                <?php 
                    if (isset($_SESSION['userdata'])) {
                    echo "<div class='d-inline-block align-center' style='padding-left: 75px; padding-right: 75px; margin-right: 10px; font-size: 20px;'><p> We welcome you  <b>". $_SESSION['userdata'] ."</b>  to our Tutor booking web application!</p></div>";
                    }
                ?>

                <?php
                  if (isset($_SESSION['userdata'])) {
                  echo "<div class='card' style='width: 3.3rem; height: 2.8rem; margin-right: 0px;'>
			                <img src='uploads/user-profile-picture.jpg' class='card-img-top' alt='admin image'>
                    </div>
			              <div class='card-body text-left' style='margin-left: 0px;'>
			                <h5 class='card-title' style='font-size: 12px; margin-left: 0px; padding-left: 0px;'>".$_SESSION['userdata']."</h5>
                    </div>
                    <div class='card-body text-right'> 
			                <a href='logout.php' class='btn btn-dark' style='font-size: 12px;'>Logout</a>
			              </div>";
                  }
                ?>
            </div>
        </nav>
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>