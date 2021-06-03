function report(type,tab,device, report_to_id){



    if(type=="user")
    {
        var body = document.querySelector('#reportUser_'+report_to_id+' textarea').value
    }

    else
    {    
        var body = document.querySelector('#reportContent_'+report_to_id+'_'+tab+'_'+device+' textarea').value
    }



    var params = {
        "body":body,
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/"+type+"/"+report_to_id+"/report/", false);

    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrf);   
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.send(JSON.stringify(params));  

    let response = JSON.parse(xhttp.responseText);

    console.log(response)
    let status = response.status;
    let votes = response.message;
    if(status === true){

    }
    else{
        console.log("error reporting");
    }
}