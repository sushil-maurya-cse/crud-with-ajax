<?php
include "config.php";
include_once "CrudOperations.php";
include_once "PicOperation.php";
//$picObj=new PicOperation();
$crudObj = new CrudOperations();


if ($_POST['crudOperation'] == "saveData") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];$editId = $_POST['editId'];
    $course = $_POST['course'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];   
    $countryVal=$_POST['countryVal'];
    $stateVal=$_POST['stateVal'];
    $cityVal=$_POST['cityVal'];
    
     $save = $crudObj->saveData($connection,$name,$email,$contact,$editId,$country,$state,$city,$course,$countryVal,$stateVal,$cityVal);
       echo "saved" ;
    }


if ($_POST['crudOperation'] == "getData") {
    $sr = 1;
    $tableData = '';
    $allData = $crudObj->getAllData($connection);
  //  $picData= $picObj->getAllData($connection);
    if ($allData->num_rows>0) {
        while ($row = $allData->fetch_object()) {
           // while($pic=$picData->fetch_object()) {
         $query="select * from picture where id=".$row->id;
           $Image=mysqli_query($connection,$query);
            $tableData .= ' <tr>
                <td>'.$sr.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->contact.'</td>
                <td>'.$row->country.'</td>
                <td>'.$row->state.'</td>
                <td>'.$row->city.'</td>
                <td>'.$row->course.'</td>

                <td><a href="javaScript:void(0)" onclick="editData(\''.$row->id.'\',\''.$row->name.'\',\''.$row->email.'\',\''.$row->contact.'\',\''.$row->course.'\',\''.$row->country.'\',\''.$row->state.'\',\''.$row->city.'\',\''.$row->cval.'\',\''.$row->stateval.'\',\''.$row->cityval.'\');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->id.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->id.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $sr++;
     //   }
        }
    }
    echo $tableData;
}

if ($_POST['crudOperation'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
    $delete = $crudObj->deleteData($connection,$deleteId);
    if ($delete){
        echo "deleted";
    }
}