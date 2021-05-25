function follow(users_id, follower_id){
    var params = {
        "users_id":parseInt(users_id),
        "follower_id":parseInt(follower_id)
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/api/follow", false);

    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);   
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.send(JSON.stringify(params));  

    let response = JSON.parse(xhttp.responseText);

    if (response.status === true){
        let el = document.getElementById('follow_button');
        if (response.follow === true){            
            el.innerText = "Unfollow";
        }
        else{
            el.innerText = "Follow";
        }
    }

}