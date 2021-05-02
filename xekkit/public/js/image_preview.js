window.onload = function () {

    var fileInput = document.querySelectorAll('#fileToUpload');

    if (fileInput !== undefined && fileInput !== null) {
        //console.log(fileInput.length);
        fileInput.forEach(handler) 
     } 
}

function handler(value, index)
        {
            var fileDisplayArea = document.querySelectorAll('#file-display-area');
            var errorDisplayArea = document.querySelectorAll('#error-display-area');
            value.addEventListener('change', function () {

                var file = value.files[0];
                    if (file.size < 500000) {
                        var reader = new FileReader();
        
                        reader.onload = function () {
                            fileDisplayArea[index].innerHTML = "";
        
                            var img = new Image(225);
                            img.style.objectFit = "contain";
                            img.src = reader.result;
        
                            fileDisplayArea[index].appendChild(img);
                        }
        
                        reader.readAsDataURL(file);
                    } else {
                        errorDisplayArea[index].innerHTML = "Image is too big (size>500kB)"
                    }
                
                
            });}
