var seriesData;
var labels;
var total_amount;

console.log('Id del usuario gastos: ', userId);


document.addEventListener("DOMContentLoaded", function () {
    generateExpenseChart(userId, 1);
});


function generateExpenseChart(userId, numOfMonths) {
    $.ajax({
        url: `http://127.0.0.1:8000/api/expenses/${userId}/${numOfMonths}`,
        method: 'GET',
        success: function (response) {
            const seriesData = response.map(item => parseFloat(item.total_amount));
            const labels = response.map(item => item.category);

            if (!window.chartExpensesDates) {
                const options = getChartOptionsExpenseDates(seriesData, labels);
                window.chartExpensesDates = new ApexCharts(document.getElementById("expenseDate-chart2"), options);
                window.chartExpensesDates.render();
            } else {
                window.chartExpensesDates.updateOptions({
                    series: seriesData,
                    labels: labels
                });
            }
            console.log('Meses= ', numOfMonths);
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

