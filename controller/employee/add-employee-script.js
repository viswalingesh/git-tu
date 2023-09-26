$(document).ready(function () {
  LoadEmployeeData();
});

const LoadEmployeeData = () => {
  $.ajax({
    type: "POST",
    url: "controller/employee/add-employee-controller.php",
    data: {
      type: 1,
    },
    success: function (response) {
      $("#allEmployeesLoad").html(response);
      $('body').tooltip({
        selector: '[data-bs-toggle="tooltip"]'
    });
    },
  });
};


$(document).on('click','#AddNewemployeeBtn',function(){
    $('#employeeUpdateModel').modal('show');
    formReset();
    $('#employee_modal_title').text('Add Employee')
    validate();
    datePicker();
})

const validate = () => {
  $("#EmployeeDetailsForm").validate({
    rules: {
      aadharno: {
        minlength:12,
        maxlength:12,
        digits:true
      },
      panno:{
        minlength:10,
        maxlength:10
      },
      currentsalary:{
        digits:true
      },
      contactno:{
        digits:true
      }
  }
  });
}
const datePicker = () =>{
  $(".date_picker").datepicker(
    { dateFormat: 'dd-mm-yy' }
  );
}
let GetFormId = document.getElementById("EmployeeDetailsForm");
GetFormId.addEventListener("submit", function (e) {
  e.preventDefault();
  if ($("#EmployeeDetailsForm").valid()) {
    LoadingEnable();
    const GetData = new FormData(GetFormId);
    fetch("controller/employee/add-employee-controller.php", {
      method: "POST",
      body: GetData,
    })
      .then((res) => res.json())
      .then((data) => {
        LoadingDisable();
        if (data.statuscode == 200) {
          sweet_alert("Success!", "Added successfully", "success");
          formReset();
          LoadEmployeeData();
        } else if (data.statuscode == 202) {
          sweet_alert("Sorry!", `${data.duplicate} already exist`, "warning");
        } else if (data.statuscode == 204) {
          sweet_alert("Success!", "Updated successfully", "success");
          formReset();
          LoadEmployeeData();
        } else {
          sweet_alert("Sorry!", "Please try again", "error");
        }
      })
      .catch((err) => {
        console.log(err);
        LoadingDisable();
        sweet_alert("Sorry!", "Please try again", "error");
      });
  }
});
const sweet_alert = (title, message, type) => {
  Swal.fire(title, message, type);
};

const LoadingEnable = () => {
  $("#master_body").append('<div class="loading"></div>');
};
const LoadingDisable = () => {
  $(".loading").remove();
};
$(document).on('click','#CloseMasterPopup',function(){
  formReset();
  $('#employeeUpdateModel').modal('hide');  
});

const formReset = () => {
  $("#EmployeeDetailsForm").trigger("reset");
  $('#employeeUpdateModel').modal('hide');
  $('#saveType').val(1)
  $('#rowid').val('')
}

$(document).on('click','.EditEmployee',function(){
  
  $('#employeeUpdateModel').modal('show'); 
  profileRowReset();
  validate();
  datePicker();
  
  let getAttr = $(this).closest('tr')  
  let getId = $(getAttr).attr('data-id');  
  $('#saveType').val(2);
  $('#rowid').val(getId)
  let getArray = ['employee_name','employee_id','gender','dob','age','address','bloodgroup','aadharno','panno','contactno','email','datejoined','employeestatus','datereleived','currentsalary','username','department','designation','role','remarks','password']
  getArray.map(item=>{
    let getValue = $(getAttr).attr(`data-${item}`)
    $('#'+item).val(getValue)
  })

  let getProfile = $(getAttr).attr('data-profileFileName');
  if(getProfile)
  {
    $('.edit_profile').removeClass('d-none');
    $('.add_profile').addClass('d-none');    
    $('#profile').attr('disabled',true);
    $('#edit_profile_img').attr('src','assets/profile/'+getProfile);
    $('#profileHidden').attr('disabled',false);
    $('#profileHidden').val(getProfile)
    
    $('#RemoveProfile').attr('data-id',getId).attr('data-img',getProfile)
  }
  else{
    profileRowReset();
  }
  $('#employee_modal_title').text("Edit Employee");  
});
$(document).on('click','#RemoveProfile',function(){
  $.ajax({
    type: "POST",
    url: "controller/employee/add-employee-controller.php",
    data: {
      type: 3,
      rowid:$(this).attr('data-id'),
      imgName:$(this).attr('data-img'),
    },
    dataType:"json",
    success: function (response) {
      if (response.statuscode == 200) {
        sweet_alert("Success!", "Profile Image Successfully Removed", "success");
        profileRowReset();
      }      
      else{
        sweet_alert("Sorry!", "Please try again", "error");        
      }
    },
  });
});



const profileRowReset = () => {
  $('.edit_profile').addClass('d-none');
  $('.add_profile').removeClass('d-none');    
  $('#profile').attr('disabled',false);
  $('#profileHidden').attr('disabled',true);
  $('#profileHidden').val('')
  $('#RemoveProfile').removeAttr('data-id');
  $('#RemoveProfile').removeAttr('data-img')
}

$(document).on('click','.removeEmployee',function(){
  let getId = $(this).closest('tr').attr('data-id')
  let getImage = $(this).closest('tr').attr('data-profileFileName')

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.value) {
      LoadingEnable();
      $.ajax({
        type: "POST",
        url: "controller/employee/add-employee-controller.php",
        data: {
          type: 4,
          id:getId,
          imgName:getImage
        },
        dataType:"json",
        success: function (response) {
          LoadingDisable();
          if (response.statuscode == 200) {
            sweet_alert("Success!", "Successfully Removed", "success");
          } else {
            sweet_alert("Sorry!", "Please try again", "error");
          }
        },
      });
    }
});

});
