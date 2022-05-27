var xValues = ["12ème", "15ème", "3ème", "1er", "10ème"];
var yValues = [55, 49, 44, 40, 30, 0]; // Il faut laisser le 0 ici qui correspond à la valeur minimale
var barColors = ["red", "green","blue","orange","brown"];

new Chart("bargraph", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {legend: {display: false}}
});