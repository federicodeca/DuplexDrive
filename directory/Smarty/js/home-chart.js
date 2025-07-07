document.addEventListener('DOMContentLoaded', function () {


    const salePoints = Object.entries(salePerDay).map(([date, sale]) => ({
        x: date,
        y: sale
    }));
    const rentPoints = Object.entries(rentPerDay).map(([date, price]) => ({
        x: date,
        y: price
    }));

const scatterData = {
datasets: [{
    label: 'Prezzo Vendita',
    data: salePoints,
    backgroundColor: 'rgba(54, 162, 235, 0.7)'
}]
};

const scatterConfig = {
color: 'rgb(255, 99, 132)',
type: 'bar',
data: scatterData,
options: {
    responsive: true,
    plugins: {
    legend: { position: 'top' },
    title: {
        display: true,
        text: 'Prezzi delle vendite nel tempo'
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
        text: 'Data'
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
document.getElementById('salesScatterChart').getContext('2d'),
scatterConfig
);


const scatterData2 = {
datasets: [{
    
    label: 'Prezzo Noleggio',
    data: rentPoints,
    backgroundColor: 'rgba(255, 99, 132, 0.7)'
}]
};

const scatterConfig2 = {
type: 'line',
data: scatterData2,
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
        text: 'Data'
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
scatterConfig2
);
});
