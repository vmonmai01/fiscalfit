var seriesData;
var labels;
var total_amount;

console.log('Id del usuario ingresos: ', userId);

// Renderizamos el gráfico inicialmente con 1 mes.
document.addEventListener("DOMContentLoaded", function () {
    generateIncomeChart(userId, 1);
});

function generateIncomeChart(userId, numOfMonths) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/incomes/${userId}/${numOfMonths}`,
        method: 'GET',
        success: function (response) {
            const seriesData = response.map(item => parseFloat(item.total_amount));
            const labels = response.map(item => item.category);
            // Si el array de cantidad o categoría viene vacío mostramos mensaje al usuario
            if (seriesData.length === 0 || labels.length === 0) {
                displayNoDataMessage();     // Mostrar mensaje si no hay datos
                hideChart();                // Ocultar el gráfico si no hay datos
                return;
            }
            hideNoDataMessage();    // Ocultar el mensaje si hay datos
            showChart();            // Mostrar el gráfico si hay datos

            if (!window.chartIncomesDates) {
                const options = getChartOptionsIncomeDates(seriesData, labels);
                window.chartIncomesDates = new ApexCharts(document.getElementById("incomesDate-chart"), options);
                window.chartIncomesDates.render();
            } else {
                window.chartIncomesDates.updateOptions({
                    series: seriesData,
                    labels: labels
                });
            }
            console.log('Meses= ', numOfMonths);
            console.log('Ingresos: montantes = ', seriesData);
            console.log('Ingresos: categorias = ', labels);
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            console.error(status);
            console.error(error);
        }
    });
}

const getChartOptionsIncomeDates = (seriesData, labels) => {
    return {
        series: seriesData,
        colors: ["#1C64F2", "#16BDCA", "#9061F9", "#FF1212"],
        chart: {
            height: 520,
            width: "100%",
            type: "pie",
        },
        stroke: {
            colors: ["#181A20"],
            lineCap: "round",
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
        }
    }
}

const displayNoDataMessage = () => {
    const message = document.getElementById("noDataMessage");
    message.classList.remove("hidden");
}
const hideNoDataMessage = () => {
    const message = document.getElementById("noDataMessage");
    message.classList.add("hidden");
}
const hideChart = () => {
    const chartContainer = document.getElementById("incomesDate-chart");
    chartContainer.classList.add("hidden");
}
const showChart = () => {
    const chartContainer = document.getElementById("incomesDate-chart");
    chartContainer.classList.remove("hidden");
}
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownIncomes");
    const dropdownList = document.getElementById("lastDaysIncomes");

    dropdownButton.addEventListener("click", function () {
        dropdownList.classList.toggle("hidden");  // Ocultar el dropdown al hacer clic en el botón
    });

    // Capturar clics en los botones del dropdown
    dropdownList.querySelectorAll("button").forEach(function (button) {
        button.addEventListener("click", function () {
            const numOfMonths = parseInt(button.value, 10);
            console.log("Meses Ingresos", numOfMonths);
            if (!isNaN(numOfMonths) && numOfMonths > 0) {
                generateIncomeChart(userId, numOfMonths);
                console.log('Número de meses ingreso seleccionados:', numOfMonths);
                dropdownList.classList.add("hidden"); // Ocultar el dropdown después de seleccionar una opción
            } else {
                console.error("Número de meses no válido:", numOfMonths);
            }
        });
    });
});
