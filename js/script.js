function goBack() {
  window.history.back(); //go back to previous page
}

function loading() {
  document.getElementById("second").innerHTML +=
    "<div class=\"progress\"><div class=\"indeterminate\"></div></div>"; //insert loading bar
  document.getElementById("form").submit(); // Form submission
}


// initialize materialize character count
document.addEventListener('DOMContentLoaded', function() {

  var elems = document.querySelectorAll('.carousel');
  var instance = M.Carousel.init(elems, {
    dist: 0,
    shift: 0,
    padding: 20,
    numVisible: 3
  });
  // Initialize the character counter on the create post form
  const textCont = document.querySelector('#content');
  const textContInstance = new M.CharacterCounter(textCont);

  const textTitle = document.querySelector('#title');
  const textTitleInstance = new M.CharacterCounter(textTitle);

  const textSlug = document.querySelector('#slug');
  const textSlugInstance = new M.CharacterCounter(textSlug);

  const textDesc = document.querySelector('#desc');
  const textDescInstance = new M.CharacterCounter(textDesc);

  const textTags = document.querySelector('#tags');
  const textTagsInstance = new M.CharacterCounter(textTags);



});
