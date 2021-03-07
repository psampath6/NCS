<style>
.modal-dialog {
  width: 130px;
}

.modal-content {
/*
  width: 10px.;
*/
}
</style>

<div class="text-center  center-block ">

  <div id="SearchingSpinModal" class="modal fade." tabindex="-1" 
          role="dialog" data-keyboard="false" data-backdrop="static." >
          <div class="modal-dialog">
              <div class="modal-content">
                  Searching ...
                  <div style="height:130px; ">
                    <img src="img/loading2arrows.gif" style="" >
                  </div>  
                  Please Wait !
              </div>
          </div>
  </div>


  <div id="RegisteringSpinModal" class="modal fade." tabindex="-1" 
          role="dialog" data-keyboard="false" data-backdrop="static." >
          <div class="modal-dialog">
              <div class="modal-content">
                  Registering ...
                  <div style="height:130px; ">
                    <img src="img/loading2arrows.gif" style="" >
                  </div>  
                  Please Wait !
              </div>
          </div>
  </div>


  <div id="LoadingSpinModal" class="modal fade." tabindex="-1" 
          role="dialog" data-keyboard="false" data-backdrop="static." >
          <div class="modal-dialog">
              <div class="modal-content">
                  Loading ...
                  <div style="height:130px; ">
                    <img src="img/loading2arrows.gif" style="" >
                  </div>  
                  Please Wait !
              </div>
          </div>
  </div>


  <div id="ProcessingSpinModal" class="modal fade." tabindex="-1" 
          role="dialog" data-keyboard="false" data-backdrop="static." >
          <div class="modal-dialog">
              <div class="modal-content">
                  Processing ...
                  <div style="height:130px; ">
                    <img src="img/loading2arrows.gif" style="" >
                  </div>  
                  Please Wait !
              </div>
          </div>
  </div>


  <div id="DeletingSpinModal" class="modal fade." tabindex="-1" 
          role="dialog" data-keyboard="false" data-backdrop="static." >
          <div class="modal-dialog">
              <div class="modal-content">
                  Deleting ...
                  <div style="height:130px; ">
                    <img src="img/loading2arrows.gif" style="" >
                  </div>  
                  Please Wait !
              </div>
          </div>
  </div>

</div>


<!--

<div id="SearchingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Searching...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinSearch" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

<div id="RegisteringSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Registering...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinRegister" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

<div id="PostingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Posting...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinPost" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>


<div id="LoadingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Loading...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinLoad" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>


<div id="UpLoadingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>UpLoading...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinUpload" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

<div id="SubmittingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Submitting...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinSubmit" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

<div id="ProcessingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Processing...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinProcess" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

<div id="DeletingSpinModal" class="modal fade" tabindex="-1" 
        role="dialog" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Deleting...</h3>
                </div>
                <div class="modal-body" >
                    <div style="height:100px">
                      <span id="SpinDelete" style="position:absolute; display:block; top:50%; left:50%; padding-top:5px;"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center"><h4>Please Wait !</h4></div>
            </div>
        </div>
    </div>
</div>

-->
