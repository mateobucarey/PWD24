document.addEventListener('DOMContentLoaded', function() {

    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {

        const inputs = form.querySelectorAll('input');
        let isValid = true; 

        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                alert(`El campo ${input.name} es obligatorio.`);
                isValid = false; 
                e.preventDefault(); 
            }
        });

        if (!isValid) {
            e.preventDefault(); 
        }
    });
});
