var linesVol = document.getElementById("Linesvolume");
var plan= {
  label: 'План',
  data: [5427, 5243, 5514, 3933],
  backgroundColor: 'rgb(57, 117, 163)',
  borderColor: 'rgb(178, 53, 50)',
  borderWidth: 1
};
 
var fact = {
  label: 'Факт',
  data: [5345, 5123, 5000, 4133],
  backgroundColor: 'rgb(178, 53, 50)',
  borderColor: 'rgb(178, 53, 50)' 
};
 
var planetData = {
  labels: ["Gel2", "Gel3", "Soft1", "Soft2"],
  datasets: [plan, fact]
};
 
var chartOptions = {
  scales: {

  }
};
 
var barChart = new Chart(linesVol, {
  type: 'bar',
  data: planetData,
  options: {
  padding: 20
  }
});
  
var densityCanvas = document.getElementById("VolumeLIQ");
var plan= {
  label: 'План',
  data: [54207, 50243, 55104, 3933],
  backgroundColor: 'rgb(57, 117, 163)',
  borderColor: 'rgb(178, 53, 50)',
};
 
var fact = {
  label: 'Факт',
  data: [50000, 42043, 55014, 30933],
  backgroundColor: 'rgb(178, 53, 50)',
  borderColor: 'rgb(178, 53, 50)',
  borderWidth: 0 
  
};
 
var planetData = {
  labels: ["План", "Факт"],
  datasets: [plan, fact]
};
 
var chartOptions = {

  
};
 
var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: {
  padding: 20
  }
});
