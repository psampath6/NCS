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

<title>Search Property-for-Sale <?php include ('title-tag.php'); ?></title>

  <?php
    include ('head-tag.php');
  ?>


<script type="text/javascript" >
jQuery(function($) {
      $('#SaleSearchPriceMin').autoNumeric('init', {vMin: '0', vMax: '9999999999', aPad: false});
      $('#SaleSearchPriceMax').autoNumeric('init', {vMin: '0', vMax: '99999999999', aPad: false});
  });
</script>

<script type="text/javascript" >

var SearchSaleSubmitted = 0;
function SearchSaleSubmitOnce()
{
   if(!SearchSaleSubmitted)
   {
      SearchSaleSubmitted ++;
      document.SearchSaleForm.SearchSaleSubmit.value = 'Searching, Please Wait...';
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

                    <h2 class="text-center" >Search Solution</h2>

                    <hr>

                    <form class="form" id="SearchSaleForm" name="SearchSaleForm"
                                method="post" action="search-property-for-sale-results.php"
                                onsubmit="return SearchSaleSubmitOnce(); " >

                      <div class="form-group center-block">
                          <label for="" style="padding: 0px 0px 0px 15px">Location of Solution :</label>
                          <div class="input-group input-group-lg">
                             <span class="input-group-addon ">
                              <div class=" text-left " style="font-size:18px" >
                                  <select id="SearchSalePlace" name="SearchSalePlace" class="" style="cursor:pointer" >
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
                          <label for="" style="padding: 0px 0px 0px 15px">Solution Posted By :</label>
                          <div class="input-group input-group-lg center-block " >
                             <span class="input-group-addon " >
                              <div class=" text-left " style="font-size:17px" >
                                <input type="checkbox" id="owner" name="SearchSaleUserType[0]" value="O"  style="cursor:pointer;"  checked >
                                <label for="owner" style="cursor:pointer;">Owners</label>
                                <br>
                                <input type="checkbox" id="builder" name="SearchSaleUserType[1]" value="B"  style="cursor:pointer;" checked >
                                <label for="builder" style="cursor:pointer;">Integrator</label>
                                <br>
                                <input type="checkbox" id="agent" name="SearchSaleUserType[2]" value="A" style="cursor:pointer;" checked >
                                <label for="agent" style="cursor:pointer;">Third Party Agents</label>
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
                                <input type="radio" id="SearchSalePT1" name="SearchSalePropertyType" value="1" style="cursor:pointer;" checked required >
                                <label for="SearchSalePT1" style="cursor:pointer;">Pod</label>
                                <br>
                                <input type="radio" id="SearchSalePT2" name="SearchSalePropertyType" value="2"  style="cursor:pointer;" required >
                                <label for="SearchSalePT2" style="cursor:pointer;">Small / Medium Site</label>
                                <br>
                                <input type="radio" id="SearchSalePT3" name="SearchSalePropertyType" value="3"  style="cursor:pointer;"  required >
                                <label for="SearchSalePT3" style="cursor:pointer;">Multi Site Tenant</label>
                                <br>
                                <input type="radio" id="SearchSalePT4" name="SearchSalePropertyType" value="4"  style="cursor:pointer;"  required >
                                <label for="SearchSalePT4" style="cursor:pointer;">Super Large Multi Tenant</label>
                              </div>
                            </span>
                            <span class="input-group-addon "></span>
                          </div>
                      </div>

                        <hr>

                        <div id="2" class="form-group hdv">
                            <label for="" style="padding: 0px 0px 0px 15px">No. of Pods(s) in Sites / Tenants : </label>
                            <div class="input-group input-group-lg ">
                              <span class="input-group-addon " >
                                <div class=" text-left " style="font-size:17px" >
                                  <select id="SearchSaleBedroomT1" name="SearchSaleBedroomT1" class="" style="cursor:pointer" >
                                    <option value="0" selected>&nbsp;All &nbsp;Pod(s) </option>
                                    <option value="1">&nbsp; 1 &nbsp;(Pod)</option>
                                    <option value="2">&nbsp; 2 &nbsp;(Pod)</option>
                                    <option value="3">&nbsp; 3 &nbsp;(Pod)</option>
                                    <option value="4">&nbsp; 4 &nbsp;(Pod)</option>
                                    <option value="5">&nbsp; 5 &nbsp;(Pod)</option>
                                    <option value="6">&nbsp; 6 &nbsp;(Pod)</option>
                                    <option value="7">&nbsp; 7 &nbsp;(Pod)</option>
                                    <option value="8">&nbsp; 8 &nbsp;(Pod)</option>
                                    <option value="9">&nbsp; 9 &nbsp;(Pod)</option>
                                    <option value="+">10+&nbsp;(Pod)</option>
                                  </select>
                                </div>
                              </span>
                            <span class="input-group-addon "></span>
                            </div>
                          <hr>
                        </div>

                        <div id="3" class="form-group hdv">
                            <label for="" style="padding: 0px 0px 0px 15px">No. of Pod(s) in Sites / Tenants : </label>
                            <div class="input-group input-group-lg ">
                              <span class="input-group-addon " >
                                <div class=" text-left " style="font-size:17px" >
                                  <select id="SearchSaleBedroomT2" name="SearchSaleBedroomT2" class="" style="cursor:pointer" >
                                    <option value="0" selected>&nbsp;All &nbsp;Pod(s) </option>
                                    <option value="1">&nbsp; 1 &nbsp;(Pod)</option>
                                    <option value="2">&nbsp; 2 &nbsp;(Pod)</option>
                                    <option value="3">&nbsp; 3 &nbsp;(Pod)</option>
                                    <option value="4">&nbsp; 4 &nbsp;(Pod)</option>
                                    <option value="5">&nbsp; 5 &nbsp;(Pod)</option>
                                    <option value="6">&nbsp; 6 &nbsp;(Pod)</option>
                                    <option value="7">&nbsp; 7 &nbsp;(Pod)</option>
                                    <option value="8">&nbsp; 8 &nbsp;(Pod)</option>
                                    <option value="9">&nbsp; 9 &nbsp;(Pod)</option>
                                    <option value="+">10+&nbsp;(Pod)</option>
                                  </select>
                                </div>
                              </span>
                            <span class="input-group-addon "></span>
                            </div>
                          <hr>
                        </div>

                        <script>
                        $(document).ready(function() {
                            $("div.hdv").hide();
                            $("input[name$='SearchSalePropertyType']").click(function() {
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
                              <span class="input-group-addon ">$</span>
                              <input type="text" id="SaleSearchPriceMin" name="SaleSearchPriceMin" maxlength="20" title="Min. Price"
                                   class="form-control input-lg " placeholder=" Min. Price "  data-d-group="2"  >
                              <span class="input-group-addon ">$</span>
                              <input type="text" id="SaleSearchPriceMax" name="SaleSearchPriceMax" maxlength="20" title="Max. Price"
                                   class="form-control input-lg " placeholder=" Max. Price "  data-d-group="2"  >
                             </div>
                        </div>
                        <hr>

-->
                        <div class="form-group ">
                            <label for="" style="padding: 0px 0px 0px 15px">Minimum Price of Pod :</label>
                            <div class="input-group">
                              <span class="input-group-addon ">$</span>
                              <input type="text" id="SaleSearchPriceMin" name="SaleSearchPriceMin" maxlength="20" title="Min. Price"
                                   class="form-control input-lg " placeholder=" Min. Price "  data-d-group="2"  >
                             </div>
                             <br>
                            <label for="" style="padding: 0px 0px 0px 15px">Maximum Price of Pod :</label>
                            <div class="input-group">
                              <span class="input-group-addon ">$</span>
                              <input type="text" id="SaleSearchPriceMax" name="SaleSearchPriceMax" maxlength="20" title="Max. Price"
                                   class="form-control input-lg " placeholder=" Max. Price "  data-d-group="2"  >
                             </div>
                        </div>

                        <hr>

                        <br>

<!--

                        <div class="form-group ">
                            <div class="input-group">
                             </div>
                        </div>
-->


<!--
                        <div id="spincenter">
                          <div id="spin"></div>
                        </div>

                        onclick="window.history.back()"
-->

                        <div class="form-group">
                            <input type="hidden" name="SearchSaleHidden" value="TRUE" >
                            <div id="" class="btnbgc">
                              <input type="submit"  class="btn btn-primary btn-lg btn-block"
                                          name="SearchSaleSubmit" value="Search Properties" style="color:" >
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
