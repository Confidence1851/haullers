function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
}
document.querySelector('.skip--btn').addEventListener('click', function () {
  document.querySelector('.loader').style.display = 'none';
});

// Scroll Function 
if (window.innerWidth > 1200) {
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > 2) {
      document.getElementById("navbar").style.backgroundColor = '#000000';
      //document.getElementById("navbar").style.boxShadow = '0 .2rem 2rem #4d4d4d';
    } else {
      //document.getElementById("navbar").style.boxShadow = '0 0 0';
      document.getElementById("navbar").style.backgroundColor = '#000000';
    }
    prevScrollpos = currentScrollPos;
  }
}

// Accordion
// var acc = document.getElementsByClassName("accordion");
// var i;
        
// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var panel = this.nextElementSibling;
//     if (panel.style.maxHeight) {
//       panel.style.maxHeight = null;
//     } else {
//       panel.style.maxHeight = panel.scrollHeight + "px";
//     } 
//   });
// }

// var accd = document.getElementById('accodionBox');
// console.log(accd);
// accordion.style.display= 'none';



// Flickity
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity(elem, {
  pageDots: false,
  prevNextButtons: false,
  autoPlay: 1500,
  cellAlign: 'left',
  contain: true
});

// element argument can be a selector string
//   for an individual element
var flkty = new Flickity('.main-carousel2', {
  pageDots: false,
  autoPlay: 1500,
  cellAlign: 'left',
  contain: true
});


var flkty = new Flickity('main-carousel3', {
  pageDots: true,
  autoPlay: 1500,
  prevNextButtons: false,
  cellAlign: 'center',
  contain: true
});


// Sidebar 
function openNav() {
  var x = document.getElementById('sideBar');
  var y = document.querySelector('.fa-bars');

  if (x.style.display === "block") {
    x.style.display = "none";
    y.style.webkitTransform = 'rotate(90deg)';
  } else {
    x.style.display = "block";
    y.style.webkitTransform = 'rotate(0)';
  }

  console.log('I was clicked');
}




// Tabs
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}