<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estudiante</title>
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
            <a href="{{ route('estudiantes.index') }}" class="text-slate-400 hover:text-indigo-600 text-sm font-medium flex items-center gap-1 transition-colors">
                <svg xmlns="http://www.w3.org" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al listado
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-8">
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight mb-2">Nuevo Estudiante</h1>
                <p class="text-slate-500 text-sm mb-8">Completa los campos para registrar un nuevo alumno.</p>

                <form action="{{ route('estudiantes.guardar') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nombre Completo</label>
                        <input type="text" name="nombre" placeholder="Ej. Juan Pérez" 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                        <input type="email" name="correo" placeholder="usuario@ejemplo.com" 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Edad</label>
                            <input type="number" name="edad" placeholder="00" 
                                   class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Teléfono</label>
                            <input type="text" name="telefono" placeholder="+502..." 
                                   class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Lenguaje Principal</label>
                        <input type="text" name="lenguaje" placeholder="Ej. Python, Java..." 
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-sm text-slate-700 bg-slate-50/50" required>
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition-all shadow-md shadow-indigo-200 flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Guardar Estudiante
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="bg-slate-50 px-8 py-4 border-t border-slate-100">
                <p class="text-[10px] text-slate-400 text-center uppercase tracking-widest font-medium">Sistema de Control Académico © 2024</p>
            </div>
        </div>
    </div>

</body>
</html>
