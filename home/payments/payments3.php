

<div class="container">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Collapsible Group 1</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><?php pay('collapse1'); ?></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse2'); ?></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse3'); ?></div>
      </div>
    </div>
  </div> 
</div>

<?php
function pay($x){
?>

            <div class="row">
        <div class="col-sm-3"></div>      
        <div class="col-sm-2">

       <br>
       <div class="btn-group-vertical btn-block" id="<?php echo $x; ?>">
             <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#crdit<?php echo $x; ?>">Credit Card</a>
          <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#debit<?php echo $x; ?>">Debit Card</a>
          </div>
          <br><br><br>
                    <label class='control-label'></label><!-- spacing -->
        
          <div class="alert alert-info">Please choose your method of payment and hit continue. You will then be sent down to pay using your selected payment option.</div>

        </div>

                <div class="col-sm-4">
                <div class="tab-content" id="<?php echo $x; ?>">
    <div id="crdit<?php echo $x; ?>" class="tab-pane">
    <h2>USING CREDIT CARD</h2>
          <form accept-charset="UTF-8" action="/" id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
            </div>
               <div class="row">
                <div class="col-sm-12">
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='' type='text'>
              </div>
              </div>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
                  <label class='control-label'>Card Number</label>
                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>

              </div>
            </div>
             
            <div class='form-row '>
              <div class='form-group cvc required'>
                <div class="row">
                <div class="col-sm-4">
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Year</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>

                </div>
              </div>
              
            </div>
 
        
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                      
               <button class='form-control btn btn-primary' type='submit'> PAY Rs.500→</button>
          
              </form>    
                
              </div>
            </div>    
            
              </div>
              
    <div id="debit<?php echo $x; ?>" class="tab-pane fade" id="<?php echo $x; ?>">
                    <h2>USING DEBIT CARD</h2>
           <form accept-charset="UTF-8" action="/" id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
            </div>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text'>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
                  <label class='control-label'>Card Number</label>
                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>

              </div>
            </div>
             
            <div class='form-row '>
              <div class='form-group cvc required'>
                <div class="row">
                <div class="col-sm-4">
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Year</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>

                </div>
              </div>
              
            </div>
 
        
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                      
               <button class='form-control btn btn-primary' type='submit'> PAY Rs.500→</button>
          
              </form>      
                
              </div>
            </div>   
              </div>
            </div>
            
            
          
        </div>   
     </form>
   </div>
 
<?php
}
?>

    </body>
</html>

