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

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Estudiantes</h1>
                <p class="text-slate-500 text-sm">Registro académico de la plataforma.</p>
            </div>

            <div class="flex gap-3">

                <a href="{{ route('estudiantes.crear') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700
                           text-white text-sm font-medium px-4 py-2.5 rounded-lg transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Nuevo Registro
                </a>

                <form action="{{ route('estudiantes.eliminarTodos') }}" method="POST" id="deleteAllForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium
                               text-rose-600 border border-rose-300
                               hover:bg-rose-50 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6" />
                        </svg>
                        Eliminar Todos
                    </button>
                </form>

            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase">ID</th>
                            <th class="px-5 py-3 text-left text-[11px] font-bold text-slate-400 uppercase">Estudiante</th>
                            <th class="px-5 py-3 text-center text-[11px] font-bold text-slate-400 uppercase">Edad</th>
                            <th class="px-5 py-3 text-center text-[11px] font-bold text-slate-400 uppercase">Lenguaje</th>
                            <th class="px-5 py-3 text-right text-[11px] font-bold text-slate-400 uppercase">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @foreach ($estudiantes as $estudiante)
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="px-5 py-4 text-xs font-semibold text-slate-400">
                                    #{{ $estudiante->id }}
                                </td>

                                <td class="px-5 py-4">
                                    <div class="text-sm font-semibold text-slate-700">
                                        {{ $estudiante->nombre }}
                                    </div>
                                    <div class="text-xs text-slate-400">
                                        {{ $estudiante->correo }}
                                    </div>
                                </td>

                                <td class="px-5 py-4 text-center text-sm text-slate-600">
                                    {{ $estudiante->edad }} años
                                </td>

                                <td class="px-5 py-4 text-center">
                                    <span
                                        class="inline-flex px-2.5 py-0.5 text-[11px] font-bold rounded
                                               bg-indigo-50 text-indigo-600 border border-indigo-100 uppercase">
                                        {{ $estudiante->lenguaje }}
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-3">

                                        <a href="{{ route('estudiantes.editar', $estudiante->id) }}"
                                            class="text-slate-400 hover:text-indigo-600 transition">
                                            ✏️
                                        </a>

                                        <form action="{{ route('estudiantes.eliminar', $estudiante->id) }}"
                                            method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-slate-400 hover:text-rose-500 transition">
                                                🗑️
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-slate-50 px-5 py-3 border-t flex justify-between items-center">
                <span class="text-[11px] text-slate-400 uppercase font-semibold">
                    Total: {{ $estudiantes->total() }} estudiantes
                </span>
                {{ $estudiantes->links() }}
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Eliminar estudiante?',
                    text: 'Esta acción no se puede revertir',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e11d48',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Sí, eliminar'
                }).then(result => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });

        document.getElementById('deleteAllForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '⚠️ Eliminar todos',
                text: 'Se eliminarán TODOS los estudiantes',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar todo'
            }).then(result => {
                if (result.isConfirmed) this.submit();
            });
        });
    </script>

</body>

</html>
