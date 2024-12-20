<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dual Portfolio</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // JavaScript for Dark Mode Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.querySelector('.theme-controller');
            const html = document.documentElement;

            // Check for saved theme preference or use device preference
            const savedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            html.setAttribute('data-theme', savedTheme);
            themeToggle.checked = savedTheme === 'dark';

            // Toggle theme
            themeToggle.addEventListener('change', () => {
                const newTheme = themeToggle.checked ? 'dark' : 'light';
                html.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });
        });
    </script>
</head>
<body>
    <div class="min-h-screen bg-base-100 text-base-content">
        <!-- Navigation -->
        <div class="navbar bg-base-100 shadow-lg">
            <div class="container mx-auto">
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl">SIM-LPDBar</a>
                </div>
                <a href="/admin/login" class="btn mr-2">Go to Dashboard</a>
                <div class="flex-none space-x-4">
                    <!-- Theme toggle -->
                    <label class="swap swap-rotate">
                        <input type="checkbox" class="theme-controller" />
                        <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                        <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
                    </label>
                </div>
            </div>
        </div>

        <!-- First Portfolio -->
        @foreach ($portfolioData as $data)
        <section class="hero min-h-screen" x-data="{ activeTab: 'about' }">
            <div class="hero-content text-center">
                <div class="max-w-4xl mx-auto p-6 shadow-lg rounded-lg bg-base-200">
                    <div class="avatar mb-8 mx-auto">
                        <div class="w-32 h-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->nama }}" class="object-cover w-full h-full rounded-full"/>
                        </div>
                    </div>
                    <h1 class="text-4xl font-extrabold text-base-content mb-4">{{ $data->nama }}</h1>
                    <p class="text-xl text-base-content/70 mb-8">Fullstack dev</p>

                    <!-- Tabs -->
                    <div class="tabs tabs-boxed justify-center mb-8">
                        <a class="tab" :class="{ 'tab-active': activeTab === 'about' }" @click="activeTab = 'about'">About</a>
                        <a class="tab" :class="{ 'tab-active': activeTab === 'skills' }" @click="activeTab = 'skills'">Skills</a>
                        <a class="tab" :class="{ 'tab-active': activeTab === 'projects' }" @click="activeTab = 'projects'">Projects</a>
                    </div>

                    <!-- Tab Contents -->
                    <div x-show="activeTab === 'about'" class="space-y-4">
                        <p class="text-lg text-base-content">{{ $data->nim }}</p>
                        <p class="text-lg text-base-content">{{ $data->phone }}</p>
                        <p class="text-lg text-base-content">{{ $data->email }}</p>
                        <p class="text-lg text-base-content/70">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab architecto non eos, quas necessitatibus distinctio nam. Fugit nemo quibusdam excepturi impedit numquam molestias aut quos? Ipsam debitis nesciunt qui sint?</p>
                        <div class="flex justify-center gap-6 mt-4">
                            <a href="https://github.com" class="btn btn-outline btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a>
                            <a href="https://linkedin.com" class="btn btn-outline btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a>
                            <a href="mailto:alif@example.com" class="btn btn-outline btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a>
                        </div>
                    </div>

                    <div x-show="activeTab === 'skills'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title justify-center">Frontend</h2>
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <span class="badge badge-primary">React</span>
                                    <span class="badge badge-primary">Vue.js</span>
                                    <span class="badge badge-primary">TypeScript</span>
                                    <span class="badge badge-primary">Tailwind</span>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title justify-center">Backend</h2>
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <span class="badge badge-secondary">Node.js</span>
                                    <span class="badge badge-secondary">Python</span>
                                    <span class="badge badge-secondary">PostgreSQL</span>
                                    <span class="badge badge-secondary">MongoDB</span>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title justify-center">DevOps</h2>
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <span class="badge badge-accent">Docker</span>
                                    <span class="badge badge-accent">AWS</span>
                                    <span class="badge badge-accent">CI/CD</span>
                                    <span class="badge badge-accent">Kubernetes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'projects'" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="card bg-base-100 shadow-xl">
                            <figure><img src="https://images.unsplash.com/photo-1557821552-17105176677c?q=80&w=800" alt="E-Commerce" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">E-Commerce Platform</h2>
                                <p>A full-featured e-commerce platform with real-time inventory management.</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">View Project</button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl">
                            <figure><img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800" alt="Task Management" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">Task Management System</h2>
                                <p>A collaborative task management system with real-time updates.</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">View Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach

        <!-- Footer -->
        <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
            <nav>
                <div class="grid grid-flow-col gap-4">
                    <a class="link link-hover">About us</a>
                    <a class="link link-hover">Contact</a>
                    <a class="link link-hover">Privacy Policy</a>
                </div>
            </nav>
            <aside>
                <p>Copyright © 2024 - All rights reserved</p>
            </aside>
        </footer>
    </div>
</body>
</html>

