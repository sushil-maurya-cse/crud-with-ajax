<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <?php
    
    //Databse connection
    include_once 'db.php';
    
    $query = "SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC";
    $result = $db->query($query);
    ?>
    <div class="container">
        <a href="javaScript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right bottom-gap">Add New <i class="fa fa-plus" aria-hidden="true"></i></a>
        <table class="table table-bordered">
            <!--Data table Headingss -->
            <thead id="thead" style="background-color:#135361">
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Courses</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="crudData">
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CRUD Application Form</h4>
                </div>
                <div class="modal-body">
                    <form id="crudAppForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name <span class="field-required">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email <span class="field-required">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact <span class="field-required">*</span></label>
                                    <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country <span class="field-required">*</span></label>
                                    <select id="country">
                                        <option value="">Select Country</option>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">Sorry brother no country</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="state" class="form-select">
                                        <option value="">Select country first</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="city">
                                        <option value="">Select state first</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-4">
                            <label for="country">Course <span class="field-required">*</span></label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="BCA" id="BCA"> BCA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="MCA"id="MCA"> MCA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="BBA"id="BBA"> BBA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="BTECH"id="BTECH"> BTECH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="MTECH"id="MTECH"> MTECH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="BCOM" id="BCOM"> BCOM
                                    </label>
                                </div>
                            </div><br>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="editId" id="editId" value="" />
                            <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary"><i class="fa fa-spinner fa-spin" id="spinnerLoader"></i> <span id="buttonLabel">Save</span> </button>
                      

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                    </form>
                
                
            </div>
        </div>
    </div>

    <div class="er"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // dropDown
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax-data-send.php',
                        data: 'country_id=' + countryID,

                        success: function(html) {
                            $('#state').html(html);
                            $('#city').html('<option value="">Select state first</option>');
                        }
                    });
                    console.log('country_id=' + countryID);
                } else {
                    $('#state').html('<option value="">Select country first</option>');
                    $('#city').html('<option value="">Select state first</option>');
                }
            });

            $('#state').on('change', function() {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax-data-send.php',
                        data: 'state_id=' + stateID,
                        success: function(html) {
                            $('#city').html(html);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        });
    </script>
   
    <script src="crud-app.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
