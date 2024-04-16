document.addEventListener("DOMContentLoaded", function() {
    var myChartBar = document.getElementById("barChartBtwIncExp");
    var barChart = null; // Variable para mantener una referencia al gráfico renderizado

    const options = {
        series: [
            {
                name: "Income",
                color: "#31C48D",
                data: [],
            },
            {
                name: "Expense",
                data: [],
                color: "#F05252",
            }
        ],
        chart: {
            type: "bar",
            height: 400,
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: "100%",
                borderRadius: 6,
                dataLabels: {
                    position: "top",
                },
            },
        },
        legend: {
            show: true,
            position: "bottom",
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            labels: {
                show: true,
            },
            categories: [],
        },
        yaxis: {
            labels: {
                show: true,
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            formatter: function (value) {
                return "$" + value
            }
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -20
            },
        },
        fill: {
            opacity: 1,
        }
    }

    // Función para hacer la llamada a la API y actualizar/renderizar el gráfico
    function renderChart(numMonths) {
        $.ajax({
            url: `http://127.0.0.1:8000/api/finance/1/${numMonths}/expenses-incomes`,
            method: "GET",
            dataType: "json",
            success: function(data) {
                // Actualizar los datos del gráfico con los datos recibidos de la API
                options.series[0].data = data.map(item => item.income);
                options.series[1].data = data.map(item => item.expenses);

                // Obtener los nombres de los meses del arreglo de objetos de la respuesta de la API
                const months = data.map(item => item.month);

                // Actualizar las categorías del eje X con los nombres de los meses
                options.xaxis.categories = months;

                // Renderizar el gráfico o actualizar los datos del gráfico existente
                if (barChart) {
                    // Si ya existe un gráfico, actualizar los datos
                    barChart.updateOptions(options);
                } else {
                    // Si no existe un gráfico, crear uno nuevo
                    barChart = new ApexCharts(myChartBar, options);
                    barChart.render();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los datos de la API:', error);
            }
        });
    }

    // Asociar eventos de clic a los botones usando addEventListener
    document.getElementById("btn3").addEventListener("click", function() {
        renderChart(3);
    });

    document.getElementById("btn6").addEventListener("click", function() {
        renderChart(6);
    });

    document.getElementById("btn9").addEventListener("click", function() {
        renderChart(9);
    });

    document.getElementById("btn12").addEventListener("click", function() {
        renderChart(12);
    });

    // Llamada inicial al cargar la página con 3 meses
    renderChart(3);
});
