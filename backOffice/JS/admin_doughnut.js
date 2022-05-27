new Chart("donut_chart", {
  type: "doughnut",
  data: {
    datasets: [{
        data: [10,20,30],
        backgroundColor: [
            'Red',
            'Yellow',
            'Blue'
        ],
        hoverBackgroundColor: [
            'darkred',
            '#CABD20',
            'darkblue',
        ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Brave',
        'Microsoft Edge',
        'Google Chrome'
    ]
  },
  options: {
    legend: {display: false}
  }
});