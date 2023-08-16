
document.addEventListener('DOMContentLoaded', function() {
    const salarioInput = document.getElementById('salario');
    const cargoSelect = document.getElementById('cargo');

    salarioInput.value = cargoSelect.options[cargoSelect.selectedIndex].getAttribute('data-salario');

    cargoSelect.addEventListener('change', function () {
        salarioInput.value = cargoSelect.options[cargoSelect.selectedIndex].getAttribute('data-salario');
    });
});