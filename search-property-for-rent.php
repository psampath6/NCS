<?php
  session_start();
/*
  $_SESSION = array();
  session_destroy();
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>Search Property-for-Rent <?php include ('title-tag.php'); ?></title>

  <?php
    include ('head-tag.php');
  ?>

<script type="text/javascript" >
jQuery(function($) {
      $('#RentSearchPriceMin').autoNumeric('init', {vMin: '0', vMax: '9999999999', aPad: false});
      $('#RentSearchPriceMax').autoNumeric('init', {vMin: '0', vMax: '99999999999', aPad: false});
  });
</script>

<script type="text/javascript" >

var SearchRentSubmitted = 0;
function SearchRentSubmitOnce()
{
   if(!SearchRentSubmitted)
   {
      SearchRentSubmitted ++;
      document.SearchRentForm.SearchRentSubmit.value = 'Searching, Please Wait...';
      $('#SearchingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

</script>

</head>

<body>

  <?php
    if  (isset($_SESSION['SESSION_NKPUID'])) {
      include ('navbar-in.php'); }
    else {
      include ('navbar.php'); }
  ?>

    <div class="section-colored  center-block text-left ">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Search Property-for-Rent</h2>

                    <hr>

                    <form class="form" id="SearchRentForm" name="SearchRentForm"
                                method="post" action="search-property-for-rent-results.php"
                                onsubmit="return SearchRentSubmitOnce(); " >

                      <div class="form-group center-block">
                          <label for="" style="padding: 0px 0px 0px 15px">Location / Place of Property :</label>
                          <div class="input-group input-group-lg">
                             <span class="input-group-addon ">
                              <div class=" text-left " style="font-size:18px" >
                                  <select id="SearchRentPlace" name="SearchRentPlace" class="" style="cursor:pointer" >
                                    <?php
                                      include ('places.php');
                                    ?>
                                  </select>
                              </div>
                            </span>
                            <span class="input-group-addon "></span>
                          </div>
                      </div>

                      <hr>

                      <div class="form-group ">
                          <label for="" style="padding: 0px 0px 0px 15px">Advertisement Posted By :</label>
                          <div class="input-group input-group-lg center-block " >
                             <span class="input-group-addon " >
                              <div class=" text-left " style="font-size:17px" >
                                <input type="checkbox" id="owner" name="SearchRentUserType[0]" value="O"  style="cursor:pointer;" checked  >
                                <label for="owner" style="cursor:pointer;">Owners</label>
                                <br>
                                <input type="checkbox" id="agent" name="SearchRentUserType[2]" value="A" style="cursor:pointer;" checked >
                                <label for="agent" style="cursor:pointer;">Agents / Brokers</label>
                              </div>
                            </span>
                            <span class="input-group-addon "></span>
                          </div>
                      </div>

                      <hr>

                      <div class="form-group ">
                          <label for="" style="padding: 0px 0px 0px 15px">Type of Property :</label>
                          <div class="input-group input-group-lg ">
                            <span class="input-group-addon " >
                              <div class=" text-left "  style="font-size:15px" >
                                <input type="radio" id="SearchRentPT1" name="SearchRentPropertyType" value="1" style="cursor:pointer;" checked required >
                                <label for="SearchRentPT1" style="cursor:pointer;">Residential Houses / Bungalows / Villas</label>
                                <br>
                                <input type="radio" id="SearchRentPT2" name="SearchRentPropertyType" value="2"  style="cursor:pointer;" required >
                                <label for="SearchRentPT2" style="cursor:pointer;">Multi-Storey Apartments / Flats</label>
                                <br>
                                <input type="radio" id="SearchRentPT3" name="SearchRentPropertyType" value="3"  style="cursor:pointer;"  required >
                                <label for="SearchRentPT3" style="cursor:pointer;">Commercial Buildings / Office Spaces</label>
                              </div>
                            </span>
                            <span class="input-group-addon "></span>
                          </div>
                      </div>

                        <hr>

                        <div id="1" class="form-group hdv">
                            <label for="" style="padding: 0px 0px 0px 15px">No. of Bed-Room(s) in Houses / Bungalows / Villas :</label>
                            <div class="input-group input-group-lg ">
                              <span class="input-group-addon " >
                                <div class=" text-left " style="font-size:17px" >
                                  <select id="SearchRentBedroomT1" name="SearchRentBedroomT1" class="" style="cursor:pointer" >
                                    <option value="0" selected>&nbsp;All &nbsp;BHK(s) </option>
                                    <option value="1">&nbsp; 1 &nbsp;(BHK)</option>
                                    <option value="2">&nbsp; 2 &nbsp;(BHK)</option>
                                    <option value="3">&nbsp; 3 &nbsp;(BHK)</option>
                                    <option value="4">&nbsp; 4 &nbsp;(BHK)</option>
                                    <option value="5">&nbsp; 5 &nbsp;(BHK)</option>
                                    <option value="6">&nbsp; 6 &nbsp;(BHK)</option>
                                    <option value="7">&nbsp; 7 &nbsp;(BHK)</option>
                                    <option value="8">&nbsp; 8 &nbsp;(BHK)</option>
                                    <option value="9">&nbsp; 9 &nbsp;(BHK)</option>
                                    <option value="+">10+&nbsp;(BHK)</option>
                                  </select>
                                </div>
                              </span>
                            <span class="input-group-addon "></span>
                            </div>
                          <hr>
                        </div>

                        <div id="2" class="form-group hdv">
                            <label for="" style="padding: 0px 0px 0px 15px">No. of Bed-Room(s) in Apartments / Flats :</label>
                            <div class="input-group input-group-lg ">
                              <span class="input-group-addon " >
                                <div class=" text-left " style="font-size:17px" >
                                  <select id="SearchRentBedroomT2" name="SearchRentBedroomT2" class="" style="cursor:pointer" >
                                    <option value="0" selected>&nbsp;All &nbsp;BHK(s) </option>
                                    <option value="1">&nbsp; 1 &nbsp;(BHK)</option>
                                    <option value="2">&nbsp; 2 &nbsp;(BHK)</option>
                                    <option value="3">&nbsp; 3 &nbsp;(BHK)</option>
                                    <option value="4">&nbsp; 4 &nbsp;(BHK)</option>
                                    <option value="5">&nbsp; 5 &nbsp;(BHK)</option>
                                    <option value="6">&nbsp; 6 &nbsp;(BHK)</option>
                                    <option value="7">&nbsp; 7 &nbsp;(BHK)</option>
                                    <option value="8">&nbsp; 8 &nbsp;(BHK)</option>
                                    <option value="9">&nbsp; 9 &nbsp;(BHK)</option>
                                    <option value="+">10+&nbsp;(BHK)</option>
                                  </select>
                                </div>
                              </span>
                            <span class="input-group-addon "></span>
                            </div>
                          <hr>
                        </div>

                        <script>
                        $(document).ready(function() {
                              $("#2").hide();
                            $("input[name$='SearchRentPropertyType']").click(function() {
                                var test = $(this).val();
                                $("div.hdv").hide();
                                $("#" + test).show();
                            });
                        });
                        </script>

<!--
                        <div class="form-group ">
                            <label for="" style="padding: 0px 0px 0px 15px">Min. &amp; Max Price of Property :</label>
                            <div class="input-group">
                              <span class="input-group-addon ">$.</span>
                              <input type="text" id="RentSearchPriceMin" name="RentSearchPriceMin" maxlength="20" title="Min. Price"
                                   class="form-control input-lg " placeholder=" Min. Price "  data-d-group="2"  >
                              <span class="input-group-addon ">$.</span>
                              <input type="text" id="RentSearchPriceMax" name="RentSearchPriceMax" maxlength="20" title="Max. Price"
                                   class="form-control input-lg " placeholder=" Max. Price "  data-d-group="2"  >
                             </div>
                        </div>
                        <hr>
-->

                        <div class="form-group ">
                            <label for="" style="padding: 0px 0px 0px 15px">Minimum Price of Property :</label>
                            <div class="input-group">
                              <span class="input-group-addon ">$.</span>
                              <input type="text" id="RentSearchPriceMin" name="RentSearchPriceMin" maxlength="20" title="Min. Price"
                                   class="form-control input-lg " placeholder=" Min. Price "  data-d-group="2"  >
                             </div>
                             <br>
                            <label for="" style="padding: 0px 0px 0px 15px">Maximum Price of Property :</label>
                            <div class="input-group">
                              <span class="input-group-addon ">$.</span>
                              <input type="text" id="RentSearchPriceMax" name="RentSearchPriceMax" maxlength="20" title="Max. Price"
                                   class="form-control input-lg " placeholder=" Max. Price "  data-d-group="2"  >
                             </div>
                        </div>

                        <hr>

                        <br>


<!--
                        <div id="spincenter">
                          <div id="spin"></div>
                        </div>

                        onclick="window.history.back()"

-->

                        <div class="form-group">
                            <input type="hidden" name="SearchRentHidden" value="TRUE" >
                            <div id="" class="btnbgc">
                              <input type="submit" class="btn btn-danger btn-lg btn-block"
                                  name="SearchRentSubmit" value="Search Properties" style="color:" >
                            </div>
                        </div>

                    </form>

                    <hr>

                    <br>

                    <div class="btnbgc">
                      <a href="search-property.php" class="btn btn-warning btn-lg btn-block" style="color:black" >
                        Click to Go Back
                      </a>
                    </div>


                    <hr>

                    <br>
                    <br>

                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->


    <?php
      include ('modal-spin.php');
    ?>


  <?php
    include ('footer.php');
  ?>

</body>

</html>
