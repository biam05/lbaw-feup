const preventer = document.querySelector(".preventer");

preventer.addEventListener("click", (e) => {
    e.stopPropagation();
    e.preventDefault();
    return false;
});

const tagforminput = document.getElementById("News-modal-tags");
tagforminput.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let parentTags = document.getElementById("parentTags");
        let span = document.createElement("span")
        span.className = "badge badge-primary";
        span.append(tagforminput.value)
        parentTags.append(span)
        tagforminput.value = '';
    }
});