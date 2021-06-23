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
    include_once 'db.php';
    $query = "SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC";
    $result = $db->query($query);
    ?>
    <div class="container">
        <a href="javaScript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right bottom-gap">Add New <i class="fa fa-plus" aria-hidden="true"></i></a>
        <table class="table table-bordered">
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
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="picture">Picture <span class="field-required">*</span></label>
                                    <input type="file" name="file" id="pic" placeholder="upload a picture" class="form-control">
                                </div>
                            </div> -->

                            <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Field (Fetching Json Data) <span class="field-required">*</span></label>
                                <select id="locality-dropdown" name="locality" id="field" class="form-control">
                                    <option value="AB">Alberta</option>
                            </div>
                        </div> -->
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
    <!-- <script>
        let dropdown = $('#locality-dropdown');

        dropdown.empty();

        dropdown.append('<option selected="true" disabled>Choose Field</option>');
        dropdown.prop('selectedIndex', 0);

        const url = 'sample-data.json';

        // Populate dropdown with list of provinces
        $.getJSON(url, function(data) {
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
            })
        });
    </script> -->



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

    <!-- <script type="text/javascript">
  $(document).ready(function(){
      $("#formSubmit").on("submit",function(e){
          e.preventDefault();
          var name = $("#name").val();
          var course = [];
          $(".form-check-input").each(function(){
              if ($(this).is(":checked")) {
                  course.push($(this).val());
              }
          });

          course = course.toString(); // toString function convert array to string
          
          if (name !=="" && course.length > 0) {
            $.ajax({
              url : "insert.php",
              type: "POST",
              cache: false,
              data : {name:name,course:course},
              success:function(result){
                if (result==1) {
                    $("#formSubmit").trigger("reset");
                    alert("Data insert in database successfully");
                }
              }
            });
          }else{
            alert("Fill the required fields");
          }
      });
  });
</script> -->


    <!-- <script>
        // iMage
        $("#pic").on("change", function(e) {
            e.preventDefault();
            var file_data = $('#pic').prop('files')[0];
            var form_data = new FormData(); // Create a FormData object
            form_data.append('file', file_data); // Append all element in FormData  object

            $.post({
                url: 'load.php', 
                // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(output) {
                    console.log(output);
                    // $('img#img').attr('src', output);
                    // display response from the PHP script, if any
                }
            });
            $('#pic').val(); /* Clear the input type file */
        });
    </script> -->


    <script src="crud-app.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>