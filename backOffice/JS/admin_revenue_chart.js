var xValues = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aôut","Septembre","Octobre","Novembre","Décembre"];
var yValues = [1055,850,2854,2618,3564,2980,3589,4020,4210,4678,5236,5500];
new Chart("revenues", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: "transparent",
      borderColor: "#1E2834",
      data: yValues
    }]
  },
  options:{legend: {display: false}}
});