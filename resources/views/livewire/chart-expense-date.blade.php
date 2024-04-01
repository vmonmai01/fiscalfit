<div>
    <div>
        <!-- Formulario para seleccionar fechas -->
        <form>
            <label for="start_date">Fecha de inicio:</label>
            <input type="date" id="start_date" wire:model wire:change="startDate">

            <label for="end_date">Fecha de fin:</label>
            <input type="date" id="end_date" wire:model="endDate">
        </form>
    </div>
    <!-- Gráfico -->
    <div id="chart_div">
        <!-- Aquí renderiza el gráfico -->
        <canvas id="chartExpensesDates" width="400" height="400"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
        var chartExpensesDates = new Chart(ctx, {
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
        // Función para generar colores aleatorios
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
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
