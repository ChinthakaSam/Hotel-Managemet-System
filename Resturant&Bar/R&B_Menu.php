
	   	
	
		

<html>
<body>
										
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
  
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Product</label></div>
                            <div class="col-12 col-md-9">
                              <select name="location" id="location" class="form-control">
                                <option value="0">Please select</option>
                                <option value="River Side">Rice</option>
                                <option value="InSide">Kottu</option>
                                <option value="OutSide">Desert</option>
                                <option value="OutSide">Hoppers</option>
                              </select>
                            </div>
                          </div>

		
</select>
<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
    <Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</body></html></Button>

<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Name </th>
			<th> Price</th>
			<th> Quantity </th>
			<th>Amonut</th>
			.
			<th> Action</th>
			
		</tr>
	</thead>
	<tbody>
		
		
			<tr>
			
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
                <th>    </th>
			
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				

			</tr>
		
	</tbody>
    
</table><br>

<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> SAVE</button></a>
<div class="clearfix"></div>





