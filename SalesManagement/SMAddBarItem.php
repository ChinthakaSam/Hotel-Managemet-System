<?php 
require_once 'core/init.php';

$user = new User();


if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
  $sc = new Services();
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        
         $validate = new Validate();
         $validation = new Validate();
        
        $validation = $validate->check($_POST, array(
            'itemId' => array(
                 'required' => true,
                'min' => 2,
            ),
            'item' => array(
                 'required' => true,
                'min' => 2,
                'max' => 30
            ),
            'rate' => array(
                'required' => true,
                'min' => 2,
            ),
            'date' => array(
                'required' => true,
                'min' => 2,
            )
        ));
       
        
        if($validation->passed()){
            
            try{
                $sales->update(array(
                    'itemId' => Input::get('itemId'),
                    'item' => Input::get('item'),
                    'rate' => Input::get('rate'),
                    'date' => Input::get('Y-m-d H:i:s')
                ));
                
                echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Your details have been updated successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                
                Session::flash('home','Your details have been updated.');
                Redirect::to('index.php');
            }catch(Exception $e){
                die($e->getMessage());
            }
        }else{
            foreach($validation->errors() as $error){
                 echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                    $error.'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
            }
        }
    }
}
?>
<html>
<body>

                                <div class="card-footer">
                            
    </div>
                    
    
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Add Bar Item</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Item Id</th>
                                  <th scope="col">Bar Item</th>
                                  <th scope="col">Rate</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Update Meals</th>
                                </tr>
                              </thead>
                            
                              <tbody>
                                <tr>
                                    <td><label for="itemId"></label><input type="text" id="itemId" name="itemId"></td>
                                    <td><label for="item"></label><input type="text" id="item" name="item"></td>
                                    <td><label for="rate"></label><input type="text" id="rate" name="rate"></td>
                                    <td><label for="date"></label><input type="date" id="date" name="date"></td>
                                    <td><input type="submit" value="Add">
                                  </tr>
                                  
                              </tbody>
                            </table>
							
							<button type="button" class="btn btn-secondary" align="right" lenght="1000">Save</button>
                        </div>
    </div>

    
          
    
</body>
</html>