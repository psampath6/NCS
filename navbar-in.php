<?php

  if(!isset($_SESSION['SESSION_NKPUID']))
  {
    header("Location: login.php");
    exit;
  }


  $vsNkpUid = $_SESSION['SESSION_NKPUID'];

  $vsEmailid = $_SESSION['SESSION_EMAILID'];

  $vsFirstName = $_SESSION['SESSION_FIRSTNAME'];

  $vsLastName = $_SESSION['SESSION_LASTNAME'];

?>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="." >Northern California Systems</a>
          </div>

          <div class="collapse navbar-collapse navbar-ex1-collapse">

              <ul class="nav navbar-nav navbar-right">

                  <li><a href="search-property.php" class="NbSearch">Search Solutions</a></li>

                  <li><a href="post-property-ad.php" class="NbPostAd">Post Pods</a></li>

                  <li class="dropdown">
                      <a id="NbSettings" href="#" class="dropdown-toggle" data-toggle="dropdown"
                            title="<?php echo ucwords($vsFirstName); echo ' <' . strtolower($vsEmailid) . '>'; ?>">
                            <?php
                              // echo ucwords($vsFirstName);
                            ?>
                            Options / Settings
                           <b class="caret"></b>
                      </a>

                      <ul class="dropdown-menu">
                        <li><a href="user-dashboard.php" class="NbLogout-">Dashboard</a></li>
                        <li><a href="password-change.php" class="NbLogout-">Change Password</a></li>
                        <li><a href="user-details.php" class="NbLogout-">Edit User Details</a></li>
                        <li><a href="my-property-ad-list.php" class="NbPostAd-">Manage Posted Pod(s).</a></li>
                        <!--
                        <li><a href="user-dashboard.php" class="NbPostAd">Dashboard</a></li>
                        -->
                      </ul>

                  </li>

                  <li class="dropdown">
                      <a id="NbLogout" href="#" class="dropdown-toggle" data-toggle="dropdown"
                            title="<?php echo ucwords($vsFirstName) . ' ' . ucwords($vsLastName); echo ' <' . strtolower($vsEmailid) . '>'; ?>">
                            <?php
                              echo ucwords($vsFirstName) ;
                            ?>
                           <b class="caret"></b>
                      </a>

                      <ul class="dropdown-menu">
                        <li>
                          <a href="#" style="cursor: default;">
                            <?php
                            echo ucwords($vsFirstName) . ' ' . ucwords($vsLastName) ;
                            echo ' <br>' ;
                            echo strtolower($vsEmailid);
                            ?>
                            <br>
                            <span style="font-size:5px">-------------------------</span>
                          </a>
                        </li>
                        <li>
                          <a href="logout.php" class="NbLogout">
                            <b>Logout</b>
                          </a>
                        </li>
                      </ul>
                  </li>

<!--
        <li><a href="#" class="NbContact">Contact Us</a></li>
-->

              </ul>

          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
