$(document).ready(function () {
  const $monthSelect = $("#month");
  const $dateSelect = $("#date");
  const $flexibilityLi = $(".drop_scroll li.p-3").eq(1);
  const $errorMessage = $(".error5");

  const currentYear = new Date().getFullYear();
  const currentMonth = new Date().getMonth(); // 0-based index
  const currentDate = new Date().getDate();

  // Function to populate month dropdown
  const populateMonths = () => {
    $monthSelect.empty().append('<option value="">Any Month</option>');
    for (let year = currentYear; year <= currentYear + 3; year++) {
      for (
        let month = year === currentYear ? currentMonth : 0;
        month < 12;
        month++
      ) {
        const monthName = new Date(year, month).toLocaleString("default", {
          month: "short",
        });
        $monthSelect.append(
          $("<option>")
            .val(`${month + 1}-${year}`)
            .html(
              `<span class="month">${monthName}</span> <span class="year">${year}</span>`
            )
        );
      }
    }
  };

  // Function to get the number of days in a month
  const getDaysInMonth = (month, year) => {
    return new Date(year, month, 0).getDate();
  };

  // Update date dropdown based on selected month and year
  const updateDays = () => {
    $dateSelect.empty().append('<option value="">Any Date</option>');

    const [month, year] = $monthSelect.val().split("-").map(Number);
    if (month && year) {
      const days = getDaysInMonth(month, year);

      // Populate date dropdown with all days initially disabled
      for (let i = 1; i <= days; i++) {
        $dateSelect.append($("<option>").val(i).text(i).prop("disabled", true));
      }

      // Enable relevant dates
      if (year === currentYear && month === currentMonth + 1) {
        // Enable dates from today onwards in the current month
        for (let i = currentDate; i <= days; i++) {
          $dateSelect.find(`option[value="${i}"]`).prop("disabled", false);
        }
      } else {
        // Enable all dates in future months
        for (let i = 1; i <= days; i++) {
          $dateSelect.find(`option[value="${i}"]`).prop("disabled", false);
        }
      }
    }
  };

  // Initial population of month dropdown
  populateMonths();

  // Event listener for month selection
  $monthSelect.on("change", function () {
    updateDays();
  });

  // Check selection and toggle the item visibility
  const checkSelection = () => {
    const monthValue = $monthSelect.val();
    const dateValue = $dateSelect.val();

    if (monthValue && dateValue) {
      $flexibilityLi.show();
    } else {
      $flexibilityLi.hide();
    }
  };

  $monthSelect.add($dateSelect).on("change", function () {
    checkSelection();
    $errorMessage.hide();
  });
});
