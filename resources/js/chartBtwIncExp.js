
document.addEventListener("DOMContentLoaded", function () {
    const userId = document.getElementById('user-data').getAttribute('data-user-id');
    console.log('ID del usuario:', userId);
    var myChartBar = document.getElementById("barChartBtwIncExp");
    var barChart = null; // Variable para mantener una referencia al gráfico renderizado

    // Función para hacer la llamada a la API y actualizar/renderizar el gráfico
    function renderChart(numMonths, chartHeight) {
        var options = {
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
                height: chartHeight || 400, // Establecer la altura predeterminada como 400 si no se proporciona un valor específico
                toolbar: {
                    show: false
                }
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
            },

        };

        $.ajax({
            url: `http://127.0.0.1:8000/api/finance/${userId}/${numMonths}/expenses-incomes`,
            method: "GET",
            dataType: "json",
            success: function (data) {
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

                 // Llamar a la función para actualizar los elementos HTML con los resultados calculados
                updateHTML(data);

                
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener los datos de la API:', error);
            }
        });
    }


    function updateHTML(data) {
        // Calcular los totales de ingresos y gastos
        let totalIncome = 0;
        let totalExpenses = 0;

        data.forEach(item => {
            // Convertir los valores de ingresos y gastos a números
            const income = parseFloat(item.income);
            const expenses = parseFloat(item.expenses);

            // Sumar al total de ingresos y gastos
            totalIncome += income;
            totalExpenses += expenses;
        });
        console.log(data);
        // Calcular la diferencia entre ingresos y gastos
        const difference = totalIncome - totalExpenses;

        // Mostrar los resultados
        // console.log(`Ingresos totales: ${totalIncome.toFixed(2)}`);
        // console.log(`Gastos totales: ${totalExpenses.toFixed(2)}`);
        // console.log(`Diferencia: ${difference.toFixed(2)}`);

        // Actualizar los elementos HTML con los resultados calculados
        document.getElementById("totalIncome").textContent =  totalIncome.toFixed(2) + "€";
        document.getElementById("totalExpenses").textContent =  totalExpenses.toFixed(2) + "€";
        document.getElementById("Diferencia").textContent =  difference.toFixed(2) + "€";
    }
    // Asociar eventos de clic a los botones usando addEventListener
    document.getElementById("btn3").addEventListener("click", function () {
        renderChart(3, 300); // Llama a renderChart con 3 meses y altura de 300px
    });

    document.getElementById("btn6").addEventListener("click", function () {
        renderChart(6, 400); // Llama a renderChart con 6 meses y altura de 400px
    });

    document.getElementById("btn9").addEventListener("click", function () {
        renderChart(9, 500); // Llama a renderChart con 9 meses y altura de 500px
    });

    document.getElementById("btn12").addEventListener("click", function () {
        renderChart(12, 600); // Llama a renderChart con 12 meses y altura de 600px
    });

    // Llamada inicial al cargar la página con 3 meses y altura predeterminada de 400px
    renderChart(3);
});
