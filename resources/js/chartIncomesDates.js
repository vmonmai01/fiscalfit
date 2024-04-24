var seriesData;
var labels;
var total_amount;

console.log('Id del usuario ingresos: ', userId);

document.addEventListener("DOMContentLoaded", function () {
    generateIncomeChart(userId, 3);
});

function generateIncomeChart(userId, numOfMonths) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/incomes/${userId}/${numOfMonths}`,
        method: 'GET',
        success: function (response) {
            const seriesData = response.map(item => parseFloat(item.total_amount));
            const labels = response.map(item => item.category);
           

            const options = getChartOptionsIncomeDates(seriesData, labels);
            const chartIncomesDates = new ApexCharts(document.getElementById("incomesDate-chart"), options);
            chartIncomesDates.render();

            // console.log('Ingresos: montante = ', total_amount);
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
                    return value + "% aqui"
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
    if (document.getElementById("incomeDate-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("incomeDate-chart"), getChartOptionsIncomeDates());
        chart.render();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownIncomes");
    const dropdownList = document.getElementById("lastDaysIncomes");

    dropdownButton.addEventListener("click", function () {
        dropdownList.classList.toggle("hidden"); // Mostrar/ocultar el dropdown al hacer clic en el botón
    });

    // Capturar clics en los botones del dropdown
    dropdownList.querySelectorAll("button").forEach(function (button) {
        button.addEventListener("click", function () {
            const numOfMonths = parseInt(button.value, 10);
            console.log("Meses Ingresos", numOfMonths);
            if (!isNaN(numOfMonths) && numOfMonths > 0) {
                generateIncomeChart(userId, numOfMonths);
                console.log('numOfMonths ingreso seleccionado:', numOfMonths);
                dropdownList.classList.add("hidden"); // Ocultar el dropdown después de seleccionar una opción
            } else {
                console.error("Número de meses no válido:", numOfMonths);
            }
        });
    });
});
