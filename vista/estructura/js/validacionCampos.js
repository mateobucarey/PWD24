document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const inputs = form.querySelectorAll('input');
        let isValid = true;

        inputs.forEach(function(input) {
            const value = input.value.trim();
            const name = input.name;

            // Validar campos vacíos
            if (value === '') {
                alert(`El campo ${name} es obligatorio.`);
                isValid = false;
            }

            // Validar DNI y dniDuenio como número
            if (name === 'nroDni' || name === 'dniDuenio') {
                if (!/^\d+$/.test(value)) {
                    alert(`El campo ${name} debe ser un número.`);
                    isValid = false;
                }
                if (value.length !== 8) { // Ajusta el largo según el formato que necesites
                    alert(`El campo ${name} debe tener 8 dígitos.`);
                    isValid = false;
                }
            }

            // Validar nombre y apellido como solo letras
            if (name === 'nombre' || name === 'apellido') {
                if (!/^[a-zA-Z\s]+$/.test(value)) {
                    alert(`El campo ${name} solo puede contener letras.`);
                    isValid = false;
                }
                if (value.length > 50) {
                    alert(`El campo ${name} no puede tener más de 50 caracteres.`);
                    isValid = false;
                }
            }

            // Validar fecha de nacimiento como fecha válida
            if (name === 'fechaNac') {
                const date = new Date(value);
                if (isNaN(date.getTime())) {
                    alert('El campo fecha de nacimiento debe ser una fecha válida.');
                    isValid = false;
                }
            }

            // Validar teléfono como número
            if (name === 'telefono') {
                if (!/^\d+$/.test(value)) {
                    alert('El campo teléfono debe ser un número.');
                    isValid = false;
                }
                if (value.length > 15) {
                    alert('El campo teléfono no puede tener más de 15 dígitos.');
                    isValid = false;
                }
            }

            // Validar patente con longitud máxima de caracteres
            if (name === 'patente') {
                if (value.length > 10) { // Por ejemplo, 10 caracteres máximo para una patente
                    alert('El campo patente no puede tener más de 10 caracteres.');
                    isValid = false;
                }
            }

            // Validar modelo como número
            if (name === 'modelo') {
                if (!/^\d+$/.test(value)) {
                    alert('El campo modelo debe ser un número.');
                    isValid = false;
                }
                if (value.length > 4) { // Por ejemplo, 4 caracteres para el año del modelo
                    alert('El campo modelo no puede tener más de 4 dígitos.');
                    isValid = false;
                }
            }

            // Validar marca como texto
            if (name === 'marca') {
                if (!/^[a-zA-Z\s]+$/.test(value)) {
                    alert('El campo marca solo puede contener letras.');
                    isValid = false;
                }
                if (value.length > 30) {
                    alert('El campo marca no puede tener más de 30 caracteres.');
                    isValid = false;
                }
            }

        });

        if (!isValid) {
            e.preventDefault();
        }
    });
});
