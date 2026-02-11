<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estudiante | Sistema Académico</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .form-card {
            max-width: 540px;
        }

        input:focus {
            transform: scale(1.01);
        }
    </style>
</head>

<body class="antialiased p-6 md:p-12">
    <div class="form-card mx-auto">

        <div class="mb-6">
            <a href="{{ route('estudiantes.index') }}"
                class="inline-flex items-center gap-2 text-slate-500 hover:text-indigo-600
               text-sm font-semibold transition-all">

                <span
                    class="p-2 bg-white rounded-lg shadow-sm border border-slate-200
                     hover:bg-indigo-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </span>

                Volver al listado
            </a>
        </div>


        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/50 overflow-hidden">

            <div class="bg-indigo-600 p-7 text-white relative overflow-hidden">
                <h1 class="text-xl font-bold tracking-tight">Nuevo Estudiante</h1>
                <p class="text-indigo-100 text-sm mt-1 opacity-90">
                    Ingresa los datos del nuevo integrante académico.
                </p>

                <div class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-indigo-500 rounded-full opacity-50"></div>
                <div class="absolute bottom-0 left-0 ml-8 -mb-10 w-16 h-16 bg-indigo-700 rounded-full opacity-50"></div>
            </div>

            <div class="p-7">
                <form action="{{ route('estudiantes.guardar') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                            Foto del estudiante
                        </label>

                        <label for="foto"
                            class="flex flex-col items-center justify-center gap-2
                                   border border-dashed border-slate-300
                                   rounded-xl p-5 cursor-pointer
                                   bg-slate-50 hover:bg-indigo-50 transition text-center">

                            <p class="text-sm font-semibold text-slate-700">
                                Subir imagen
                            </p>

                            <p class="text-xs text-slate-500">
                                PNG o JPG • Máx. 2MB
                            </p>

                            <span
                                class="inline-block px-4 py-2
                                       text-xs font-semibold
                                       text-indigo-600 bg-indigo-100
                                       rounded-md">
                                Elegir archivo
                            </span>

                            <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
                        </label>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                            Nombre Completo
                        </label>
                        <input type="text" name="nombre" placeholder="Ej. Juan Pérez"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200
                                   focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10
                                   outline-none transition-all text-sm bg-slate-50/50 focus:bg-white"
                            required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                            Correo Electrónico
                        </label>
                        <input type="email" name="correo" placeholder="usuario@ejemplo.com"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200
                                   focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10
                                   outline-none transition-all text-sm bg-slate-50/50 focus:bg-white"
                            required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                                Edad
                            </label>
                            <input type="number" name="edad" placeholder="20"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10
                                       outline-none transition-all text-sm bg-slate-50/50 focus:bg-white"
                                required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                                Teléfono
                            </label>
                            <input type="text" name="telefono" placeholder="+502 0000 0000"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10
                                       outline-none transition-all text-sm bg-slate-50/50 focus:bg-white"
                                required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                            Lenguaje Principal
                        </label>
                        <input type="text" name="lenguaje" placeholder="Ej. Python, Java, Rust..."
                            class="w-full px-4 py-3 rounded-xl border border-slate-200
                                   focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10
                                   outline-none transition-all text-sm bg-slate-50/50 focus:bg-white"
                            required>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold
                                   py-3 rounded-xl transition-all shadow-md shadow-indigo-200
                                   active:scale-[0.98] text-sm">
                            Confirmar Registro
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    @if (session('alert'))
        <div id="alertModal" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6
                animate-fade-in">

                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 flex items-center justify-center
                        rounded-full bg-green-100 text-green-600">
                        ✓
                    </div>

                    <h2 class="text-lg font-bold text-slate-800">
                        {{ session('alert.title') }}
                    </h2>
                </div>

                <p class="text-slate-600 text-sm mb-6">
                    {{ session('alert.message') }}
                </p>

                <div class="flex justify-end">
                    <button onclick="closeModal()"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700
                       text-white text-sm font-semibold rounded-lg transition">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    @endif


</body>

</html>

<script>
    function closeModal() {
        document.getElementById('alertModal').classList.add('hidden');
    }
</script>

