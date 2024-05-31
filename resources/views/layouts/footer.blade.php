<!-- resources/views/layouts/footer.blade.php -->
<footer class="bg-oscuro text-white py-10 px-4 mt-10 min-h-[200px] border-t border-amarillo">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between items-center h-full">
            <!-- Logo y Nombre del Sitio -->
            <div
                class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0 flex items-center justify-center md:justify-start pt-5 pl-5">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-amarillo">FiscalFit</a>
                <img src="{{ asset('storage/fiscalfit/logo.png') }}" alt="logo"
                    class="block h-9 w-auto fill-current text-amarillo">
            </div>
            <!-- Enlaces de Navegación -->
            <div class="w-full md:w-1/3 text-center mb-4 md:mb-0 flex items-center justify-center pt-5">
                <ul class="flex flex-wrap justify-center space-x-6">
                    <li><a href="{{ url('/') }}" class="hover:text-amarillo">Inicio</a></li>
                    <li><a href="{{ url('/policy') }}" class="hover:text-amarillo">Politica de Privacidad</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-amarillo">Contacto</a></li>
                </ul>
            </div>
            <!-- Redes Sociales -->
            <div class="w-full md:w-1/3 text-center md:text-right flex flex-col items-center md:items-end pt-5">
                <h3 class="font-bold text-amarillo mb-2">Redes Sociales</h3>
                <div class="flex justify-center md:justify-end space-x-4">
                    <a href="https://facebook.com" class="text-white hover:text-amarillo">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" class="text-white hover:text-amarillo">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" class="text-white hover:text-amarillo">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" class="text-white hover:text-amarillo">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="mt-6 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} FiscalFit®. Todos los derechos reservados.
        </div>
    </div>
</footer>
