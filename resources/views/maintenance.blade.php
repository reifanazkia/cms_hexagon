<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sedang Dalam Perbaikan - Universitas Bakti Tunas Husada</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      text-align: center;
      color: #fff;
      padding: 20px;
      box-sizing: border-box;
      position: relative;
      overflow: hidden;
    }

    /* Added animated background particles */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image:
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 2px, transparent 2px),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 2px, transparent 2px),
        radial-gradient(circle at 40% 40%, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 100px 100px, 150px 150px, 80px 80px;
      animation: float 20s ease-in-out infinite;
      z-index: -1;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    .main-title {
      font-size: 32px;
      font-weight: bold;
      margin: 30px 0 10px;
      color: #ffffff;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .subtitle {
      margin: 0 0 40px;
      font-size: 18px;
      color: #e0f2fe;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .cable-container {
      width: 100%;
      max-width: 900px;
      margin: 40px 0;
      filter: drop-shadow(0 0 30px rgba(59, 130, 246, 0.4));
    }

    .footer {
      margin-top: 50px;
      font-size: 16px;
      color: #e0f2fe;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .footer a {
      color: #fbbf24;
      text-decoration: none;
      margin: 0 8px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .footer a:hover {
      color: #f59e0b;
      text-shadow: 0 0 8px rgba(251, 191, 36, 0.5);
    }

    @media (max-width: 600px) {
      .main-title {
        font-size: 24px;
      }
      .subtitle {
        font-size: 16px;
      }
    }

    .logo-img {
      max-width: 250px;
      width: 100%;
      height: auto;
      margin-bottom: 20px;
      filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
      transition: transform 0.3s ease;
    }

    .logo-img:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <img src="{{ asset('storage/maintenance/1738815110_HEXAGON INC.png') }}" alt="Universitas BTH" class="logo-img">

  <h1 class="main-title">Mohon Maaf, Situs Web Sedang Dalam Perbaikan</h1>
  <p class="subtitle">Kami mohon maaf atas ketidaknyamanannya. Kami hampir selesai!</p>

  <div class="cable-container">
    <svg viewBox="0 0 900 250" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <!-- Simplified and improved gradients for cleaner look -->
        <linearGradient id="cableGradient" x1="0%" y1="0%" x2="0%" y2="100%">
          <stop offset="0%" stop-color="#60a5fa"/>
          <stop offset="50%" stop-color="#3b82f6"/>
          <stop offset="100%" stop-color="#1e40af"/>
        </linearGradient>

        <radialGradient id="socketGradient" cx="50%" cy="30%">
          <stop offset="0%" stop-color="#93c5fd"/>
          <stop offset="70%" stop-color="#3b82f6"/>
          <stop offset="100%" stop-color="#1e40af"/>
        </radialGradient>

        <radialGradient id="plugGradient" cx="50%" cy="30%">
          <stop offset="0%" stop-color="#7dd3fc"/>
          <stop offset="70%" stop-color="#0ea5e9"/>
          <stop offset="100%" stop-color="#0c4a6e"/>
        </radialGradient>

        <linearGradient id="metallic" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="#f8fafc"/>
          <stop offset="50%" stop-color="#e2e8f0"/>
          <stop offset="100%" stop-color="#94a3b8"/>
        </linearGradient>

        <!-- Enhanced glow effect -->
        <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
          <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
          <feMerge>
            <feMergeNode in="coloredBlur"/>
            <feMergeNode in="SourceGraphic"/>
          </feMerge>
        </filter>

        <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
          <feDropShadow dx="0" dy="6" stdDeviation="8" flood-opacity="0.3" flood-color="#1e40af"/>
        </filter>

        <!-- Improved spark pattern -->
        <pattern id="sparkPattern" x="0" y="0" width="30" height="15" patternUnits="userSpaceOnUse">
          <circle cx="15" cy="7.5" r="1.5" fill="#fbbf24" opacity="0.9">
            <animate attributeName="opacity" values="0.4;1;0.4" dur="1.2s" repeatCount="indefinite"/>
          </circle>
          <circle cx="8" cy="4" r="0.8" fill="#f59e0b" opacity="0.7">
            <animate attributeName="opacity" values="0.2;0.8;0.2" dur="1.5s" repeatCount="indefinite"/>
          </circle>
          <circle cx="22" cy="11" r="0.8" fill="#fde047" opacity="0.7">
            <animate attributeName="opacity" values="0.3;0.9;0.3" dur="1.8s" repeatCount="indefinite"/>
          </circle>
        </pattern>
      </defs>

      <!-- Cleaner cable shadow -->
      <ellipse cx="450" cy="135" rx="250" ry="12" fill="#1e40af" opacity="0.15"/>

      <!-- Improved main cable design -->
      <g>
        <rect x="200" y="115" width="500" height="30" rx="15" fill="url(#cableGradient)" filter="url(#shadow)"/>
        <rect x="200" y="118" width="500" height="12" rx="6" fill="#93c5fd" opacity="0.4"/>
        <rect x="200" y="132" width="500" height="8" rx="4" fill="#1e40af" opacity="0.3"/>

        <!-- Subtle cable texture lines -->
        <g opacity="0.3">
          <line x1="210" y1="122" x2="690" y2="122" stroke="#1e40af" stroke-width="0.5"/>
          <line x1="210" y1="138" x2="690" y2="138" stroke="#1e40af" stroke-width="0.5"/>
        </g>
      </g>

      <!-- Redesigned left socket with cleaner geometry -->
      <g transform="translate(50, 50)" filter="url(#shadow)">
        <circle cx="75" cy="75" r="85" fill="url(#socketGradient)" stroke="#1e40af" stroke-width="4"/>
        <circle cx="75" cy="75" r="75" fill="#3b82f6" opacity="0.8"/>
        <circle cx="75" cy="75" r="65" fill="#2563eb" stroke="#60a5fa" stroke-width="2"/>

        <!-- Cleaner socket holes -->
        <g>
          <rect x="58" y="60" width="14" height="20" rx="7" fill="#0f172a"/>
          <rect x="60" y="62" width="10" height="16" rx="5" fill="#fbbf24"/>
          <rect x="62" y="64" width="6" height="12" rx="3" fill="#f59e0b"/>

          <rect x="78" y="60" width="14" height="20" rx="7" fill="#0f172a"/>
          <rect x="80" y="62" width="10" height="16" rx="5" fill="#fbbf24"/>
          <rect x="82" y="64" width="6" height="12" rx="3" fill="#f59e0b"/>
        </g>

        <!-- Ground hole -->
        <circle cx="75" cy="90" r="8" fill="#0f172a"/>
        <circle cx="75" cy="90" r="6" fill="#fbbf24"/>
        <circle cx="75" cy="90" r="4" fill="#f59e0b"/>

        <!-- Cleaner outer ring -->
        <circle cx="75" cy="75" r="78" fill="none" stroke="#93c5fd" stroke-width="1.5" opacity="0.6"/>
        <text x="75" y="40" text-anchor="middle" font-family="Arial, sans-serif" font-size="10" fill="#93c5fd" font-weight="bold">SOCKET</text>
      </g>

      <!-- Redesigned right plug with better proportions -->
      <g transform="translate(700, 50)" filter="url(#shadow)">
        <circle cx="75" cy="75" r="85" fill="url(#plugGradient)" stroke="#0c4a6e" stroke-width="4"/>
        <circle cx="75" cy="75" r="75" fill="#0ea5e9" opacity="0.8"/>
        <circle cx="75" cy="75" r="65" fill="#0284c7" stroke="#7dd3fc" stroke-width="2"/>

        <!-- Improved plug prongs -->
        <g>
          <rect x="58" y="45" width="14" height="35" rx="7" fill="url(#metallic)" stroke="#64748b" stroke-width="1.5"/>
          <rect x="61" y="48" width="8" height="29" rx="4" fill="#f1f5f9"/>
          <rect x="63" y="50" width="4" height="25" rx="2" fill="#ffffff" opacity="0.9"/>

          <rect x="78" y="45" width="14" height="35" rx="7" fill="url(#metallic)" stroke="#64748b" stroke-width="1.5"/>
          <rect x="81" y="48" width="8" height="29" rx="4" fill="#f1f5f9"/>
          <rect x="83" y="50" width="4" height="25" rx="2" fill="#ffffff" opacity="0.9"/>
        </g>

        <!-- Ground prong -->
        <rect x="69" y="85" width="12" height="25" rx="6" fill="url(#metallic)" stroke="#64748b" stroke-width="1.5"/>
        <rect x="71" y="87" width="8" height="21" rx="4" fill="#f1f5f9"/>
        <rect x="73" y="89" width="4" height="17" rx="2" fill="#ffffff" opacity="0.9"/>

        <!-- Enhanced lightning bolt -->
        <g filter="url(#glow)">
          <path d="M65 95 L85 75 L78 75 L88 60 L68 80 L75 80 Z" fill="#fbbf24" stroke="#f59e0b" stroke-width="1.5"/>
          <path d="M67 93 L83 77 L78 77 L86 64 L70 82 L75 82 Z" fill="#fde047"/>
        </g>

        <circle cx="75" cy="75" r="78" fill="none" stroke="#7dd3fc" stroke-width="1.5" opacity="0.6"/>
        <text x="75" y="40" text-anchor="middle" font-family="Arial, sans-serif" font-size="10" fill="#7dd3fc" font-weight="bold">PLUG</text>
      </g>

      <!-- Smoother energy flow animation -->
      <g opacity="0.9">
        <path d="M280,130 Q350,120 Q420,130 Q490,125 Q560,130 Q630,125"
              fill="none" stroke="#fbbf24" stroke-width="6" stroke-linecap="round" filter="url(#glow)">
          <animate attributeName="d"
                   values="M280,130 Q350,120 Q420,130 Q490,125 Q560,130 Q630,125;
                           M280,130 Q350,135 Q420,120 Q490,130 Q560,125 Q630,130;
                           M280,130 Q350,120 Q420,130 Q490,125 Q560,130 Q630,125"
                   dur="3s" repeatCount="indefinite"/>
          <animate attributeName="opacity" values="0.7;1;0.7" dur="2s" repeatCount="indefinite"/>
        </path>

        <!-- Additional energy streams -->
        <path d="M300,135 Q400,130 Q500,135 Q600,130"
              fill="none" stroke="#f59e0b" stroke-width="3" stroke-linecap="round" opacity="0.8">
          <animate attributeName="opacity" values="0.5;0.9;0.5" dur="2.5s" repeatCount="indefinite"/>
        </path>

        <!-- Improved energy particles -->
        <g>
          <circle cx="350" cy="125" r="4" fill="#fbbf24">
            <animate attributeName="r" values="3;6;3" dur="1.5s" repeatCount="indefinite"/>
            <animate attributeName="cy" values="123;127;123" dur="1.8s" repeatCount="indefinite"/>
            <animate attributeName="opacity" values="0.6;1;0.6" dur="1.2s" repeatCount="indefinite"/>
          </circle>
          <circle cx="420" cy="128" r="3" fill="#f59e0b">
            <animate attributeName="r" values="2;5;2" dur="1.8s" repeatCount="indefinite"/>
            <animate attributeName="cy" values="126;130;126" dur="1.5s" repeatCount="indefinite"/>
            <animate attributeName="opacity" values="0.5;0.9;0.5" dur="1.4s" repeatCount="indefinite"/>
          </circle>
          <circle cx="490" cy="126" r="3.5" fill="#fde047">
            <animate attributeName="r" values="2.5;5.5;2.5" dur="1.3s" repeatCount="indefinite"/>
            <animate attributeName="cy" values="124;128;124" dur="1.7s" repeatCount="indefinite"/>
            <animate attributeName="opacity" values="0.7;1;0.7" dur="1.1s" repeatCount="indefinite"/>
          </circle>
          <circle cx="560" cy="132" r="3" fill="#fbbf24">
            <animate attributeName="r" values="2;4;2" dur="1.6s" repeatCount="indefinite"/>
            <animate attributeName="cy" values="130;134;130" dur="1.4s" repeatCount="indefinite"/>
            <animate attributeName="opacity" values="0.6;0.95;0.6" dur="1.3s" repeatCount="indefinite"/>
          </circle>
        </g>

        <!-- Enhanced spark trail -->
        <rect x="320" y="128" width="280" height="6" rx="3" fill="url(#sparkPattern)" opacity="0.7">
          <animate attributeName="opacity" values="0.4;0.9;0.4" dur="2.2s" repeatCount="indefinite"/>
        </rect>
      </g>
    </svg>
  </div>

  <div class="footer">
    Kamu bisa menghubungi kami melalui kontak ini:
    <a href="https://pmb.universitasbth.ac.id">HEXAGON INC</a> |
    <a href="tel:+62">+62 8966004677</a>
  </div>
</body>
</html>
