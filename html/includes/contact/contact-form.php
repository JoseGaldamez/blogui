<section class="py-20 min-h-screen">
    <div class="max-w-xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-6 drop-shadow">Contacto</h1>
        <p class="text-lg text-gray-600 mb-10">
            ¿Tienes alguna pregunta, propuesta o quieres saludar? ¡Contáctame por WhatsApp, correo electrónico o usando el formulario!
        </p>
        <div class="flex flex-col md:flex-row gap-6 justify-center mb-12">
            <a href="https://wa.me/521234567890" target="_blank"
               class="flex items-center justify-center gap-2 px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full shadow-lg transition text-lg">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.52 3.48A11.93 11.93 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.63A11.93 11.93 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.19-3.48-8.52zM12 22c-1.85 0-3.67-.5-5.24-1.44l-.37-.22-3.69.97.99-3.59-.24-.37A9.94 9.94 0 1 1 12 22zm5.2-7.6c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.44-2.25-1.4-.83-.74-1.39-1.65-1.56-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.61-.47-.16-.01-.35-.01-.54-.01-.19 0-.5.07-.76.34-.26.27-1 1-.99 2.43.01 1.43 1.03 2.81 1.18 3 .15.19 2.03 3.1 4.93 4.23.69.29 1.23.46 1.65.59.69.22 1.32.19 1.81.12.55-.08 1.65-.67 1.88-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/>
                </svg>
                WhatsApp
            </a>
            <a href="mailto:correo@ejemplo.com"
               class="flex items-center justify-center gap-2 px-8 py-3 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-full shadow-lg transition text-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4m8 0v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6m16-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v4"/>
                </svg>
                Correo
            </a>
        </div>
        <form action="#" method="POST" class="bg-gray-50 rounded-2xl shadow-md p-8 text-left space-y-6">
            <div>
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo electrónico</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <div>
                <label for="mensaje" class="block text-gray-700 font-semibold mb-2">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-102 transition text-lg cursor-pointer">
                Enviar mensaje
            </button>
        </form>
    </div>
</section>