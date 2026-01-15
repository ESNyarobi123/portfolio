<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Portfolio' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #0a0a0f;
            --bg-secondary: #12121a;
            --accent-color: #ff014f;
            --accent-glow: rgba(255, 1, 79, 0.5);
            --accent-secondary: #6366f1;
            --text-primary: #c4cfde;
            --text-secondary: #878e99;
            --heading-color: #ffffff;
            --shadow-1: 10px 10px 19px #050508, -10px -10px 19px #0f0f16;
            --shadow-inner: inset 5px 5px 10px #050508, inset -5px -5px 10px #0f0f16;
            --gradient-red: linear-gradient(145deg, #ff014f, #d11414);
            --gradient-purple: linear-gradient(145deg, #6366f1, #8b5cf6);
            --gradient-dark: linear-gradient(145deg, #12121a, #1a1a25);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Rubik', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(255, 1, 79, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 40% 60%, rgba(139, 92, 246, 0.05) 0%, transparent 40%);
            animation: bgPulse 8s ease-in-out infinite alternate;
        }

        @keyframes bgPulse {
            0% { opacity: 0.5; transform: scale(1); }
            100% { opacity: 1; transform: scale(1.1); }
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 50%;
            opacity: 0.3;
            animation: float 15s infinite ease-in-out;
        }

        .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; animation-duration: 20s; }
        .particle:nth-child(2) { left: 20%; top: 80%; animation-delay: 2s; animation-duration: 25s; background: var(--accent-secondary); }
        .particle:nth-child(3) { left: 30%; top: 40%; animation-delay: 4s; animation-duration: 18s; }
        .particle:nth-child(4) { left: 40%; top: 60%; animation-delay: 1s; animation-duration: 22s; background: var(--accent-secondary); }
        .particle:nth-child(5) { left: 50%; top: 30%; animation-delay: 3s; animation-duration: 20s; }
        .particle:nth-child(6) { left: 60%; top: 70%; animation-delay: 5s; animation-duration: 24s; background: var(--accent-secondary); }
        .particle:nth-child(7) { left: 70%; top: 50%; animation-delay: 2s; animation-duration: 19s; }
        .particle:nth-child(8) { left: 80%; top: 20%; animation-delay: 4s; animation-duration: 21s; background: var(--accent-secondary); }
        .particle:nth-child(9) { left: 90%; top: 80%; animation-delay: 1s; animation-duration: 23s; }
        .particle:nth-child(10) { left: 15%; top: 50%; animation-delay: 3s; animation-duration: 17s; background: var(--accent-secondary); }
        .particle:nth-child(11) { left: 85%; top: 40%; animation-delay: 0s; animation-duration: 26s; }
        .particle:nth-child(12) { left: 45%; top: 90%; animation-delay: 5s; animation-duration: 20s; background: var(--accent-secondary); }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.3; }
            25% { transform: translate(30px, -50px) rotate(90deg); opacity: 0.6; }
            50% { transform: translate(-20px, -100px) rotate(180deg); opacity: 0.3; }
            75% { transform: translate(50px, -50px) rotate(270deg); opacity: 0.6; }
        }

        /* Floating Geometric Shapes */
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            opacity: 0.03;
            animation: shapeFloat 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            border: 2px solid var(--accent-color);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            border: 2px solid var(--accent-secondary);
            border-radius: 50%;
            bottom: 20%;
            left: 5%;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            border: 2px solid var(--accent-color);
            top: 50%;
            right: 20%;
            animation-delay: 10s;
            transform: rotate(45deg);
        }

        .shape-4 {
            width: 250px;
            height: 250px;
            border: 2px solid var(--accent-secondary);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            top: 70%;
            left: 30%;
            animation-delay: 7s;
        }

        @keyframes shapeFloat {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        /* Scroll Reveal Animations */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal-left.active {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal-right.active {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal-scale.active {
            opacity: 1;
            transform: scale(1);
        }

        /* Stagger animation delays */
        .stagger-1 { transition-delay: 0.1s; }
        .stagger-2 { transition-delay: 0.2s; }
        .stagger-3 { transition-delay: 0.3s; }
        .stagger-4 { transition-delay: 0.4s; }
        .stagger-5 { transition-delay: 0.5s; }
        .stagger-6 { transition-delay: 0.6s; }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Rajdhani', sans-serif;
            color: var(--heading-color);
            font-weight: 700;
            text-transform: uppercase;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 30px;
        }

        section {
            padding: 100px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
        }

        .subtitle {
            color: var(--accent-color);
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 15px;
            text-transform: uppercase;
            text-shadow: 0 0 20px var(--accent-glow);
            animation: subtitleGlow 2s ease-in-out infinite alternate;
        }

        @keyframes subtitleGlow {
            from { text-shadow: 0 0 10px var(--accent-glow); }
            to { text-shadow: 0 0 30px var(--accent-glow), 0 0 50px var(--accent-glow); }
        }

        .section-title {
            font-size: 60px;
            margin-bottom: 50px;
            line-height: 1.2;
            background: linear-gradient(135deg, #fff 0%, #c4cfde 50%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn {
            display: inline-block;
            padding: 15px 35px;
            background: var(--gradient-dark);
            color: var(--accent-color);
            border-radius: 6px;
            box-shadow: var(--shadow-1);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            background: var(--gradient-red);
            color: #fff;
            transform: translateY(-5px);
            box-shadow: 0 10px 40px var(--accent-glow);
        }

        .card {
            background: var(--gradient-dark);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow-1);
            transition: var(--transition);
            position: relative;
            z-index: 1;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-red);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: var(--transition);
            transform: scale(0);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover::after {
            opacity: 1;
            transform: scale(1);
            animation: cardShine 0.6s ease-out;
        }

        @keyframes cardShine {
            from { transform: scale(0) rotate(0deg); opacity: 0; }
            to { transform: scale(1) rotate(360deg); opacity: 0; }
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(255, 1, 79, 0.3);
        }

        .card:hover h3, .card:hover p, .card:hover i {
            color: #fff !important;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(20px);
            padding: 25px 0;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        nav.sticky {
            padding: 15px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            background: rgba(10, 10, 15, 0.95);
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--heading-color);
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Rajdhani', sans-serif;
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .logo span {
            color: var(--accent-color);
            text-shadow: 0 0 20px var(--accent-glow);
        }

        .nav-links {
            display: flex;
            gap: 40px;
        }

        .nav-links a {
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            color: var(--text-primary);
            letter-spacing: 1px;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-red);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--accent-color);
            text-shadow: 0 0 20px var(--accent-glow);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 100px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 80% 20%, rgba(255, 1, 79, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(99, 102, 241, 0.1) 0%, transparent 40%);
            z-index: -1;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 80px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 70px;
            line-height: 1.1;
            margin-bottom: 25px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-text h1 span {
            color: var(--accent-color);
            text-shadow: 0 0 30px var(--accent-glow);
            animation: nameGlow 2s ease-in-out infinite alternate;
        }

        @keyframes nameGlow {
            from { text-shadow: 0 0 20px var(--accent-glow); }
            to { text-shadow: 0 0 40px var(--accent-glow), 0 0 60px var(--accent-glow); }
        }

        /* Typewriter Effect */
        .typewriter {
            overflow: hidden;
            border-right: 3px solid var(--accent-color);
            white-space: nowrap;
            animation: typing 3s steps(30, end), blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes blink {
            from, to { border-color: transparent; }
            50% { border-color: var(--accent-color); }
        }

        .hero-text p {
            font-size: 18px;
            color: var(--text-secondary);
            margin-bottom: 45px;
            max-width: 650px;
            line-height: 1.8;
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        .hero-image {
            position: relative;
            z-index: 1;
            animation: fadeInRight 1s ease-out 0.5s backwards;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-image::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: var(--gradient-red);
            border-radius: 25px;
            z-index: -2;
            opacity: 0;
            transition: var(--transition);
            filter: blur(20px);
        }

        .hero-image:hover::before {
            opacity: 0.5;
        }

        .hero-image::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            background: var(--gradient-dark);
            border-radius: 20px;
            box-shadow: var(--shadow-1);
            z-index: -1;
        }

        .hero-image-inner {
            width: 100%;
            height: 600px;
            background: var(--gradient-dark);
            border-radius: 20px;
            box-shadow: var(--shadow-1);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(20%);
            transition: var(--transition);
        }

        .hero-image:hover img {
            filter: grayscale(0%);
            transform: scale(1.1);
        }

        /* Progress Bars with Animation */
        .progress-wrapper {
            margin-bottom: 30px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .progress-info span {
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 1px;
            font-size: 14px;
        }

        .progress-bar-container {
            height: 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            box-shadow: var(--shadow-inner);
            padding: 3px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--gradient-red);
            border-radius: 10px;
            position: relative;
            width: 0;
            transition: width 1.5s ease-in-out;
        }

        .progress-bar-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: progressShine 2s infinite;
        }

        @keyframes progressShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Toolkit Icons */
        .toolkit-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .toolkit-item {
            width: 100px;
            height: 100px;
            background: var(--gradient-dark);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-1);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.05);
            animation: toolkitFloat 4s ease-in-out infinite;
        }

        .toolkit-item:nth-child(odd) {
            animation-delay: 0.5s;
        }

        @keyframes toolkitFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .toolkit-item:hover {
            transform: translateY(-15px) rotate(5deg);
            background: var(--gradient-red);
            box-shadow: 0 15px 40px var(--accent-glow);
        }

        .toolkit-item img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            filter: grayscale(100%) brightness(200%);
            transition: var(--transition);
        }

        .toolkit-item:hover img {
            filter: grayscale(0%) brightness(100%);
            transform: scale(1.2);
        }

        /* Footer */
        footer {
            padding: 50px 0;
            text-align: center;
            background: var(--bg-secondary);
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .social-links a {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-dark);
            border-radius: 6px;
            box-shadow: var(--shadow-1);
            font-size: 20px;
            color: var(--heading-color);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--accent-color);
            color: #fff;
            transform: translateY(-10px) rotate(360deg);
            box-shadow: 0 15px 40px var(--accent-glow);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 10px;
        }

        .mobile-menu-btn span {
            width: 25px;
            height: 2px;
            background: var(--heading-color);
            transition: var(--transition);
        }

        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .hero-text h1 {
                font-size: 40px;
            }
            .hero-text p {
                margin: 0 auto 40px;
            }
            .nav-links {
                display: none;
            }
            .mobile-menu-btn {
                display: flex;
            }
            .section-title {
                font-size: 40px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-color);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ff3366;
        }

        /* Selection */
        ::selection {
            background: var(--accent-color);
            color: #fff;
        }

        /* Cursor Glow Effect */
        .cursor-glow {
            position: fixed;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 1, 79, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        body:hover .cursor-glow {
            opacity: 1;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Animated Background Elements -->
    <div class="bg-animation"></div>
    
    <!-- Floating Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>
    
    <!-- Cursor Glow Effect -->
    <div class="cursor-glow" id="cursorGlow"></div>

    <nav id="navbar">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="logo">
                    @if(isset($settings['logo']))
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="height: 40px;">
                    @else
                        {{ $settings['site_name'] ?? 'PORT' }}<span>FOLIO</span>
                    @endif
                </a>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#resume">Resume</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#contact" class="btn">Hire Me</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="social-links">
                @if(isset($settings['facebook']))
                    <a href="{{ $settings['facebook'] }}" class="reveal stagger-1"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(isset($settings['twitter']))
                    <a href="{{ $settings['twitter'] }}" class="reveal stagger-2"><i class="fab fa-twitter"></i></a>
                @endif
                @if(isset($settings['linkedin']))
                    <a href="{{ $settings['linkedin'] }}" class="reveal stagger-3"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if(isset($settings['instagram']))
                    <a href="{{ $settings['instagram'] }}" class="reveal stagger-4"><i class="fab fa-instagram"></i></a>
                @endif
            </div>
            <p class="reveal">&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Portfolio' }}. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Navigation sticky effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('sticky');
            } else {
                nav.classList.remove('sticky');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Scroll Reveal Animation
        function revealOnScroll() {
            const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
            
            reveals.forEach(element => {
                const windowHeight = window.innerHeight;
                const elementTop = element.getBoundingClientRect().top;
                const revealPoint = 150;
                
                if (elementTop < windowHeight - revealPoint) {
                    element.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Cursor Glow Effect
        const cursorGlow = document.getElementById('cursorGlow');
        
        document.addEventListener('mousemove', (e) => {
            cursorGlow.style.left = e.clientX + 'px';
            cursorGlow.style.top = e.clientY + 'px';
        });

        // Progress Bar Animation
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-bar-fill');
            
            progressBars.forEach(bar => {
                const windowHeight = window.innerHeight;
                const elementTop = bar.getBoundingClientRect().top;
                
                if (elementTop < windowHeight - 100) {
                    const width = bar.getAttribute('data-width') || bar.style.width;
                    bar.style.width = width;
                }
            });
        }

        window.addEventListener('scroll', animateProgressBars);
        window.addEventListener('load', animateProgressBars);

        // Typewriter Effect
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            
            type();
        }

        // Initialize typewriter on load
        window.addEventListener('load', () => {
            const typewriterElements = document.querySelectorAll('.typewriter-text');
            typewriterElements.forEach(el => {
                const text = el.getAttribute('data-text') || el.textContent;
                typeWriter(el, text, 80);
            });
        });

        // Parallax effect for floating shapes
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const shapes = document.querySelectorAll('.shape');
            
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 0.1;
                shape.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.02}deg)`;
            });
        });

        // Add hover sound effect class
        document.querySelectorAll('.btn, .card, .toolkit-item').forEach(el => {
            el.addEventListener('mouseenter', () => {
                el.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
