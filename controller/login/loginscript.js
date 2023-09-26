(function () {
  $("#LoginFormPost").validate();
})();

let GetFormId = document.getElementById("LoginFormPost");
GetFormId.addEventListener("submit", function (e) {
  e.preventDefault();
  if ($("#LoginFormPost").valid()) {
    LoadingEnable();
    const GetData = new FormData(GetFormId);
    fetch("controller/login/login-controller.php", {
      method: "POST",
      body: GetData,
    })
      .then((res) => res.json())
      .then((data) => {
        LoadingDisable();
        if (data.statusCode == 200) {
          window.location.href = "dashboard.php";
        } else {
          sweet_alert("Sorry!", "Invalid Username and Password", "error");
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
  $("body").append('<div class="loading"></div>');
};
const LoadingDisable = () => {
  $(".loading").remove();
};
