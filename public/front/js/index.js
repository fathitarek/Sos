$( document ).ready(function() {
    $( ".add-address" ).click(function() {
  $( ".hidden-address" ).slideToggle('fast');
});

    $('#patient-carousel').carousel({
      interval: false
    });


});

//Function To Display Popup
// function abc_show() {
// document.getElementById('abc').style.display = "block";
// }
// //Function to Hide Popups
// function abc_hide(){
// document.getElementById('abc').style.display = "none";
// }


// function def_show() {
// document.getElementById('def').style.display = "block";
// }



//Function to Hide Popups
if(document.getElementById("popup"))
document.getElementById("popup").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('abc').style.display = "block";
});
if(document.getElementById("abc-hide")){
    document.getElementById("abc-hide").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('abc').style.display = "none";
});
 document.getElementById("close1").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('abc').style.display="none";
}); 
}




if(document.getElementById("browse"))
document.getElementById("browse").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('xyz').style.display = "block";
});



if(document.getElementById("hide-browse")){
   document.getElementById("hide-browse").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('xyz').style.display = "none";
});
    document.getElementById("close2").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('xyz').style.display="none";
}); 
}






if(document.getElementById("terms-show"))
document.getElementById("terms-show").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('def').style.display = "block";
});





if(document.getElementById("def-hide")){
    document.getElementById("close").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('def').style.display="none";
});
    document.getElementById("def-hide").addEventListener("click", function(event){
    event.preventDefault();
    document.getElementById('def').style.display = "none";
});
}





// function upload_show(e) {
// 	e.preventDefault()
// document.getElementById('xyz').style.display = "block";
// }
//Function to Hide Popups
// function upload_hide(e){
// 	e.preventDefault()
// document.getElementById('xyz').style.display = "none";
// }




/* star rating part*/

 var current_star_statusses = [];

    star_elements = $('.fa-star').parent();

    star_elements.find(".fa-star").each(function(i, elem)
    {
       current_star_statusses.push($(elem).hasClass('yellow'));
    });
    
    star_elements.find(".fa-star").mouseenter(changeRatingStars);
    star_elements.find(".fa-star").mouseleave(resetRatingStars);

/**
 * Changes the rating star colors when hovering over it.
 */
function changeRatingStars()
{
    // Current star hovered
    var star = $(this);

  // Removes all colors first from all stars
  $('.fa-star').removeClass('gray').removeClass('yellow');

  // Makes the current hovered star yellow
  star.addClass('yellow');

  // Makes the previous stars yellow and the next stars gray
  star.parent().prevAll().children('.fa-star').addClass('yellow');
  star.parent().nextAll().children('.fa-star').addClass('gray');
}

/**
 * Resets the rating star colors when not hovered anymore.
 */
function resetRatingStars()
{
  star_elements.each(function(i, elem)
                     {
    $(elem).removeClass('yellow').removeClass('gray').addClass(current_star_statusses[i] ? 'yellow' : 'gray');
  });
}