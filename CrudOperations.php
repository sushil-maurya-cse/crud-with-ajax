<?php
class CrudOperations
{
    public function saveData($connection,$name,$email,$contact,$editId,$country,$city,$state,$course,$countryVal,$stateVal,$cityVal)
    {   
        // Condition for Checking edit id present or not....
        if ($editId == "") {
        // If not do the insertion operations    
            $query = "INSERT INTO crud_application SET name='$name',email='$email',contact='$contact',
            country='$country', state='$state',course='$course',city='$city',cval='$countryVal',
            stateVal='$stateVal',cityVal='$cityVal'";
        } else {
            // Else do the Deletion operations   
            $query = "UPDATE crud_application SET name='$name',email='$email',contact='$contact',
            country='$country', state='$state',city='$city' ,course='$course',cval='$countryVal',
            stateVal='$stateVal', cityVal='$cityVal' WHERE id='$editId' ";
            
        }
        $result = $connection->query($query) or die("Error in saving data".$connection->error);
        return $result;
    }

    public function getAllData($connection)
    {
        // Get the Data from the Database
        $query = "SELECT * FROM crud_application";
        $result = $connection->query($query) or die("Error in getting data".$connection->error);
        return $result;
    }

    public function deleteData($connection,$deleteId){
        $query = "DELETE FROM crud_application WHERE id='$deleteId'";
        $result = $connection->query($query) or die("Error in deleting data".$connection->error);
        return $result;
    }
}
