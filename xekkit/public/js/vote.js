function vote(content_id, vote){
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/api/vote", false);
    xhttp.setRequestHeader("content_id", content_id);
    xhttp.setRequestHeader("upvote", vote);
    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);
    xhttp.send();
    //let response = JSON.parse(xhttp.responseText);
    console.log(xhttp.responseText)
    /*if(response.status === true){
        const el = document.getElementById('n-votes');
        el.innerText = response.message;
    }*/

}