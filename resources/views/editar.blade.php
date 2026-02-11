<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante | Sistema Académico</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
        }

        .form-card {
            max-width: 520px;
        }

        .input-focus:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.18);
        }
    </style>
</head>

<body class="antialiased p-6 md:p-12">

    <div class="form-card mx-auto">

        <div class="mb-8">
            <a href="{{ route('estudiantes.index') }}"
                class="inline-flex items-center gap-3 text-sm font-semibold text-slate-500 hover:text-indigo-600 transition">
                <span class="p-2 bg-white rounded-xl shadow border border-slate-200 hover:bg-indigo-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </span>
                Volver al listado
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">

            <div class="relative overflow-hidden bg-indigo-600 px-8 pt-8 pb-16">

                <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-indigo-500 rounded-full opacity-50"></div>
                <div class="absolute bottom-0 left-0 ml-10 mb-[-50px] w-20 h-20 bg-indigo-700 rounded-full opacity-50">
                </div>

                <div class="relative z-10 flex flex-col items-center">
                    <div class="relative group">

                        @if ($estudiante->foto)
                            <img src="{{ asset('storage/' . $estudiante->foto) }}"
                                class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-lg bg-white">
                        @else
                            <div
                                class="w-28 h-28 rounded-full bg-white text-indigo-600
                           flex items-center justify-center text-3xl font-bold
                           border-4 border-white shadow-lg">
                                {{ strtoupper(substr($estudiante->nombre, 0, 1)) }}
                            </div>
                        @endif

                        <label for="foto"
                            class="absolute bottom-1 right-1 bg-white border border-slate-200 rounded-full p-2.5
                       cursor-pointer shadow hover:bg-indigo-50 transition group-hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                            </svg>
                        </label>
                    </div>

                    <input type="file" id="foto" name="foto" form="editForm" accept="image/*" class="hidden">

                    <div class="mt-4 text-center text-white">
                        <h1 class="text-xl font-bold tracking-tight">
                            Editar estudiante
                        </h1>
                        <p class="text-xs text-indigo-100 mt-1 opacity-90">
                            Registro #{{ $estudiante->id }}
                        </p>
                    </div>
                </div>
            </div>


            <form id="editForm" action="{{ route('estudiantes.actualizar', $estudiante->id) }}" method="POST"
                enctype="multipart/form-data" class="p-8 space-y-6">

                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
                        Nombre completo
                    </label>
                    <input type="text" name="nombre" value="{{ $estudiante->nombre }}"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                               input-focus outline-none text-sm transition"
                        required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
                        Correo electrónico
                    </label>
                    <input type="email" name="correo" value="{{ $estudiante->correo }}"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                               input-focus outline-none text-sm transition"
                        required>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
                            Edad
                        </label>
                        <input type="number" name="edad" value="{{ $estudiante->edad }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                                   input-focus outline-none text-sm transition"
                            required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
                            Teléfono
                        </label>
                        <input type="text" name="telefono" value="{{ $estudiante->telefono }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                                   input-focus outline-none text-sm transition"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">
                        Lenguaje dominante
                    </label>
                    <input type="text" name="lenguaje" value="{{ $estudiante->lenguaje }}"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                               input-focus outline-none text-sm transition"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700
                           hover:from-indigo-700 hover:to-indigo-800
                           text-white font-semibold py-3.5 rounded-xl
                           transition shadow-lg active:scale-[0.98]">
                    Guardar cambios
                </button>
            </form>
        </div>
    </div>

</body>

</html>
