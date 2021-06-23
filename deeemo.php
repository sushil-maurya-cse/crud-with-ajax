<!-- <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="custom.css">
</head>

<select id="locality-dropdown" name="locality">
<option value="AB">Alberta</option>
</select>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
let dropdown = $('#locality-dropdown');

dropdown.empty();

dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
dropdown.prop('selectedIndex', 0);

const url = 'sample-data.json';

// Populate dropdown with list of provinces
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
  })
});
</script> -->

<!-- <!DOCTYPE html>
<html>

<head>
  <title>Image Upload</title>
  <link rel="stylesheet" type="text/css" href="text.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div id="content">

    <form method="POST" action="" id="crudAppForm" enctype="multipart/form-data">
      <input type="file" name="file" id="pic" value="" />

      <div>
        <button type="submit" name="upload">
          UPLOAD
        </button>

      </div>
      
    </form><div id="content"></div>
  </div>

  <script>
    $("form#crudAppForm").on("submit", function(e) {
      e.preventDefault();
        var file_data = $('#pic').prop('files')[0];
        var form_data = new FormData();  // Create a FormData object
        form_data.append('file', file_data);  // Append all element in FormData  object

        $.ajax({
                url         : 'load.php',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    alert(output);              // display response from the PHP script, if any
                }
         });
         $('#pic').val('');                     /* Clear the input type file */
    });
   
  </script>


</body>

</html> -->

<!-- <html>
<head>
<title>jQuery select / dropdown box example</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

<h1>jQuery select / dropdown box example</h1>

<script type="text/javascript">

  $(document).ready(function(){

    $("#isSelect").click(function () {
        
    alert($('#country').val());
            
    });
    
    $("#selectChina").click(function () {
        
    $("#country").val("China");
        
    });
    
    $("#selectUS").click(function () {
        
    $("#country").val("United State");
            
    });
    
    $("#selectMalaysia").click(function () {
        
    $("#country").val("Malaysia");

    });
    
    $("#disableUS").click(function () {
        
    $("#country option[value='United State']").attr("disabled", true);
        
    });
    
    $("#enableUS").click(function () {
        
    $("#country option[value='United State']").attr("disabled", false);
        
    });
    
  });
</script>
</head><body>

<select id="country">
<option value="None">-- Select --</option>
<option value="China">China</option>
<option value="United State">United State</option>
<option value="Malaysia">Malaysia</option>
</select>

<br/>
<br/>
<br/>

<input type='button' value='Display Selected' id='isSelect'>
<input type='button' value='Select China' id='selectChina'>
<input type='button' value='Select US' id='selectUS'>
<input type='button' value='Select Malaysia' id='selectMalaysia'>
<input type='button' value='Disable US' id='disableUS'>
<input type='button' value='Enable US' id='enableUS'>
</body> -->

<?php
  include('add.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="index.php">PHP CRUD WITH IMAGE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">Create</div>
              <div class="card-body">
                <form class="" action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="">
                    </div>
                    <div class="form-group">
                      <label for="contact">Contact No:</label>
                      <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" value="">
                    </div>
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                    </div>
                    <div class="form-group">
                      <label for="image">Choose Image</label>
                      <input type="file" class="form-control" name="image" value="">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>