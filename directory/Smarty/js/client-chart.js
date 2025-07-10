document.addEventListener('DOMContentLoaded', function() {

    const dataPoints= Object.entries(clientStats).map(([rating, number]) => ({
        x: rating,
        y: number
    }));


const barData = {
datasets: [{
    label: 'Numero di recensioni',
    data: dataPoints,
    backgroundColor: 'rgba(54, 162, 235, 0.7)'
}]
};

const barConfig = {
color: 'rgb(255, 99, 132)',
        
type: 'bar',
data: barData,
options: {
    responsive: true,
    plugins: {
    legend: { position: 'top' },
    title: {
        display: true,
        text: 'numero di recensioni per rating'
    }
    },
    scales: {
    x: {
        type: 'category',    //default per x
        title: {
        display: true,
        text: 'rating'
        }
    },
    y: {
        type: 'linear',     //default per y=linear(float)
        title: {
        display: true,
        text: 'numero di recensioni'
        },ticks: {
    stepSize: 1,
    callback: function(value) {
     
      if (Number.isInteger(value)) {
        return value;
      }
    }
  }
    }
 }
}
};

new Chart(
document.getElementById('clientBarChart').getContext('2d'),
barConfig
);

});
