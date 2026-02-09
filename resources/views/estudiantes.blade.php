<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Estudiantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; 
        }
        .table-container {
            max-width: 1000px; 
        }
    </style>
</head>
<body class="p-6 md:p-12">

    <div class="table-container mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Estudiantes</h1>
                <p class="text-slate-500 text-sm">Registro académico de la plataforma.</p>
            </div>
            
            <a href="{{ route('estudiantes.crear') }}" 
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-all shadow-sm">
                <svg xmlns="http://www.w3.org" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Registro
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase tracking-wider">ID</th>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase tracking-wider">Estudiante</th>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Edad</th>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Lenguaje</th>
                            <th class="px-5 py-3 text-right text-[11px] font-bold text-slate-400 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    @if (session('alert'))
                        <script>
                        Swal.fire({
                            icon: '{{ session('alert.type') }}',
                            title: '{{ session('alert.title') }}',
                            text: '{{ session('alert.message') }}'
                        });
                        </script>
                        @endif
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @foreach ($estudiantes as $estudiante)
                        <tr class="hover:bg-blue-50/50 transition-colors group">
                            <td class="px-5 py-4 whitespace-nowrap text-xs font-semibold text-slate-400">
                                #{{ $estudiante->id }}
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-slate-700">{{ $estudiante->nombre }}</div>
                                <div class="text-xs text-slate-400">{{ $estudiante->correo }}</div>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                <span class="text-sm text-slate-600">{{ $estudiante->edad }} años</span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-bold bg-indigo-50 text-indigo-600 border border-indigo-100 uppercase">
                                    {{ $estudiante->lenguaje }}
                                </span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-right text-xs font-medium">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('estudiantes.editar', $estudiante->id) }}" class="text-slate-400 hover:text-indigo-600 transition-colors">
                                        <svg xmlns="http://www.w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.25 2.25 0 113.182 3.182L12 18.5H8v-4l9.586-9.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('estudiantes.eliminar', $estudiante->id) }}" method="POST" class="delete-form" >
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-rose-500 transition-colors">
                                            <svg xmlns="http://www.w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="bg-slate-50/50 px-5 py-3 border-t border-slate-100 flex justify-between items-center">
                <span class="text-[11px] text-slate-400 font-medium uppercase tracking-tighter">Total: {{ count($estudiantes) }} Alumnos</span>
                <div class="flex gap-1">
                    {{ $estudiantes->links() }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); 
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); 
            }
        })
    });
});

</script>