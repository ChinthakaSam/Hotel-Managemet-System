<?php

require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}

$username = escape($user->data()->username);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	input{
		background-color: transparent;
		border: 0;
	}
	.colw{
		padding-left: 10px;
		width:300px;
		height:40px;
	}
	.bg{
		background-color: #4F5358;
	}
</style>
</head>
<body>
	<br>

                    <?php
                    $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                    if(!$employee->count()) {
                        echo 'No user';
                    } else {
                        foreach ($employee->results() as $employee) {
    						echo "<table border='1' align='center'><tr class='bg'><td class='colw' colspan='2' align='center'><br><img src='../images/HRM/";
    						echo $employee->empImage;
    						echo "'/></br><br></td></tr>";
    						echo "<tr><td class='colw'>Title</td><td class='colw'>";
                            echo "<input type='text' value='";
                                echo $employee->title;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Name With Initials</td><td class='colw'><input type='text' value='";
                                echo $employee->nameWithInitials;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Full Name</td><td class='colw'><input type='text' value='";
                                echo $employee->fullName;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Call Name</td><td class='colw'><input type='text' value='";
                                echo $employee->callName;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>NIC Number</td><td class='colw'><input type='text' value='";
                                echo $employee->nic;
                            echo "'></td></tr>";  
                            echo "<tr><td class='colw'>Birthday</td><td class='colw'><input type='text' value='";
                                echo $employee->dob;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Civil Status</td><td class='colw'><input type='text' value='";
                                echo $employee->civilStatus;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>District</td><td class='colw'><input type='text' value='";
                                echo $employee->district;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Gramasewaka Division</td><td class='colw'><input type='text' value='";
                                echo $employee->gsDivision;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Mobile Number</td><td class='colw'><input type='text' value='";
                                echo $employee->mobileNo;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Residence Number</td><td class='colw'><input type='text' value='";
                                echo $employee->residenceNo;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Gender</td><td class='colw'><input type='text' value='";
                                echo $employee->gender;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Blood Group</td><td class='colw'><input type='text' value='";
                                echo $employee->bloodGroup;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Email</td><td class='colw'><input type='text' value='";
                                echo $employee->email;
                            echo "'></td></tr>";  
                            echo "<tr><td class='colw'>Address 1</td><td class='colw'><input type='text' value='";
                                echo $employee->address1;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Address 2</td><td class='colw'><input type='text' value='";
                                echo $employee->address2;
                            echo "'></td></tr>";
                            echo "<tr><td class='colw'>Address 3</td><td class='colw'><input type='text' value='";
                                echo $employee->address3;
                            echo "'></td></tr>";
                            $desid = $employee->designation;
                            $designation = DB::getInstance()->query("SELECT * FROM designation WHERE desId = $desid");
                             if(!$designation->count()) {
                                  echo 'No user';
                             } else {
                                foreach ($designation->results() as $designation) {
                            echo "<tr><td class='colw'>Designation</td><td class='colw'><input type='text' value='";
                                echo $designation->desName;
                            echo "'></td></tr>";
                                }
                            }
                            $did = $employee->DepId;
                            $department = DB::getInstance()->query("SELECT * FROM department WHERE depId = $did");
                             if(!$department->count()) {
                                  echo 'No user';
                             } else {
                                foreach ($department->results() as $department) {
                            echo "<tr><td class='colw'>Department</td><td class='colw'><input type='text' value='";
                                echo $department->depName;
                            echo "'></td></tr></table><br>";
                                }
                            }
                        }
                    }
                    ?>
              
</body>
</html>
