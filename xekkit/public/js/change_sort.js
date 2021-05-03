let users = document.querySelector("#search-users-tab")
let sort = document.querySelectorAll("option")
let news =document.querySelector("#search-news-tab")
let partner= document.querySelector("#only-partner");

users.addEventListener('click',function()
{
    for(let i=0;i<sort.length;i++)
    {
        if(sort[i].innerHTML=="New" || sort[i].innerHTML=="Trending")
        {
            sort[i].hidden=true;
        }
        if(sort[i].selected==true && sort[i].innerHTML!="Relevance")
        {
            sort[i].selected=false;
        }
        if(sort[i].innerHTML=="Relevance")
        {
            sort[i].selected=true;
        }
    }
    partner.innerHTML="Only Partners";
});

news.addEventListener('click',function()
{
    for( let i=0;i<sort.length;i++)
    {
        sort[i].hidden=false;
    
        if(sort[i].selected==true && sort[i].innerHTML!="Relevance")
        {
            sort[i].selected=false;
        }
        if(sort[i].innerHTML=="Relevance")
        {
            sort[i].selected=true;
        }
    }
    partner.innerHTML="Only Partner Posts"
});
