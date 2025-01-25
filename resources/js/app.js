require('./bootstrap');

// ...existing code...

document.addEventListener('DOMContentLoaded', function () {
    fetch('/appointment-stats')
        .then(response => response.json())
        .then(data => {
            const statsContainer = document.getElementById('appointment-stats');
            statsContainer.innerHTML = `
                <p>Total de Citas: ${data.total}</p>
                <p>Citas Completadas: ${data.completed}</p>
                <p>Citas Pendientes: ${data.pending}</p>
            `;
        });
});
