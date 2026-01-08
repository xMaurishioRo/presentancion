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
                    <p style="text-align: center; font-size: 1.25rem; color: #4b5563; margin-bottom: 2rem; font-weight: 500;">
                        Solución móvil para agilizar procesos de ventas y recopilación de datos en campo
                    </p>
                    <div class="grid-3">
                        <div class="card card-blue">
                            <div style="font-size: 3.5rem;">💵</div>
                            <h3 class="text-blue">$1,000</h3>
                            <p style="font-size: 1rem; color: #6b7280; font-weight: 500;">MXN/mes</p>
                        </div>
                        <div class="card card-green">
                            <div style="font-size: 3.5rem;">👥</div>
                            <h3 class="text-green">40-50</h3>
                            <p style="font-size: 1rem; color: #6b7280; font-weight: 500;">Clientes potenciales</p>
                        </div>
                        <div class="card card-purple">
                            <div style="font-size: 3.5rem;">📈</div>
                            <h3 class="text-purple">$40-50K</h3>
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
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Algunos módulos no funcionan correctamente en dispositivos móviles</p>
                    </div>
                    <div class="card card-red" style="margin-bottom: 1rem; text-align: left;">
                        <p style="font-weight: 600; color: #dc2626; font-size: 1.1rem;">❌ Procesos lentos en campo</p>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Asesores no pueden cerrar ventas rápidamente desde ubicaciones externas</p>
                    </div>
                    <div class="card card-red" style="margin-bottom: 1rem; text-align: left;">
                        <p style="font-weight: 600; color: #dc2626; font-size: 1.1rem;">❌ Dependencia de computadoras</p>
                        <p style="color: #6b7280; font-size: 1rem; margin-top: 0.75rem;">Limitación para trabajar en movimiento o con clientes en sitio</p>
                    </div>
                    <div class="card" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 5px solid #f59e0b; margin-top: 2rem; text-align: left;">
                        <p style="font-weight: 600; color: #92400e; font-size: 1.1rem;">💡 Oportunidad</p>
                        <p style="color: #78350f; font-size: 1rem; margin-top: 0.75rem;">Los clientes demandan una solución móvil nativa y optimizada</p>
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
                        <div class="feature-card" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border: 2px solid #3b82f6;">
                            <h4 style="color: #1e40af;">📋 Recopilación de Datos</h4>
                            <ul>
                                <li>Captura de información de clientes</li>
                                <li>Formularios offline</li>
                                <li>Sincronización automática</li>
                            </ul>
                        </div>
                        <div class="feature-card" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border: 2px solid #10b981;">
                            <h4 style="color: #065f46;">💰 Cotizaciones y Ventas</h4>
                            <ul>
                                <li>Cotizaciones en tiempo real</li>
                                <li>Cierre de ventas in-situ</li>
                                <li>Catálogo de productos</li>
                            </ul>
                        </div>
                        <div class="feature-card" style="background: linear-gradient(135deg, #e9d5ff 0%, #d8b4fe 100%); border: 2px solid #8b5cf6;">
                            <h4 style="color: #6b21a8;">📊 Dashboard Móvil</h4>
                            <ul>
                                <li>Métricas de ventas</li>
                                <li>Reportes visuales</li>
                                <li>KPIs en tiempo real</li>
                            </ul>
                        </div>
                        <div class="feature-card" style="background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%); border: 2px solid #f97316;">
                            <h4 style="color: #9a3412;">🔄 Sincronización</h4>
                            <ul>
                                <li>Integración con Gaia Web</li>
                                <li>Trabajo offline/online</li>
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
                    <p>Sistema de renta mensual</p>
                </div>
                <div class="slide-content">
                    <div class="gradient-main">
                        <h3 style="font-size: 2.5rem; margin-bottom: 0.5rem; font-weight: 700;">$1,000 MXN/mes</h3>
                        <p style="font-size: 1.2rem;">Por usuario/asesor de ventas</p>
                    </div>
                    <div class="grid-2" style="margin-bottom: 1.5rem;">
                        <div class="projection-card">
                            <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem; color: #1f2937;">📊 Proyección Conservadora</h4>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">30 clientes activos:</span>
                                <span style="font-weight: 700; color: #16a34a; font-size: 1.1rem;">$30,000</span>
                            </div>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">Anual:</span>
                                <span style="font-weight: 700; color: #16a34a; font-size: 1.1rem;">$360,000</span>
                            </div>
                        </div>
                        <div class="projection-card">
                            <h4 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem; color: #1f2937;">🚀 Proyección Optimista</h4>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">45 clientes activos:</span>
                                <span style="font-weight: 700; color: #2563eb; font-size: 1.1rem;">$45,000</span>
                            </div>
                            <div class="projection-row">
                                <span style="color: #6b7280; font-weight: 500;">Anual:</span>
                                <span style="font-weight: 700; color: #2563eb; font-size: 1.1rem;">$540,000</span>
                            </div>
                        </div>
                    </div>
                    <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); padding: 2rem; border-radius: 16px; border: 2px solid #3b82f6;">
                        <h4 style="color: #1e40af; font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">✨ Incluye:</h4>
                        <ul style="list-style: none; padding: 0; color: #1f2937; font-size: 1rem;">
                            <li style="margin-bottom: 0.5rem;">✓ Actualizaciones continuas</li>
                            <li style="margin-bottom: 0.5rem;">✓ Soporte técnico</li>
                            <li style="margin-bottom: 0.5rem;">✓ Almacenamiento en la nube</li>
                            <li>✓ Nuevas funcionalidades</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Slide 5 -->
            <div class="slide" data-slide="4">
                <div class="slide-header">
                    <div class="slide-icon">🚀</div>
                    <h2>Roadmap de Implementación</h2>
                    <p>Fases del proyecto</p>
                </div>
                <div class="slide-content">
                    <div class="roadmap">
                        <div class="roadmap-item">
                            <div class="roadmap-number bg-blue">1</div>
                            <div style="flex: 1; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #3b82f6;">
                                <h4 style="font-weight: 700; color: #1e40af; margin-bottom: 0.75rem; font-size: 1.2rem;">Fase 1: MVP (2-3 meses)</h4>
                                <p style="color: #374151; font-size: 1rem;">Funcionalidades básicas: cotizaciones, captura de datos, sincronización</p>
                            </div>
                        </div>
                        <div class="roadmap-item">
                            <div class="roadmap-number bg-green">2</div>
                            <div style="flex: 1; background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #10b981;">
                                <h4 style="font-weight: 700; color: #065f46; margin-bottom: 0.75rem; font-size: 1.2rem;">Fase 2: Pruebas Piloto (1 mes)</h4>
                                <p style="color: #374151; font-size: 1rem;">Beta testing con 5-10 clientes, optimización basada en feedback</p>
                            </div>
                        </div>
                        <div class="roadmap-item">
                            <div class="roadmap-number bg-purple">3</div>
                            <div style="flex: 1; background: linear-gradient(135deg, #e9d5ff 0%, #d8b4fe 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #8b5cf6;">
                                <h4 style="font-weight: 700; color: #6b21a8; margin-bottom: 0.75rem; font-size: 1.2rem;">Fase 3: Lanzamiento Oficial (1 mes)</h4>
                                <p style="color: #374151; font-size: 1rem;">Implementación completa, onboarding de clientes, soporte continuo</p>
                            </div>
                        </div>
                        <div class="roadmap-item">
                            <div class="roadmap-number bg-orange">4</div>
                            <div style="flex: 1; background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%); padding: 1.5rem 2rem; border-radius: 16px; border: 2px solid #f97316;">
                                <h4 style="font-weight: 700; color: #9a3412; margin-bottom: 0.75rem; font-size: 1.2rem;">Fase 4: Mejoras Continuas</h4>
                                <p style="color: #374151; font-size: 1rem;">Nuevas funcionalidades, optimizaciones, escalabilidad</p>
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
    display:none;
    font-family: Arial, Helvetica, sans-serif;
    color:#1f2937;
    line-height:1.6;
">

            <!-- PORTADA -->
            <div style="text-align:center; margin-bottom:40px;">
                <h1 style="font-size:32px; margin-bottom:10px;">
                    Propuesta de Proyecto
                </h1>
                <h2 style="font-size:22px; font-weight:normal; margin-bottom:20px;">
                    Gaia Mobile<br>
                    Aplicación de Renta Mensual
                </h2>

                <p style="margin-top:30px; font-size:14px; color:#6b7280;">
                    Documento de propuesta técnica y comercial
                </p>
            </div>

            <hr style="margin:30px 0;">

            <!-- 1 -->
            <h3 style="font-size:20px; color:#111827;">1. Descripción General</h3>
            <p>
                <strong>Gaia Mobile</strong> es una aplicación móvil diseñada para optimizar
                los procesos de ventas y la recopilación de información en campo, permitiendo
                a los asesores comerciales operar de manera ágil, segura y eficiente desde
                cualquier ubicación.
            </p>

            <p>
                La aplicación se integrará con el sistema actual de Gaia, ampliando su alcance
                y mejorando la experiencia de uso en dispositivos móviles.
            </p>

            <!-- 2 -->
            <h3 style="font-size:20px; margin-top:25px; color:#111827;">
                2. Problemática Actual
            </h3>
            <ul>
                <li>
                    La plataforma web actual no está completamente optimizada para el uso
                    intensivo en dispositivos móviles.
                </li>
                <li>
                    Los asesores de ventas enfrentan dificultades para cerrar operaciones
                    de manera rápida cuando se encuentran en campo.
                </li>
                <li>
                    Existe una dependencia de computadoras para procesos clave, lo que limita
                    la movilidad y eficiencia del equipo comercial.
                </li>
            </ul>

            <!-- 3 -->
            <h3 style="font-size:20px; margin-top:25px; color:#111827;">
                3. Solución Propuesta: Gaia Mobile
            </h3>
            <ul>
                <li>Aplicación móvil nativa (Android / iOS).</li>
                <li>Captura de datos de clientes con funcionamiento offline.</li>
                <li>Sincronización automática con el sistema Gaia Web.</li>
                <li>Generación de cotizaciones en tiempo real.</li>
                <li>Cierre de ventas directamente desde el dispositivo móvil.</li>
                <li>Dashboard con métricas y reportes de ventas.</li>
            </ul>

            <!-- SALTO DE PÁGINA -->
            <div style="page-break-before: always;"></div>

            <!-- 4 -->
            <h3 style="font-size:20px; color:#111827;">
                4. Modelo de Negocio
            </h3>
            <p>
                El modelo de monetización propuesto para Gaia Mobile es un esquema de
                <strong>renta mensual por usuario</strong>.
            </p>

            <p style="font-size:18px; font-weight:bold; margin:15px 0;">
                Costo: $1,000 MXN por usuario / mes
            </p>

            <p>Proyección de ingresos:</p>
            <ul>
                <li>30 usuarios activos: <strong>$30,000 MXN mensuales</strong></li>
                <li>45 usuarios activos: <strong>$45,000 MXN mensuales</strong></li>
            </ul>

            <p>
                Este modelo incluye actualizaciones continuas, soporte técnico
                y mejoras funcionales sin costo adicional.
            </p>

            <!-- 5 -->
            <h3 style="font-size:20px; margin-top:25px; color:#111827;">
                5. Roadmap de Implementación
            </h3>
            <ol>
                <li>
                    <strong>Fase 1 – MVP (2 a 3 meses):</strong><br>
                    Desarrollo de funcionalidades principales: captura de datos,
                    cotizaciones y sincronización.
                </li>
                <li>
                    <strong>Fase 2 – Pruebas Piloto (1 mes):</strong><br>
                    Implementación con un grupo reducido de usuarios para validación.
                </li>
                <li>
                    <strong>Fase 3 – Lanzamiento Oficial (1 mes):</strong><br>
                    Despliegue completo para el equipo comercial.
                </li>
                <li>
                    <strong>Fase 4 – Mejora Continua:</strong><br>
                    Optimización, nuevas funciones y escalabilidad.
                </li>
            </ol>

            <!-- 6 -->
            <h3 style="font-size:20px; margin-top:25px; color:#111827;">
                6. Conclusión
            </h3>
            <p>
                Gaia Mobile representa una oportunidad estratégica para generar
                ingresos recurrentes, mejorar la eficiencia del equipo comercial
                y fortalecer el ecosistema tecnológico de Gaia.
            </p>

            <p>
                La implementación de esta solución permitirá a la empresa adaptarse
                a las necesidades actuales del mercado y ofrecer una experiencia
                moderna y competitiva a sus clientes.
            </p>

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
            dot.addEventListener('click', function() {
                const slideIndex = parseInt(this.getAttribute('data-slide'));
                showSlide(slideIndex);
            });
        });
    </script>
</body>

</html>