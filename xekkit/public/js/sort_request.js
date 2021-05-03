let select = document.getElementById("sort-select");
select.addEventListener("change", function()
{
    let allNews = document.getElementById("posts-result");
    
    let xhttp = new XMLHttpRequest();
    
    xhttp.open("GET", "/api/load-posts-search?sortBy="+ select.value +"&search=" + @json($query), false);
    xhttp.send();
    let news = JSON.parse(xhttp.responseText);
    console.log(news);
    console.log(allNews);    
});