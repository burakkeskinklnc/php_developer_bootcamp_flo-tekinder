$(document).ready(function () {
  if ($("#emlakDataTable").length > 0) {
    $("#emlakDataTable").DataTable({
      language: {
        url: "../assets/js/datatables_tr.json",
      },
      dom: "<'row'<'col-sm-4 text-left'l><'col-sm-4 text-center'f><'col-sm-4 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>",
      searchable: true,
      ordering: false,
      processing: false,
      search: {
        caseInsensitive: true,
      },

      buttons: [
        {
          extend: "pdf",
          text: "PDF Aktar",
          exportOptions: {
            modifier: {
              page: "current",
            },
          },
        },
      ],
    });
  }
  $(document).on("click", ".emlakSil", function () {
    var id = $(this).attr("data-id");

    Swal.fire({
      icon: "question",
      title: "Emlak verisini silmek istediğinize emin misiniz?",
      showCancelButton: true,
      confirmButtonText: "Evet, eminim",
      cancelButtonText: "Hayır, değilim",
    }).then(function (result) {
      if (result.isConfirmed) {
        window.location.href = "/proje/pages/sil.php?id=" + id;
      }
    });
  });

  $(document).on("submit", 'form[name="yeniEkle"]', function () {
    var formData = new FormData(this);

    $(this)
      .closest('form[name="yeniEkle"]')
      .find(
        "input[type=text],input[type=password],input[type=email],input[type=number],input[type=file], textarea,select"
      )
      .val("");
    $.ajax({
      url: "/proje/pages/ekle.php",
      data: formData,
      contentType: false,
      processData: false,
      type: "POST",
      success: function (data) {
        console.log("data =>", data);
        if (typeof data === "string") data = JSON.parse(data);
        if (data.error === "0") {
          swal.fire({
            text: data.text,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Tamam",
            customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary",
            },
          });
        } else {
          swal.fire({
            text: data.text,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Tamam",
            customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary",
            },
          });
        }
      },
      error: function (xhr) {
        swal.fire({
          title: xhr.status,
          text: xhr.statusText,
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Tamam",
          customClass: {
            confirmButton: "btn font-weight-bold btn-light-primary",
          },
        });
      },
    });
  });

  $(document).on("submit", 'form[name="ilanGuncelle"]', function () {
    var formData = new FormData(this);
    $.ajax({
      url: "/proje/pages/guncelle.php",
      data: formData,
      contentType: false,
      processData: false,
      type: "POST",
      success: function (data) {
        console.log("data =>", data);
        if (typeof data === "string") data = JSON.parse(data);
        if (data.error === "0") {
          swal
            .fire({
              text: data.text,
              icon: "success",
              buttonsStyling: false,
              confirmButtonText: "Tamam",
              customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary",
              },
            })
            .then((result) => {
              if (result.isConfirmed) {
                var id = $("input[name='ilanId']").val();
                window.location.href = "/proje/pages/duzenle.php?id=" + id;
              }
            });
        } else {
          swal.fire({
            text: data.text,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Tamam",
            customClass: {
              confirmButton: "btn font-weight-bold btn-light-primary",
            },
          });
        }
      },
      error: function (xhr) {
        swal.fire({
          title: xhr.status,
          text: xhr.statusText,
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Tamam",
          customClass: {
            confirmButton: "btn font-weight-bold btn-light-primary",
          },
        });
      },
    });
  });
});

$(document).ready(function () {
  if ($("#il").length > 0) {
    if ($("#il").val() !== "") {
      var ilceId = $("#ilceId").val();
      ilceGetir(ilceId);
    }
  }
});

function ilceGetir(ilceId) {
  var sehirId = $("#il").val();
  $.ajax({
    url: "/proje/pages/ilceGetir.php?sehirId=" + sehirId,
    data: {},
    contentType: false,
    processData: false,
    type: "GET",
    success: function (data) {
      console.log("data =>", data);
      if (typeof data === "string") data = JSON.parse(data);
      if (data.error === "0") {
        $("#ilce").html("<option value=''>Seçiniz</option>");
        for (let i = 0; i < data.response.length; i++) {
          var option = "<option value='" + data.response[i].id + "'";
          if (ilceId !== undefined && ilceId == data.response[i].id) {
            option += " selected ";
          }
          option = option + ">" + data.response[i].ilceadi + "</option>";
          $("#ilce").append(option);
        }
      }
    },
  });
}
