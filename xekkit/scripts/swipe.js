wrapper=document.querySelector(".wrapper");
cards = document.getElementsByClassName("card");
  
console.log(window.innerWidth);

for (var i=0; i < cards.length; i++ ) {
    var div = cards[i];
    
	if(i <3)
    div.style.display="inline-block";
    else div.style.display="none";
}

function showNext(){

	cards[0].style.display="none";
	wrapper.appendChild(cards[0]);
	cards[2].style.display="inline-block";	
}


function showPrev(){
	cards[2].style.display="none";
	wrapper.insertBefore(cards[cards.length-1],cards[0]);
	cards[0].style.display="inline-block";	
}
