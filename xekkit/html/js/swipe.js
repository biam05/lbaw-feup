window.onresize=function(){
    if(window.outerWidth<1200)
    {
        if(window.outerWidth<=800)
        n_cards=1;
        else n_cards=2;
    }
    else n_cards=3;
};

wrapper=document.querySelector(".wrapper");
cards = document.getElementsByClassName("trending_card");
prev = document.querySelector("button.prev");
next = document.querySelector("button.next");

if(window.outerWidth<1200)
{
    if(window.outerWidth<=800)
    n_cards=1;
    else n_cards=2;
}
else n_cards=3;

if(window.outerWidth<700)
{
    for (var i=0; i < cards.length; i++ ) {
        cards[i].style.zoom="90%"
    }

}


console.log(window.innerWidth)
console.log(window.outerWidth)
console.log(n_cards)

/* prev.style.display="none";
next.style.display="none"; */


for (var i=0; i < cards.length; i++ ) {
    var div = cards[i];
    
	if(i <n_cards)
    div.style.display="inline-block";
    else div.style.display="none";
}

function showNext(){

	cards[0].style.display="none";
	wrapper.insertBefore(cards[0],next);
	cards[n_cards-1].style.display="inline-block";	
}


function showPrev(){
	cards[n_cards-1].style.display="none";
	wrapper.insertBefore(cards[cards.length-1],cards[0]);
	cards[0].style.display="inline-block";	
}
