$(document).ready(function () {
    getAllData();
    console.log("ready!");
    
});

$("form#crudAppForm").on("submit", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var contact = $("#contact").val();
    var editId = $("#editId").val();
    var field = $("#field option:selected").text();
    var country=$("#country option:selected").text();
    var state=$("#state option:selected").text();
    var city=$("#city option:selected").text();

    var countryVal=$("#country option:selected").val();  //1||2
    var stateVal=$("#state option:selected").val();
    var cityVal=$("#city option:selected").val();

    console.log("COuntry Through VAl " + country)

    // var file_data = $('#pic').prop('files')[0];
    // var form_data = new FormData(); // Create a FormData object
    // form_data.append('file', file_data);

    var course = [];
          $(".form-check-input").each(function(){
              if ($(this).is(":checked")) {
                  course.push($(this).val());
              }
            });


    course = course.toString();

    console.log(field+ "  "+country+ " "+state+ " "+city +" Courses : : : ");

    if (name == "") {
        alert("Please enter name");
        $("#name").focus();
    }
    else if (name.length < 3) {
        alert("Please enter a valid name");
    }
    else if (email == "") {
        alert("Please enter email");
        $("#email").focus();
    }
    else if (IsEmail(email) == false) {
        alert("Please enter a valid email");
        return false;
    } else if (contact == "") {
        alert("Please enter contact");
        $("#contact").focus();
    }
    else if (contact.length < 10 || contact.length > 11) {
        alert("Please enter a valid contact")
    }
    
    else {
        $("#buttonLabel").html("Saving...");
        $("#spinnerLoader").show('fast');
        $.post("crud-script.php", {
            crudOperation: "saveData",
            name: name,
            email: email,
            contact: contact,
            editId: editId,
            country: country,
            state: state,
            city: city,
            course: course,
            countryVal: countryVal,
            cityVal: cityVal,
            stateVal: stateVal,
  
        }, function (response) {
            if (response == "saved") {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#myModal").modal('hide');
                $("form#crudAppForm").each(function () {
                    this.reset();
                });
                
                getAllData();
            }
            else{
                console.log("Error somewhere Redirecting...")
            }
           
        });
    }
    
});


function getAllData() {
    $.post("crud-script.php", 
    { crudOperation: "getData" }, function (allData) {
        $("#crudData").html(allData);
    });
}


function editData(editId, name, email, contact,course,country,state,city,cval,stateVal,cityVal) {
    $("#editId").val(editId);
    console.log(editId);
    $("#name").val(name);
    console.log(name);
    $("#email").val(email);
    $("#contact").val(contact);
    console.log("Country : " + country+ " State : " + state+ " City : " + city);
    
    $('#country').val(cval);
    
    $.ajax({
                type: 'POST',
                url: 'ajax-data-send.php',
                data: {country_id: cval},
                success: function(html) {
                    $('#state').html(html);
                    $('#state').val(stateVal);
                  
                }
            });

            $.ajax({
                type: 'POST',
                url: 'ajax-data-send.php',
                data: {state_id: stateVal},
                success: function(html) {
                    $('#city').html(html);
                    $('#city').val(cityVal);
                  
                }
            });
   
    $("#myModal").modal('show');
    
    // var courseArray = course.split(',');

    //     for (var i = 0; i < courseArray.length; i++) {
    //       document.getElementById(courseArray[i]).checked= true;
    //       $(".form-check-input").removeAttr('checked');
    //     }
        

    //document.getElementById("#(course.val())").checked = false;
    


    if (course.includes("BBA")){
        document.getElementById("BBA").checked = true;
      }
       if (course.includes("MBA")){
        document.getElementById("MBA").checked = true;
      }
       if (course.includes("BTECH")){
        document.getElementById("BTECH").checked = true;
      } 
      if (course.includes("BCOM")){
        document.getElementById("BCOM").checked = true;
      }
       if (course.includes("BCA")){
        document.getElementById("BCA").checked = true;
      }
       if (course.includes("MCA")){
        document.getElementById("MCA").checked = true;
      }
      if (course.includes("MTECH")){
        document.getElementById("MTECH").checked = true;
      }




}

function deleteData(deleteId) {
    if (confirm("Are you sure to delete this ?")) {
        $('#deleteSpinner' + deleteId).show('fast');
        $.post("crud-script.php", { crudOperation: "deleteData", deleteId: deleteId }, function (response) {
            if (response == "deleted") {
                $('#deleteSpinner' + deleteId).hide('fast');
                getAllData();
            }
        });
    }
}
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
