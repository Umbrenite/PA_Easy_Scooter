function donut(arrayForfaits, arrayDatas) {
  new Chart("donut_stats", {
    type: "doughnut",
    data: {

      datasets: [{
        data: arrayDatas,
        backgroundColor: [
          'blue',
          'grey',
          'brown',
          'orange',
          'red',
          'purple',
          'white',
          'yellow',
          'black',
          'pink',
          'green',
          'beige'
        ],
        hoverBackgroundColor: [
          'darkgreen',
          '#AC7B0C',
          '#0D7F9B',
        ]
      }],

      labels: arrayForfaits
    },
    options: {
      legend: { display: false }
    }
  });
}