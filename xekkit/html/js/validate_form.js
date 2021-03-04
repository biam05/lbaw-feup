// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        });
})()

function toggleEye(x){
    x.children[0].classList.toggle("fa-eye-slash");
    if (x.previousElementSibling.type === "password") {
        x.previousElementSibling.type = "text";
    } else {
        x.previousElementSibling.type = "password";
    }
}
