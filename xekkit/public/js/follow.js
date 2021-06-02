function follow(users_id, follower_id){
    var params = {
        "users_id": parseInt(users_id),
        "follower_id": parseInt(follower_id)
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/api/follow");

    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);   
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.send(JSON.stringify(params));  

    xhttp.onload = function() {
        let response = JSON.parse(this.responseText);
        if (response.status === true){
            let el = document.getElementById('follow_button');          
            el.innerText = "Unfollow";
            el.setAttribute('onClick', 'unfollow('+users_id+','+follower_id+')');
        }
    }
}

function unfollow(users_id, follower_id){
    var params = {
        "users_id":parseInt(users_id),
        "follower_id": parseInt(follower_id)
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/api/unfollow");

    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);   
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.send(JSON.stringify(params));  

    xhttp.onload = function() {
        let response = JSON.parse(this.responseText);
        if (response.status === true){
            let el = document.getElementById('follow_button');          
            el.innerText = "Follow";
            el.setAttribute('onClick', 'follow('+users_id+','+follower_id+')');
        }
    }
}
