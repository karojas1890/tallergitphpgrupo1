document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registroForm');
    
    form.addEventListener('submit', function(e) {
        // Validación básica del lado del cliente
        const nombre = document.getElementById('nombre').value.trim();
        const apellido1 = document.getElementById('apellido1').value.trim();
        const apellido2 = document.getElementById('apellido2').value.trim();
        const grupo = document.getElementById('grupo').value;
        
        if (nombre === '' || apellido1 === '' || apellido2 === '' || grupo === '') {
            e.preventDefault();
            alert('Por favor complete todos los campos del formulario.');
            return false;
        }
        
        // Validación de solo letras en nombres y apellidos
        const letrasRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
        
        if (!letrasRegex.test(nombre)) {
            e.preventDefault();
            alert('El nombre solo debe contener letras.');
            return false;
        }
        
        if (!letrasRegex.test(apellido1)) {
            e.preventDefault();
            alert('El primer apellido solo debe contener letras.');
            return false;
        }
        
        if (!letrasRegex.test(apellido2)) {
            e.preventDefault();
            alert('El segundo apellido solo debe contener letras.');
            return false;
        }
        
        return true;
    });
});