<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaseConnect | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        mono: ['DM Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50:  '#f0f4ff',
                            100: '#dde6ff',
                            200: '#c3d0ff',
                            300: '#9fb0ff',
                            400: '#7884fe',
                            500: '#5a5ef7',
                            600: '#4540eb',
                            700: '#3a33cf',
                            800: '#2f2ba7',
                            900: '#2a2884',
                        },
                        surface: {
                            50: '#f8f9fc',
                            100: '#f1f3f8',
                            200: '#e8eaf2',
                            300: '#d5d8e8',
                        }
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.5s ease forwards',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(16px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'DM Sans', sans-serif; background: #f8f9fc; }
        .stat-card { opacity: 0; animation: fadeUp 0.5s ease forwards; }
        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.12s; }
        .stat-card:nth-child(3) { animation-delay: 0.19s; }
        .stat-card:nth-child(4) { animation-delay: 0.26s; }
        .section-fade { opacity: 0; animation: fadeUp 0.5s ease 0.35s forwards; }
        .section-fade-2 { opacity: 0; animation: fadeUp 0.5s ease 0.45s forwards; }
        .section-fade-3 { opacity: 0; animation: fadeUp 0.5s ease 0.55s forwards; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .nav-item.active { background: linear-gradient(135deg, #5a5ef7, #7884fe); color: #fff; box-shadow: 0 4px 14px rgba(90,94,247,0.35); }
        .nav-item.active svg { color: #fff; }
        .nav-item { transition: all 0.18s ease; }
        .nav-item:hover:not(.active) { background: #f1f3f8; }
        .stat-card-inner { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .stat-card-inner:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(90,94,247,0.12); }
        .grid-bg { background-image: radial-gradient(circle, #d5d8e8 1px, transparent 1px); background-size: 28px 28px; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #c3d0ff; border-radius: 99px; }

        .live-dot::before {
            content: ''; display: inline-block; width: 7px; height: 7px; border-radius: 50%;
            background: #22c55e; margin-right: 6px; animation: pulse-ring 1.8s ease infinite; vertical-align: middle;
        }
        @keyframes pulse-ring {
            0%, 100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            50% { box-shadow: 0 0 0 5px rgba(34,197,94,0); }
        }

        .top-accent { background: linear-gradient(90deg, #5a5ef7, #7884fe, #a5b4fc); }
        .revenue-card { background: linear-gradient(135deg, #4540eb 0%, #5a5ef7 50%, #7884fe 100%); }
        .table-row { transition: background 0.15s; }
        .table-row:hover { background: #f0f4ff; }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <div class="top-accent h-0.5 w-full fixed top-0 left-0 z-[100]"></div>

    <div class="flex min-h-screen pt-0.5">

        <aside class="w-64 bg-white border-r border-surface-200 flex flex-col fixed top-0.5 left-0 h-full z-50 shadow-sm">
            <div class="px-6 py-5 border-b border-surface-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md shadow-brand-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[15px] font-bold text-slate-900 leading-tight">LeaseConnect</p>
                        <p class="text-[10px] text-brand-500 font-mono font-medium tracking-wider uppercase">Property OS</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
                <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-widest px-3 mb-2">Main</p>
                <a href="/dashboard" class="nav-item active flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium cursor-pointer">
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </a>

                <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-widest px-3 mb-2 mt-5">Modules</p>
                <a href="/properties" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 cursor-pointer">
                    <svg class="w-[18px] h-[18px] text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Properties
                </a>
                <a href="/tenants" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 cursor-pointer">
                    <svg class="w-[18px] h-[18px] text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Tenants
                </a>
                <a href="/leases" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 cursor-pointer">
                    <svg class="w-[18px] h-[18px] text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Leases
                    <span class="ml-auto bg-brand-100 text-brand-600 text-[10px] font-semibold font-mono px-1.5 py-0.5 rounded-md">{{ $activeLeases }}</span>
                </a>
                <a href="/payments" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 cursor-pointer">
                    <svg class="w-[18px] h-[18px] text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Payments
                </a>
            </nav>

            <div class="px-3 py-4 border-t border-surface-100">
                <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-surface-100 cursor-pointer transition">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">R</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-800 truncate">Robert Wanjiru</p>
                        <p class="text-[11px] text-slate-400 truncate">Admin ID: 189669</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                    </svg>
                </div>
            </div>
        </aside>

        <div class="flex-1 ml-64 flex flex-col min-h-screen">
            <header class="bg-white border-b border-surface-200 sticky top-0.5 z-40">
                <div class="px-8 h-16 flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm">
                        <span class="text-slate-400">LeaseConnect</span>
                        <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-slate-800 font-medium">Dashboard</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="live-dot text-xs text-slate-500 font-medium hidden sm:inline-flex items-center bg-green-50 px-3 py-1.5 rounded-full border border-green-100">Live</span>
                        <div class="hidden md:flex items-center gap-2 text-sm text-slate-500 bg-surface-50 border border-surface-200 px-3 py-1.5 rounded-lg">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span id="live-date" class="font-mono text-xs"></span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-8 py-8 grid-bg">
                <div class="mb-8 section-fade">
                    <div class="flex items-start justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Good day, Robert 👋</h1>
                            <p class="text-sm text-slate-500 mt-1">Here's what's happening across your property system today.</p>
                        </div>
                        <a href="/leases/create" class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white text-sm font-medium px-4 py-2.5 rounded-xl shadow-md shadow-brand-200 transition-all hover:shadow-lg hover:shadow-brand-200 hover:-translate-y-0.5 duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            New Lease
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
                    <div class="stat-card">
                        <div class="stat-card-inner bg-white rounded-2xl border border-surface-200 p-5 shadow-sm">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-semibold font-mono uppercase tracking-wider text-blue-400 bg-blue-50 px-2 py-1 rounded-lg">Props</span>
                            </div>
                            <p class="text-3xl font-bold text-slate-900 mb-1">{{ $totalProperties }}</p>
                            <p class="text-sm text-slate-500 font-medium">Total Properties</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-inner bg-white rounded-2xl border border-surface-200 p-5 shadow-sm">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-10 h-10 rounded-xl bg-violet-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-semibold font-mono uppercase tracking-wider text-violet-400 bg-violet-50 px-2 py-1 rounded-lg">Tenants</span>
                            </div>
                            <p class="text-3xl font-bold text-slate-900 mb-1">{{ $totalTenants }}</p>
                            <p class="text-sm text-slate-500 font-medium">Registered Tenants</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-inner bg-white rounded-2xl border border-surface-200 p-5 shadow-sm">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center gap-1 text-[10px] font-semibold font-mono uppercase tracking-wider text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg border border-emerald-100">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full inline-block animate-pulse"></span> Active
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-slate-900 mb-1">{{ $activeLeases }}</p>
                            <p class="text-sm text-slate-500 font-medium">Active Leases</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-inner revenue-card rounded-2xl p-5 shadow-lg shadow-brand-200/50 relative overflow-hidden">
                            <div class="absolute -top-6 -right-6 w-28 h-28 rounded-full bg-white/10 pointer-events-none"></div>
                            <div class="absolute -bottom-4 -left-4 w-20 h-20 rounded-full bg-white/10 pointer-events-none"></div>

                            <div class="flex items-start justify-between mb-4 relative">
                                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-semibold font-mono uppercase tracking-wider text-white/70 bg-white/15 px-2 py-1 rounded-lg">Revenue</span>
                            </div>
                            <p class="text-3xl font-bold text-white mb-0.5 relative">KSh {{ number_format($totalPayments, 2) }}</p>
                            <p class="text-sm text-white/70 font-medium relative">Total Collected</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                    <div class="lg:col-span-2 section-fade-2">
                        <div class="bg-white rounded-2xl border border-surface-200 shadow-sm overflow-hidden">
                            <div class="px-6 py-4 border-b border-surface-100 flex items-center justify-between">
                                <div>
                                    <h2 class="text-sm font-semibold text-slate-800">Recent Leases</h2>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Latest lease agreements in the system</p>
                                </div>
                                <a href="/leases" class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-brand-500 hover:text-brand-600 bg-brand-50 hover:bg-brand-100 px-3 py-1.5 rounded-lg transition">
                                    View all
                                </a>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="bg-surface-50 border-b border-surface-100">
                                            <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wider px-6 py-3">Tenant</th>
                                            <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wider px-4 py-3">Property</th>
                                            <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wider px-4 py-3">Rent / mo</th>
                                            <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wider px-4 py-3">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-surface-100">
                                        @forelse($recentLeases ?? [] as $lease)
                                        <tr class="table-row">
                                            <td class="px-6 py-3.5">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-7 h-7 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 text-[11px] font-bold flex-shrink-0">
                                                        {{ strtoupper(substr($lease->tenant->name ?? 'T', 0, 1)) }}
                                                    </div>
                                                    <span class="font-medium text-slate-800 truncate">{{ $lease->tenant->name ?? 'N/A' }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3.5 text-slate-500 text-[13px]">{{ $lease->property->name ?? 'N/A' }}</td>
                                            <td class="px-4 py-3.5">
                                                <span class="font-semibold text-slate-800 font-mono text-[13px]">KSh {{ number_format($lease->rent_amount, 2) }}</span>
                                            </td>
                                            <td class="px-4 py-3.5">
                                                @if($lease->status === 'active')
                                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Active
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                                        <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span> Ended
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center gap-2">
                                                    <p class="text-sm font-medium text-slate-400">No leases yet</p>
                                                    <p class="text-xs text-slate-300">Leases will appear here once Akio's module is live.</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 section-fade-3">
                        <div class="bg-white rounded-2xl border border-surface-200 shadow-sm p-5">
                            <h2 class="text-sm font-semibold text-slate-800 mb-4">System Health</h2>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                        <span class="text-xs text-slate-600">Database</span>
                                    </div>
                                    <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Online</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                        <span class="text-xs text-slate-600">Dashboard Module</span>
                                    </div>
                                    <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Active</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                        <span class="text-xs text-slate-600">Lease Module</span>
                                    </div>
                                    <span class="text-[11px] font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md">Pending</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-surface-200 shadow-sm p-5 flex-1">
                            <h2 class="text-sm font-semibold text-slate-800 mb-4">Quick Actions</h2>
                            <div class="grid grid-cols-2 gap-2.5">
                                <a href="/leases/create" class="flex flex-col items-center gap-2 p-3 rounded-xl bg-surface-50 hover:bg-brand-50 border border-surface-200 text-slate-500 hover:text-brand-600 text-[11px] font-medium transition cursor-pointer">
                                    New Lease
                                </a>
                                <a href="/payments/create" class="flex flex-col items-center gap-2 p-3 rounded-xl bg-surface-50 hover:bg-brand-50 border border-surface-200 text-slate-500 hover:text-brand-600 text-[11px] font-medium transition cursor-pointer">
                                    Add Payment
                                </a>
                                <a href="/tenants" class="flex flex-col items-center gap-2 p-3 rounded-xl bg-surface-50 hover:bg-brand-50 border border-surface-200 text-slate-500 hover:text-brand-600 text-[11px] font-medium transition cursor-pointer">
                                    Tenants
                                </a>
                                <a href="/properties" class="flex flex-col items-center gap-2 p-3 rounded-xl bg-surface-50 hover:bg-brand-50 border border-surface-200 text-slate-500 hover:text-brand-600 text-[11px] font-medium transition cursor-pointer">
                                    Properties
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="px-8 py-4 border-t border-surface-200 bg-white">
                <div class="flex items-center justify-between">
                    <p class="text-[11px] text-slate-400">LeaseConnect &copy; {{ date('Y') }} &mdash; Built by Robert &middot; Dashboard Module</p>
                    <p class="text-[11px] text-slate-300 font-mono">v1.0.0</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function updateDate() {
            const el = document.getElementById('live-date');
            if (!el) return;
            el.textContent = new Date().toLocaleDateString('en-KE', { day: '2-digit', month: 'short', year: 'numeric' });
        }
        updateDate();
        setInterval(updateDate, 60000);
    </script>
</body>
</html>