<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; 
        }
        .form-container {
            max-width: 500px;
        }
    </style>
</head>
<body class="p-6 md:p-12">

    <div class="form-container mx-auto">
        <div class="mb-6">
            <a href="{{ route('estudiantes.index') }}" class="text-slate-400 hover:text-amber-600 text-sm font-medium flex items-center gap-1 transition-colors">
                <svg xmlns="http://www.w3.org" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="p-2 bg-amber-50 rounded-lg">
                        <svg xmlns="http://www.w3.org" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.25 2.25 0 113.182 3.182L12 18.5H8v-4l9.586-9.586z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Editar Estudiante</h1>
                </div>
                <p class="text-slate-500 text-sm mb-8">Actualiza la información del registro <span class="font-mono text-amber-600">#{{ $estudiante->id }}</span></p>

                <form action="{{ route('estudiantes.actualizar', $estudiante->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nombre Completo</label>
                        <input type="text" name="nombre" value="{{ $estudiante->nombre }}" 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                        <input type="email" name="correo" value="{{ $estudiante->correo }}" 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Edad</label>
                            <input type="number" name="edad" value="{{ $estudiante->edad }}" 
                                   class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Teléfono</label>
                            <input type="text" name="telefono" value="{{ $estudiante->telefono }}" 
                                   class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Lenguaje Principal</label>
                        <input type="text" name="lenguaje" value="{{ $estudiante->lenguaje }}" 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 rounded-xl transition-all shadow-md shadow-amber-200 flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            Actualizar Información
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 flex justify-center">
                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-medium italic">Editando registro existente</p>
            </div>
        </div>
    </div>

</body>
</html>
