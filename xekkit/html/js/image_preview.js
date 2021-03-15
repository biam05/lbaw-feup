window.onload = function () {

    var fileInput = document.getElementById('fileToUpload');
    var fileDisplayArea = document.getElementById('file-display-area');
    var errorDisplayArea = document.getElementById('error-display-area');
    if (fileInput !== undefined && fileInput !== null) {
        fileInput.addEventListener('change', function () {
            var file = fileInput.files[0];
            if (file.size < 500000) {
                var reader = new FileReader();

                reader.onload = function () {
                    fileDisplayArea.innerHTML = "";

                    var img = new Image(225);
                    img.style.objectFit = "contain";
                    img.src = reader.result;

                    fileDisplayArea.appendChild(img);
                }

                reader.readAsDataURL(file);
            } else {
                errorDisplayArea.innerHTML = "Image is too big (size>500kB)"
            }
        });
    }
}