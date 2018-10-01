function goBack() {
  window.history.back();
}

function loading() {
  document.getElementById("second").innerHTML +=
    "<div class=\"progress\"><div class=\"indeterminate\"></div></div>";
  document.getElementById("form").submit(); // Form submission
}
