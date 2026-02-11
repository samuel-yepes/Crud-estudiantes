<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Estudiantes | Sistema Académico</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }

        .custom-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .table-row-hover:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }
    </style>
</head>

<body class="antialiased text-slate-800 p-4 md:p-8">

    <div class="max-w-6xl mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Panel de Estudiantes</h1>
                <p class="text-slate-500 mt-1">Gestiona y filtra el registro académico de la institución.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('estudiantes.crear') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all shadow-md active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nuevo Registro
                </a>

                <form action="{{ route('estudiantes.eliminarTodos') }}" method="POST" id="deleteAllForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-200 rounded-xl transition-all active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6" />
                        </svg>
                        Borrar Todo
                    </button>
                </form>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-2xl border border-slate-200 mb-6 flex flex-col md:flex-row gap-4 items-center shadow-sm">
            <div class="relative w-full md:w-96">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" id="searchInput" placeholder="Buscar por nombre, correo o ID..."
                    value="{{ request('search') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-all outline-none bg-slate-50 focus:bg-white">
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200" id="studentsTable">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Estudiante</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Edad</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Lenguaje Dominante</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white" id="studentsBody">
                        @foreach ($estudiantes as $estudiante)
                            <tr class="table-row-hover">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 bg-slate-100 text-slate-600 rounded-md text-xs font-mono font-bold">
                                        #{{ $estudiante->id }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-4">

                                        @if ($estudiante->foto)
                                            <img src="{{ asset('storage/' . $estudiante->foto) }}"
                                                class="w-14 h-14 rounded-full object-cover border border-slate-200 shadow-sm">
                                        @else
                                            <div
                                                class="w-14 h-14 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xl font-bold shadow-sm">
                                                {{ strtoupper(substr($estudiante->nombre, 0, 1)) }}
                                            </div>
                                        @endif

                                        <div class="leading-tight">
                                            <div class="text-sm font-semibold text-slate-900">
                                                {{ $estudiante->nombre }}
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                {{ $estudiante->correo }}
                                            </div>
                                        </div>

                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="text-sm text-slate-600 font-medium">{{ $estudiante->edad }} años</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-700 border border-indigo-200 uppercase tracking-wide">
                                        {{ $estudiante->lenguaje }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end items-center gap-2">
                                        <a href="{{ route('estudiantes.editar', $estudiante->id) }}"
                                            class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors group"
                                            title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('estudiantes.eliminar', $estudiante->id) }}"
                                            method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors group"
                                                title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6" />
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

            <div
                class="bg-slate-50/80 px-6 py-4 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">
                    Mostrando <span class="text-indigo-600">{{ $estudiantes->count() }}</span> de <span
                        class="text-indigo-600">{{ $estudiantes->total() }}</span> alumnos
                </p>
                <div class="scale-90 sm:scale-100">
                    {{ $estudiantes->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podrás revertir esta acción.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-xl px-4 py-2',
                        cancelButton: 'rounded-xl px-4 py-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });

        document.getElementById('deleteAllForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¡Cuidado!',
                text: "¿Realmente quieres borrar toda la base de datos de estudiantes?",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, borrar todo',
                cancelButtonText: 'No, detener'
            }).then((result) => {
                if (result.isConfirmed) this.submit();
            });
        });
    </script>
</body>

</html>
