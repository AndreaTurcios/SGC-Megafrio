document.addEventListener('DOMContentLoaded', () => {

    // Navegation Menu
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    // Slider
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, {
        indicators: false,
        height: 500,
        duration: 500,
        interval: 3000
    });       
});


document.addEventListener('DOMContentLoaded', function() {
    //modals
    M.Modal.init(document.querySelectorAll('.modal'));
    //Datepickers    
    //var instance = M.Datepicker.getInstance(elem);
    var elems = document.querySelectorAll('.datepicker');
    
  });

//   $(document).ready(function() {    
//     $('.modal').modal();
//     //this are my init
//     $('#modal').datepicker();
//     $('#modal').setDate(new Date());
// });

$(document).ready(function(){
    $('select').formSelect();
  });



$(".dropdown-trigger").dropdown();

 //Products
 $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    $('.datepicker').datepicker();
});