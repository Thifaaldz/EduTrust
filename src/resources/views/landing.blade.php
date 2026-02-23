<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akadify - Sistem Verifikasi Ijazah Digital</title>
    <link rel="stylesheet" href="{{ asset('front/assets/css/akadify.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0a0e17 0%, #111827 50%, #0f172a 100%);
            min-height: 100vh;
            color: #e2e8f0;
        }
        
        .landing-container {
            max-width: 480px;
            margin: 0 auto;
            padding: 24px 20px 40px;
        }
        
        /* Logo & Hero */
        .hero-section {
            text-align: center;
            margin-bottom: 32px;
            animation: fadeInUp 0.6s ease-out;
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
        
        .logo-wrapper {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #06b6d4 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4);
            animation: pulse 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4);
            }
            50% {
                box-shadow: 0 8px 48px rgba(139, 92, 246, 0.6);
            }
        }
        
        .logo-wrapper svg {
            width: 44px;
            height: 44px;
            fill: white;
        }
        
        .hero-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #fff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }
        
        .hero-subtitle {
            font-size: 15px;
            color: #94a3b8;
            font-weight: 500;
        }
        
        .hero-tagline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 12px;
            padding: 6px 14px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            font-size: 12px;
            color: #60a5fa;
        }
        
        /* Section Titles */
        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #f8fafc;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .section-title::before {
            content: "";
            width: 4px;
            height: 18px;
            background: linear-gradient(180deg, #3b82f6, #8b5cf6);
            border-radius: 2px;
        }
        
        /* Workflow Cards */
        .workflow-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.1s both;
        }
        
        .workflow-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        
        .workflow-card {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 18px 12px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .workflow-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .workflow-card:hover {
            transform: translateY(-4px);
            border-color: rgba(139, 92, 246, 0.3);
            box-shadow: 0 12px 40px rgba(139, 92, 246, 0.15);
        }
        
        .workflow-card:hover::before {
            opacity: 1;
        }
        
        .workflow-card .step-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 22px;
            height: 22px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            font-size: 11px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .workflow-card .icon {
            font-size: 32px;
            margin-bottom: 10px;
            display: block;
        }
        
        .workflow-card .title {
            font-weight: 700;
            font-size: 12px;
            color: #f1f5f9;
            margin-bottom: 4px;
        }
        
        .workflow-card .desc {
            font-size: 10px;
            color: #64748b;
            line-height: 1.4;
        }
        
        /* Process Flow */
        .process-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }
        
        .process-flow {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.6), rgba(15, 23, 42, 0.8));
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
        }
        
        .process-step {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 0;
            position: relative;
        }
        
        .process-step:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 19px;
            top: 52px;
            width: 2px;
            height: calc(100% - 38px);
            background: linear-gradient(180deg, #3b82f6 0%, rgba(59, 130, 246, 0.2) 100%);
        }
        
        .process-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }
        
        .process-content {
            flex: 1;
            padding-top: 3px;
        }
        
        .process-content .title {
            font-size: 14px;
            font-weight: 700;
            color: #f8fafc;
            margin-bottom: 4px;
        }
        
        .process-content .detail {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }
        
        /* Status Cards */
        .status-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.3s both;
        }
        
        .status-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }
        
        .status-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 12px;
            padding: 14px 8px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }
        
        .status-card:hover {
            transform: scale(1.05);
        }
        
        .status-card.pending {
            background: linear-gradient(145deg, rgba(251, 191, 36, 0.15), rgba(251, 191, 36, 0.05));
            border-color: rgba(251, 191, 36, 0.2);
        }
        
        .status-card.processing {
            background: linear-gradient(145deg, rgba(59, 130, 246, 0.15), rgba(59, 130, 246, 0.05));
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .status-card.verified {
            background: linear-gradient(145deg, rgba(6, 182, 212, 0.15), rgba(6, 182, 212, 0.05));
            border-color: rgba(6, 182, 212, 0.2);
        }
        
        .status-card.rejected {
            background: linear-gradient(145deg, rgba(239, 68, 68, 0.15), rgba(239, 68, 68, 0.05));
            border-color: rgba(239, 68, 68, 0.2);
        }
        
        .status-card .label {
            font-size: 9px;
            color: #64748b;
            margin-bottom: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-card .value {
            font-size: 18px;
            font-weight: 800;
        }
        
        .status-card.pending .value { color: #fbbf24; }
        .status-card.processing .value { color: #60a5fa; }
        .status-card.verified .value { color: #22d3ee; }
        .status-card.rejected .value { color: #f87171; }
        
        /* Tech Stack */
        .tech-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.4s both;
        }
        
        .tech-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .tech-badge {
            padding: 8px 16px;
            border-radius: 24px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all 0.3s;
        }
        
        .tech-badge:hover {
            transform: scale(1.05);
        }
        
        .tech-badge.blue {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(59, 130, 246, 0.1));
            border-color: rgba(59, 130, 246, 0.3);
            color: #60a5fa;
        }
        
        .tech-badge.purple {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(139, 92, 246, 0.1));
            border-color: rgba(139, 92, 246, 0.3);
            color: #a78bfa;
        }
        
        .tech-badge.cyan {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2), rgba(6, 182, 212, 0.1));
            border-color: rgba(6, 182, 212, 0.3);
            color: #22d3ee;
        }
        
        .tech-badge.orange {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.2), rgba(249, 115, 22, 0.1));
            border-color: rgba(249, 115, 22, 0.3);
            color: #fb923c;
        }
        
        .tech-badge.green {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.1));
            border-color: rgba(34, 197, 94, 0.3);
            color: #4ade80;
        }
        
        /* Features */
        .features-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.5s both;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            background: rgba(30, 41, 59, 0.4);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: all 0.3s;
        }
        
        .feature-item:hover {
            background: rgba(30, 41, 59, 0.7);
            border-color: rgba(139, 92, 246, 0.2);
        }
        
        .feature-item .icon-check {
            width: 22px;
            height: 22px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: white;
            flex-shrink: 0;
        }
        
        .feature-item .text {
            font-size: 12px;
            color: #cbd5e1;
            font-weight: 500;
        }
        
        /* CTA Button */
        .cta-section {
            animation: fadeInUp 0.6s ease-out 0.6s both;
        }
        
        .cta-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 18px 24px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .cta-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(139, 92, 246, 0.5);
        }
        
        .cta-button:hover::before {
            left: 100%;
        }
        
        .cta-button svg {
            width: 20px;
            height: 20px;
        }
        
        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.35s both;
        }
        
        .stat-card {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.6), rgba(15, 23, 42, 0.8));
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 16px 10px;
            text-align: center;
        }
        
        .stat-card .number {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-card .label {
            font-size: 10px;
            color: #64748b;
            margin-top: 4px;
            font-weight: 600;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            animation: fadeInUp 0.6s ease-out 0.7s both;
        }
        
        .footer-text {
            font-size: 11px;
            color: #475569;
        }
        
        .footer-version {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 6px;
            padding: 4px 10px;
            background: rgba(139, 92, 246, 0.1);
            border-radius: 12px;
            font-size: 10px;
            color: #8b5cf6;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        {{-- HERO SECTION --}}
        <div class="hero-section">
            <div class="logo-wrapper">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h1 class="hero-title">Akadify</h1>
            <p class="hero-subtitle">Sistem Verifikasi Ijazah Digital Otomatis</p>
            <div class="hero-tagline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                </svg>
                Verifikasi Instan & Akurat
            </div>
        </div>

        {{-- STATS SECTION --}}
        <div class="stats-section">
            <div class="stat-card">
                <div class="number">99%</div>
                <div class="label">Akurasi OCR</div>
            </div>
            <div class="stat-card">
                <div class="number"><5s</div>
                <div class="label">Proses Cepat</div>
            </div>
            <div class="stat-card">
                <div class="number">24/7</div>
                <div class="label">Auto Sync</div>
            </div>
        </div>

        {{-- WORKFLOW SECTION --}}
        <div class="workflow-section">
            <div class="section-title">Alur Sistem</div>
            <div class="workflow-grid">
                <div class="workflow-card">
                    <span class="step-badge">1</span>
                    <span class="icon">📤</span>
                    <div class="title">Upload Ijazah</div>
                    <div class="desc">Upload foto ijazah dengan mudah</div>
                </div>
                <div class="workflow-card">
                    <span class="step-badge">2</span>
                    <span class="icon">🔍</span>
                    <div class="title">OCR Processing</div>
                    <div class="desc">Ekstrak data otomatis</div>
                </div>
                <div class="workflow-card">
                    <span class="step-badge">3</span>
                    <span class="icon">✅</span>
                    <div class="title">Verifikasi</div>
                    <div class="desc">Cocokkan dengan database</div>
                </div>
            </div>
        </div>

        {{-- PROCESS FLOW --}}
        <div class="process-section">
            <div class="section-title">Detail Proses</div>
            <div class="process-flow">
                <div class="process-step">
                    <div class="process-number">1</div>
                    <div class="process-content">
                        <div class="title">Siswa Upload Ijazah</div>
                        <div class="detail">Menggunakan form pencarian siswa & upload file JPG</div>
                    </div>
                </div>
                <div class="process-step">
                    <div class="process-number">2</div>
                    <div class="process-content">
                        <div class="title">Trigger N8N Workflow</div>
                        <div class="detail">Laravel mengirim webhook ke n8n secara otomatis</div>
                    </div>
                </div>
                <div class="process-step">
                    <div class="process-number">3</div>
                    <div class="process-content">
                        <div class="title">OCR Service</div>
                        <div class="detail">FastAPI + Tesseract ekstrak NISN, Nama, Sekolah, Tahun Lulus</div>
                    </div>
                </div>
                <div class="process-step">
                    <div class="process-number">4</div>
                    <div class="process-content">
                        <div class="title">Verifikasi & Simpan</div>
                        <div class="detail">Bandingkan data OCR dengan database secara real-time</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- STATUS VERIFIKASI --}}
        <div class="status-section">
            <div class="section-title">Status Verifikasi</div>
            <div class="status-grid">
                <div class="status-card pending">
                    <div class="label">Pending</div>
                    <div class="value">⏳</div>
                </div>
                <div class="status-card processing">
                    <div class="label">Processing</div>
                    <div class="value">⚙️</div>
                </div>
                <div class="status-card verified">
                    <div class="label">Verified</div>
                    <div class="value">✓</div>
                </div>
                <div class="status-card rejected">
                    <div class="label">Rejected</div>
                    <div class="value">✗</div>
                </div>
            </div>
        </div>

        {{-- TECH STACK --}}
        <div class="tech-section">
            <div class="section-title">Tech Stack</div>
            <div class="tech-grid">
                <span class="tech-badge blue">Laravel 11</span>
                <span class="tech-badge purple">Livewire</span>
                <span class="tech-badge cyan">Filament</span>
                <span class="tech-badge blue">FastAPI</span>
                <span class="tech-badge purple">Python OCR</span>
                <span class="tech-badge cyan">Tesseract</span>
                <span class="tech-badge orange">n8n</span>
                <span class="tech-badge purple">MariaDB</span>
                <span class="tech-badge blue">Nginx</span>
                <span class="tech-badge green">Docker</span>
            </div>
        </div>

        {{-- FITUR UTAMA --}}
        <div class="features-section">
            <div class="section-title">Fitur Utama</div>
            <div class="features-grid">
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">OCR Otomatis Cerdas</span>
                </div>
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">Verifikasi Akurat</span>
                </div>
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">Panel Admin Lengkap</span>
                </div>
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">Workflow Automation</span>
                </div>
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">Support Format JPG</span>
                </div>
                <div class="feature-item">
                    <span class="icon-check">✓</span>
                    <span class="text">Dashboard Real-time</span>
                </div>
            </div>
        </div>

        {{-- CTA BUTTON --}}
        <div class="cta-section">
            <a href="{{ route('upload-ijazah') }}" class="cta-button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Mulai Verifikasi Sekarang
            </a>
        </div>

        {{-- FOOTER --}}
        <div class="footer">
            <p class="footer-text">© 2025 Akadify. All rights reserved.</p>
            <div class="footer-version">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 6v6l4 2"/>
                </svg>
                v1.0.0
            </div>
        </div>
    </div>
</body>
</html>

