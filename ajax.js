$("#pizza_form").submit(function () {
  $.ajax({
    url: "functional.php",
    type: "POST",
    dataType: "html",
    data: $("#pizza_form").serialize(),
    success: function (response) {
      location.reload();
    },
    error: function (response) {
      $("#message").html("Ошибка. Данные не отправлены.");
    },
  });
  return false;
});
