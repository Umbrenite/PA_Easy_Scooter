new Chart("donut_stats", {
    type: "doughnut",
    data: {
      datasets: [{
          data: [10,20,30],
          backgroundColor: [
              'green',
              'orange',
              'cyan'
          ],
          hoverBackgroundColor: [
              'darkgreen',
              '#AC7B0C',
              '#0D7F9B',
          ]
      }],
  
      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
          'Forfait Deluxe',
          'Forfait medium',
          'Forfait basique'
      ]
    },
    options: {
      legend: {display: false}
    }
  });