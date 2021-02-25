

var stor = 0;
var maxstor;
var divs;

function setup()
{
  divs = document.getElementsByClassName("wrapper");
  
  maxstor=divs.length-1;
  for (var i=0; i < divs.length; i++ ) {
    var div = divs[i];
    
	if(i ==0 )
    div.hidden=false;
    else div.hidden=true;
  }
}



function rotateDiv(stor){
  
  
  for (var i=0; i < divs.length; i++ ) {
    var div = divs[i];
    
	if(i != stor){
        	div.hidden = true;
	}
	else{
		div.hidden = false;
	}
    
  }
}

function showNext(){
	if(stor < maxstor)
		stor++;
	else
		stor=0;

	rotateDiv(stor);
}

function showNext(){
	if(stor < maxstor)
		stor++;
	else
		stor=0;

	rotateDiv(stor);
}

function stoprot() {
	clearTimeout(timeout);
}


function showNext(){
	if(stor < maxstor)
		stor++;
	else
		stor=0;

	rotateDiv(stor);
}

function showPrev(){
	if(stor > 0)
		stor--;
	else
		stor=maxstor;

	rotateDiv(stor);
}
