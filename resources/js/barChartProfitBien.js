var myChartBar = document.getElementById("bar-chart1");

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
        sparkline: {
            enabled: false,
        },
        type: "bar",
        width: "100%",
        height: 400,
        toolbar: {
            show: false,
        }
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {
        bar: {
            horizontal: true,
            columnWidth: "100%",
            borderRadiusApplication: "end",
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
    tooltip: {
        shared: true,
        intersect: false,
        formatter: function (value) {
            return "$" + value
        }
    },
    xaxis: {
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
        },
        categories: [],
        axisTicks: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
    },
    yaxis: {
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
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


// Función para hacer la llamada a la API y renderizar el gráfico Ingresos/Gastos por mes segun el numero de meses y usuario
function renderChart(numMonths) {
    fetch(`/api/finance/1/${numMonths}/expenses-incomes`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Actualizar los datos del gráfico con los datos recibidos de la API
            options.series[0].data = data.map(item => item.income);
            options.series[1].data = data.map(item => item.expenses);

            // Obtener los nombres de los meses del arreglo de objetos de la respuesta de la API
            const months = data.map(item => item.month);

            // Actualizar las categorías del eje X con los nombres de los meses
            options.xaxis.categories = months;

            // Renderizar el gráfico con los datos actualizados
            const barChart = new ApexCharts(myChartBar, options);
            barChart.render();
        })
        .catch(error => {
            console.error('Error al obtener los datos de la API:', error);
        });
}