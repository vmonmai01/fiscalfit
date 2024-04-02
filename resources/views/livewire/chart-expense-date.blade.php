<div>
    <div>
        <!-- Formulario para seleccionar fechas -->
        <form>
            <label for="start_date">Fecha de inicio:</label>
            <input type="date" id="start_date" wire:model="startDate" wire:change="updateChartData">

            <label for="end_date">Fecha de fin:</label>
            <input type="date" id="end_date" wire:model="endDate" wire:change="updateChartData">
        </form>
        <!-- Mostrar los valores de startDate y endDate -->
        <div>
            <p>Fecha de inicio seleccionada: {{ $startDate }}</p>
            <p>Fecha de fin seleccionada: {{ $endDate }}</p>
        </div>
    </div>
    <!-- Gráfico -->
    <div id="chart_div">
        <!-- Aquí renderiza el gráfico -->
        <canvas id="chartExpensesDates" width="400" height="400"></canvas>
    </div>

    <script src="{{ asset('node_modules/chart.js/dist/chart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    <script>
        // Función para cargar el gráfico
        function loadChart() {
            // Obtener los datos del servidor
            var dataFromServer = @json($chartData);
    
            // Preparar los datos para el gráfico de tarta
            var labels = [];
            var amounts = [];
            var backgroundColors = [];
            dataFromServer.forEach(function(item) {
                labels.push(item.category);
                amounts.push(item.total_amount);
                // Generar colores de manera dinámica
                backgroundColors.push(getRandomColorWithOpacity());
            });
    
            // Configurar el gráfico de tarta
            var ctx = document.getElementById('chartExpensesDates').getContext('2d');
            if (window.chartExpensesDates instanceof Chart) {
                window.chartExpensesDates.destroy();
            }
            window.chartExpensesDates = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Amount',
                        data: amounts,
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        }
    
        // Ejecutar loadChart al cargar la página
        loadChart();
    
        // Capturar el cambio de las fechas y actualizar el gráfico
        document.getElementById('start_date').addEventListener('change', function() {
            @this.call('updateChartData');
            loadChart();
        });
    
        document.getElementById('end_date').addEventListener('change', function() {
            @this.call('updateChartData');
            loadChart();
        });
    
        // Función para generar colores aleatorios con opacidad
        function getRandomColorWithOpacity() {
            var opacity = 0.6; // Puedes ajustar este valor según lo desees (0 = transparente, 1 = opaco)
            var color = 'rgba(';
            for (var i = 0; i < 3; i++) {
                color += Math.floor(Math.random() * 256) + ', ';
            }
            color += opacity + ')';
            return color;
        }
    </script>
    

</div>
