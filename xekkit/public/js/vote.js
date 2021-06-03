function vote(content_id, vote, type){

    var params = {
        "content_id":parseInt(content_id),
        "upvote": vote
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/vote", false);

    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);   
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.send(JSON.stringify(params));  

    let response = JSON.parse(xhttp.responseText);

    let status = response.status;
    let votes = response.message;
    if(status === true){
     
        let el = document.getElementById('n-votes_'+content_id+"_"+type);
        
        el.innerText = votes;

        const arrow_up = document.getElementById('arrow_up_'+content_id+"_"+type);
        const arrow_down = document.getElementById('arrow_down_'+content_id+"_"+type); 
        if(response.vote === true){    
            if(arrow_up.classList.contains("text-white")){
                arrow_up.classList.remove("text-white");
                arrow_up.classList.add("text-primary");
            }                
            else if(arrow_up.classList.contains("text-primary")){
                arrow_up.classList.remove("text-primary");
                arrow_up.classList.add("text-white");
            }
            if(arrow_down.classList.contains("text-danger")){
                arrow_down.classList.remove("text-danger");
                arrow_down.classList.add("text-white");
            }
        }
        else if (response.vote === false){
            if(arrow_down.classList.contains("text-white")){
                arrow_down.classList.remove("text-white");
                arrow_down.classList.add("text-danger");
            }                
            else if(arrow_down.classList.contains("text-danger")){
                arrow_down.classList.remove("text-danger");
                arrow_down.classList.add("text-white");
            }
            if(arrow_up.classList.contains("text-primary")){
                arrow_up.classList.remove("text-primary");
                arrow_up.classList.add("text-white");
            }
        }
    }
    else{
        console.log("error voting");
        console.log(response);
    }
}
