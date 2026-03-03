<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Admin | New Identity</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Space+Grotesk:wght@300;500;700&display=swap');
        
        :root {
            --primary: #7000ff;
            --accent: #00d2ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #050508;
            background-image: 
                radial-gradient(at 100% 0%, rgba(112, 0, 255, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(0, 210, 255, 0.1) 0px, transparent 50%);
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            perspective: 1200px;
        }

        .glass-panel {
            background: rgba(10, 10, 15, 0.75);
            backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 
                0 40px 100px -20px rgba(0, 0, 0, 0.9),
                inset 0 1px 2px rgba(255, 255, 255, 0.1);
            transform-style: preserve-3d;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px) rotateX(-5deg); }
            to { opacity: 1; transform: translateY(0) rotateX(0); }
        }

        .title-tech {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.02em;
        }

        .input-field {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-field:focus {
            background: rgba(112, 0, 255, 0.05);
            border-color: var(--primary);
            box-shadow: 0 0 25px rgba(112, 0, 255, 0.2);
            padding-left: 1.75rem;
        }

        .btn-3d {
            position: relative;
            background: linear-gradient(135deg, #7000ff 0%, #3a86ff 100%);
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px -5px rgba(112, 0, 255, 0.5);
        }

        .btn-3d:hover {
            filter: brightness(1.2);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(112, 0, 255, 0.6);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 10px var(--primary);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">

    <div class="main-container w-full max-w-lg">
        <div class="glass-panel rounded-[2.5rem] p-12 relative overflow-hidden">
            
            <div class="absolute left-0 top-1/4 h-32 w-1 bg-gradient-to-b from-transparent via-purple-500 to-transparent opacity-50"></div>

            <div class="mb-10">
                <div class="flex items-center gap-3 mb-2">
                    <div class="status-dot animate-pulse"></div>
                    <span class="text-[10px] tracking-[0.5em] text-purple-400 font-bold uppercase">System_Entry_02</span>
                </div>
                <h1 class="text-4xl font-bold title-tech text-white">
                    Crear Identidad
                </h1>
                <p class="text-gray-500 text-sm mt-2">Registre su terminal en la red Quantum</p>
            </div>

            <form method="POST" action="/registro" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-gray-400 ml-1">Operador</label>
                        <input type="text" name="name" placeholder="Ej. Alex Vance" required
                            class="input-field w-full rounded-2xl px-6 py-4 outline-none text-white placeholder-gray-700">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-gray-400 ml-1">Enlace de Red</label>
                        <input type="email" name="email" placeholder="id@quantum.com" required
                            class="input-field w-full rounded-2xl px-6 py-4 outline-none text-white placeholder-gray-700">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] uppercase tracking-widest text-gray-400 ml-1">Cifrado de Seguridad</label>
                    <input type="password" name="password" placeholder="••••••••••••" required
                        class="input-field w-full rounded-2xl px-6 py-4 outline-none text-white placeholder-gray-700">
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="btn-3d w-full py-5 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.3em]">
                        Inicializar Registro
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-white/5 flex justify-between items-center">
                <a href="/login" class="text-xs text-gray-500 hover:text-purple-400 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Volver al login
                </a>
                
                <span class="text-[9px] text-gray-700 font-mono tracking-tighter">SECURE_AUTH_ENCRYPTED</span>
            </div>
        </div>
        
        <div class="mt-8 flex justify-center">
            <div class="bg-white/5 px-4 py-1 rounded-full border border-white/5">
                <p class="text-[10px] text-gray-500 tracking-widest uppercase">Protocolo de Registro v3.0.1</p>
            </div>
        </div>
    </div>

</body>
</html>