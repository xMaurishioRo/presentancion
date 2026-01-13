<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuesta: Gaia Mobile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: slideDown 0.6s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .header p {
            color: #6b7280;
            margin-top: 0.5rem;
            font-size: 1.1rem;
        }

        .pdf-button {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pdf-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4);
        }

        .pdf-button:active {
            transform: translateY(-1px);
        }

        .slide-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            min-height: 650px;
            animation: fadeInUp 0.6s ease;
            position: relative;
            overflow: hidden;
        }

        .slide-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
            background-size: 200% 100%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 0%;
            }
        }

        .slide-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInUp 0.8s ease;
        }

        .slide-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
            animation: bounce 2s ease infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .slide-header h2 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #1f2937 0%, #4b5563 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            font-weight: 800;
        }

        .slide-header p {
            color: #6b7280;
            font-size: 1.2rem;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .card {
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-blue {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 2px solid #3b82f6;
        }

        .card-green {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 2px solid #10b981;
        }

        .card-purple {
            background: linear-gradient(135deg, #e9d5ff 0%, #d8b4fe 100%);
            border: 2px solid #8b5cf6;
        }

        .card-orange {
            background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%);
            border: 2px solid #f97316;
        }

        .card-red {
            background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%);
            border-left: 5px solid #ef4444;
        }

        .card h3 {
            font-size: 2rem;
            margin: 1rem 0;
            font-weight: 700;
        }

        .text-blue {
            color: #1e40af;
        }

        .text-green {
            color: #065f46;
        }

        .text-purple {
            color: #6b21a8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            padding: 2rem;
            border-radius: 16px;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .feature-card h4 {
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .feature-card ul {
            list-style: none;
            padding: 0;
        }

        .feature-card li {
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #374151;
            padding-left: 1.5rem;
            position: relative;
        }

        .feature-card li::before {
            content: '✓';
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .gradient-main {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2.5rem;
            border-radius: 16px;
            color: white;
            margin-bottom: 1.5rem;
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.3);
            animation: fadeInUp 0.8s ease;
        }

        .projection-card {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            padding: 2rem;
            border-radius: 16px;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease;
        }

        .projection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .projection-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .roadmap {
            position: relative;
            padding-left: 3rem;
        }

        .roadmap-item {
            display: flex;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease;
        }

        .roadmap-number {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            margin-right: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            font-size: 1.3rem;
        }

        .bg-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .bg-green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .bg-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }

        .bg-orange {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }

        .navigation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #e5e7eb;
        }

        .nav-button {
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-prev {
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            color: #1f2937;
        }

        .nav-next {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .nav-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .nav-dots {
            display: flex;
            gap: 0.75rem;
        }

        .dot {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            background: #d1d5db;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot:hover {
            background: #9ca3af;
            transform: scale(1.2);
        }

        .dot.active {
            width: 2.5rem;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }

        .gradient-card {
            padding: 2rem;
            border-radius: 16px;
            color: white;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease;
        }

        .gradient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .gradient-card ul {
            list-style: none;
            padding: 0;
        }

        .gradient-card li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .gradient-card li::before {
            content: '✓';
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        @media (max-width: 768px) {

            .grid-3,
            .grid-2,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .slide-header h2 {
                font-size: 1.8rem;
            }

            .navigation {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-dots {
                order: 1;
            }

            .nav-prev,
            .nav-next {
                order: 2;
            }
        }

        .loading {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 2rem 3rem;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-align: center;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 4px solid #f3f4f6;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .slide {
            display: none;
        }

        .slide.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="loading" id="loading">
        <div class="spinner"></div>
        <p style="color: #1f2937; font-weight: 600;">Generando PDF...</p>
    </div>

    <div class="container">
        <div class="header">
            <div>
                <h1>Propuesta de Proyecto</h1>
                <p>Gaia Mobile - Aplicación de Renta Mensual</p>
            </div>
            <button class="pdf-button" onclick="generatePDF()">
                <span style="font-size: 1.2rem;">📄</span>
                Descargar PDF
            </button>
        </div>

        <div class="slide-container" id="slideContainer">
            <!-- Slide 1 -->
            <div class="slide active" data-slide="0">
    <div class="slide-header">
        <div class="slide-icon">📱</div>
        <h2>Gaia Mobile</h2>
        <p>Aplicación Móvil de Renta Mensual</p>
    </div>

    <div class="slide-content">
        <p
            style="text-align: center; font-size: 1.25rem; color: #4b5563; margin-bottom: 2rem; font-weight: 500;">
            Solución móvil para agilizar procesos de ventas y recopilación de datos en campo
        </p>

        <div class="grid-3">
            <div class="card card-blue">
                <div style="font-size: 3.5rem;">💵</div>
                <h3 class="text-blue">$600</h3>
                <p style="font-size: 1rem; color: #6b7280; font-weight: 500;">MXN/mes</p>
            </div>

            <div class="card card-green">
                <div style="font-size: 3.5rem;">👥</div>
                <h3 class="text-green">40–50</h3>
                <p style="font-size: 1rem; color: #6b7280; font-weight: 500;">Clientes potenciales</p>
            </div>

            <div class="card card-purple">
                <div style="font-size: 3.5rem;">📈</div>
                <h3 class="text-purple">$24K–$30K</h3>
                <p style="font-size: 1rem; color: #6b7280; font-weight: 500;">Ingresos mensuales</p>
            </div>
        </div>
    </div>
</div>


            <!-- Slide 2 -->
            <div class="slide" data-slide="1">
                <div class="slide-header">
                    <div class="slide-icon">⚡</div>
                    <h2>Problemática Actual</h2>
                    <p>Desafíos de la versión web de Gaia</p>
                </div>
                <div class="slide-content">
                    <div class="card card-red" style="margin-bottom: 1rem; text-align: left;">
                        <p style="font-weight: 600; color: #dc2626; font-size: 1.1rem;">❌ Vista móvil no responsiva</p>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Algunos módulos no funcionan
                            correctamente en dispositivos móviles</p>
                    </div>
                    <div class="card card-red" style="margin-bottom: 1rem; text-align: left;">
                        <p style="font-weight: 600; color: #dc2626; font-size: 1.1rem;">❌ Procesos lentos en campo</p>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Asesores no pueden cerrar
                            ventas rápidamente desde ubicaciones externas</p>
                    </div>
                    <div class="card card-red" style="margin-bottom: 1rem; text-align: left;">
                        <p style="font-weight: 600; color: #dc2626; font-size: 1.1rem;">❌ Dependencia de computadoras
                        </p>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Limitación para trabajar en
                            movimiento o con clientes en sitio</p>
                    </div>
                    <div class="card"
                        style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 5px solid #f59e0b; margin-top: 2rem; text-align: left;">
                        <p style="font-weight: 600; color: #92400e; font-size: 1.1rem;">💡 Oportunidad</p>
                        <p style="color: #78350f; font-size: 1rem; margin-top: 0.75rem;">Los clientes demandan una
                            solución móvil nativa y optimizada</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide" data-slide="2">
                <div class="slide-header">
                    <div class="slide-icon">✅</div>
                    <h2>Solución: Gaia Mobile</h2>
                    <p>Funcionalidades clave de la aplicación</p>
                </div>
                <div class="slide-content">
                    <div class="feature-grid">
                        <div class="feature-card"
                            style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border: 2px solid #3b82f6;">
                            <h4 style="color: #1e40af;">📋 Recopilación de Datos</h4>
                            <ul>
                                <li>Captura de información de clientes</li>
                                <li>Sincronización automática</li>
                            </ul>
                        </div>
                        <div class="feature-card"
                            style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border: 2px solid #10b981;">
                            <h4 style="color: #065f46;">💰 Cotizaciones y Ventas</h4>
                            <ul>
                                <li>Cotizaciones en tiempo real</li>
                                <li>Cierre de ventas in-situ</li>
                                <li>Catálogo de productos</li>
                            </ul>
                        </div>
                        <div class="feature-card"
                            style="background: linear-gradient(135deg, #e9d5ff 0%, #d8b4fe 100%); border: 2px solid #8b5cf6;">
                            <h4 style="color: #6b21a8;">📊 Dashboard Móvil</h4>
                            <ul>
                                <li>Métricas de ventas</li>
                                <li>Reportes visuales</li>
                                <li>KPIs en tiempo real</li>
                            </ul>
                        </div>
                        <div class="feature-card"
                            style="background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%); border: 2px solid #f97316;">
                            <h4 style="color: #9a3412;">🔄 Sincronización</h4>
                            <ul>
                                <li>Integración con Gaia Web</li>
                                <li>Actualizaciones en tiempo real</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="slide" data-slide="3">
                <div class="slide-header">
                    <div class="slide-icon">💵</div>
                    <h2>Modelo de Negocio</h2>
                    <p>Sistema de renta mensual accesible</p>
                </div>

                <div class="slide-content">
                    <div class="gradient-main">
                        <h3 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-weight: 700;">
                            $600 MXN/mes
                        </h3>
                        <p style="font-size: 1.2rem;">Por usuario / asesor de ventas</p>
                    </div>

                    <div class="grid-2" style="margin-bottom: 1.5rem;">
                        <div class="projection-card">
                            <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem; color: #1f2937;">
                                📊 Proyección Conservadora
                            </h4>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">30 clientes activos:</span>
                                <span style="font-weight: 700; color: #16a34a; font-size: 1.1rem;">
                                    $18,000
                                </span>
                            </div>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">Anual:</span>
                                <span style="font-weight: 700; color: #16a34a; font-size: 1.1rem;">
                                    $216,000
                                </span>
                            </div>
                        </div>

                        <div class="projection-card">
                            <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem; color: #1f2937;">
                                🚀 Proyección Optimista
                            </h4>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">50 clientes activos:</span>
                                <span style="font-weight: 700; color: #2563eb; font-size: 1.1rem;">
                                    $30,000
                                </span>
                            </div>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">Anual:</span>
                                <span style="font-weight: 700; color: #2563eb; font-size: 1.1rem;">
                                    $360,000
                                </span>
                            </div>
                        </div>
                    </div>

                    <div
                        style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); padding: 2rem; border-radius: 16px; border: 2px solid #3b82f6;">
                        <h4 style="color: #1e40af; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">
                            ✨ Incluye:
                        </h4>
                        <ul style="list-style: none; padding: 0; color: #1f2937; font-size: 1rem;">
                            <li style="margin-bottom: 0.5rem;">✓ Actualizaciones continuas</li>
                            <li style="margin-bottom: 0.5rem;">✓ Soporte técnico</li>
                            <li style="margin-bottom: 0.5rem;">✓ Almacenamiento en la nube</li>
                            <li>✓ Nuevas funcionalidades sin costo extra</li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Slide 5 -->
            <div class="slide" data-slide="4">
    <div class="slide-header">
        <div class="slide-icon">🚀</div>
        <p>Fases del proyecto</p>
    </div>

    <div class="slide-content">
        <div class="roadmap">

            <!-- FASE 1 -->
            <div class="roadmap-item">
                <div class="roadmap-number bg-blue">1</div>
                <div style="flex: 1; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #3b82f6;">
                    <h4 style="font-weight: 700; color: #1e40af; margin-bottom: 0.5rem; font-size: 1.2rem;">
                        Fase 1: MVP
                    </h4>
                    <p style="font-size: 0.9rem; font-weight: 600; color: #1e3a8a; margin-bottom: 0.5rem;">
                        ⏱️ Duración estimada: 6–8 semanas
                    </p>
                    <p style="color: #374151; font-size: 1rem;">
                        Desarrollo de 5–6 módulos base: cotizaciones, captura de datos, clientes, usuarios,
                        sincronización y autenticación.
                    </p>
                </div>
            </div>

            <!-- FASE 2 -->
            <div class="roadmap-item">
                <div class="roadmap-number bg-green">2</div>
                <div style="flex: 1; background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #10b981;">
                    <h4 style="font-weight: 700; color: #065f46; margin-bottom: 0.5rem; font-size: 1.2rem;">
                        Fase 2: Pruebas Piloto
                    </h4>
                    <p style="font-size: 0.9rem; font-weight: 600; color: #065f46; margin-bottom: 0.5rem;">
                        ⏱️ Duración estimada: 4 semanas
                    </p>
                    <p style="color: #374151; font-size: 1rem;">
                        Beta con 5–10 clientes reales. Corrección de errores, ajustes de diseño,
                        mejoras de rendimiento y validación de flujos reales de ventas.
                    </p>
                </div>
            </div>

            <!-- FASE 3 -->
            <div class="roadmap-item">
                <div class="roadmap-number bg-purple">3</div>
                <div style="flex: 1; background: linear-gradient(135deg, #e9d5ff 0%, #d8b4fe 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #8b5cf6;">
                    <h4 style="font-weight: 700; color: #6b21a8; margin-bottom: 0.5rem; font-size: 1.2rem;">
                        Fase 3: Lanzamiento Oficial
                    </h4>
                    <p style="font-size: 0.9rem; font-weight: 600; color: #6b21a8; margin-bottom: 0.5rem;">
                        ⏱️ Duración estimada: 2–3 semanas (15 dias para playstore e ios)
                    </p>
                    <!-- <p style="color: #374151; font-size: 1rem;">
                        Publicación en tiendas, onboarding de clientes, documentación,
                        capacitación básica y activación de soporte.
                    </p> -->
                </div>
            </div>

            <!-- FASE 4 -->
            <div class="roadmap-item">
                <div class="roadmap-number bg-orange">4</div>
                <div style="flex: 1; background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #f97316;">
                    <h4 style="font-weight: 700; color: #9a3412; margin-bottom: 0.5rem; font-size: 1.2rem;">
                        Fase 4: Mejoras Continuas
                    </h4>
                    <p style="font-size: 0.9rem; font-weight: 600; color: #9a3412; margin-bottom: 0.5rem;">
                        ⏱️ Duración: Permanente
                    </p>
                    <p style="color: #374151; font-size: 1rem;">
                        Nuevas funcionalidades, escalabilidad,
                        mejoras solicitadas por clientes y evolución del producto.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


            <!-- Slide 6 -->
            <!-- <div class="slide" data-slide="5">
                <div class="slide-header">
                    <div class="slide-icon">🔄</div>
                    <h2>Tecnologías y Arquitectura</h2>
                    <p>Stack tecnológico propuesto</p>
                </div>
                <div class="slide-content">
                    <div class="grid-3">
                        <div class="card" style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); border: 2px solid #22c55e;">
                            <div style="font-size: 3rem;">⚛️</div>
                            <h4 style="color: #166534; margin: 1rem 0; font-size: 1.3rem;">Frontend Móvil</h4>
                            <p style="color: #374151; font-size: 0.95rem;">React Native con TypeScript para desarrollo multiplataforma</p>
                        </div>
                        <div class="card" style="background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%); border: 2px solid #6366f1;">
                            <div style="font-size: 3rem;">🔧</div>
                            <h4 style="color: #3730a3; margin: 1rem 0; font-size: 1.3rem;">Backend</h4>
                            <p style="color: #374151; font-size: 0.95rem;">Node.js + Express, API RESTful, WebSocket para tiempo real</p>
                        </div>
                        <div class="card" style="background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%); border: 2px solid #ec4899;">
                            <div style="font-size: 3rem;">🗄️</div>
                            <h4 style="color: #9d174d; margin: 1rem 0; font-size: 1.3rem;">Base de Datos</h4>
                            <p style="color: #374151; font-size: 0.95rem;">PostgreSQL + Redis para caché, sincronización offline</p>
                        </div>
                    </div>
                    <div style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding: 2rem; border-radius: 16px; border: 2px solid #0ea5e9; margin-top: 2rem;">
                        <h4 style="color: #0369a1; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">🏗️ Arquitectura</h4>
                        <ul style="list-style: none; padding: 0; color: #374151; font-size: 1rem;">
                            <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                <span style="position: absolute; left: 0;">✓</span>
                                Microservicios escalables
                            </li>
                            <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                <span style="position: absolute; left: 0;">✓</span>
                                Sincronización bidireccional
                            </li>
                            <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                <span style="position: absolute; left: 0;">✓</span>
                                API Gateway para integración
                            </li>
                            <li style="padding-left: 1.5rem; position: relative;">
                                <span style="position: absolute; left: 0;">✓</span>
                                AWS/Azure para hosting
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <!-- Slide 7 -->
            <!-- <div class="slide" data-slide="6">
                <div class="slide-header">
                    <div class="slide-icon">🤝</div>
                    <h2>Propuesta de Colaboración</h2>
                    <p>Modelo de trabajo conjunto</p>
                </div>
                <div class="slide-content">
                    <div class="gradient-main" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                        <h3 style="font-size: 2rem; margin-bottom: 1rem; font-weight: 700;">Desarrollo 100% Personalizado</h3>
                        <p style="font-size: 1.2rem;">Basado en los requerimientos específicos de Gaia</p>
                    </div>

                    <div class="grid-2" style="margin-bottom: 2rem;">
                        <div style="background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%); padding: 2rem; border-radius: 16px; border: 2px solid #9ca3af;">
                            <h4 style="color: #374151; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">📋 Metodología Ágil</h4>
                            <ul style="list-style: none; padding: 0; color: #4b5563; font-size: 1rem;">
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">•</span>
                                    Sprints de 2 semanas
                                </li>
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">•</span>
                                    Reuniones semanales de seguimiento
                                </li>
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">•</span>
                                    Demos funcionales periódicas
                                </li>
                                <li style="padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">•</span>
                                    Retroalimentación continua
                                </li>
                            </ul>
                        </div>

                        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); padding: 2rem; border-radius: 16px; border: 2px solid #22c55e;">
                            <h4 style="color: #166534; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">✅ Entregables</h4>
                            <ul style="list-style: none; padding: 0; color: #374151; font-size: 1rem;">
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">✓</span>
                                    Código fuente completo
                                </li>
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">✓</span>
                                    Documentación técnica
                                </li>
                                <li style="margin-bottom: 0.75rem; padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">✓</span>
                                    Manuales de usuario
                                </li>
                                <li style="padding-left: 1.5rem; position: relative;">
                                    <span style="position: absolute; left: 0;">✓</span>
                                    Capacitación del equipo
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); padding: 2rem; border-radius: 16px; border: 2px solid #f59e0b;">
                        <h4 style="color: #92400e; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">📞 Contacto y Siguientes Pasos</h4>
                        <p style="color: #78350f; font-size: 1rem; margin-bottom: 1rem;">Estamos listos para comenzar cuando ustedes lo estén.</p>
                        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                            <button class="nav-button" onclick="showSlide(0)" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 0.75rem 1.5rem; font-size: 0.9rem;">
                                📅 Agendar Reunión
                            </button>
                            <button class="nav-button" onclick="generatePDF()" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.75rem 1.5rem; font-size: 0.9rem;">
                                📄 Descargar Propuesta Completa
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Navegación -->
            <div class="navigation">
                <button class="nav-button nav-prev" onclick="prevSlide()">
                    <span>◀</span>
                    Anterior
                </button>

                <div class="nav-dots">
                    <div class="dot active" data-slide="0" onclick="showSlide(0)"></div>
                    <div class="dot" data-slide="1" onclick="showSlide(1)"></div>
                    <div class="dot" data-slide="2" onclick="showSlide(2)"></div>
                    <div class="dot" data-slide="3" onclick="showSlide(3)"></div>
                    <div class="dot" data-slide="4" onclick="showSlide(4)"></div>
                    <!-- <div class="dot" data-slide="5" onclick="showSlide(5)"></div>
                    <div class="dot" data-slide="6" onclick="showSlide(6)"></div> -->
                </div>

                <button class="nav-button nav-next" onclick="nextSlide()">
                    Siguiente
                    <span>▶</span>
                </button>
            </div>
        </div>

        <!-- CONTENIDO SOLO PARA PDF -->
        <!-- CONTENIDO SOLO PARA PDF -->
        <div id="pdfDocument" style="
        display: none;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
        color: #1f2937;
        line-height: 1.5;
        background: #ffffff;
        padding: 0;
        max-width: 210mm;
        margin: 0 auto;
    ">

            <!-- PORTADA -->
            <div style="
            height: 297mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 40px;
        ">
                <div
                    style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
                    <div style="font-size: 48px; margin-bottom: 20px;">📱</div>
                    <h1 style="font-size: 36px; font-weight: 800; margin-bottom: 15px; color: #1f2937;">
                        Gaia Mobile
                    </h1>
                    <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 10px; color: #4b5563;">
                        Propuesta de Proyecto
                    </h2>
                    <p style="font-size: 18px; color: #6b7280; margin-top: 20px;">
                        Aplicación Móvil de Renta Mensual
                    </p>

                    <div style="
                    margin-top: 40px;
                    padding-top: 20px;
                    border-top: 2px solid #e5e7eb;
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    max-width: 400px;
                ">
                        <div style="text-align: center;">
    <div style="font-size: 24px; font-weight: 700; color: #059669;">$600</div>
    <div style="font-size: 14px; color: #6b7280;">MXN/mes</div>
</div>

<div style="text-align: center;">
    <div style="font-size: 24px; font-weight: 700; color: #3b82f6;">30–50</div>
    <div style="font-size: 14px; color: #6b7280;">Usuarios</div>
</div>

<div style="text-align: center;">
    <div style="font-size: 24px; font-weight: 700; color: #8b5cf6;">$30K</div>
    <div style="font-size: 14px; color: #6b7280;">Máx. mensual</div>
</div>

                    </div>
                </div>

                <div style="margin-top: 40px; color: white; opacity: 0.8;">
                    <p style="font-size: 14px;">Documento confidencial | Propuesta comercial | Versión 1.0</p>
                </div>
            </div>

            <!-- PÁGINA 2 -->
            <div style="page-break-before: always; padding: 40px;">
                <!-- ENCABEZADO DE PÁGINA -->
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Propuesta Comercial</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 2
                    </div>
                </div>

                <!-- CONTENIDO PRINCIPAL -->
                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #10b981;
            ">
                    1. Resumen Ejecutivo
                </h1>

                <p style="font-size: 16px; line-height: 1.8; margin-bottom: 25px;">
                    <strong>Gaia Mobile</strong> es una solución móvil diseñada específicamente para potenciar
                    la eficiencia del equipo comercial, permitiendo operaciones en tiempo real desde
                    cualquier ubicación mediante una aplicación nativa para Android e iOS.
                </p>

                <div style="
                background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
                padding: 25px;
                border-radius: 12px;
                border-left: 5px solid #3b82f6;
                margin-bottom: 30px;
            ">
                    <!-- <h3 style="font-size: 18px; font-weight: 700; color: #1e40af; margin-bottom: 15px;">
                        💡 Oportunidad de Negocio
                    </h3>
                    <p style="color: #374151;">
                        La migración hacia soluciones móviles representa una oportunidad de
                        <strong>$40,000 - $50,000 MXN mensuales</strong> en ingresos recurrentes,
                        con un potencial de crecimiento del 25% anual.
                    </p> -->
                </div>

                <h2 style="
                font-size: 24px;
                font-weight: 700;
                color: #1f2937;
                margin: 40px 0 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    Objetivos Clave
                </h2>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 40px;">
                    <div style="
                    background: #f9fafb;
                    padding: 20px;
                    border-radius: 10px;
                    border: 2px solid #e5e7eb;
                ">
                        <div style="font-size: 24px; margin-bottom: 10px;">📈</div>
                        <h4 style="font-weight: 600; color: #1f2937; margin-bottom: 10px;">
                            Incremento de Productividad
                        </h4>
                        <p style="font-size: 14px; color: #6b7280;">
                            Reducción del 40% en tiempos de cierre de ventas en campo.
                        </p>
                    </div>

                    <div style="
                    background: #f9fafb;
                    padding: 20px;
                    border-radius: 10px;
                    border: 2px solid #e5e7eb;
                ">
                        <div style="font-size: 24px; margin-bottom: 10px;">💰</div>
                        <h4 style="font-weight: 600; color: #1f2937; margin-bottom: 10px;">
                            Ingresos Recurrentes
                        </h4>
                        <p style="font-size: 14px; color: #6b7280;">
                            Modelo SaaS con renta mensual por usuario.
                        </p>
                    </div>
                </div>
            </div>

            <!-- PÁGINA 3 -->
            <div style="page-break-before: always; padding: 40px;">
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Análisis del Problema</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 3
                    </div>
                </div>

                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #ef4444;
            ">
                    2. Problemática Actual
                </h1>

                <div style="margin-bottom: 30px;">
                    <h3 style="
                    font-size: 20px;
                    font-weight: 600;
                    color: #dc2626;
                    margin-bottom: 20px;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                ">
                        <span>❌</span> Limitaciones de la Plataforma Actual
                    </h3>

                    <div style="margin-bottom: 25px;">
                        <div style="
                        background: #fef2f2;
                        padding: 20px;
                        border-radius: 10px;
                        border-left: 4px solid #ef4444;
                        margin-bottom: 15px;
                    ">
                            <h4 style="font-weight: 600; color: #991b1b; margin-bottom: 10px;">
                                Problema 1: Mala Experiencia Móvil
                            </h4>
                            <p style="color: #6b7280;">
                                La plataforma web no está optimizada para dispositivos móviles,
                                generando frustración en los asesores que trabajan en campo.
                            </p>
                        </div>

                        <div style="
                        background: #fef2f2;
                        padding: 20px;
                        border-radius: 10px;
                        border-left: 4px solid #ef4444;
                        margin-bottom: 15px;
                    ">
                            <h4 style="font-weight: 600; color: #991b1b; margin-bottom: 10px;">
                                Problema 2: Dependencia de Equipos de Escritorio
                            </h4>
                            <p style="color: #6b7280;">
                                Los procesos comerciales están limitados a computadoras,
                                reduciendo la movilidad y flexibilidad del equipo.
                            </p>
                        </div>

                        <div style="
                        background: #fef2f2;
                        padding: 20px;
                        border-radius: 10px;
                        border-left: 4px solid #ef4444;
                    ">
                            <h4 style="font-weight: 600; color: #991b1b; margin-bottom: 10px;">
                                Problema 3: Procesos Manuales Ineficientes
                            </h4>
                            <p style="color: #6b7280;">
                                Captura de datos en papel, sincronización manual y
                                falta de integración en tiempo real.
                            </p>
                        </div>
                    </div>
                </div>

                <div style="
                background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
                padding: 25px;
                border-radius: 12px;
                border: 2px solid #f59e0b;
                margin-top: 30px;
            ">
                    <h3 style="
                    font-size: 18px;
                    font-weight: 700;
                    color: #92400e;
                    margin-bottom: 15px;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                ">
                        <span>💡</span> Oportunidad Identificada
                    </h3>
                    <p style="color: #78350f; font-size: 16px;">
                        <strong>El 85% del equipo comercial</strong> manifiesta necesidad de una
                        solución móvil para optimizar sus procesos en campo y mejorar
                        los tiempos de respuesta con clientes.
                    </p>
                </div>
            </div>

            <!-- PÁGINA 4 -->
            <div style="page-break-before: always; padding: 40px;">
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Solución Propuesta</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 4
                    </div>
                </div>

                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #10b981;
            ">
                    3. Solución: Gaia Mobile
                </h1>

                <div style="margin-bottom: 40px;">
                    <h2 style="font-size: 24px; font-weight: 700; color: #1f2937; margin-bottom: 25px;">
                        🚀 Características Principales
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
                        <div style="
                        background: #f8fafc;
                        padding: 20px;
                        border-radius: 10px;
                        border: 2px solid #e2e8f0;
                    ">
                            <h3 style="font-weight: 600; color: #1e40af; margin-bottom: 10px;">📋 Captura Inteligente
                            </h3>
                            <ul style="color: #4b5563; font-size: 14px; padding-left: 20px;">
                                <li>Validación en tiempo real</li>
                                <li>Sincronización automática</li>
                            </ul>
                        </div>

                        <div style="
                        background: #f8fafc;
                        padding: 20px;
                        border-radius: 10px;
                        border: 2px solid #e2e8f0;
                    ">
                            <h3 style="font-weight: 600; color: #065f46; margin-bottom: 10px;">💰 Cotizaciones Rápidas
                            </h3>
                            <ul style="color: #4b5563; font-size: 14px; padding-left: 20px;">
                                <li>Creación en segundos</li>
                                <li>Envío inmediato</li>
                                <li>Seguimiento automático</li>
                            </ul>
                        </div>

                        <div style="
                        background: #f8fafc;
                        padding: 20px;
                        border-radius: 10px;
                        border: 2px solid #e2e8f0;
                    ">
                            <h3 style="font-weight: 600; color: #6b21a8; margin-bottom: 10px;">📊 Dashboard Móvil</h3>
                            <ul style="color: #4b5563; font-size: 14px; padding-left: 20px;">
                                <li>Métricas en tiempo real</li>
                                <li>Reportes visuales</li>
                                <li>KPIs personalizados</li>
                            </ul>
                        </div>

                        <div style="
                        background: #f8fafc;
                        padding: 20px;
                        border-radius: 10px;
                        border: 2px solid #e2e8f0;
                    ">
                            <h3 style="font-weight: 600; color: #9a3412; margin-bottom: 10px;">🔄 Integración Total</h3>
                            <ul style="color: #4b5563; font-size: 14px; padding-left: 20px;">
                                <li>Con Gaia Web existente</li>
                                <li>APIs empresariales</li>
                                <li>Base de datos unificada</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="
                background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
                padding: 25px;
                border-radius: 12px;
                border: 2px solid #10b981;
            ">
                    <h3 style="font-size: 18px; font-weight: 700; color: #065f46; margin-bottom: 15px;">
                        ✅ Beneficios Clave
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div>
                            <div style="font-weight: 600; color: #065f46;">⏱️ +40% Eficiencia</div>
                            <div style="font-size: 14px; color: #047857;">Reducción en tiempos de proceso</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #065f46;">💵 +25% Ventas</div>
                            <div style="font-size: 14px; color: #047857;">Incremento en cierre de operaciones</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #065f46;">📱 100% Móvil</div>
                            <div style="font-size: 14px; color: #047857;">Operación desde cualquier lugar</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #065f46;">🔄 Integración Perfecta</div>
                            <div style="font-size: 14px; color: #047857;">Con sistemas existentes</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PÁGINA 5 -->
            <div style="page-break-before: always; padding: 40px;">
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Modelo de Negocio</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 5
                    </div>
                </div>

                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #3b82f6;
            ">
                    4. Modelo de Negocio SaaS
                </h1>

                <div style="text-align: center; margin-bottom: 40px;">
                    <div style="
                    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                    color: white;
                    padding: 40px;
                    border-radius: 16px;
                    margin-bottom: 30px;
                    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
                ">
                        <div style="font-size: 14px; opacity: 0.9; margin-bottom: 10px;">
                            PRECIO POR USUARIO / MES
                        </div>

                        <div style="font-size: 48px; font-weight: 800; margin-bottom: 10px;">
                            $600 MXN
                        </div>

                        <div style="font-size: 18px; opacity: 0.9;">
                            + IVA
                        </div>

                    </div>
                </div>

                <h2 style="font-size: 24px; font-weight: 700; color: #1f2937; margin-bottom: 25px;">
                    📊 Proyección Financiera
                </h2>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 40px;">

                    <!-- Escenario Conservador -->
                    <div style="
                        background: #f9fafb;
                        padding: 25px;
                        border-radius: 12px;
                        border: 2px solid #d1d5db;
                    ">
                        <h3 style="font-weight: 700; color: #059669; margin-bottom: 20px; font-size: 18px;">
                            📈 Escenario Conservador
                        </h3>

                        <div style="margin-bottom: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: #6b7280;">30 usuarios activos:</span>
                                <span style="font-weight: 700; color: #059669;">$18,000 / mes</span>
                            </div>

                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: #6b7280;">Ingreso anual:</span>
                                <span style="font-weight: 700; color: #059669;">$216,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Escenario Optimista -->
                    <div style="
                        background: #f9fafb;
                        padding: 25px;
                        border-radius: 12px;
                        border: 2px solid #d1d5db;
                    ">
                        <h3 style="font-weight: 700; color: #3b82f6; margin-bottom: 20px; font-size: 18px;">
                            🚀 Escenario Optimista
                        </h3>

                        <div style="margin-bottom: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: #6b7280;">50 usuarios activos:</span>
                                <span style="font-weight: 700; color: #3b82f6;">$30,000 / mes</span>
                            </div>

                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: #6b7280;">Ingreso anual:</span>
                                <span style="font-weight: 700; color: #3b82f6;">$360,000</span>
                            </div>
                        </div>
                    </div>

                </div>


                <div style="
                background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
                padding: 25px;
                border-radius: 12px;
                border-left: 5px solid #6b7280;
            ">
                    <h3 style="font-weight: 700; color: #374151; margin-bottom: 15px; font-size: 18px;">
                        📋 Incluido en la Suscripción
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; font-size: 14px;">
                        <div>✅ Actualizaciones continuas</div>
                        <div>✅ Soporte técnico 24/7</div>
                        <div>✅ Almacenamiento en la nube</div>
                        <div>✅ Capacitación del equipo</div>
                        <div>✅ Nuevas funcionalidades</div>
                        <div>✅ Mantenimiento preventivo</div>
                    </div>
                </div>
            </div>

            <!-- PÁGINA 6 -->
            <div style="page-break-before: always; padding: 40px;">
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Implementación</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 6
                    </div>
                </div>

                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #8b5cf6;
            ">
                    5. Fases de Implementación
                </h1>

                <div style="position: relative; padding-left: 40px; margin-bottom: 40px;">
                    <!-- Línea vertical -->
                    <div style="
                    position: absolute;
                    left: 20px;
                    top: 0;
                    bottom: 0;
                    width: 4px;
                    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
                    border-radius: 2px;
                "></div>

                    <!-- Fase 1 -->
                    <div style="position: relative; margin-bottom: 40px;">
                        <div style="
                        position: absolute;
                        left: -32px;
                        top: 0;
                        width: 40px;
                        height: 40px;
                        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-weight: 700;
                        font-size: 18px;
                    ">1</div>

                        <div style="
                        background: #eff6ff;
                        padding: 25px;
                        border-radius: 12px;
                        border-left: 4px solid #3b82f6;
                    ">
                            <h3 style="font-weight: 700; color: #1e40af; margin-bottom: 10px; font-size: 18px;">
                                Fase 1: MVP
                            </h3>
                            <p style="font-size: 14px; font-weight: 600; color: #1e3a8a; margin-bottom: 10px;">
                                ⏱️ Duración estimada: 6–8 semanas
                            </p>
                            <p style="color: #4b5563; margin-bottom: 15px;">
                                Desarrollo de funcionalidades básicas: captura de datos,
                                cotizaciones y sincronización con Gaia Web.
                            </p>
                            <div style="
                            background: #dbeafe;
                            padding: 10px 15px;
                            border-radius: 6px;
                            font-size: 14px;
                            color: #1e40af;
                            display: inline-block;
                        ">
                                🎯 Entregable: Aplicación funcional para pruebas internas
                            </div>
                        </div>
                    </div>

                    <!-- Fase 2 -->
                    <div style="position: relative; margin-bottom: 40px;">
                        <div style="
                        position: absolute;
                        left: -32px;
                        top: 0;
                        width: 40px;
                        height: 40px;
                        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-weight: 700;
                        font-size: 18px;
                    ">2</div>

                        <div style="
                        background: #ecfdf5;
                        padding: 25px;
                        border-radius: 12px;
                        border-left: 4px solid #10b981;
                    ">
                            <h3 style="font-weight: 700; color: #065f46; margin-bottom: 10px; font-size: 18px;">
                                Fase 2: Pruebas Piloto
                            </h3>
                            <p style="font-size: 14px; font-weight: 600; color: #065f46; margin-bottom: 10px;">
                                ⏱️ Duración estimada: 4 semanas
                            </p>
                            <p style="color: #4b5563; margin-bottom: 15px;">
                                Implementación con 5-10 usuarios clave, recolección de
                                feedback y ajustes basados en experiencia real.
                            </p>
                            <div style="
                            background: #d1fae5;
                            padding: 10px 15px;
                            border-radius: 6px;
                            font-size: 14px;
                            color: #065f46;
                            display: inline-block;
                        ">
                                🎯 Entregable: Versión estable para despliegue controlado
                            </div>
                        </div>
                    </div>

                    <!-- Fase 3 -->
                    <div style="position: relative; margin-bottom: 40px;">
                        <div style="
                        position: absolute;
                        left: -32px;
                        top: 0;
                        width: 40px;
                        height: 40px;
                        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-weight: 700;
                        font-size: 18px;
                    ">3</div>

                        <div style="
                        background: #f5f3ff;
                        padding: 25px;
                        border-radius: 12px;
                        border-left: 4px solid #8b5cf6;
                    ">
                            <h3 style="font-weight: 700; color: #6b21a8; margin-bottom: 10px; font-size: 18px;">
                                Fase 3: Lanzamiento Oficial
                            </h3>
                            <p style="font-size: 14px; font-weight: 600; color: #6b21a8; margin-bottom: 10px;">
                                ⏱️ Duración estimada: 2–3 semanas
                            </p>
                            <p style="color: #4b5563; margin-bottom: 15px;">
                                Despliegue completo al equipo comercial, capacitación
                                y establecimiento de soporte continuo.
                            </p>
                            <div style="
                            background: #ede9fe;
                            padding: 10px 15px;
                            border-radius: 6px;
                            font-size: 14px;
                            color: #6b21a8;
                            display: inline-block;
                        ">
                                🎯 Entregable: Gaia Mobile en producción
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PÁGINA 7 - CONCLUSIÓN -->
            <div style="page-break-before: always; padding: 40px;">
                <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
                padding-bottom: 20px;
                border-bottom: 2px solid #e5e7eb;
            ">
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: #667eea;">Gaia Mobile</span>
                        <span style="color: #9ca3af; margin-left: 10px;">| Conclusión</span>
                    </div>
                    <div style="font-size: 14px; color: #6b7280;">
                        Página 7
                    </div>
                </div>

                <h1 style="
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 30px;
                padding-bottom: 15px;
                border-bottom: 3px solid #f59e0b;
            ">
                    6. Conclusión y Próximos Pasos
                </h1>

                <div style="margin-bottom: 40px;">
                    <p style="font-size: 16px; line-height: 1.8; margin-bottom: 25px;">
                        <strong>Gaia Mobile</strong> representa una inversión estratégica que no solo
                        generará <strong>ingresos recurrentes sustanciales</strong>, sino que también
                        transformará la eficiencia operativa del equipo comercial.
                    </p>

                    <div style="
                    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
                    padding: 25px;
                    border-radius: 12px;
                    border: 2px solid #f59e0b;
                    margin-bottom: 30px;
                ">
                        <h3 style="font-weight: 700; color: #92400e; margin-bottom: 15px; font-size: 18px;">
                            📊 Retorno de Inversión (ROI)
                        </h3>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                            <div>
                                <div style="font-weight: 600; color: #92400e; font-size: 20px;">+40%</div>
                                <div style="color: #78350f; font-size: 14px;">Eficiencia operativa</div>
                            </div>
                            <div>
                                <div style="font-weight: 600; color: #92400e; font-size: 20px;">6 meses</div>
                                <div style="color: #78350f; font-size: 14px;">Recuperación de inversión</div>
                            </div>
                            <div>
                                <div style="font-weight: 600; color: #92400e; font-size: 20px;">+25%</div>
                                <div style="color: #78350f; font-size: 14px;">Cierre de ventas</div>
                            </div>
                            <div>
                                <div style="font-weight: 600; color: #92400e; font-size: 20px;">$540K/año</div>
                                <div style="color: #78350f; font-size: 14px;">Potencial máximo</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 40px;
                border-radius: 16px;
                text-align: center;
            ">
                    <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">
                        🚀 Próximos Pasos
                    </h2>

                    <div style="
                    background: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(10px);
                    padding: 30px;
                    border-radius: 12px;
                    margin-bottom: 20px;
                ">
                        <div style="
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        gap: 20px;
                        margin-bottom: 30px;
                    ">
                            <div>
                                <div style="font-size: 32px; margin-bottom: 10px;">1</div>
                                <div style="font-weight: 600; font-size: 16px;">Revisión de Propuesta</div>
                            </div>
                            <div>
                                <div style="font-size: 32px; margin-bottom: 10px;">2</div>
                                <div style="font-weight: 600; font-size: 16px;">Sesión de Aclaraciones</div>
                            </div>
                            <div>
                                <div style="font-size: 32px; margin-bottom: 10px;">3</div>
                                <div style="font-weight: 600; font-size: 16px;">Firma de Acuerdo</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    </div>

    <script>
        let currentSlide = 0;
        const totalSlides = 5;

        function showSlide(index) {
            // Validar índice
            if (index < 0) index = 0;
            if (index >= totalSlides) index = totalSlides - 1;

            // Ocultar todas las slides
            document.querySelectorAll('.slide').forEach(slide => {
                slide.classList.remove('active');
            });

            // Mostrar slide actual
            document.querySelector(`.slide[data-slide="${index}"]`).classList.add('active');

            // Actualizar puntos de navegación
            document.querySelectorAll('.dot').forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            // Actualizar estado de botones
            updateNavButtons(index);
            currentSlide = index;
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function updateNavButtons(index) {
            const prevBtn = document.querySelector('.nav-prev');
            const nextBtn = document.querySelector('.nav-next');

            // Actualizar estado de botón anterior
            if (index === 0) {
                prevBtn.style.opacity = '0.5';
                prevBtn.style.cursor = 'not-allowed';
                prevBtn.disabled = true;
            } else {
                prevBtn.style.opacity = '1';
                prevBtn.style.cursor = 'pointer';
                prevBtn.disabled = false;
            }

            // Actualizar estado de botón siguiente
            if (index === totalSlides - 1) {
                nextBtn.style.opacity = '0.5';
                nextBtn.style.cursor = 'not-allowed';
                nextBtn.disabled = true;
            } else {
                nextBtn.style.opacity = '1';
                nextBtn.style.cursor = 'pointer';
                nextBtn.disabled = false;
            }
        }


        async function generatePDF() {
            const loading = document.getElementById('loading');
            const element = document.getElementById('pdfDocument');

            loading.classList.add('active');
            element.style.display = 'block';

            const opt = {
                margin: 15,
                filename: 'Propuesta_Gaia_Mobile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.95
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },
                pagebreak: {
                    mode: ['css', 'legacy']
                }
            };

            try {
                await html2pdf().set(opt).from(element).save();
            } catch (e) {
                alert('Error al generar el PDF');
                console.error(e);
            }

            element.style.display = 'none';
            loading.classList.remove('active');
        }



        // Inicializar
        document.addEventListener('DOMContentLoaded', () => {
            showSlide(0);

            // Configurar navegación con teclado
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') prevSlide();
                if (e.key === 'ArrowRight') nextSlide();
            });
        });

        // Configurar puntos de navegación al hacer clic
        document.querySelectorAll('.dot').forEach(dot => {
            dot.addEventListener('click', function () {
                const slideIndex = parseInt(this.getAttribute('data-slide'));
                showSlide(slideIndex);
            });
        });
    </script>
</body>

</html>