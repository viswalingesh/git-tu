const masterData = [
  {
    id: 1,
    title: "Stage",
    db: "master_stage",
  },
  {
    id: 2,
    title: "Process",
    db: "master_process",
  },
  {
    id: 3,
    title: "Cost Guide",
    db: "master_cost_guide",
  },
  {
    id: 4,
    title: "Project Stauts",
    db: "master_project_status",
  },
  {
    id: 5,
    title: "Department",
    db: "master_department",
  },
  {
    id: 6,
    title: "Unit Status",
    db: "master_unit_status",
  },
  {
    id: 7,
    title: "Employee Location",
    db: "master_employee_location",
  },
  {
    id: 8,
    title: "Employee Status",
    db: "master_employee_status",
  },
  {
    id: 9,
    title: "Designation",
    db: "master_designation",
  },
  {
    id: 10,
    title: "Role",
    db: "master_role",
  },
  {
    id: 11,
    title: "Vendor PO Status",
    db: "master_vendor_po_status",
  },
  {
    id: 12,
    title: "TT_App_Status",
    db: "master_tt_app_status",
  },
];
let getDbName = "";
$(document).ready(function () {
  MasterTableLoad();
});

const MasterTableLoad = () => {
  let getData = "";
  masterData.map((item) => {
    getData += `
        <tr>
        <td class="text-center">
            ${item.id}
        </td>
        <td>
        ${item.title}
        </td>
        <td class="text-center">
            <i class="bi bi-pencil-square Edit_i" data-title="${item.title}" data-db="${item.db}"></i>
        </td>
    </tr>`;
  });
  $("#MasterDataLoad").html("");
  $("#MasterDataLoad").html(getData);
};

$(document).on("click", ".Edit_i", function () {
  $("#masterDataFormPost").validate();
  resetPopup();
  resetValue();
  getDbName = $(this).attr("data-db");
  $("#dbName").val(getDbName);
  $("#Title").text($(this).attr("data-title"));
  $("#masterDataDialog").modal("show");
  listOfMasterData();
});

let GetFormId = document.getElementById("masterDataFormPost");
GetFormId.addEventListener("submit", function (e) {
  e.preventDefault();
  if ($("#masterDataFormPost").valid()) {
    LoadingEnable();
    const GetData = new FormData(GetFormId);
    fetch("controller/master-data/master-data-controller.php", {
      method: "POST",
      body: GetData,
    })
      .then((res) => res.json())
      .then((data) => {
        resetValue();
        LoadingDisable();
        if (data.statuscode == 200) {
          sweet_alert("Success!", "Added successfully", "success");
          listOfMasterData();
        } else if (data.statuscode == 202) {
          sweet_alert("Success!", "Updated successfully", "success");
          listOfMasterData();
        } else if (data.statuscode == 204) {
          sweet_alert("Sorry!", "Already this value added", "warning");
        } else {
          sweet_alert("Sorry!", "Please try again", "error");
        }
      })
      .catch((err) => {
        resetValue();
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

const listOfMasterData = () => {
  $.ajax({
    type: "POST",
    url: "controller/master-data/master-data-controller.php",
    data: {
      type: 2,
      db: getDbName,
    },
    success: function (response) {
      $("#masterValueLoad").html(response);
    },
  });
};

$(document).on("click", ".EditMaster", function () {
  resetValue();
  $(".edit_panel").removeClass("d-none");
  $("#masterDataFormPost").validate();
  $("#dropdownName").val($(this).closest("tr").attr("data-name"));
  $("#saveType").val(2);
  $("#postId").val($(this).closest("tr").attr("data-id"));
  $("#MasterDataAdd").text("Update");
});
$(document).on("click", ".edit_panel", function () {
  resetValue();
});

const resetPopup = () => {
  $("#dbName").val("");
  $("#Title").text("");
  $("#MasterDataAdd").text("Add");
  $(".loading").remove();
  $("#masterValueLoad").html("");
  getDbName = "";
};
const resetValue = () => {
  $(".edit_panel").addClass("d-none");
  $("#MasterDataAdd").text("Add");
  $("#postId, #dropdownName").val("");
  $("#saveType").val(1);
  $(".loading").remove();
};

$(document).on("click", "#CloseMasterPopup", function () {
  $("#masterDataDialog").modal("hide");
  resetPopup();
  resetValue();
});
$(document).on("click", ".RemoveMaster", function () {
  $.ajax({
    type: "POST",
    url: "controller/master-data/master-data-controller.php",
    data: {
      type: 3,
      id: $(this).closest("tr").attr("data-id"),
      db: getDbName,
    },
    dataType: "JSON",
    success: function (response) {
      if (response.statuscode == 200) {
        sweet_alert("Success!", "successfully removed", "success");
        listOfMasterData();
      } else {
        sweet_alert("Sorry!", "Please try again", "error");
      }
    },
  });
});
