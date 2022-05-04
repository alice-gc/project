$("#infoTable").on("click", "tbody tr", function(event) {
  $(this)
    .addClass("highlight")
    .siblings()
    .removeClass("highlight");
});

$(".delete-entry").click(function(e) {
  e.preventDefault(); // Don't post the form, unless confirmed
  if (confirm("Are you sure?")) {
    // Post the form
    $(e.target)
      .closest("form")
      .submit(); // Post the surrounding form
  }
});

// chart

$("#infoTable").on("click", "tbody tr", function() {
  var $row = $(this).closest("tr"); // Find the row
  // var $text = "Budget: " + $row.find(".name").text(); // Find the text

  var $name = "Budget Name: " + $row.find(".name").text();
  var $house = "Housing: " + $row.find(".house").text();

  let $text = $name + $house;
  alert($text);
  console.log($text.name);
  // alert($(this).text());
});

// chart
