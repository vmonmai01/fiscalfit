var seriesData;
var labels;
var total_amount;

let startDate;
let endDate;

const userId = 1; // Id del usuario

document.addEventListener("DOMContentLoaded", function() {
    const today = new Date(); // Obtener la fecha actual
    const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1); // Primer día del mes actual
    const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Último día del mes actual

    // Formatear las fechas en formato YYYY-MM-DD
    const formattedFirstDay = formatDate(firstDayOfMonth);
    const formattedLastDay = formatDate(lastDayOfMonth);

    // Definir las variables startDate y endDate
    let startDate = formattedFirstDay;
    let endDate = formattedLastDay;

    // Establecer los valores predeterminados en los campos de fecha del formulario
    document.getElementById("start_date").value = startDate;
    document.getElementById("end_date").value = endDate;

    // Mostrar los valores predeterminados en la sección de visualización de fecha
    document.getElementById("start_date_display").textContent = startDate;
    document.getElementById("end_date_display").textContent = endDate;

    // Llama a la función inicialmente con las fechas predeterminadas
    generateExpenseChart(startDate, endDate);
});

// Función para formatear la fecha en formato YYYY-MM-DD
function formatDate(date) {
    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');
    return `${year}-${month}-${day}`;
}


// // Solicitud AJAX para obtener los gastos por categoría y su porcentaje por fechas.
// $.ajax({

//     // Código para generar el gráfico utilizando los datos
//     url: `http://127.0.0.1:8000/api/expenses/percentage-by-category/${userId}/${startDate}/${endDate}`,
//     method: 'GET',
//     success: function (response) {
//         // Datos recibidos correctamente
//         // Aquí puedes utilizar los datos para generar tu gráfico
//         // Por ejemplo, puedes recorrer los datos y asignarlos a las series del gráfico
//         const seriesData = response.map(item => item.percentage);
//         const labels = response.map(item => item.category);
//         const total_amount = response.map(item => item.total_amount);

//         const options = getChartOptionsExpeseDates(seriesData, labels, total_amount);
//         const chartExpesesDates2 = new ApexCharts(document.getElementById("expenseDate-chart2"), options);
//         chartExpesesDates2.render();

//         console.log('Consulta 1: montante = ' , total_amount);
//         console.log('Consulta 1: porcentajes = ' ,seriesData);
//         console.log('Consulta 1: categorias = ' ,labels);

//     },
//     error: function (xhr, status, error) {
//         // Manejar errores si la solicitud falla
//         console.error(xhr);
//         console.error(status);
//         console.error(error);
//     }
// });

// Función para generar el gráfico con las fechas seleccionadas
function generateExpenseChart(startDate, endDate) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/expenses/percentage-by-category/${userId}/${startDate}/${endDate}`,
        method: 'GET',
        success: function (response) {
            const seriesData = response.map(item => item.percentage);
            const labels = response.map(item => item.category);
            const total_amount = response.map(item => item.total_amount);

            const options = getChartOptionsExpeseDates(seriesData, labels, total_amount);
            const chartExpesesDates2 = new ApexCharts(document.getElementById("expenseDate-chart2"), options);
            chartExpesesDates2.render();

            console.log('Consulta 1: montante = ', total_amount);
            console.log('Consulta 1: porcentajes = ', seriesData);
            console.log('Consulta 1: categorias = ', labels);
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            console.error(status);
            console.error(error);
        }
    });
}



// Evento para detectar cambios en las fechas seleccionadas
document.getElementById('start_date').addEventListener('change', function () {
    startDate = this.value;
    endDate = document.getElementById('end_date').value;

    document.getElementById("start_date_display").textContent = startDate;
    document.getElementById("end_date_display").textContent = endDate;
    
    generateExpenseChart(startDate, endDate);
});

document.getElementById('end_date').addEventListener('change', function () {
    startDate = document.getElementById('start_date').value;
    endDate = this.value;

    document.getElementById("start_date_display").textContent = startDate;
    document.getElementById("end_date_display").textContent = endDate;

    generateExpenseChart(startDate, endDate);
});




const getChartOptionsExpeseDates = (seriesData,labels, total_amount) => {
    return {
        series: seriesData,
        colors: ["#1C64F2", "#16BDCA", "#9061F9", "#FF1212"],
        chart: {
            height: 520,
            width: "100%",
            type: "pie",
        },
        stroke: {
            colors: ["grey"],
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
            position: "top",
            fontFamily: "Inter, sans-serif",
        },
        yaxis: {
            labels: {
                formatter: function (val, opts) {
                    const index = opts.dataPointIndex;
                    const label = labels[index];
                    const amount = total_amount[index];
                    return `${label}: ${amount} €`;
                },
            },
        },
        xaxis: {
            labels: {
                formatter: function (value) {
                    return value + "% aqwui"
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
