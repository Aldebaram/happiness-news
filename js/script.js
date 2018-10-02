function goBack() {
  window.history.back(); //go back to previous page
}

function loading() {
  document.getElementById("second").innerHTML +=
    "<div class=\"progress\"><div class=\"indeterminate\"></div></div>"; //insert loading bar
  document.getElementById("form").submit(); // Form submission
}


// initialize materialize character count
const textNeedCount = document.querySelector('#content');
const textNeedCountInstance = new M.CharacterCounter(textNeedCount);
