//! validation for not enter number in name field..
$(function () {
  $("#name").keydown(function (e) {
    if (e.ctrlKey || e.altKey) {
      e.preventDefault();
    } else {
      const allowedKeys = [
        "Backspace",
        "Tab",
        "Delete",
        " ", // Space
        "ArrowLeft",
        "ArrowUp",
        "ArrowRight",
        "ArrowDown",
        "End",
        "Home",
      ];

      // Allow A-Z keys
      const isAlpha = /^[a-zA-Z]$/.test(e.key);

      if (!allowedKeys.includes(e.key) && !isAlpha) {
        e.preventDefault();
      }
    }
  });

  //! validation for not enter alphabets in the number field..
  $("#number").keydown(function (e) {
    // Prevent default action if Shift, Ctrl, or Alt keys are pressed
    if (e.shiftKey || e.ctrlKey || e.altKey) {
      e.preventDefault();
    } else {
      // Define allowed keys
      const allowedKeys = [
        "Backspace",
        "Tab",
        "Delete",
        "ArrowLeft",
        "ArrowRight",
        "Enter",
        ")",
        "*",
        "@",
      ];

      // Allow number keys (0-9 and numpad numbers)
      const isNumber = /^\d$/.test(e.key);
      const isNumpadNumber = e.code.startsWith("Numpad") && /^\d$/.test(e.key);

      if (!allowedKeys.includes(e.key) && !isNumber && !isNumpadNumber) {
        e.preventDefault();
      }
    }
  });

  $("#email").keydown(function (e) {
    // Prevent default action if Shift, Ctrl, or Alt keys are pressed
    if (e.ctrlKey || e.altKey) {
      e.preventDefault();
    } else {
      // Define allowed keys
      const allowedKeys = [
        "Backspace",
        "Tab",
        "Delete",
        "ArrowLeft",
        "ArrowRight",
        "Enter",
        ".",
        "@",
        "-",
        "_",
      ];

      // Allow alphanumeric characters and specific special characters
      const isAlphanumeric = /^[a-zA-Z0-9]$/.test(e.key);
      const isSpecialChar = /^[._@-]$/.test(e.key);
      const isControlKey = allowedKeys.includes(e.key);

      if (!isAlphanumeric && !isSpecialChar && !isControlKey) {
        e.preventDefault();
      }
    }
  });
});

// !function for discount input field
$("#numberInput").keydown(function (e) {
  if (e.shiftKey || e.ctrlKey || e.altKey) {
    e.preventDefault();
  } else {
    var key = e.keyCode || e.which;
    if (
      !(
        (
          key == 8 || // Backspace
          key == 9 || // Tab
          key == 127 || // Delete
          key == 41 || // )
          key == 42 || // *
          key == 64 || // @
          key == 37 ||
          key == 39 || // Left arrow
          (key >= 48 && key <= 57) || // Numbers
          (key >= 96 && key <= 105)
        ) // Numpad numbers
      )
    ) {
      e.preventDefault();
    }
  }
});

//! function for check name value..
function show_name(value) {
  //   console.log(value);
  var nameRegex =
    /^([a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff][a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff ',.-]*)+$/;
  if (!nameRegex.test(value)) {
    $("#name").css("border", "1px solid red");
  } else {
    $("#name").css("border", "1px solid #7f9db9");
  }

  if ($("#name").val().length != 0) {
    $("#name").css("border", "1px solid #7f9db9");
    $(".error1").hide();
  }
}

//! function for check email value..
function checkEmail(value) {
  var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  if (!emailRegex.test(value)) {
    $("#email").css("border", "1px solid red");
  } else if (value.length == null || value.length == "") {
    $("#email").css("border", "1px solid #7f9db9");
    $("#email").focus();
  } else {
    $("#email").css("border", "1px solid #7f9db9");
    $(".error2").hide();
  }
}

//! function for check mobile value..
function checkValidateMobile(input) {
  // console.log(input);
  // var regex = /^[0-9]*$/;
  var regex = /^[0-9]{10}$/;
  if (!regex.test(input) || input.length != 10) {
    $("#number").css("border", "1px solid red");
    return false;
  } else if (input.length == null || input.length == "") {
    $("#number").css("border", "1px solid #7f9db9");
    return false;
  } else {
    $("#number").css("border", "1px solid #7f9db9");
    $(".error3").hide();
  }
}

function chooseTravelers(value) {
  var selectElement = document.getElementById("travelers");

  // Remove previous selected-option class
  selectElement.classList.remove("selected-option");

  // Add class only if value is not empty
  if (value) {
    selectElement.classList.add("selected-option");
    $("#travelers").css("border", "1px solid #7f9db9");
    $(".error4").hide();
  }
}

$(document).ready(function () {
  $("#submit1").click(function (e) {
    var name = $("#name").val();
    var phone_number = $("#number").val();
    var phone_length = $("#number").val().length;
    var total_passenger = $("#travelers").val();
    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var email = $("#email").val();
    var date = $("#date").val();
    var month = $("#month").val();
    var numberInput = $("#numberInput").val();
    // var depart_date = $("#depart_date").val();

    var img =
      '<i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>';

    var ErrorMsg = false;

    // !Validation for each input field
    if (name == "" || name == null || name == undefined) {
      $("#name").addClass("border-error");
      $(".error1").show();
      $("#name").focus();
      $("#name").css("border", "1px solid red");
      ErrorMsg = true;
      return false;
    } else {
      $("#name").css("border", "1px solid #7f9db9");
      $(".error1").hide();
    }
    // !email validation
    if (email == "" || email == null || email == undefined) {
      $("#email").css("border", "1px solid red");
      $(".error2").show();
      $("#email").focus();
      ErrorMsg = true;
      return false;
    } else if (emailRegex.test(email) === false) {
      $("#email").css("border", "1px solid red");
      var span = $("<span>")
        .append(img)
        .append("Please enter correct email, use name@example.com.")
        .css({
          display: "flex",
          "align-items": "center",
          gap: "8px",
        });
      $(".error2").html(span);
      $("#email").focus();
      ErrorMsg = true;
      return false;
    } else {
      $("#email").css("border", "1px solid #7f9db9");
      $(".error2").hide();
    }
    // !mobile number validation
    if (
      phone_number == "" ||
      phone_number == undefined ||
      phone_number == null
    ) {
      $("#number").css("border", "1px solid red");
      $(".error3").show();
      $("#number").focus();
      ErrorMsg = true;
      return false;
    } else if (phone_length != 10) {
      $("#number").css("border", "1px solid red");
      var span = $("<span>")
        .append(img)
        .append("Please enter a 10-digit mobile number.")
        .css({
          display: "flex",
          "align-items": "center",
          gap: "8px",
        });
      $(".error3").html(span);
      $("#number").focus();
      ErrorMsg = true;
      return false;
    } else {
      $("#number").css("border", "1px solid #7f9db9");
      $(".error3").hide();
    }
    // !total passenger
    if (
      total_passenger == "" ||
      total_passenger == null ||
      total_passenger == undefined
    ) {
      $("#travelers").css("border", "1px solid red");
      $(".error4").show();
      ErrorMsg = true;
      return false;
    } else {
      $("#travelers").css("border", "1px solid #7f9db9");
      $(".error4").hide();
    }

    // !depart date
    if (
      month === "" ||
      date === "" ||
      $(".depart-date").text() == "Departure Date (Any)"
    ) {
      $(".error5").show();
      ErrorMsg = true;
      return false;
    } else {
      $(".error5").hide();
      ErrorMsg = false;
      let month = $("#month").val();
      let date = $("#date").val();
      let finaldate = date + "-" + month;
      $("#depart_date").val(finaldate);
      // let newdate = $("#depart_date").val();
      // console.log(newdate);
      // month = $("#month").val();
      // date = $("#date").val();
      // var finaldate = date + "-" + month;
      // $("#depart_date").val(date + "-" + month);
    }

    // !zip code
    if ($("#numberInput").val().length == 0) {
      console.log("all ok");
    } else {
      if ($("#numberInput").val().length != 5) {
        $("#numberInput").css("border", "1px solid red");
        $("#collapseExample").collapse("show");
        $("#numberInput").focus();
        return false;
      } else {
        $("#numberInput").css("border", "1px solid #7f9db9");
        $("#collapseExample").collapse("hide");
      }
    }

    //  var destinationvalue = $('[name="destination-input[]"]:checked')
    //    .map(function () {
    //      return $(this).val();
    //    })
    //    .get();
    //   var cruiselengthvalue = $('[name="cruise-length[]"]:checked')
    //     .map(function () {
    //       return $(this).val();
    //     })
    //     .get();
    //  var cruiselinevalue = $('[name="cruise-line[]"]:checked')
    //    .map(function () {
    //      return $(this).val();
    //    })
    //    .get();
    //  var cruiseportvalue = $('[name="cruise-port[]"]:checked')
    //    .map(function () {
    //      return $(this).val();
    //    })
    //    .get();
    //  var cruisesgipvalue = $('[name="cruise-ship[]"]:checked')
    //    .map(function () {
    //      return $(this).val();
    //    })
    //    .get();

    e.preventDefault();
    e.stopPropagation();
    if (!ErrorMsg) {
      $("#submit1").hide();
      $("#loading").show();
      console.log($("#cruiseForm").serialize());
      // AJAX FOR FOR SUBMIT
      $.ajax({
        type: "post",
        url: "api.php",
        data: $("#cruiseForm").serialize(),
        success: function (response) {
          console.log(response);
          // response = JSON.parse(response);
          if (response["success"]) {
            // email_template();
            setTimeout(function () {
              $("#loading").hide();
              $("#formSubmitted").show();
              $("#myToast").toast("show");
              // $("#mail").html(response["template"]).show(); // it is for check the email form only
            }, 1000);
            $("#cruiseForm")[0].reset();
            $(".destination-text").text("Destination (Any)");
            $(".cruiselength-text").text("Cruise Length (Any)");
            $(".cruiseline-text").text("Cruise Line (Any)");
            $(".cruiseport-text").text("Cruise Port (Any)");
            $(".cruiseship-text").text("Cruise Ship (Any)");
            $(".depart-date").text("Departure Date (Any)");
          } else {
            $("#loading").hide();
            $("#formSubmitted").text(response["message"]);
            $("#formSubmitted").show();
          }
        },
      });
    }
  });
});
