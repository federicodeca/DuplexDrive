document.addEventListener('DOMContentLoaded', function() {

 const dataPoints = Object.entries(rentTotalPerDay).map(([date, rent]) => ({
    x: date,
    y: rent
}));

const scatterData = {
    datasets: [{
    label: 'Prezzo Noleggio',
    data: dataPoints,
    backgroundColor: 'rgba(255, 99, 132, 0.7)'
    }]
};

const scatterConfig = {
    type: 'line',
    data: scatterData,
    options: {
    responsive: true,
    plugins: {
        legend: { position: 'top' },
        title: {
        display: true,
        text: 'Prezzi dei noleggi nel tempo'
        }
    },
    scales: {
        x: {
        type: 'time',
        time: {
            unit: 'day',
            tooltipFormat: 'YYYY-MM-DD',
            displayFormats: { day: 'YYYY-MM-DD' }
        },
        title: {
            display: true,
            text: 'Data',
            color: '#000',  
        }
        },
        y: {
        title: {
            display: true,
            text: 'Prezzo (€)'
        }
        }
    }
    }
};

new Chart(
    document.getElementById('rentScatterChart').getContext('2d'),
    scatterConfig
);
});
