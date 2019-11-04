function initPopup( _content ){
	popup_content.innerHTML = _content;
	popup_bg.classList.add("_mod-active");
	popup_fundamental.classList.add("_mod-active");
}

function closePopup(){
	popup_bg.classList.remove("_mod-active");
	popup_fundamental.classList.remove("_mod-active");
	popup_content.innerHTML = "";
}


document.addEventListener("DOMContentLoaded", function(){
	popup_close.addEventListener( "click", closePopup );
	popup_bg.addEventListener( "click", closePopup );
	tarif_mobile.addEventListener( "click", function(){ initPopup( this.innerHTML ); } );
	tarif_laptop.addEventListener( "click", function(){ initPopup( this.innerHTML ); } );
	tarif_tv.addEventListener( "click", function(){ initPopup( this.innerHTML ); } );
});