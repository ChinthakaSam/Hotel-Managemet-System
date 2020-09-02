<html>
    <head>
        <script>
            var tables = document.getElementsByTagName('table');
            var table = tables[tables.length - 1];
            var rows = table.rows;
            for(var 1 = 0, td; i<rows.length; i++){
                td = document.createElement('td');
                td.appendChild(document.createTextNode(i + 1));
                rows[i].insertBefore(td, rows[i].firstChild);
            }
        </script>
    </head>
    <body>
        <center>
        <div class="card">
                <div class="card-header">
                    <strong class="card-title">Requisition Form</strong>
                </div>
            
            <div class="card-body card-block">
                
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Requisition No</label></div>
                        
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Department ID</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Department Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                </form>
            </div>
        </div>
            
        <div class="card"> 
        
            <table border="3">
                
                <thead>
                    <tr>
                        <th scope="col">Requisition</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    
                </tbody>
                
            </table>
            
        </div>
        </center>
        
        <div class="card">
            
            <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Approved by</label>
                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    <label for="cc-payment" class="control-label mb-1">Requested by by</label>
                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Print
                    </button>
                
            </div>
            
        </div>
        
    </body>
</html>