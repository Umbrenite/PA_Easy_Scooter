var xValues = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aôut","Septembre","Octobre","Novembre","Décembre"];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("distance", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: "transparent",
      borderColor: "gray",
      data: yValues
    }]
  },
  options:{legend: {display: false}}
});