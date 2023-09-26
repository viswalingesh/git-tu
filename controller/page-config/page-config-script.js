let getCurrentRole = "";
$(document).on("change", "#RoleDropdown", function () {
  if ($(this).val() != 0) {
    getCurrentRole = $(this).val();
    LoadAllPages();
    
  }
});
const LoadAllPages = () => {
  $.ajax({
    type: "POST",
    url: "controller/page-config/page-config-controller.php",
    data: {
      type: 1,
      roleId:getCurrentRole
    },
    success: function (response) {
      $("#PageAllLoad").html(response);
    },
  });
};

$(document).on("change", ".page_config", function () {
  let getId = $(this).closest("tr").attr("data-id");
  let getPageName = $(this).closest("tr").attr("data-pagename");
  
  if ($(this).is(":checked")) {
    Pageconfig(getId, getPageName, true);
  } else {
    Pageconfig(getId, getPageName, false);
  }
});

const Pageconfig = (pageId, pagename, status) => {
  $.ajax({
    type: "POST",
    url: "controller/page-config/page-config-controller.php",
    data: {
      type: 2,
      pageId: pageId,
      roleId: getCurrentRole,
      status: status,
      pagename:pagename
    },
    dataType: "json",
    success: function (response) {
      if(response.statuscode == 200){
        sweet_alert("Success!", "Page Added successfully", "success");
      }
      else if(response.statuscode == 202){
        sweet_alert("Success!", "Page Unmapped successfully", "success");
      }
      else{
        sweet_alert("Sorry!", "Please try again", "error");
      }
    },
  });
};
const sweet_alert = (title, message, type) => {
  Swal.fire(title, message, type);
};
