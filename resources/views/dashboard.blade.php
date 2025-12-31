<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-gray-800 leading-tight bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-pulse">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full blur-3xl animate-bounce"></div>
            <div class="absolute top-1/2 -left-40 w-96 h-96 bg-gradient-to-br from-pink-400/20 to-red-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 right-1/4 w-64 h-64 bg-gradient-to-br from-green-400/20 to-blue-400/20 rounded-full blur-3xl animate-bounce" style="animation-delay: 1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                <div class="bg-white border-2 border-blue-200 rounded-3xl p-8 shadow-2xl hover:shadow-3xl hover:scale-110 hover:rotate-1 transition-all duration-500 group relative overflow-hidden transform hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-cyan-500/10 to-teal-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full -mr-10 -mt-10 opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="relative z-10 flex items-center space-x-4">
                        <div class="p-4 bg-gradient-to-br from-blue-100 via-blue-200 to-cyan-200 rounded-2xl text-blue-700 group-hover:from-blue-500 group-hover:via-cyan-500 group-hover:to-teal-500 group-hover:text-white transition-all duration-700 shadow-lg group-hover:shadow-2xl group-hover:scale-110 animate-bounce">
                            <svg class="w-8 h-8 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-1 group-hover:text-blue-600 transition-colors duration-300">Total Ventes</p>
                            <p class="text-5xl font-black text-slate-900 group-hover:text-blue-700 transition-colors duration-300 animate-pulse">4</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-green-200 rounded-3xl p-8 shadow-2xl hover:shadow-3xl hover:scale-110 hover:-rotate-1 transition-all duration-500 group relative overflow-hidden transform hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/10 via-emerald-500/10 to-teal-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-400 rounded-full -mr-10 -mt-10 opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="relative z-10 flex items-center space-x-4">
                        <div class="p-4 bg-gradient-to-br from-green-100 via-green-200 to-emerald-200 rounded-2xl text-green-700 group-hover:from-green-500 group-hover:via-emerald-500 group-hover:to-teal-500 group-hover:text-white transition-all duration-700 shadow-lg group-hover:shadow-2xl group-hover:scale-110 animate-bounce" style="animation-delay: 0.2s;">
                            <svg class="w-8 h-8 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-1 group-hover:text-green-600 transition-colors duration-300">Revenu Total</p>
                            <p class="text-5xl font-black text-slate-900 group-hover:text-green-700 transition-colors duration-300 animate-pulse">67,116.00 <span class="text-2xl font-bold text-green-600 animate-bounce">DH</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-purple-200 rounded-3xl p-8 shadow-2xl hover:shadow-3xl hover:scale-110 hover:rotate-1 transition-all duration-500 group relative overflow-hidden transform hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 via-pink-500/10 to-rose-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full -mr-10 -mt-10 opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <div class="relative z-10 flex items-center space-x-4">
                        <div class="p-4 bg-gradient-to-br from-purple-100 via-purple-200 to-pink-200 rounded-2xl text-purple-700 group-hover:from-purple-500 group-hover:via-pink-500 group-hover:to-rose-500 group-hover:text-white transition-all duration-700 shadow-lg group-hover:shadow-2xl group-hover:scale-110 animate-bounce" style="animation-delay: 0.4s;">
                            <svg class="w-8 h-8 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-1 group-hover:text-purple-600 transition-colors duration-300">Stock</p>
                            <p class="text-5xl font-black text-slate-900 group-hover:text-purple-700 transition-colors duration-300 animate-pulse">2</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border-2 border-indigo-200 rounded-3xl p-8 shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-500 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 via-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute top-0 left-0 w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full -ml-8 -mt-8 opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center text-gray-800 font-bold text-xl group-hover:text-indigo-700 transition-colors duration-300">
                    <span class="w-5 h-5 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full mr-4 animate-ping shadow-lg"></span>
                    <span class="animate-pulse">{{ __("Système MiniStore opérationnel") }}</span>
                    <div class="ml-auto flex space-x-2">
                        <div class="w-3 h-3 bg-red-400 rounded-full animate-bounce"></div>
                        <div class="w-3 h-3 bg-yellow-400 rounded-full animate-bounce" style="animation-delay: 0.1s;"></div>
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>