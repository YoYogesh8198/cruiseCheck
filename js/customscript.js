// script.js
$(document).ready(function () {
  // ! it for when we refresh our website then it start from top
  window.scroll({
    top: 0,
    left: 0,
    behavior: "smooth",
  });

  // !Additional discount
  $(document).ready(function () {
    $("#collapseExample").on("show.bs.collapse", function () {
      $("#buttonContainer").css({
        top: "10px",
        position: "relative",
      });
    });

    $("#collapseExample").on("hide.bs.collapse", function () {
      $("#buttonContainer").css({
        top: "-35px",
        position: "absolute",
      });
    });
  });

  // ! ??
  var elements = document.getElementsByTagName("INPUT");
  for (var i = 0; i < elements.length; i++) {
    elements[i].oninvalid = function (e) {
      e.target.setCustomValidity("");
      if (!e.target.validity.valid) {
        switch (e.target.id) {
          case "username":
            e.target.setCustomValidity("Username cannot be blank");
            break;
          case "email":
            e.target.setCustomValidity("Please enter a valid email address");
            break;
        }
        e.target.classList.add("error"); // Add 'error' class for styling
      }
    };
    elements[i].oninput = function (e) {
      e.target.setCustomValidity("");
      e.target.classList.remove("error"); // Remove 'error' class on input
    };
  }
  // ! For change the background image of form
  // Array of image URLs
  const images = [
    // './images/background/banner-bg-1.jpg',
    "./images/background/bannerbg-1.jpg?v=0.0.02",
    "./images/background/bannerbg-2.jpg?v=0.0.02",
    "./images/background/bannerbg-3.jpg?v=0.0.02",
    "./images/background/bannerbg-4.jpg?v=0.0.02",
  ];
  // Get a random index from the array
  const randomIndex = Math.floor(Math.random() * images.length);
  // Set the image source
  $(".main_section").css(
    "background-image",
    "url('" + images[randomIndex] + "')"
  );

  // !for disbale the extra width of label
  document.querySelectorAll(".dropdown-menu label").forEach((element) => {
    element.addEventListener("click", function (event) {
      event.stopPropagation();
    });
  });

  // !for disbale the extra space of bottom/row in apply and cancel button
  document.querySelectorAll(".dropdown-menu .row").forEach((element) => {
    element.addEventListener("click", function (e) {
      // Check if the clicked element has a specific class
      if (
        !e.target.closest(".apply_btn_cancel") &&
        !e.target.closest(".apply_btn")
      ) {
        e.stopPropagation();
        e.preventDefault(); // Prevent default behavior for elements that aren't the apply or cancel buttons
      }
    });
  });

  // !for disable the extra space of date field
  document
    .querySelectorAll(".dropdown-menu .drop_scroll")
    .forEach((element) => {
      element.addEventListener("click", function (e) {
        if (
          !e.target.closest("#month") &&
          !e.target.closest("#date") &&
          !e.target.closest("#flexible-date")
        ) {
          e.stopPropagation();
          e.preventDefault();
        }
      });
    });

  // !========================destination===================
  $(".desti-btn").on("click", function () {
    var selectedValues = [];

    $('input[type="checkbox"][name="destination-input[]"]:checked').each(
      function () {
        selectedValues.push($(this).val());
      }
    );
    console.log(selectedValues);
    // Update text based on selections
    if (selectedValues.length === 0) {
      $(".destination-text").text("Destination (Any)");
    } else {
      $(".destination-text").text(
        "Destination (" + selectedValues.length + ")"
      );
    }
  });

  // Handle click on any other checkbox
  $('input[type="checkbox"][name="destination-input[]"]').on(
    "click",
    function () {
      // If the clicked checkbox is not the one with value="any" and it's being checked, uncheck the 'any' checkbox
      if (
        $(this).attr("value") !== "Destination (Any)" &&
        $(this).is(":checked")
      ) {
        $(
          'input[type="checkbox"][name="destination-input[]"][value="Destination (Any)"]'
        ).prop("checked", false);
      }
      // Allow the 'any' checkbox to be re-checked if it was manually clicked
      if (
        $(this).attr("value") === "Destination (Any)" &&
        $(this).is(":checked")
      ) {
        // Do nothing special, 'any' checkbox should stay checked if manually clicked
      }
    }
  );

  $(
    'input[type="checkbox"][name="destination-input[]"][value="Destination (Any)"]'
  ).on("click", function () {
    // Uncheck all checkboxes with the name 'destination-input[]'
    $('input[type="checkbox"][name="destination-input[]"]').prop(
      "checked",
      false
    );

    // Check the 'any' checkbox
    $(this).prop("checked", true);
  });

  // ========================cruise length===================
  $(".cruise-btn").on("click", function () {
    var selectedValues = [];

    $('input[type="checkbox"][name="cruise-length[]"]:checked').each(
      function () {
        selectedValues.push($(this).val());
      }
    );
    // Update text based on selections
    if (selectedValues.length === 0) {
      $(".cruiselength-text").text("Cruise Length (Any)");
    } else {
      $(".cruiselength-text").text(
        "Cruise Length (" + selectedValues.length + ")"
      );
    }
    console.log(selectedValues);
  });

  // it remove default selected when we select any other
  $('input[type="checkbox"][name="cruise-length[]"]').on("click", function () {
    if (
      $(this).attr("value") !== "Cruise Length (Any)" &&
      $(this).is(":checked")
    ) {
      $(
        'input[type="checkbox"][name="cruise-length[]"][value="Cruise Length (Any)"]'
      ).prop("checked", false);
    }
    // Allow the 'any' checkbox to be re-checked if it was manually clicked
    if (
      $(this).attr("value") === "Cruise Length (Any)" &&
      $(this).is(":checked")
    ) {
      // Do nothing special, 'any' checkbox should stay checked if manually clicked
    }
  });

  $(
    'input[type="checkbox"][name="cruise-length[]"][value="Cruise Length (Any)"]'
  ).on("click", function () {
    // Uncheck all checkboxes with the name 'destination-input[]'
    $('input[type="checkbox"][name="cruise-length[]"]').prop("checked", false);

    // Check the 'any' checkbox
    $(this).prop("checked", true);
  });
  // ========================cruise line===================
  $(".cruiseline-btn").on("click", function () {
    var selectedValues = [];

    $('input[type="checkbox"][name="cruise-line[]"]:checked').each(function () {
      selectedValues.push($(this).val());
    });
    // Update text based on selections
    if (selectedValues.length === 0) {
      $(".cruiseline-text").text("Cruise Line (Any)");
    } else {
      $(".cruiseline-text").text("Cruise Line (" + selectedValues.length + ")");
    }
    console.log(selectedValues);
  });
  // it remove default selected when we select any other
  $('input[type="checkbox"][name="cruise-line[]"]').on("click", function () {
    if (
      $(this).attr("value") !== "Cruise Line (Any)" &&
      $(this).is(":checked")
    ) {
      $(
        'input[type="checkbox"][name="cruise-line[]"][value="Cruise Line (Any)"]'
      ).prop("checked", false);
    }
    // Allow the 'any' checkbox to be re-checked if it was manually clicked
    if (
      $(this).attr("value") === "Cruise Line (Any)" &&
      $(this).is(":checked")
    ) {
      // Do nothing special, 'any' checkbox should stay checked if manually clicked
    }
  });

  $(
    'input[type="checkbox"][name="cruise-line[]"][value="Cruise Line (Any)"]'
  ).on("click", function () {
    // Uncheck all checkboxes with the name 'destination-input[]'
    $('input[type="checkbox"][name="cruise-line[]"]').prop("checked", false);

    // Check the 'any' checkbox
    $(this).prop("checked", true);
  });
  // !================================cruise port=========================
  $(".cruiseport-btn").on("click", function () {
    var selectedValues = [];

    $('input[type="checkbox"][name="cruise-port[]"]:checked').each(function () {
      selectedValues.push($(this).val());
    });
    // Update text based on selections
    if (selectedValues.length === 0) {
      $(".cruiseport-text").text("Cruise Port (Any)");
    } else {
      $(".cruiseport-text").text("Cruise Port (" + selectedValues.length + ")");
    }
    console.log(selectedValues);
  });
  // it remove default selected when we select any other
  $('input[type="checkbox"][name="cruise-port[]"]').on("click", function () {
    if (
      $(this).attr("value") !== "Cruise Port (Any)" &&
      $(this).is(":checked")
    ) {
      $(
        'input[type="checkbox"][name="cruise-port[]"][value="Cruise Port (Any)"]'
      ).prop("checked", false);
    }
    // Allow the 'any' checkbox to be re-checked if it was manually clicked
    if (
      $(this).attr("value") === "Cruise Port (Any)" &&
      $(this).is(":checked")
    ) {
      // Do nothing special, 'any' checkbox should stay checked if manually clicked
    }
  });

  $(
    'input[type="checkbox"][name="cruise-port[]"][value="Cruise Port (Any)"]'
  ).on("click", function () {
    // Uncheck all checkboxes with the name 'destination-input[]'
    $('input[type="checkbox"][name="cruise-port[]"]').prop("checked", false);

    // Check the 'any' checkbox
    $(this).prop("checked", true);
  });
  // !=========================cruise ship==================
  $(".cruiseship-btn").on("click", function () {
    var selectedValues = [];

    $('input[type="checkbox"][name="cruise-ship[]"]:checked').each(function () {
      selectedValues.push($(this).val());
    });
    // Update text based on selections
    if (selectedValues.length === 0) {
      $(".cruiseship-text").text("Cruise Ship (Any)");
    } else {
      $(".cruiseship-text").text("Cruise Ship (" + selectedValues.length + ")");
    }
    console.log(selectedValues);
  });
  // it remove default selected when we select any other
  $('input[type="checkbox"][name="cruise-ship[]"]').on("click", function () {
    if (
      $(this).attr("value") !== "Cruise Ship (Any)" &&
      $(this).is(":checked")
    ) {
      $(
        'input[type="checkbox"][name="cruise-ship[]"][value="Cruise Ship (Any)"]'
      ).prop("checked", false);
    }
    // Allow the 'any' checkbox to be re-checked if it was manually clicked
    if (
      $(this).attr("value") === "Cruise Ship (Any)" &&
      $(this).is(":checked")
    ) {
      // Do nothing special, 'any' checkbox should stay checked if manually clicked
    }
  });

  $(
    'input[type="checkbox"][name="cruise-ship[]"][value="Cruise Ship (Any)"]'
  ).on("click", function () {
    // Uncheck all checkboxes with the name 'destination-input[]'
    $('input[type="checkbox"][name="cruise-ship[]"]').prop("checked", false);

    // Check the 'any' checkbox
    $(this).prop("checked", true);
  });

  // !=======================depart date dropdown========================
  function updateDepartureDateText() {
    var month = $("#month").val();
    var day = $("#date").val();
    var flexibility = parseInt($("#flexible-date").val(), 10);

    // Default text
    var text = "Departure Date (Any)";
    var pdate = "";
    var ndate = "";

    // Check if both month and day are provided
    if (month && day) {
      var monthText = month || "Any Month";
      var dayText = day || "Any Day";
      var dateString = `${dayText}-${monthText}`;
      var dateParts = dateString.split("-");

      // Parse the date
      var selectedDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

      if (flexibility === 0) {
        // If flexibility is 0, show the selected date
        ndate = selectedDate.toDateString().split(" ");
        ndate = ndate[1] + " " + ndate[2] + ", " + ndate[3];
        text = `${ndate}`;
      } else {
        // Apply flexibility
        ndate = new Date(selectedDate);
        ndate.setDate(ndate.getDate() + flexibility);
        ndate = ndate.toDateString().split(" ");
        ndate = ndate[1] + " " + ndate[2] + ", " + ndate[3];

        pdate = new Date(selectedDate);
        pdate.setDate(pdate.getDate() - flexibility);
        pdate = pdate.toDateString().split(" ");
        pdate = pdate[1] + " " + pdate[2] + ", " + pdate[3];

        text = `${pdate} - ${ndate}`;
      }
    }

    // Update the departure date text
    $(".depart-date").text(text);
    $("#selected_flexible_date").val(text);
  }

  $(".depart-btn").on("click", function () {
    updateDepartureDateText();
    $(".error5").hide();
  });

  // Handle Cancel button click (if needed)
  // $(".depart-cancel").on("click", function () {
  //   // Reset selections and update text
  //   $("#month").val("");
  //   $("#date").val("");
  //   $('select[name="flexibility"]').val("");
  //   $(".depart-date").text("Departure Date (Any)");
  // });

  // !============== popover==============

  $(".pin-popover").popover({
    placement: "top",
    html: true,
    content: `<div class="close" data-dismiss="alert">&times;</div><div class="media"><div class="media-body">
      <h6 class="sr-discount">Resident Discount</h6>
      <p>Take advantage of discounted rates by state! Just one guest needs to qualify for everyone in your stateroom to be eligible for state savings. At pier check-in, show proof of residency, such as a driver's license. Applicable states and rates change often, so be sure to ask our cruise experts for the latest deals offered to residents of your state.</p></div></div>`,
  });
  $(document).on("click", ".popover .close", function () {
    $(this).parents(".popover").popover("hide");
  });

  $(".senior-popover").popover({
    placement: "top",
    html: true,
    content: `<div class="close" data-dismiss="alert">&times;</div><div class="media"><div class="media-body">
      <h6 class="sr-discount">Senior Discount</h6>
      <p>Passengers 55 and older by their departure date may qualify for special rates. Confirm your age with a government-issued ID, such as a passport or driver's license, at the pier before boarding the ship. Most cruise lines qualify seniors as 55 and older. Exceptions include Costa Cruises, Crystal Cruises, Disney Cruise Line, Holland America Line, and Princess Cruises, which qualify seniors as 60 and older.</p></div></div>`,
  });
  $(document).on("click", ".popover .close", function () {
    $(this).parents(".popover").popover("hide");
  });
});

// !===============popover hide============
$("body").on("click", function (e) {
  // Array of popover classes to check
  const popoverClasses = [".popover", ".pin-popover", ".senior-popover"];

  $("[data-toggle=popover]").each(function () {
    if (
      !$(this).is(e.target) &&
      $(this).has(e.target).length === 0 &&
      !popoverClasses.some((cls) => $(cls).has(e.target).length > 0)
    ) {
      $(this).popover("hide");
    }
  });
});

// !==================zip code ===========
$(document).ready(function () {
  $("#numberInput").on("input", function () {
    var value = $(this).val();
    if (value.length > 5) {
      $(this).val(value.slice(0, 5));
    }
  });
});

// ! this is for F&Q
// ! scrolling effect with smooth behaviour
// $(document).ready(function () {
//   $(".accordion").on("shown.bs.collapse", function (e) {
//     var id = $(e.target).closest(".accordion-item");
//     navigateToElement(id);
//   });
//   function navigateToElement(id) {
//     $("html, body").animate({ scrollTop: id.offset().top }, 300);
//   }
// });
$(document).ready(function () {
  function smoothScrollToElement(el) {
    if (!el) return;

    const offsetTop = $(el).offset().top;

    $("html, body").animate(
      {
        scrollTop: offsetTop,
      },
      300
    );
  }

  $(".accordion").on("shown.bs.collapse", function (e) {
    const $card = $(e.target).closest(".accordion-item");

    // Ensure that the element is found and valid
    if ($card.length) {
      smoothScrollToElement($card);
    }
  });
});

// new slider script
/*-------------------- Vars --------------------*/
let progress = 50;
let startX = 0;
let active = 0;
let isDown = false;

/*-------------------- Contants --------------------*/
const speedWheel = 0.02;
const speedDrag = -0.1;

/*-------------------- Get Z --------------------*/
const getZindex = (array, index) =>
  array.map((_, i) =>
    index === i ? array.length : array.length - Math.abs(index - i)
  );

/*-------------------- Items --------------------*/
const $items = document.querySelectorAll(".carousel-item1");
const $cursors = document.querySelectorAll(".cursor");

const displayItems = (item, index, active) => {
  const zIndex = getZindex([...$items], active)[index];
  item.style.setProperty("--zIndex", zIndex);
  item.style.setProperty("--active", (index - active) / $items.length);
};

/*-------------------- Animate --------------------*/
const animate = () => {
  progress = Math.max(0, Math.min(progress, 100));
  active = Math.floor((progress / 100) * ($items.length - 1));

  $items.forEach((item, index) => displayItems(item, index, active));
};
animate();

/*-------------------- Click on Items --------------------*/
$items.forEach((item, i) => {
  item.addEventListener("click", () => {
    progress = (i / $items.length) * 100 + 10;
    animate();
  });
});

/*-------------------- Handlers --------------------*/
const handleWheel = (e) => {
  const wheelProgress = e.deltaY * speedWheel;
  progress = progress + wheelProgress;
  animate();
};

const handleMouseMove = (e) => {
  if (e.type === "mousemove") {
    $cursors.forEach(($cursor) => {
      $cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
    });
  }
  if (!isDown) return;
  const x = e.clientX || (e.touches && e.touches[0].clientX) || 0;
  const mouseProgress = (x - startX) * speedDrag;
  progress = progress + mouseProgress;
  startX = x;
  animate();
};

const handleMouseDown = (e) => {
  isDown = true;
  startX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
};

const handleMouseUp = () => {
  isDown = false;
};

/*-------------------- Listeners --------------------*/
document.addEventListener("mousewheel", handleWheel);
document.addEventListener("mousedown", handleMouseDown);
document.addEventListener("mousemove", handleMouseMove);
document.addEventListener("mouseup", handleMouseUp);
document.addEventListener("touchstart", handleMouseDown);
document.addEventListener("touchmove", handleMouseMove);
document.addEventListener("touchend", handleMouseUp);


