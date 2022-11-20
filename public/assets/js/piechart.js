jQuery(document).ready(function() {
var chartDiv = $("#barChart");
$.get('/Peserta/getKehadiran',(data)=>{
var myChart = new Chart(chartDiv, {
    type: 'pie',
    data: {
        labels: ["Masuk","Terlambat"],
        datasets: [
        {
            data: [data.absen-data.terlambat, data.terlambat],
            backgroundColor: [
                "#4BC0C0",
               "#FF6384"
            ]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Chart Kehadiran'
        },
		responsive: true,
maintainAspectRatio: false,
    }
    });
});
    });