const preventer = document.querySelector(".preventer");

preventer.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
    return false;
});