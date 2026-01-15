@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <span class="subtitle" style="animation: fadeInUp 0.8s ease-out;">{{ $settings['hero_subtitle'] ?? 'Welcome to my world' }}</span>
                    <h1>Hi, I'm <span>{{ $settings['hero_title'] ?? 'John Doe' }}</span></h1>
                    <h2 class="typewriter-container" style="font-size: 36px; margin-bottom: 30px; color: var(--text-primary); display: flex; align-items: center; gap: 10px;">
                        a <span class="typewriter-text" data-text="{{ $settings['hero_profession'] ?? 'Professional Developer' }}" style="color: var(--accent-color); border-right: 3px solid var(--accent-color); padding-right: 5px; animation: blink 0.75s step-end infinite;">{{ $settings['hero_profession'] ?? 'Professional Developer' }}</span>.
                    </h2>
                    <p style="animation: fadeInUp 1s ease-out 0.4s backwards;">{{ $settings['hero_description'] ?? 'I build high-quality websites and applications with modern technologies.' }}</p>
                    
                    <div style="margin-top: 50px; animation: fadeInUp 1s ease-out 0.6s backwards;">
                        <h4 style="font-size: 14px; margin-bottom: 25px; color: var(--text-secondary);">Find me in</h4>
                        <div style="display: flex; gap: 20px;">
                            @php
                                $socials = [
                                    ['icon' => 'fab fa-facebook-f', 'link' => $settings['facebook'] ?? '#'],
                                    ['icon' => 'fab fa-twitter', 'link' => $settings['twitter'] ?? '#'],
                                    ['icon' => 'fab fa-linkedin-in', 'link' => $settings['linkedin'] ?? '#'],
                                    ['icon' => 'fab fa-instagram', 'link' => $settings['instagram'] ?? '#'],
                                ];
                            @endphp
                            @foreach($socials as $index => $social)
                                <a href="{{ $social['link'] }}" class="toolkit-item social-hero-link" style="width: 60px; height: 60px; animation: fadeInUp 0.8s ease-out {{ 0.8 + ($index * 0.1) }}s backwards;">
                                    <i class="{{ $social['icon'] }}" style="font-size: 20px;"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="hero-image-inner">
                        @if(isset($settings['hero_image']))
                            <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Hero Image">
                        @else
                            <img src="https://via.placeholder.com/600x800" alt="Hero Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="features">
        <div class="container">
            <div class="reveal">
                <span class="subtitle">Features</span>
                <h2 class="section-title">What I Do</h2>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
                @forelse($services as $index => $service)
                    <div class="card reveal-scale stagger-{{ ($index % 6) + 1 }}">
                        <i class="{{ $service->icon ?? 'fas fa-code' }}" style="font-size: 45px; color: var(--accent-color); margin-bottom: 30px; display: block; text-shadow: 0 0 30px var(--accent-glow);"></i>
                        <h3 style="margin-bottom: 20px; font-size: 24px;">{{ $service->title }}</h3>
                        <p style="color: var(--text-secondary); line-height: 1.7;">{{ $service->description }}</p>
                    </div>
                @empty
                    <div class="card reveal-scale">
                        <i class="fas fa-code" style="font-size: 45px; color: var(--accent-color); margin-bottom: 30px; display: block; text-shadow: 0 0 30px var(--accent-glow);"></i>
                        <h3 style="margin-bottom: 20px;">Web Development</h3>
                        <p style="color: var(--text-secondary);">I build modern and responsive websites using the latest technologies.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container">
            <div style="text-align: center; margin-bottom: 80px;" class="reveal">
                <span class="subtitle">Visit my portfolio and keep your feedback</span>
                <h2 class="section-title" style="margin-bottom: 0;">My Portfolio</h2>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: 40px;">
                @forelse($projects as $index => $project)
                    <div class="card project-card reveal stagger-{{ ($index % 6) + 1 }}" style="padding: 30px;">
                        <div class="project-image-wrapper" style="height: 280px; overflow: hidden; border-radius: 15px; margin-bottom: 25px; box-shadow: var(--shadow-inner); position: relative;">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: var(--transition);">
                            @else
                                <img src="https://via.placeholder.com/400x300" alt="Project Image" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                            <div class="project-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(255, 1, 79, 0.8), transparent); opacity: 0; transition: var(--transition); display: flex; align-items: flex-end; justify-content: center; padding-bottom: 20px;">
                                <span style="color: #fff; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">View Details</span>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span style="color: var(--accent-color); font-size: 13px; font-weight: 500; text-shadow: 0 0 10px var(--accent-glow);">{{ $project->category }}</span>
                            <span style="color: var(--text-secondary); font-size: 14px;"><i class="far fa-heart"></i> 600</span>
                        </div>
                        <h3 style="margin-bottom: 20px; font-size: 22px;"><a href="{{ $project->link ?? '#' }}" target="_blank">{{ $project->title }}</a></h3>
                        <a href="{{ $project->link ?? '#' }}" target="_blank" class="project-link" style="color: var(--accent-color); font-weight: 500; display: flex; align-items: center; gap: 8px; font-size: 14px;">VIEW PROJECT <i class="fas fa-arrow-right" style="transition: var(--transition);"></i></a>
                    </div>
                @empty
                    <p style="text-align: center; grid-column: 1/-1;" class="reveal">No projects found.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="resume">
        <div class="container">
            <div style="text-align: center; margin-bottom: 80px;" class="reveal">
                <span class="subtitle">Professional Skills</span>
                <h2 class="section-title" style="margin-bottom: 0;">My Skills</h2>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 80px;">
                <div class="reveal-left">
                    <h3 style="margin-bottom: 40px; font-size: 28px; border-left: 5px solid var(--accent-color); padding-left: 20px; box-shadow: -5px 0 20px var(--accent-glow);">Development Skills</h3>
                    @foreach($skills->where('category', 'Development') as $index => $skill)
                        <div class="progress-wrapper reveal stagger-{{ ($index % 6) + 1 }}">
                            <div class="progress-info">
                                <span>{{ $skill->name }}</span>
                                <span style="color: var(--accent-color);">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" data-width="{{ $skill->percentage }}%" style="width: 0%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="reveal-right">
                    <h3 style="margin-bottom: 40px; font-size: 28px; border-left: 5px solid var(--accent-secondary); padding-left: 20px; box-shadow: -5px 0 20px rgba(99, 102, 241, 0.5);">Design Skills</h3>
                    @foreach($skills->where('category', 'Design') as $index => $skill)
                        <div class="progress-wrapper reveal stagger-{{ ($index % 6) + 1 }}">
                            <div class="progress-info">
                                <span>{{ $skill->name }}</span>
                                <span style="color: var(--accent-secondary);">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" data-width="{{ $skill->percentage }}%" style="width: 0%; background: var(--gradient-purple);"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Toolkit Section -->
    <section id="toolkit" style="background: var(--bg-secondary); position: relative; overflow: hidden;">
        <div class="container" style="position: relative; z-index: 1;">
            <div style="text-align: center;" class="reveal">
                <span class="subtitle">My Development Toolkit</span>
                <h2 class="section-title">Tools I Use</h2>
            </div>
            <div class="toolkit-grid">
                @php
                    $tools = [
                        ['name' => 'Laravel', 'icon' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg'],
                        ['name' => 'React', 'icon' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/react/react-original.svg'],
                        ['name' => 'JavaScript', 'icon' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg'],
                        ['name' => 'Figma', 'icon' => 'https://www.vectorlogo.zone/logos/figma/figma-icon.svg'],
                        ['name' => 'Photoshop', 'icon' => 'https://www.vectorlogo.zone/logos/adobe_photoshop/adobe_photoshop-icon.svg'],
                        ['name' => 'Tailwind', 'icon' => 'https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg'],
                        ['name' => 'MySQL', 'icon' => 'https://www.vectorlogo.zone/logos/mysql/mysql-icon.svg'],
                        ['name' => 'Git', 'icon' => 'https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg'],
                    ];
                @endphp
                @foreach($tools as $index => $tool)
                    <div class="toolkit-item reveal-scale stagger-{{ ($index % 6) + 1 }}" title="{{ $tool['name'] }}">
                        <img src="{{ $tool['icon'] }}" alt="{{ $tool['name'] }}">
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Background glow effect -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(255, 1, 79, 0.1) 0%, transparent 70%); pointer-events: none;"></div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div style="text-align: center; margin-bottom: 80px;" class="reveal">
                <span class="subtitle">Contact</span>
                <h2 class="section-title" style="margin-bottom: 0;">Contact With Me</h2>
            </div>
            <div style="display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 60px;">
                <div class="card reveal-left" style="padding: 40px;">
                    <div style="height: 250px; border-radius: 15px; overflow: hidden; margin-bottom: 35px; box-shadow: var(--shadow-inner); position: relative;">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Contact" style="width: 100%; height: 100%; object-fit: cover; transition: var(--transition);">
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(10, 10, 15, 0.8), transparent);"></div>
                    </div>
                    <h2 style="margin-bottom: 15px; font-size: 32px;">{{ $settings['hero_title'] ?? 'John Doe' }}</h2>
                    <p style="color: var(--accent-color); margin-bottom: 25px; font-size: 16px; text-shadow: 0 0 10px var(--accent-glow);">{{ $settings['hero_profession'] ?? 'Professional Developer' }}</p>
                    <p style="color: var(--text-secondary); margin-bottom: 35px; line-height: 1.8;">{{ $settings['contact_description'] ?? 'I am available for freelance work. Connect with me via phone call or email.' }}</p>
                    
                    <div style="margin-bottom: 40px;">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding: 15px; background: rgba(255, 1, 79, 0.1); border-radius: 10px; border-left: 3px solid var(--accent-color);">
                            <i class="fas fa-phone" style="color: var(--accent-color);"></i>
                            <span style="color: var(--heading-color);">{{ $settings['phone'] ?? '+0123456789' }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 15px; padding: 15px; background: rgba(99, 102, 241, 0.1); border-radius: 10px; border-left: 3px solid var(--accent-secondary);">
                            <i class="fas fa-envelope" style="color: var(--accent-secondary);"></i>
                            <span style="color: var(--heading-color);">{{ $settings['email'] ?? 'admin@example.com' }}</span>
                        </div>
                    </div>
                </div>
                <div class="card reveal-right" style="padding: 40px;">
                    @if(session('success'))
                        <div style="background: var(--gradient-red); color: #fff; padding: 20px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 10px 30px var(--accent-glow); animation: pulse 2s infinite;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                            <div class="form-group">
                                <label style="display: block; margin-bottom: 12px; font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Your Name</label>
                                <input type="text" name="name" required class="form-input" style="width: 100%; padding: 18px; background: rgba(255, 255, 255, 0.03); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; box-shadow: var(--shadow-inner); outline: none; transition: var(--transition);">
                            </div>
                            <div class="form-group">
                                <label style="display: block; margin-bottom: 12px; font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Phone Number</label>
                                <input type="text" name="phone" class="form-input" style="width: 100%; padding: 18px; background: rgba(255, 255, 255, 0.03); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; box-shadow: var(--shadow-inner); outline: none; transition: var(--transition);">
                            </div>
                        </div>
                        <div style="margin-bottom: 30px;" class="form-group">
                            <label style="display: block; margin-bottom: 12px; font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Email</label>
                            <input type="email" name="email" required class="form-input" style="width: 100%; padding: 18px; background: rgba(255, 255, 255, 0.03); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; box-shadow: var(--shadow-inner); outline: none; transition: var(--transition);">
                        </div>
                        <div style="margin-bottom: 30px;" class="form-group">
                            <label style="display: block; margin-bottom: 12px; font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Subject</label>
                            <input type="text" name="subject" required class="form-input" style="width: 100%; padding: 18px; background: rgba(255, 255, 255, 0.03); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; box-shadow: var(--shadow-inner); outline: none; transition: var(--transition);">
                        </div>
                        <div style="margin-bottom: 40px;" class="form-group">
                            <label style="display: block; margin-bottom: 12px; font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Your Message</label>
                            <textarea name="message" rows="6" required class="form-input" style="width: 100%; padding: 18px; background: rgba(255, 255, 255, 0.03); border: 2px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; box-shadow: var(--shadow-inner); outline: none; transition: var(--transition); resize: vertical;"></textarea>
                        </div>
                        <button type="submit" class="btn" style="width: 100%; padding: 20px; font-size: 16px;">
                            <span style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                                Send Message <i class="fas fa-paper-plane"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .social-links-small:hover {
        background: var(--accent-color) !important;
        color: #fff !important;
        transform: translateY(-5px);
    }
    
    .form-input:focus {
        border-color: var(--accent-color) !important;
        box-shadow: 0 0 20px var(--accent-glow), var(--shadow-inner) !important;
    }
    
    .form-input:hover {
        border-color: rgba(255, 1, 79, 0.3);
    }
    
    .social-hero-link:hover {
        animation: none !important;
        transform: translateY(-10px) rotate(10deg) !important;
    }
    
    .project-card:hover .project-overlay {
        opacity: 1 !important;
    }
    
    .project-card:hover .project-image-wrapper img {
        transform: scale(1.1);
    }
    
    .project-link:hover i {
        transform: translateX(5px);
    }
    
    @keyframes pulse {
        0%, 100% { box-shadow: 0 10px 30px var(--accent-glow); }
        50% { box-shadow: 0 10px 50px var(--accent-glow); }
    }
    
    /* Responsive contact grid */
    @media (max-width: 992px) {
        #contact > .container > div:last-child {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
