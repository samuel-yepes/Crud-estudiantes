<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Admin | Secure Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Space+Grotesk:wght@300;500;700&display=swap');
        
        :root {
            --primary: #00d2ff;
            --accent: #3a86ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #050508;
            background-image: 
                radial-gradient(at 0% 0%, rgba(58, 134, 255, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 210, 255, 0.1) 0px, transparent 50%);
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            perspective: 1200px;
        }

        .glass-panel {
            background: rgba(10, 10, 15, 0.7);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 
                0 40px 100px -20px rgba(0, 0, 0, 0.8),
                inset 0 1px 1px rgba(255, 255, 255, 0.1);
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .glass-panel:hover {
            transform: rotateY(-2deg) rotateX(1deg);
        }

        .title-tech {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.02em;
        }

        /* Efecto de brillo de barrido */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        .shimmer::after {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.03), transparent);
            transform: rotate(45deg);
            animation: shine 6s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        .input-field {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--primary);
            box-shadow: 0 0 20px rgba(0, 210, 255, 0.15);
        }

        .btn-3d {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(58, 134, 255, 0.4);
        }

        .btn-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(58, 134, 255, 0.5);
        }

        .btn-3d:active {
            transform: translateY(0);
        }

        /* Scanline sutil */
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(0, 210, 255, 0.1);
            position: absolute;
            top: 0;
            z-index: 10;
            animation: scan 4s linear infinite;
        }

        @keyframes scan {
            0% { top: 0%; opacity: 0; }
            50% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">

    <div class="main-container w-full max-w-md">
        <div class="glass-panel rounded-[2rem] p-10 relative shimmer">
            <div class="scanline"></div>
            
            <div class="flex justify-center mb-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center shadow-lg transform rotate-12">
                    <svg class="w-8 h-8 text-white -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09a13.916 13.916 0 002.522-2.396m1.414-1.414a13.92 13.92 0 01-2.397-2.522c-.105-.15-.196-.302-.272-.456m-3.32 8.59l.953-.953m4.708-4.708L15.434 6.434M16.273 5.592a13.947 13.947 0 00-2.397-2.522m4.708 4.708L18.586 18.586m-2.314-1.414l1.414-1.414m-7.414 2c.757 0 1.5-.3 2.1-.9l.017-.018a13.923 13.923 0 003.97-3.665c.631-.853 1.242-1.783 1.832-2.783m-8.23 6.83l1.414-1.414m.918-5.514L10.24 13.713m0 0L7.1 16.852"></path>
                    </svg>
                </div>
            </div>

            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold title-tech text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400 mb-2">
                    Quantum ID
                </h1>
                <p class="text-xs tracking-[0.4em] text-cyan-500/60 font-medium uppercase">Protocolo de Seguridad v.24</p>
            </div>

            @if(session('error'))
                <div class="flex items-center gap-3 bg-red-500/10 border-l-2 border-red-500 p-4 rounded-r-xl mb-6">
                    <span class="text-red-400 text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-5">
                @csrf
                
                <div class="space-y-1">
                    <label class="text-[10px] uppercase tracking-widest text-gray-500 ml-2 font-semibold">Credencial de Red</label>
                    <input type="email" name="email" placeholder="nombre@empresa.com" required
                        class="input-field w-full rounded-2xl px-6 py-4 outline-none text-white placeholder-gray-600">
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] uppercase tracking-widest text-gray-500 ml-2 font-semibold">Llave de Acceso</label>
                    <input type="password" name="password" placeholder="••••••••" required
                        class="input-field w-full rounded-2xl px-6 py-4 outline-none text-white placeholder-gray-600">
                </div>

                <button type="submit" 
                    class="btn-3d w-full py-4 mt-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-sm uppercase tracking-[0.2em]">
                    Iniciar Sesión
                </button>
            </form>

            <div class="mt-10 flex flex-col items-center gap-4">
                <a href="/registro" class="text-xs text-gray-400 hover:text-white transition-all group">
                    ¿No posee una cuenta? <span class="text-cyan-500 group-hover:underline font-semibold ml-1">Solicitar Acceso</span>
                </a>
                
                <div class="flex gap-2 opacity-30">
                    <div class="w-1 h-1 rounded-full bg-white"></div>
                    <div class="w-1 h-1 rounded-full bg-white"></div>
                    <div class="w-1 h-1 rounded-full bg-white"></div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 px-4 flex justify-between items-center text-[9px] text-gray-600 tracking-tighter uppercase font-mono">
            <span>Terminal: 192.168.1.01</span>
            <span class="flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Encrypted Connection
            </span>
            <span>Uptime: 99.9%</span>
        </div>
    </div>

</body>
</html>