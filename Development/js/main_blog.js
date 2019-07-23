
//Isotope--------------------------------------

window.onload = function loadIsotope() {
  var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows',
    getSortData: {
      name: '.name',
      symbol: '.symbol',
      number: '.number parseInt',
      category: '[data-category]',
      weight: function (itemElem) {
        var weight = $(itemElem).find('.weight').text();
        return parseFloat(weight.replace(/[\(\)]/g, ''));
      }
    }
  });


// filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function () {
      var number = $(this).find('.number').text();
      return parseInt(number, 10) > 50;
    },
    // show if name ends with -ium
    ium: function () {
      var name = $(this).find('.name').text();
      return name.match(/ium$/);
    }
  };

// bind filter button click
  $('.filters').on('click', '.link-element', function () {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({filter: filterValue});
  });


// change is-checked class on buttons
  $('.button-group').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', '.link-element', function () {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $(this).addClass('is-checked');
    });
  });

};



//Isotope--------------------------------------

// Change background based on blog type -----------------

var object = document.getElementById("header-container");
var element = document.getElementById("isotope"); //grab the element
element.onclick = function() { //asign a function
changeBG();
}

function changeBG(){
  var myElem = document.getElementById('hallowelt');

  if ($(".collapse.show")[0]){
    object.style.backgroundImage = "url('../img/business_background.jpg')";
  } else {
    console.log('hallo welt ist nicht vorhanden!')
  }


}


