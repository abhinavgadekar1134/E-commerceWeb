function mobiles() {
            $('html, body').animate({
                scrollTop: $("#Mobile_DOWN").offset().top
            },1000);
        }
function laptops() {
            $('html, body').animate({
                scrollTop: $("#Laptop_DOWN").offset().top
            },5000);
        }        
function loadstopfn(){
    document.getElementById("mainloadingdiv").style.display = "none";
    document.getElementById("scroll-hide").style.overflowY = "scroll";
}

$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});

        
