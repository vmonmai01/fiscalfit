var seriesData;
var labels;
var total_amount;

console.log('Id del usuario gastos: ', userId);


document.addEventListener("DOMContentLoaded", function () {
    generateExpenseChart(userId, 3);
});


function generateExpenseChart(userId, numOfMonths) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/expenses/${userId}/${numOfMonths}`,
        method: 'GET',
        success: function (response) {
            const seriesData = response.map(item => parseFloat(item.total_amount));
            const labels = response.map(item => item.category);
            // const total_amount = response.map(item => item.total_amount);

            const options = getChartOptionsExpenseDates(seriesData, labels);
            const chartExpensesDates = new ApexCharts(document.getElementById("expenseDate-chart2"), options);
            chartExpensesDates.render();

            // console.log('Ingresos: montante = ', total_amount);
            console.log('Gastos: montantes = ', seriesData);
            console.log('Gastos: categorias = ', labels);
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            console.error(status);
            console.error(error);
        }
    });
}
const getChartOptionsExpenseDates = (seriesData, labels) => {
    return {
        series: seriesData,
        colors: ["#1C64F2", "#16BDCA", "#9061F9", "#FF1212","#1C64F2", "#16BDCA", "#9061F9",],
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
                    const amount = seriesData[index];
                    return `${amount} €`;
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
 
document.addEventListener("DOMContentLoaded", function () {
    // Tu código JavaScript aquí

    // Por ejemplo, inicializar el gráfico con ApexCharts
    if (document.getElementById("expenseDate-chart") && typeof ApexCharts !== 'undefined') {
        const chart2 = new ApexCharts(document.getElementById("expenseDate-chart"), getChartOptionsExpenseDates());
        chart2.render();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownExpenses");
    const dropdownList = document.getElementById("lastDaysExpenses");

    dropdownButton.addEventListener("click", function () {
        dropdownList.classList.toggle("hidden"); // Mostrar/ocultar el dropdown al hacer clic en el botón
    });

    // Capturar clics en los botones del dropdown
    dropdownList.querySelectorAll("button").forEach(function (button) {
        button.addEventListener("click", function () {
            const numOfMonths = parseInt(button.value, 10);
           
            if (!isNaN(numOfMonths) && numOfMonths > 0) {
                generateExpenseChart(userId, numOfMonths);
                console.log('numOfMonths gastos seleccionado:', numOfMonths);
                dropdownList.classList.add("hidden"); // Ocultar el dropdown después de seleccionar una opción
            } else {
                console.error("Número de meses no válido:", numOfMonths);
            }
        });
    });
});


// // function selectMonthRange(months) {
// //     const today = new Date();
// //     const startDate = new Date(today.getFullYear(), today.getMonth() - months + 1, 1); // Primer día del mes
// //     const endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Último día del mes

// //     const formattedStartDate = formatDate(startDate);
// //     const formattedEndDate = formatDate(endDate);

// //     document.getElementById("start_date").value = formattedStartDate;
// //     document.getElementById("end_date").value = formattedEndDate;

// //     // document.getElementById("start_date_display").textContent = formattedStartDate;
// //     // document.getElementById("end_date_display").textContent = formattedEndDate;

// //     generateExpenseChart(formattedStartDate, formattedEndDate);
// // }

// document.addEventListener("DOMContentLoaded", function() {
//     const today = new Date(); // Obtener la fecha actual
//     const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1); // Primer día del mes actual
//     const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Último día del mes actual

//     // Formatear las fechas en formato YYYY-MM-DD
//     const formattedFirstDay = formatDate(firstDayOfMonth);
//     const formattedLastDay = formatDate(lastDayOfMonth);

//     // Definir las variables startDate y endDate
//     let startDate = formattedFirstDay;
//     let endDate = formattedLastDay;

//     // Establecer los valores predeterminados en los campos de fecha del formulario
//     document.getElementById("start_date").value = startDate;
//     document.getElementById("end_date").value = endDate;

//     // Mostrar los valores predeterminados en la sección de visualización de fecha
//     document.getElementById("start_date_display").textContent = startDate;
//     document.getElementById("end_date_display").textContent = endDate;

//     // Llama a la función inicialmente con las fechas predeterminadas
//     generateExpenseChart(startDate, endDate);
// });

// // Función para formatear la fecha en formato YYYY-MM-DD
// function formatDate(date) {
//     const year = date.getFullYear();
//     const month = (date.getMonth() + 1).toString().padStart(2, '0');
//     const day = date.getDate().toString().padStart(2, '0');
//     return `${year}-${month}-${day}`;
// }


// // Función para generar el gráfico con las fechas seleccionadas
// function generateExpenseChart(startDate, endDate) {
//     $.ajax({
//         url: `http://127.0.0.1:8000/api/expenses/percentage-by-category/${userId}/${startDate}/${endDate}`,
//         method: 'GET',
//         success: function (response) {
//             const seriesData = response.map(item => item.percentage);
//             const labels = response.map(item => item.category);
//             const total_amount = response.map(item => item.total_amount);

//             const options = getChartOptionsExpeseDates(seriesData, labels, total_amount);
//             const chartExpesesDates2 = new ApexCharts(document.getElementById("expenseDate-chart2"), options);
//             chartExpesesDates2.render();

//             // console.log('Consulta 1: montante = ', total_amount);
//             // console.log('Consulta 1: porcentajes = ', seriesData);
//             // console.log('Consulta 1: categorias = ', labels);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr);
//             console.error(status);
//             console.error(error);
//         }
//     });
// }

// // Evento para detectar cambios en las fechas seleccionadas
// document.getElementById('start_date').addEventListener('change', function () {
//     startDate = this.value;
//     endDate = document.getElementById('end_date').value;

//     document.getElementById("start_date_display").textContent = startDate;
//     document.getElementById("end_date_display").textContent = endDate;
    
//     generateExpenseChart(startDate, endDate);
// });

// document.getElementById('end_date').addEventListener('change', function () {
//     startDate = document.getElementById('start_date').value;
//     endDate = this.value;

//     document.getElementById("start_date_display").textContent = startDate;
//     document.getElementById("end_date_display").textContent = endDate;

//     generateExpenseChart(startDate, endDate);
// });


// const getChartOptionsExpeseDates = (seriesData,labels, total_amount) => {
//     return {
//         series: seriesData,
//         colors: ["#1C64F2", "#16BDCA", "#9061F9", "#FF1212"],
//         chart: {
//             height: 520,
//             width: "100%",
//             type: "pie",
//         },
//         stroke: {
//             colors: ["grey"],
//             lineCap: "",
//         },
//         plotOptions: {
//             pie: {
//                 labels: {
//                     show: true,
//                 },
//                 size: "100%",
//                 dataLabels: {
//                     offset: -25
//                 }
//             },
//         },        
//         labels: labels,
//         dataLabels: {
//             enabled: true,
//             style: {
//                 fontFamily: "Inter, sans-serif",
//             },
//         },
//         legend: {
//             position: "top",
//             fontFamily: "Inter, sans-serif",
//         },
//         yaxis: {
//             labels: {
//                 formatter: function (val, opts) {
//                     const index = opts.dataPointIndex;
//                     const label = labels[index];
//                     const amount = total_amount[index];
//                     return `${label}: ${amount} €`;
//                 },
//             },
//         },
//         xaxis: {
//             labels: {
//                 formatter: function (value) {
//                     return value + "% aqwui"
//                 },
//             },
//             axisTicks: {
//                 show: false,
//             },
//             axisBorder: {
//                 show: false,
//             },
//         },
//     }
// }

// document.addEventListener("DOMContentLoaded", function() {
//     // Tu código JavaScript aquí
    
//     // Por ejemplo, inicializar el gráfico con ApexCharts
//     if (document.getElementById("expenseDate-chart") && typeof ApexCharts !== 'undefined') {
//         const chart = new ApexCharts(document.getElementById("expenseDate-chart"), getChartOptionsExpeseDates());
//         chart.render();
//     }
// });
