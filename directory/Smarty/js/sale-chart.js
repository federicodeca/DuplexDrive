
document.addEventListener('DOMContentLoaded', function() {
// Labels = nomi mesi
const labels = Object.keys(salesPerMonth);
const dataValues = Object.values(salesPerMonth);

const data = {
    labels: labels,
    datasets: [{
    data: dataValues,
    backgroundColor: [
        'rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)',
        // aggiungi altri colori se servono
    ],
    hoverOffset: 4
    }]
};

const config = {
    type: 'doughnut',
    data: data,
    options: {
    responsive: true,
    plugins: {
        legend: { position: 'top' },
        title: {
        display: true,
        text: 'Vendite per mese'
        }
    }
    }
};

const ctx = document.getElementById('saleChart').getContext('2d');
new Chart(ctx, config);

}); 
