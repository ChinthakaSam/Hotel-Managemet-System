<?php 
require_once 'core/init.php';

$user = new User();


if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
 if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'itemId' => array(
      'required' => true,
      'min' => 2,
    ),
      'item' => array(
      'required' => true,
      'min' => 2,
      'max' => 50
    ),
      'date' => array(
      'required' => true,
      'min' => 2
    ),
      'rate' => array(
      'required' => true,
      'min' => 2
    )
  ));

  if($validation->passed()){
      $sc = new Services();
      try{

        $sc->create('salesitem',array(
            'itemId' => Input::get('itemId'),
            'item' => Input::get('item'),
            'date' => Input::get('date'),
            'rate' => Input::get('rate')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Meal has been created Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';


      } catch(Exception $e){
          die($e->getMessage());
      }



  } else {
    foreach($validation->errors() as $error){
      echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                    $error.'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
    }
  }
}
?>
<html>
<body>

                                <div class="card-footer">
                            
    </div>
                    
    <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Add Meal Item</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Item Id</th>
                                  <th scope="col">Meal Item</th>
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
					
                        </div>
    </div>

  </form>  
          
    
</body>
</html>