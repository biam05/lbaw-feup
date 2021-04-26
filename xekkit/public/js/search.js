function filterInList() {
    let input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("filterInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("listOption");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function clearAll() {
    let list = document.getElementById("listOption");
    let listItem = list.getElementsByTagName("li");
    let a, checkbox;
    for (let i = 0; i < listItem.length; i++) {
        a = listItem[i].getElementsByTagName("a")[0];
        checkbox = a.getElementsByTagName("input")[0];
        checkbox.checked = false;
    }
}