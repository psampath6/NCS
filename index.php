<?php
/*
** Copyright (c) 2021 NSD
**
** Name: index.php
**
** Author: Pradeep Sampath ( pradeepsampath@gmail.com )
**         Mar 2021
*/
?>

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include ('head-tag.php');
?>

<title>NCD - Northern California Dashboard </title>
<style>
  .indexlinks
  {
    border: 2px  solid;
    border-radius: .5em;
    background-color: #EEEEEE;
    padding: 20px 20px 20px 20px;
    /*
    */
  }
</style>

</head>

<body>

  <?php
    if  (isset($_SESSION['SESSION_NKPUID'])) {
      include ('navbar-in.php'); }
    else {
      include ('navbar.php'); }
  ?>

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>


        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <div class="fill" style="background-image:url('img/NCS-1.png');"></div>

                <!--
                <div class="carousel-caption">
                    <h1>Northern California Properties</h1>
                </div>
                -->
            </div>


            <div class="item">
                <div class="fill" style="background-image:url('img/NCS-2.png');"></div>

                <!--
                <div class="carousel-caption">
                    <h1>Northern California Properties</h1>
                </div>
                -->
            </div>

            <div class="item">
                <div class="fill" style="background-image:url('img/NCS-3.png');"></div>

                <!--
                <div class="carousel-caption">
                    <h1><span style="color:black">Northern California Properties</span></h1>
                </div>
                -->
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
        <!-- /. Controls -->

    </div>

    <div class="section-colored text-center"  style="padding: 20px;">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12">
                    <span class="text-center" style="font-size:36px"><b>Northern California Systems (NCS)</b></span>

                    <p class="text-center">A complete Website for Data center Networking Solutions.</p>
                    <!--
                    <p class="text-center">A complete Real-Estate / Property Website Portal to cater to the needs of People of Northern California Region.</p>
                    -->
                </div>
            </div>
            <!-- /.row <hr> -->

                <div class="col-lg-6 col-md-6">
                  <a href="search-property.php">
                    <h2 class="indexlinks" >
                      <i class="fa fa-check-circle"></i>
                        Search a Solution.
                    </h2>
                  </a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <a href="post-property-ad.php">
                      <h2 class="indexlinks" >
												<i class="fa fa-check-circle"></i>
                        Post a Pod.
                      </h2>
                    </a>
                </div>
								<div class="col-lg-6 col-md-6">
										<a href="post-property-ad.php">
											<h2 class="indexlinks" >
												<i class="fa fa-check-circle"></i>
												About
											</h2>
										</a>
								</div>

        </div>

        <hr>
        <!-- /.container -->
    </div>
    <!-- /.section-colored -->

<?php
	   include ('footer.php');
?>
</body>

</html>
