function _(x){return document.getElementById(x);}

/* ------- */var ba = ["btn1","btn2","btn3","btn4","btn5","btn6"];
var ma = ["menu1","menu2","menu3","menu4","menu5","menu6"];
function posMenus(){
	for(var i=0; i < ma.length; i++){
	    var m = document.getElementById(ma[i]);
		m.style.left = (m.previousElementSibling.offsetLeft)+"px";
	}
}
function toggle(x,a){
	var tm = _(x);
	for (var m in ma) {
		if(ma[m] != x){
			_(ma[m]).style.height = "0px";
		}
	}
	if(tm.style.height > "0px"){
		tm.style.height = "0px";
	} else {
		tm.style.height = tm.scrollHeight+"px";
		a.style.background = "#FFF";
	}
}
window.addEventListener('mouseup', function(event){
	for(var i=0; i < ma.length; i++){
	    var box = document.getElementById(ma[i]);
	    if(event.target != box && event.target.parentNode != box && event.target != box.previousElementSibling){
		   box.style.height = "0px";
	    }
		_(ba[i]).style.background = "#FFF linear-gradient(#FFE6B7,#FFBD59)";
	}
});
/* ------- */

var scrollY = 0, currentY = 0, distance = 100, speed = 27, scrollanimator;
function resetScroller(){
	currentY = window.pageYOffset;
	scrollanimator = setTimeout(resetScroller, speed);
	if(currentY > 0){
		scrollY = currentY-distance;
		window.scroll(0, scrollY);
	} else {
		clearTimeout(scrollanimator);
	}
}
function scrollhandler(){
	if(window.pageYOffset > 700){
	    _("scrolltopbtn").style.display = "block";	
	} else {
		_("scrolltopbtn").style.display = "none";
	}
}
window.addEventListener('load', function(event){
	posMenus();
});
window.addEventListener("scroll", scrollhandler);