<?php require_once('./config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/half-slider.css" rel="stylesheet">
<style>
  
  #header{
    height:70vh;
    width:calc(100%);
    position:relative;
    top:-1em;
  }
  #header:before{
    content:"";
    position:absolute;
    height:calc(100%);
    width:calc(100%);
    background-image:url(<?= validate_image($_settings->info("cover")) ?>);
    background-size:cover;
    background-repeat:no-repeat;
    background-position: center center;
  }
  #header>div{
    position:absolute;
    height:calc(100%);
    width:calc(100%);
    z-index:2;
  }

  body {
    font-size: 5rem;
  }
  #top-Nav a.nav-link.active {
      color: #343a40;
      font-weight: 900;
      position: relative;
  }
  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #343a40;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
  }
  @media (max-width:760px){
    #top-Nav a.nav-link.active {
      background: #343a40db;
      color: #fff;
    }
    #top-Nav a.nav-link.active:before {
      content: "";
      position: absolute;
      border-bottom: 2px solid #343a40;
      width: 100%;
      left: 0;
      bottom: 0;
    }

  }
</style>
<?php require_once('inc/header.php') ?>
  <body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">
    <div class="wrapper">
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
     <?php require_once('inc/topBarNav.php') ?>
     <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
      <?php endif;?>    
      <div class="content-wrapper pt-5" style="">
        <?php if($page == "home" || $page == "about"): ?>
          <!-- Content Wrapper. Contains page content -->
          <!-- Half Page Image Background Carousel Header -->
          <header id="myCarousel" class="carousel slide shadow mb-4" style="height: 550px; ">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for Slides -->
              <div class="carousel-inner">
                
                  <div class="item active">
                      <!-- Set the second background image using inline CSS below. -->
                      <div class="fill" style="background-image:url('img/5.jpg');"></div>
                      <!--
                      <div class="carousel-caption" style="padding-bottom: 250px;">
                        <h2 style="font-size: 2rem;"> DEPARTMENT DOCUMENT MANAGEMENT SYSTEM
                        </h2>
                        <h5>Fast and Reliable</h5>
                      </div> -->
                  </div>
                  
                  <div class="item ">
                      <!-- Set the second background image using inline CSS below. -->
                      <div class="fill" style="background-image:url('img/4.jpg');"></div>
                      <!--
                      <div class="carousel-caption" style="padding-bottom: 250px;">
                        <h2 style="font-size: 2rem;"> DEPARTMENT DOCUMENT MANAGEMENT SYSTEM
                        </h2>
                        <h5>Fast and Reliable</h5>
                      </div> -->
                  </div>
                  <div class="item ">
                      <!-- Set the second background image using inline CSS below. -->
                      <div class="fill" style="background-image:url('img/9.jpg');"></div>
                      <!--
                      <div class="carousel-caption" style="padding-bottom: 250px;">
                        <h2 > DEPARTMENT DOCUMENT MANAGEMENT SYSTEM
                        </h2>
                        <h5>Fast and Reliable</h5>
                      </div> -->
                  </div>
                  <div class="item ">
                      <!-- Set the second background image using inline CSS below. -->
                      <div class="fill" style="background-image:url('img/11.jpg');"></div>
                      <!--
                      <div class="carousel-caption" style="padding-bottom: 250px;">
                        <h2 style="font-size: 2rem;"> DEPARTMENT DOCUMENT MANAGEMENT SYSTEM
                        </h2>
                        <h5>Fast and Reliable</h5>
                      </div> -->
                  </div>
                  
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="icon-next"></span>
              </a>

          </header>
        <?php endif; ?>

        <!-- Main content -->
        <section class="content ">
          <div class="container">
            <?php 
              if(!file_exists($page.".php") && !is_dir($page)){
                  include '404.html';
              }else{
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';

              }
            ?>
          </div>
        </section>
        <!-- /.content -->
  <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-header rounded-0">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body rounded-0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade rounded-0" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header rounded-0">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body rounded-0">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header rounded-0">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body rounded-0">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>
                    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>
  </body>
</html>
