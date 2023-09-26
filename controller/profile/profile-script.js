$(document).on('change','#profileUpload',function(){
    let val = $(this).val();
    if(val){
        let GetFormId = document.getElementById("ProfileUploadForm");
        const GetData = new FormData(GetFormId);
        fetch("controller/profile/profile-controller.php", {
            method: "POST",
            body: GetData,
          })
            .then((res) => res.json())
            .then((data) => {
              LoadingDisable();
              if (data.statuscode == 200) {
                sweet_alert("Success!", "Profile Image Successfully Updated", "success");
              }
              else {
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
    Swal.fire(title, message, type).then(function() {
        if(message == 'Profile Image Successfully Updated'){
            
            location.reload()
        }
        else if(message == 'Password Successfully Updated'){
            
            window.location.href = "logout.php";
        }
        else{

        }
    });;
  };
  
  const LoadingEnable = () => {
    $("#master_body").append('<div class="loading"></div>');
  };
  const LoadingDisable = () => {
    $(".loading").remove();
  };


$(document).on('click','#ChangePassword',function(){
    $('#passwordModal').modal('show');
    validate();
})


let GetFormId = document.getElementById("PasswordForm");
GetFormId.addEventListener("submit", function (e) {
  e.preventDefault();
  if ($("#PasswordForm").valid()) {
    LoadingEnable();
    const GetData = new FormData(GetFormId);
    fetch("controller/profile/profile-controller.php", {
      method: "POST",
      body: GetData,
    })
      .then((res) => res.json())
      .then((data) => {
        LoadingDisable();
        if (data.statuscode == 200) {
          sweet_alert("Success!", "Password Successfully Updated", "success");
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



const validate = () => {
    $("#PasswordForm").validate({
        rules: {
            password_confirm: {
                equalTo: "#password"
            }
        }
    });
  }