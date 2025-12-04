<?php
// PHP Script para generar el contenido estático de la página de aterrizaje del token Arcanine.
// Este archivo contiene todo el HTML, CSS y JavaScript necesario.

// Dirección de Contrato de ejemplo
$address = "0x7a58c0be72be218b41c608b7fe7c5bb8e296c00d";

// *************************************************************
// ** IMPORTANTE: REEMPLAZA ESTA URL CON LA IMAGEN DE TU PERSONAJE PRINCIPAL **
// *************************************************************
$mainCharacterImageUrl = "card.jpg";
$profileImageUrl = 'img/profile.webp';   // tu avatar circular
$postImageUrl    = 'img/post.png'; // imagen del post



// Función para generar un icono SVG de Lucide (ejemplo)
function renderIcon($iconName, $size = 24, $class = '') {
    // Nota: En un entorno de producción, se usaría una biblioteca de iconos real.
    // Aquí usamos placeholders SVG básicos para emular el estilo de Lucide.
    $icons = [
        'Flame' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.26-.64-2.5-2-5-1.5 2.5-2 5-2 7 0 1.5 1 2.5 2.5 2.5z"/><path d="M12 21.5c.5-1 1-1.5 1.5-2s2.5-2 3-3.5c-.5 1-1 2.5-2.5 3.5"/></svg>',
        'Check' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><polyline points="20 6 9 17 4 12"/></svg>',
        'Copy' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>',
        'Twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.4 9.1 5 5h1c1.5 1 3.5 2 5.5 2 4.5 0 8.5-3 11-7v.5c0 1.7-.5 3.3-1.4 4.7-1.3-1.4-2.8-2.5-4.5-3.2z"/></svg>',
        'BarChart3' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>',
        'Shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><path d="M20 13c0 5-4 9-4 9H8s-4-4-4-9V5l8-3 8 3z"/></svg>',
        'TrendingUp' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>',
        'Zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        'ExternalLink' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>',
        'Menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="18" x2="20" y2="18"/></svg>',
        'X' => '<svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$class.'"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
    ];
    return $icons[$iconName] ?? '';
}

// Custom CSS (extraído de React)
$customStyles = '
  @keyframes flicker {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(0.98); }
  }
  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
  }
  @keyframes ember-rise {
    0% { transform: translateY(0) scale(1); opacity: 0; }
    20% { opacity: 1; }
    100% { transform: translateY(-100px) scale(0); opacity: 0; }
  }
  .fire-text {
    text-shadow: 0 0 10px #ff4500, 0 0 20px #ff0000;
  }
  .glass-card {
    background: rgba(20, 20, 25, 0.6);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 69, 0, 0.2);
    box-shadow: 0 0 15px rgba(255, 69, 0, 0.05);
  }
  .glass-card:hover {
    border-color: rgba(255, 69, 0, 0.6);
    box-shadow: 0 0 30px rgba(255, 69, 0, 0.15);
  }
  .neon-button {
    box-shadow: 0 0 10px #ff8c00, 0 0 20px #ff4500;
  }
  .ember {
    position: absolute;
    width: 4px;
    height: 4px;
    background: #FFD700;
    border-radius: 50%;
    animation: ember-rise 4s infinite linear;

    

  }
';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaine's Arcanine Token Landing Page</title>
    <!-- Incluir Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?= $customStyles ?>
    </style>
    <style>
       /* Imagen grande sobre todo */
.image-popup {
    position: fixed !important;
    z-index: 9999 !important;
}

/* Fondo oscuro detrás de la imagen */
/* .gallery-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.90);
    z-index: 9998;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
} */

     /* CONTENEDOR PRINCIPAL */
.pentagrama-fire {
  position: relative;
  width: 320px;
  height: 320px;
}

/* ===============================
   🔥 FUEGO ALREDEDOR DEL PENTAGRAMA (CSS PURO)
   =============================== */
.fuego-anillo {
  position: absolute;
  inset: 0;
  border-radius: 50%;
  filter: blur(15px);
  z-index: 0;
  pointer-events: none;
}

/* Dos capas de fuego para un efecto más vivo */
.fuego-anillo::before,
.fuego-anillo::after {
  content: "";
  position: absolute;
  inset: 0px; /* sobresale para ser visible fuera */
  border-radius: 50%;
  mix-blend-mode: screen;
  width: 98%;

  /* degradado animado que simula fuego */
  background: conic-gradient(
    from 0deg,
    rgba(255,200,0,0.9),
    rgba(255,80,0,0.9),
    rgba(255,0,0,0.8),
    rgba(255,120,0,0.9),
    rgba(255,200,0,0.95)
  );

  animation: fuego-anim 2.2s linear infinite;
}

.fuego-anillo::after {
  animation-duration: 1.6s;
  animation-direction: reverse;
  opacity: 0.85;
}

/* ANIMACIÓN DE ROTACIÓN DEL FUEGO */
@keyframes fuego-anim {
  0% { transform: rotate(0deg) scale(1); }
  50% { transform: rotate(180deg) scale(1.05); }
  100% { transform: rotate(360deg) scale(1); }
}

/* ===============================
   🌀 PENTAGRAMA (GIRA + GLOW)
   =============================== */
   .card-container {
    perspective: 1000px;
}

.card-flip {
    width: 100%;
    height: 100%;
    position: relative;
    transform-style: preserve-3d;
    transition: transform 0.7s ease;
}

.card-container:hover .card-flip {
    transform: rotateY(180deg);
}

.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 14px;
    overflow: hidden;
}

.card-back {
    transform: rotateY(180deg);
    position: relative;
    border: 4px solid #1A265A; /* Borde azul oscuro */
    border-radius: 14px;
    overflow: hidden;

    /* Color base: Azul TCG */
    background: radial-gradient(circle at center,
        #1c4ba8 0%,
        #123b7b 40%,
        #0d2a5a 100%
    );

    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

/* Efecto holo en movimiento */
.card-back::before {
    content: "";
    position: absolute;
    inset: 0;

    background: linear-gradient(
        120deg,
        rgba(255,255,255,0.25),
        rgba(255,255,255,0),
        rgba(255,255,255,0.25)
    );

    mix-blend-mode: overlay;
    opacity: 0.35;
    animation: pokemonHolo 5s ease-in-out infinite;
}

@keyframes pokemonHolo {
    0% { transform: translate(-30%, -30%) rotate(0deg); }
    50% { transform: translate(30%, 30%) rotate(180deg); }
    100% { transform: translate(-30%, -30%) rotate(360deg); }
}

/* Textura ligera “foil” */
.card-back::after {
    content: "";
    position: absolute;
    inset: 0;

    background-image: url("https://www.transparenttextures.com/patterns/asfalt-light.png");
    opacity: 0.18;
    mix-blend-mode: soft-light;
}


.pentagrama-wrapper {
  position: absolute;
  inset: 0;
  z-index: 5;
}

.pentagrama,
.contenido {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  object-fit: contain;
  transform: translate(-50%, -50%);
}
:root {
    --bg-blue: #cce9ff;
    --card-bg: #ffffff;
    --card-border: #111111;
    --pill-yellow: #ffd84a;
    --highlight-yellow: #ffe9a6;
    --quote-bg: #ffe1a6;
}

.page-wrapper {
    max-width: 900px;
    margin: 40px auto;
    padding: 10px;
}

.chapter-card {
    position: relative;
    background: #fffce6;
    border: 3px solid var(--card-border);
    border-radius: 18px;
    padding: 32px;
    margin-bottom: 32px;
    box-shadow: 0 10px 0 #00000033;
     /* ANIMACIÓN */
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
/* EFECTO AL PASAR EL MOUSE */
.chapter-card:hover {
    transform: scale(1.02); /* ligero agrandado */
    box-shadow: 0 14px 0 #00000055; /* sombra más fuerte */
}

.chapter-pill {
    position: absolute;
    top: -14px;
    left: 40px;
    background: var(--pill-yellow);
    border-radius: 999px;
    border: 2px solid var(--card-border);
    padding: 4px 14px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.chapter-title {
    font-size: 26px;
    margin-bottom: 6px;
}

.chapter-subtitle {
    font-size: 15px;
    opacity: 0.75;
    margin-bottom: 16px;
    font-weight: 700;
}

.chapter-body {
    font-size: 15px;
    line-height: 1.6;
    font-weight: 700;
    top: 22px;
    position: relative;
}

.highlight {
    background: var(--highlight-yellow);
    padding: 0 4px;
    border-radius: 4px;
}

.quote-box {
    margin-top: 16px;
    background: var(--quote-bg);
    border-radius: 999px;
    padding: 10px 18px;
    font-weight: 600;
}

.emoji-list {
    list-style: none;
    padding: 0;
}

.emoji-list li {
    margin-bottom: 6px;
    display: flex;
    gap: 8px;
}

.emoji {
    min-width: 20px;
}

.divider {
    text-align: center;
    margin: 20px 0 0;
    font-size: 24px;
    opacity: 0.7;
}


/* PENTAGRAMA GIRANDO */
.pentagrama {
  animation: girar 6s linear infinite, glow 1.4s infinite alternate;
}

/* Giro */
@keyframes girar {
  from { transform: translate(-50%, -50%) rotate(0deg); }
  to   { transform: translate(-50%, -50%) rotate(360deg); }
}

/* Glow del pentagrama */
@keyframes glow {
  0% {
    filter:
      drop-shadow(0 0 12px orange)
      drop-shadow(0 0 28px red);
  }
  100% {
    filter:
      drop-shadow(0 0 18px yellow)
      drop-shadow(0 0 38px orange);
  }
}
    </style>
</head>
<body class="bg-slate-950 min-h-screen font-sans selection:bg-orange-500 selection:text-white">

    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 glass-card border-t-0 border-x-0 rounded-none px-6 py-4">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-2">
          <div class="jsx-935d766c33d98f29 relative"><div class="jsx-935d766c33d98f29 group-hover:animate-wiggle"><svg width="40" height="40" viewBox="0 0 100 100"><path d="M 50 5 A 45 45 0 0 1 95 50 L 65 50 A 15 15 0 0 0 35 50 L 5 50 A 45 45 0 0 1 50 5" fill="#EF4444" stroke="#1e3a5f" stroke-width="4"></path><path d="M 50 95 A 45 45 0 0 1 5 50 L 35 50 A 15 15 0 0 0 65 50 L 95 50 A 45 45 0 0 1 50 95" fill="#FFFFFF" stroke="#1e3a5f" stroke-width="4" style="transform:rotate(0deg);transform-origin:50px 50px;transition:transform 0.3s ease-out"></path><line x1="5" y1="50" x2="35" y2="50" stroke="#1e3a5f" stroke-width="4"></line><line x1="65" y1="50" x2="95" y2="50" stroke="#1e3a5f" stroke-width="4"></line><circle cx="50" cy="50" r="12" fill="#FFFFFF" stroke="#1e3a5f" stroke-width="4"></circle><circle cx="50" cy="50" r="6" fill="#1e3a5f"></circle></svg></div></div>
          <span class="text-2xl font-black italic tracking-tighter text-white">
            Blaine's Arcanine <span class="text-orange-500">$ANINE</span>
          </span>
        </div>
        
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8 text-sm font-bold tracking-wide text-gray-300">
          <a href="#about" class="hover:text-orange-400 transition-colors">ABOUT</a>
          <button class="bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-2 rounded-full font-bold hover:brightness-110 transition-all neon-button">
            BUY $ANINE
          </button>
        </div>

        <!-- Mobile Toggle -->
        <button id="mobile-menu-toggle" class="md:hidden text-white">
          <?= renderIcon('Menu', 24) ?>
        </button>
      </div>

      <!-- Mobile Menu Content (JS handles display) -->
      <div id="mobile-menu" class="md:hidden absolute top-full left-0 right-0 bg-slate-950 border-b border-orange-900 p-6 flex-col gap-4 text-center hidden">
          <a href="#about" class="text-white font-bold">ABOUT</a>
          <button class="bg-orange-600 text-white w-full py-3 rounded-lg font-bold">BUY $ANINE</button>
      </div>
    </nav>
    
    <main>
        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
            <!-- Dynamic Background -->
            <div class="absolute inset-0 bg-slate-950">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-orange-900/40 via-slate-950 to-slate-950"></div>
                <!-- Embers (PHP loop for dynamic style properties) -->
                <?php for ($i = 0; $i < 20; $i++): ?>
                    <div class="ember" style="
                        left: <?= mt_rand(0, 100) ?>%; 
                        top: <?= mt_rand(50, 150) ?>%;
                        animation-delay: <?= mt_rand(0, 50) / 10 ?>s;
                        animation-duration: <?= mt_rand(30, 70) / 10 ?>s;
                    "></div>
                <?php endfor; ?>
            </div>

            <div class="relative z-10 container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 space-y-6 text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-900/30 border border-orange-500/30 text-orange-400 text-xs font-bold tracking-widest uppercase">
                        <?= renderIcon('Zap', 12, 'fill-orange-400') ?>
                       The Legendary Fire Token
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-white italic leading-tight">
                        UNLEASH THE FLAME <br />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-600 fire-text">
                            POWERED BY SOLANA
                        </span>
                    </h1>
                    <p class="text-slate-400 text-lg md:text-xl max-w-lg mx-auto md:mx-0">
                        Speed. Power. Loyalty. Blaine's Arcanine ($ANINE) isn't just a memecoin it's a movement forged in fire. Join the pack and race to the moon.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start pt-4">
                        <button class="flex items-center justify-center gap-2 bg-white text-black px-8 py-4 rounded-full font-black text-lg hover:bg-gray-200 transition-colors">
                            VIEW CHART <?= renderIcon('TrendingUp', 20) ?>
                        </button>
                      <a href="https://x.com/i/communities/1996418282853670952" target="_blank">
    <button class="flex items-center justify-center gap-2 bg-transparent border-2 border-orange-600 text-orange-500 px-8 py-4 rounded-full font-black text-lg hover:bg-orange-600 hover:text-white transition-all neon-button">
        JOIN COMMUNITY ON X 
        <?= renderIcon('ExternalLink', 20) ?>
    </button>
</a>

                    </div>
                </div>

   <!-- Flip Card Container -->
<div class="order-1 md:order-2 flex justify-center relative">

    <div class="card-container w-64 h-64 md:w-72 md:h-96 relative animate-[float_6s_ease-in-out_infinite]">

        <div class="card-flip">

            <!-- Frente -->
            <div class="card-front absolute inset-0">
                <div class="absolute inset-0 rounded-full blur-3xl animate-pulse"></div>

                <img 
                    src="<?= $mainCharacterImageUrl ?>" 
                    alt="Main Character Token Mascot" 
                    class="w-full h-full object-contain drop-shadow-2xl rounded-xl"
                    onerror="this.onerror=null;this.src='https://placehold.co/400x400/FF4500/ffffff?text=Main+Character'"
                />
            </div>

            <!-- Parte Trasera (ANTES ERA CANVAS → AHORA ES IMAGEN) -->
            <div class="card-back absolute inset-0 flex items-center justify-center rounded-xl overflow-hidden">
                
                <img
                    src="img/card-back.jpg" 
                    alt="Back of Card"
                    class="w-full h-full object-cover rounded-xl"
                    onerror="this.src='https://placehold.co/400x400/123B7B/ffffff?text=Back+Card';"
                />

            </div>

        </div>
    </div>
</div>

            </div>
            
            <!-- Bottom fade -->
            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-slate-950 to-transparent"></div>
        </section>

        <!-- Contract & Icons Section -->
        <section class="relative z-20 pb-10">
            <!-- Smart Contract Card -->
            <div class="w-full max-w-3xl mx-auto px-4 mt-6 relative z-20">
                <div class="glass-card p-4 rounded-2xl flex flex-col md:flex-row items-center gap-4 border-2 border-orange-500/20">
                    <div class="bg-orange-500/10 p-3 rounded-xl">
                        <?= renderIcon('Shield', 24, 'text-orange-500') ?>
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <p class="text-xs text-slate-400 uppercase tracking-wider font-bold mb-1">CONTRACT ADDRESS (SOL)</p>
                        <p id="contract-address" class="font-mono text-white text-sm md:text-base break-all"><?= $address ?></p>
                    </div>
                    <button id="copy-button" class="bg-slate-800 hover:bg-slate-700 text-white p-3 rounded-xl transition-colors flex items-center gap-2 min-w-[100px] justify-center border border-slate-700">
                        <?= renderIcon('Copy', 18) ?><span id="copy-text" class="text-sm font-bold">COPY</span>
                    </button>
                </div>
            </div>
            
            <!-- Centered Social Icons -->
            <div class="flex justify-center gap-6 mt-8 relative z-20">
    <!-- Icono 1 -->
    <a href="http://x.com/KingArcani37564" class="bg-slate-800 p-3 rounded-full hover:bg-orange-500 transition-all group neon-button" aria-label="Twitter (X)">
        <img src="x.png" alt="Twitter" class="w-6 h-6 object-contain  group-hover:invert-0">
    </a>

    <!-- Icono 2 -->
    <a href="#" class="bg-slate-800 p-3 rounded-full hover:bg-orange-500 transition-all group neon-button" aria-label="DexScreener">
        <img src="dex.png" alt="DexScreener" class="w-6 h-6 object-contain  group-hover:invert-0">
    </a>
</div>

        </section>

        <!-- About Section -->
        <section id="about" class="py-20 relative overflow-hidden bg-slate-900/20">
            <div class="container mx-auto px-4 relative z-10 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-4xl font-black text-white mb-6 italic leading-tight">
                        THE LEGEND OF <br />
                        <span class="text-orange-500">$ANINE</span>
                    </h2>
                    <p class="text-slate-400 text-lg leading-relaxed mb-6">
                        Blaine's Arcanine ($ANINE) is not just another token; it's a symbol of speed, loyalty, and burning power on the blockchain. Inspired by the legendary Fire Pokémon, $ANINE is designed to unite a passionate community ready to rise.
                    </p>
                    <p class="text-slate-400 text-lg leading-relaxed">
Join the pack and be part of the evolution towards a decentralized future, driven by community and the energy of fire.                    </p>
                </div>
                <!-- Main Character Image in About Section -->
                <div class="order-1 md:order-2 relative flex justify-center">
                    <div class="w-64 h-64 relative">
                        <div class="absolute inset-0 bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>
                     
                     <div class="pentagrama-fire">

  <!-- 🔥 fuego alrededor -->
  <div class="fuego-anillo"></div>
                        <div class="pentagrama-wrapper">
  <!-- Pentagrama que va a girar -->
  <img src="fire2.png" class="pentagrama" />

  <!-- Imagen interior (no gira) -->
  <img src="arcanine.png" class="contenido" />
</div> </div>


                    </div>
                </div>
            </div>
        </section>
        <!--Story-->
        <?php include 'story.php'; ?>




        <!--GALLERY-->
        <!-- Gallery Section -->
     <!--GALLERY-->
<!-- Gallery Section -->
<!--GALLERY-->
<!-- GALLERY -->
<section id="gallery" class="py-20 bg-slate-950 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Título -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-900/30 border border-orange-500/30 text-orange-400 text-xs font-bold tracking-widest uppercase mb-4">
                🔥 Blaine's Arcanine Gallery
            </div>

            <h2 class="text-4xl font-black text-white italic mb-3">
                BURNING <span class="text-orange-500">GALLERY</span>
            </h2>

            <p class="text-slate-400 max-w-2xl mx-auto">
                A collection of epic moments from the $ANINE pack.<br>
                Personalize these images with your best art and memes.
            </p>
        </div>

        <!-- Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <!-- ITEM 1 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <!-- Imagen pequeña -->
                    <img src="img/img-1.webp"
                         class="w-full h-full object-cover rounded-2xl">

                    <!-- Contenedor de imagen grande con pointer-events -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-1.webp"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                        
                    </div>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-2.jpg"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-2.jpg"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                       
                    </div>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-3.webp"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-3.webp"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                        
                    </div>
                </div>
            </div>

            <!-- ITEM 4 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-4.jpg"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-4.jpg"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                        
                    </div>
                </div>
            </div>

            <!-- ITEM 5 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-5.jpg"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-5.jpg"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                        
                    </div>
                </div>
            </div>

            <!-- ITEM 6 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-6.gif"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-6.gif"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                    </div>
                </div>
            </div>

            <!-- ITEM 7 -->
            <div class="glass-card rounded-2xl overflow-visible group relative h-56 z-10 hover:z-[1000]">
                <!-- Overlay oscuro individual -->
                <div class="fixed inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-[998]"></div>
                
                <div class="relative w-full h-full">
                    <img src="img/img-7.gif"
                         class="w-full h-full object-cover rounded-2xl">

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
                                opacity-0 group-hover:opacity-100 
                                transition-all duration-500 z-[1001]
                                pointer-events-none group-hover:pointer-events-auto">
                        <img src="img/img-7.gif"
                             class="w-[400px] max-w-none h-auto object-contain rounded-xl shadow-2xl
                                    scale-90 group-hover:scale-100 transition-transform duration-500">
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl pointer-events-none"></div>

                    <div class="absolute bottom-3 left-3 text-xs font-bold text-orange-300 flex items-center gap-1 z-20 pointer-events-none">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




        <!-- Cards Section (DexScreener and Twitter) -->
        <div class="container mx-auto px-4 pb-20 pt-10">
            <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                <!-- Left: DexScreener Widget -->
                <div class="animate-[slide-up_0.5s_ease-out]">
                    <div class="glass-card rounded-2xl overflow-hidden flex flex-col h-full group">
                        <div class="p-4 border-b border-slate-800 flex justify-between items-center bg-slate-900/50">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-red-600 flex items-center justify-center font-bold text-white text-xs">AR</div>
                                <div>
                                    <h3 class="text-white font-bold text-sm">ARCA / SOL</h3>
                                    <p class="text-slate-400 text-xs">DexScreener</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-green-400 font-mono font-bold text-lg">$0.0420</p>
                                <p class="text-green-500 text-xs flex items-center justify-end gap-1">
                                    <?= renderIcon('TrendingUp', 10) ?> +12.5%
                                </p>
                            </div>
                        </div>
                        
                        <!-- Mock Chart Area -->
                        <div class="flex-1 bg-slate-950 p-4 relative min-h-[200px]">
                            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-green-900/10 to-transparent"></div>
                            
                            <!-- Grid Lines -->
                            <div class="absolute inset-0 flex flex-col justify-between p-4 opacity-10 pointer-events-none">
                                <div class="border-b border-slate-500 w-full h-0"></div>
                                <div class="border-b border-slate-500 w-full h-0"></div>
                                <div class="border-b border-slate-500 w-full h-0"></div>
                                <div class="border-b border-slate-500 w-full h-0"></div>
                            </div>

                            <!-- SVG Chart Line -->
                            <svg class="w-full h-full overflow-visible" preserveAspectRatio="none">
                                <path 
                                    d="M0 150 C 50 150, 50 120, 100 130 C 150 140, 150 80, 200 90 C 250 100, 250 40, 300 20" 
                                    fill="none" 
                                    stroke="#4ade80" 
                                    stroke-width="3" 
                                    vector-effect="non-scaling-stroke"
                                    class="drop-shadow-[0_0_10px_rgba(74,222,128,0.5)]"
                                />
                                <circle cx="100%" cy="20" r="4" fill="#4ade80" class="animate-pulse" />
                            </svg>
                        </div>

                        <div class="p-4 grid grid-cols-3 gap-2 text-center bg-slate-900/50 border-t border-slate-800">
                            <div>
                                <p class="text-xs text-slate-500">Cap. de Mercado</p>
                                <p class="text-white font-bold text-sm">$4.2M</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Liquidez</p>
                                <p class="text-white font-bold text-sm">$280K</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Vol. 24h</p>
                                <p class="text-white font-bold text-sm">$1.1M</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- X / Twitter Style Card -->
<div class="glass-card rounded-2xl p-6 h-full flex flex-col relative overflow-hidden">
    <!-- Icono X atrás -->
    <div class="absolute top-0 right-0 p-4 opacity-10">
        <?= renderIcon('Twitter', 100, 'text-white') ?>
    </div>
    
    <!-- Header: perfil -->
    <div class="flex items-center justify-between mb-6 relative z-10">
        <div class="flex items-center gap-3">
            <!-- Avatar -->
            <div class="w-12 h-12 rounded-full bg-slate-800 border-2 border-orange-500 flex items-center justify-center overflow-hidden">
                <img 
                    src="<?= $profileImageUrl ?? '/images/king-arcani-avatar.png' ?>" 
                    alt="King Arcani Profile"
                    class="w-full h-full object-cover"
                />
            </div>
            <div>
                <h3 class="text-white font-bold">Blaines Arcanine | $ANINE</h3>
                <p class="text-slate-400 text-sm">@KingArcani37564</p>
            </div>
        </div>
        <a href="https://x.com/KingArcani37564" 
   target="_blank"
   class="bg-white text-black px-4 py-1.5 rounded-full text-sm font-bold hover:bg-gray-200">
    Follow
</a>

    </div>

    <!-- Body -->
    <div class="flex-1 relative z-10">
        <p class="text-gray-300 mb-4 leading-relaxed">
            🔥 Welcome to the Blaines Arcanine, pack!<br/>
            I’m <span class="font-semibold text-white">@KingArcani37564</span>, guardian of the legendary fire dog behind 
            <span class="text-orange-400 font-semibold">$ANINE</span>.<br/><br/>

            This community is for true collectors, degens, trainers and meme enjoyers who believe Arcanine deserves his own era.<br/><br/>

            ✅ Share your favorite Arcanine cards and memes<br/>
            ✅ Talk strategy, alpha and upcoming drops<br/>
            ✅ Help us push $ANINE to the top of Solana and beyond<br/><br/>

            The flames are rising, the pack is assembling, and this is just the beginning.<br/><br/>
            <span class="font-semibold text-white">Drop a 🔥 in the replies if you’re Day 1 Arcanine gang.</span><br/><br/>

            <span class="text-blue-400">#ANINE #Arcanine #Solana #Memecoin</span>
        </p>

        <!-- Imagen del post -->
        <div class="aspect-video bg-slate-900 rounded-xl overflow-hidden border border-slate-800 flex items-center justify-center relative group cursor-pointer">
            <img 
                src="<?= $postImageUrl ?? '/images/anine-welcome-banner.png' ?>" 
                alt="$ANINE Welcome Banner"
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-orange-500/10 group-hover:bg-orange-500/20 transition-colors"></div>
        </div>
    </div>

    <!-- Footer: métricas fake -->
    <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-800 text-slate-500 text-sm">
        <span>1,024 Reposts</span>
        <span>2,400 Likes</span>
    </div>
</div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-900 bg-slate-950 pt-16 pb-8 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-orange-500 to-transparent opacity-50"></div>
        
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <?= renderIcon('Flame', 24, 'text-orange-500') ?>
                        <span class="text-xl font-black italic text-white">BLAINE'S ARCANINE</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        The ultimate fire-type token for the modern crypto era. Community-driven, legendary status, and blazing with potential.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Buy at Phantom</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">DexScreener</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Community</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="#" class="hover:text-orange-400 transition-colors">X</a></li>
                    </ul>
                </div>
            </div>
            
           
        </div>
    </footer>

    <!-- JavaScript para la funcionalidad de copiar y el menú móvil -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Lógica para Copiar Dirección
            const copyButton = document.getElementById('copy-button');
            const copyTextSpan = document.getElementById('copy-text');
            const contractAddress = document.getElementById('contract-address').innerText;
            const copyIcon = copyButton.querySelector('svg');

            if (copyButton) {
                copyButton.addEventListener('click', () => {
                    // Usa execCommand('copy') como fallback para iframes
                    try {
                        navigator.clipboard.writeText(contractAddress);
                        showCopiedState();
                    } catch (err) {
                        const textArea = document.createElement("textarea");
                        textArea.value = contractAddress;
                        document.body.appendChild(textArea);
                        textArea.focus();
                        textArea.select();
                        try {
                            document.execCommand('copy');
                            showCopiedState();
                        } catch (err) {
                            console.error('Error al copiar: ', err);
                        }
                        document.body.removeChild(textArea);
                    }
                });
            }

            function showCopiedState() {
                // Reemplazar icono por check (utilizando la clase Tailwind para color)
                copyButton.innerHTML = '<?= renderIcon('Check', 18, 'text-green-400') ?><span class="text-sm font-bold">COPIADO</span>';
                
                setTimeout(() => {
                    // Volver al estado original después de 2 segundos
                    copyButton.innerHTML = '<?= renderIcon('Copy', 18) ?><span class="text-sm font-bold">COPIAR</span>';
                }, 2000);
            }

            // Lógica para el Menú Móvil
            const menuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.toggle('hidden');
                
                // Cambiar el ícono del botón (Menú <-> X)
                if (isOpen) {
                    menuToggle.innerHTML = '<?= renderIcon('Menu', 24) ?>';
                } else {
                    menuToggle.innerHTML = '<?= renderIcon('X', 24) ?>';
                    mobileMenu.classList.add('flex'); // Asegurar flex para la columna
                }
            });

            // Cerrar menú al hacer clic en un enlace (solo móvil)
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                    menuToggle.innerHTML = '<?= renderIcon('Menu', 24) ?>';
                });
            });
        });
    </script>
    
</body>
</html>