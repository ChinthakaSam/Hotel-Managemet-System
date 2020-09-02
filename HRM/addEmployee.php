<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}

if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'name_with_initials' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'full_name' => array(
      'required' => true,
      'min' => 2,
      'max' => 150
    ),
    'call_name' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'nic' => array(
      'required' => true,
      'min' => 2,
      'max' => 15
    ),
    'date_of_birth' => array(
      'required' => true
    ),
    'address1' => array(
      'required' => true,
      'min' => 2,
      'max' => 60
    ),
    'address2' => array(
      'required' => true,
      'min' => 2,
      'max' => 600
    ),
    'address3' => array(
      'required' => true,
      'min' => 2,
      'max' => 60
    ),
    'mobile_number' => array(
      'required' => true,
      'max' => 15
    ),
    'resridence_number' => array(
      'required' => true,
      'max' => 15
    ),
    'gramasewaka_division' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'email' => array(
      'required' => true,
      'max' => 30
    ),
    'next_of_kin' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'next_of_kin_number' => array(
      'required' => true,
      'max' => 60
    ),
  ));

  if($validation->passed()){
      $employee = new Employee();
      try{

        $employee->create('employee',array(
            'empImage' => Input::get('eimg'),
            'title' => Input::get('title'),
            'nameWithInitials' => Input::get('name_with_initials'),
            'fullName' => Input::get('full_name'),
            'callName' => Input::get('call_name'),
            'nic' => Input::get('nic'),
            'email' => Input::get('email'),
            'dob' => Input::get('date_of_birth'),
            'address1' => Input::get('address1'),
            'address2' => Input::get('address2'),
            'address3' => Input::get('address3'),
            'mobileNo' => Input::get('mobile_number'),
            'residenceNo' => Input::get('resridence_number'),
            'gsDivision' => Input::get('gramasewaka_division'),
            'district' => Input::get('district'),
            'civilStatus' => Input::get('civil_status'),
            'gender' => Input::get('gender'),
            'bloodGroup' => Input::get('bood_group'),
            'paytype' => Input::get('paytype'),
            'bankName' => Input::get('bank'),
            'bankAccount' => Input::get('bank_account'),
            'nextOfKin' => Input::get('next_of_kin'),
            'nextOfKincontactNo' => Input::get('next_of_kin_number'),
            'designation' => Input::get('designation'),
            'DepId' => Input::get('department'),
            'joindate' => date('Y-m-d H:m:s')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Employee details has been added Successfully!
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
<div class="card">
    <div class="card-header">
        <strong>Create New Employee</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
             <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Employee Image</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="eimg" name="eimg" class="form-control-file"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Title</label></div>
                <div class="col-12 col-md-9">
                    <select name="title" id="title" class="form-control-sm form-control">
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Name with Initials</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name_with_initials" name="name_with_initials" placeholder="Enter Name with Initials..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Full Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="full_name" name="full_name" placeholder="Enter Full Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Call Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="call_name" name="call_name" placeholder="Enter Call Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">NIC Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="nic" name="nic" placeholder="Enter NIC Number..." class="form-control"></div>
            </div>
               <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Enter Email..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Date of Birth</label></div>
                <div class="col-12 col-md-9"><input type="date" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Address 1</label></div>
                <div class="col-12 col-md-9"><input type="text" id="address1" name="address1" placeholder="Enter Address 1..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Address 2</label></div>
                <div class="col-12 col-md-9"><input type="text" id="address2" name="address2" placeholder="Enter Address 2..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Address 3</label></div>
                <div class="col-12 col-md-9"><input type="text" id="address3" name="address3" placeholder="Enter Address 3..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Mobile Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Residence Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="resridence_number" name="resridence_number" placeholder="Enter Residence Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Gramasewaka Division</label></div>
                <div class="col-12 col-md-9"><input type="text" id="gramasewaka_division" name="gramasewaka_division" placeholder="Enter Gramasewaka Division..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">District</label></div>
                <div class="col-12 col-md-9"><input type="text" id="district" name="district" placeholder="Enter District..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Civil Status</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="civil_status" name="civil_status" value="Single" class="form-check-input" checked>Single
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="civil_status" name="civil_status" value="Married" class="form-check-input">Married
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Male" class="form-check-input" checked>Male
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Female" class="form-check-input">Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Blood Group</label></div>
                <div class="col-12 col-md-9">
                    <select name="bood_group" id="bood_group" class="form-control-sm form-control">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Pay Type</label></div>
                <div class="col-12 col-md-9">
                    <select name="paytype" id="paytype" class="form-control-sm form-control">
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                        <option value="Cheque">Cheque</option>
                        
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Bank Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="bank" name="bank" placeholder="Enter Bank Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Bank Account Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="bank_account" name="bank_account" placeholder="Enter Bank Account Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Next of Kin</label></div>
                <div class="col-12 col-md-9"><input type="text" id="next_of_kin" name="next_of_kin" placeholder="Enter Next of Kin..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Next of Kin Contact Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="next_of_kin_number" name="next_of_kin_number" placeholder="Enter Next of Kin Contact Number..." class="form-control"></div>
            </div>
               <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Designation</label></div>
                <div class="col-12 col-md-9">
                    <select name="designation" id="designation" class="form-control-sm form-control">
                    <?php
                    $designation = DB::getInstance()->query("SELECT * FROM designation");
                    if(!$designation->count()) {
                        echo 'No user';
                    } else {
                        foreach ($designation->results() as $designation) {
                            echo "<option value='$designation->desId;'>";
                                echo $designation->desName;
                            echo "</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
             <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Department</label></div>
                <div class="col-12 col-md-9">
                    <select name="department" id="department" class="form-control-sm form-control">
                    
                    
                    <?php
                    $department = DB::getInstance()->query("SELECT * FROM department");
                    if(!$department->count()) {
                        echo 'No user';
                    } else {
                        foreach ($department->results() as $department) {
                            echo "<option value='$department->depId;'>";
                                echo $department->depName;
                            echo "</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i>&nbsp;Submit
        </button>
    </div>
        </form>
    </div>
    
</div>
</body>
</html>