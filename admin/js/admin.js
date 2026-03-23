$('input[name="name"]').on("keyup", function () {
  let slug = $(this)
    .val()
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/(^-|-$)/g, "");

  $('input[name="slug"]').val(slug);
});
$.validator.addClassRules("required", {
  required: true,
});
$(".ajaxForm").validate({
  ignore: [],
  errorElement: "span",
  errorClass: "text-danger",

  highlight: function (element) {
    $(element).addClass("is-invalid");
  },

  unhighlight: function (element) {
    $(element).removeClass("is-invalid");
  },

  errorPlacement: function (error, element) {
    error.insertAfter(element);
  },
});
$(document).on("submit", ".ajaxForm", function (e) {
  e.preventDefault();

  let form = this;

  // ✅ CHECK VALIDATION
  if (!$(form).valid()) {
    return false;
  }

  let formData = new FormData(form);
  let url = $(form).attr("action") || "api.php";
  let method = $(form).attr("method") || "POST";
  let submitBtn = $(form).find("[type=submit]");

  $.ajax({
    url: url,
    type: method,
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json",

    beforeSend: function () {
      submitBtn.prop("disabled", true);

      Swal.fire({
        title: "Please wait",
        text: "Processing...",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
      });
    },

    success: function (res) {
      Swal.close();

      if (res.status == "success") {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: res.message,
          timer: 2000,
          showConfirmButton: false,
        }).then(() => {
          if (res.redirect) {
            window.location.href = res.redirect;
          } else if (res.reload) {
            location.reload();
          } else {
            form.reset();
            $(form).find(".is-invalid").removeClass("is-invalid");
          }
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: res.message || "Something went wrong",
        });
      }
    },

    error: function () {
      Swal.close();
      Swal.fire("Error", "Server error occurred", "error");
    },

    complete: function () {
      submitBtn.prop("disabled", false);
    },
  });
});

$(document).on("click", ".delete_record", function () {
  let id = $(this).data("id");
  let action = $(this).data("action");
  let deleteUrl = $("#deleteIUrl").val();

  if (!id || !deleteUrl) {
    console.error("Delete ID or URL missing");
    return;
  }

  Swal.fire({
    title: "Are you sure?",
    text: "This record will be permanently deleted!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    confirmButtonText: "Yes, delete it",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: deleteUrl,
        type: "POST",
        dataType: "json",
        data: {
          action: action, // 🔥 change dynamically if needed
          id: id,
        },

        success: function (res) {
          if (res.status === "success") {
            // Remove row smoothly
            $("#row-" + id).fadeOut(300, function () {
              $(this).remove();
            });

            Swal.fire({
              icon: "success",
              title: "Deleted",
              text: res.message,
              timer: 1500,
              showConfirmButton: false,
            });
          } else {
            Swal.fire("Error", res.message, "error");
          }
        },

        error: function () {
          Swal.fire("Error", "Server error occurred", "error");
        },
      });
    }
  });
});
