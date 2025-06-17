<?php include '../includes/admin/islogged.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Post</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#contenido', // ID del textarea que quieres convertir
            plugins: 'advlist autolink lists link image charmap preview anchor',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>

<style>
    .tox-promotion{
        display: none !important;
    }
    .tox-statusbar__branding{
        display: none !important;
    }
</style>

</head>

    


<body>
    <?php include '../includes/admin/admin-menu.php'; ?>

    <main class="max-w-5xl mx-auto px-4 py-8">

        <form onsubmit="savePost(event)" class="w-full mt-16">

            <label class="text-gray-400" for="titulo">Título:</label><br>
            <input class="p-2 w-full text-3xl font-bold" placeholder="Ingresa el título del post" type="text" id="titulo" name="titulo"><br><br>

            <label for="dropzone-file" class="w-full">
                <img for="dropzone-file" class="hidden w-full" alt="" id="previewImage">
            </label>
            <div class="flex items-center justify-center w-full">


                <label id="dropzone-label" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 mb-8">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                </label>
                <input id="dropzone-file" type="file" class="hidden" />
            </div> 

            <label class="text-gray-400" for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="20" cols="80"></textarea><br><br>

            <div class="flex justify-end">
                <input type="submit" value="Publicar Post" class="inline-block px-8 py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition text-lg hover:cursor-pointer">
            </div>
    </form>
    </main>

    <?php include '../includes/footer.php'; ?>

    <script>
        function savePost(event) {
            event.preventDefault();

            const titulo = document.getElementById('titulo').value;
            const contenido = tinymce.get('contenido').getContent();
            if (!titulo || !contenido) {
                alert('Por favor, completa todos los campos.');
                return;
            }

            console.log({
                titulo,
                contenido
            });
        }

        document.getElementById('dropzone-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('Imagen cargada:', e.target.result);
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    document.getElementById('dropzone-label').classList.add('hidden');
                    
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>