let seriesData;
let labels;

const userId = 1; // Id del usuario
const startDate = '2024-01-01'; // Fecha de inicio
const endDate = '2024-12-31'; // Fecha de fin

$.ajax({

    // Código para generar el gráfico utilizando los datos
    url: `http://127.0.0.1:8000/api/expenses/${userId}/${startDate}/${endDate}`,
    method: 'GET',
    success: function (response) {
        // Datos recibidos correctamente
        // Aquí puedes utilizar los datos para generar tu gráfico
        // Por ejemplo, puedes recorrer los datos y asignarlos a las series del gráfico
        const seriesData = response.map(item => item.total_amount);
        const labels = response.map(item => item.category);

        const options = getChartOptionsExpeseDates(seriesData, labels);
        const chart = new ApexCharts(document.getElementById("expenseDate-chart"), options);
        chart.render();

        console.log(seriesData);
        console.log(labels);

    },
    error: function (xhr, status, error) {
        // Manejar errores si la solicitud falla
        console.error(error);
    }
});

const getChartOptionsExpeseDates = (seriesData,labels) => {
    return {
        series: seriesData,
        colors: ["#1C64F2", "#16BDCA", "#9061F9", "#1C64F2"],
        chart: {
            height: 420,
            width: "100%",
            type: "pie",
        },
        stroke: {
            colors: ["white"],
            lineCap: "",
        },
        plotOptions: {
            pie: {
                labels: {
                    show: true,
                },
                size: "100%",
                dataLabels: {
                    offset: -25
                }
            },
        },
        labels: labels,
        dataLabels: {
            enabled: true,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value + "%"
                },
            },
        },
        xaxis: {
            labels: {
                formatter: function (value) {
                    return value + "%"
                },
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
    }
}


const getChartOptions = () => {
    return {
        series: [52.8, 26.8, 20.4],
        colors: ["#1C64F2", "#16BDCA", "#9061F9"],
        chart: {
            height: 420,
            width: "100%",
            type: "pie",
        },
        stroke: {
            colors: ["white"],
            lineCap: "",
        },
        plotOptions: {
            pie: {
                labels: {
                    show: true,
                },
                size: "100%",
                dataLabels: {
                    offset: -25
                }
            },
        },
        labels: ["Direct", "Organic search", "Referrals"],
        dataLabels: {
            enabled: true,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value + "%"
                },
            },
        },
        xaxis: {
            labels: {
                formatter: function (value) {
                    return value + "%"
                },
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
    }
}
document.addEventListener("DOMContentLoaded", function() {
    // Tu código JavaScript aquí
    
    // Por ejemplo, inicializar el gráfico con ApexCharts
    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
});

// document.addEventListener("DOMContentLoaded", function() {
//     // Tu código JavaScript aquí
    
//     // Por ejemplo, inicializar el gráfico con ApexCharts
//     if (document.getElementById("expenseDate-chart") && typeof ApexCharts !== 'undefined') {
//         const chart = new ApexCharts(document.getElementById("expenseDate-chart"), getChartOptionsExpeseDates());
//         chart.render();
//     }
// });