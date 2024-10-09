<template>
    <div>
        <!-- Navbar -->
        <nav class="bg-blue-800 fixed top-0 left-0 right-0 z-50">
            <div class="px-6">
                <div class="flex justify-between h-16">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-semibold text-white">SPIS</span>
                    </div>
                    <div class="ml-3 relative flex items-center">
                        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" class="w-10 h-10 rounded-full object-cover cursor-pointer" src='https://via.placeholder.com/40' alt="User dropdown">
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex pt-16">
            <!-- Sidebar -->
            <aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-white border-e border-gray-200 shadow pt-16">
                <div class="h-full px-5 py-4 overflow-y-auto space-y-2">
                    <span class="text-xs text-gray-800 font-medium">Menu</span>
                    <ul class="space-y-2" style="margin-bottom: 6px;">
                        <li>
                            <Link 
                                href="/" 
                                class="flex items-center py-2 px-3 text-md rounded-lg transition-all"
                                :class="{'bg-blue-800 text-white': currentRoute === '/', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/'}"
                            >
                                <i class="fa-solid fa-square-poll-horizontal"></i>
                                <span class="ms-3">Dashboard</span>
                            </Link>
                        </li>
                    </ul>
                    <span class="text-xs text-gray-800 font-medium">Setup</span>
                    <ul class="space-y-2">
                        <li>
                            <Link 
                                href="/sport" 
                                class="flex items-center py-2 px-3 text-md rounded-lg mb-2"
                                :class="{'bg-blue-800 text-white': currentRoute === '/sport', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/sport'}"
                            >
                                <i class="fa-solid fa-basketball"></i>
                                <span class="ms-3">Sports</span>
                            </Link>
                            <Link 
                                href="/points" 
                                class="flex items-center py-2 px-3 text-md rounded-lg mb-2"
                                :class="{'bg-blue-800 text-white': currentRoute === '/points', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/points'}"
                            >
                                <i class="fa-solid fa-flag"></i>
                                <span class="ms-3">Points</span>
                            </Link>
                            <Link 
                                href="/venue" 
                                class="flex items-center py-2 px-3 text-md rounded-lg mb-2"
                                :class="{'bg-blue-800 text-white': currentRoute === '/venue', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/venue'}"
                            >
                                <i class="fa-solid fa-map-location-dot"></i>
                                <span class="ms-3">Venue</span>
                            </Link>
                            <Link 
                                href="/college" 
                                class="flex items-center py-2 px-3 text-md rounded-lg mb-2"
                                :class="{'bg-blue-800 text-white': currentRoute === '/college', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/college'}"
                            >
                                <i class="fa-solid fa-museum"></i>
                                <span class="ms-3">College</span>
                            </Link>
                        </li>
                    </ul>
                    <span class="text-xs text-gray-800 font-medium">Main</span>
                    <ul class="space-y-2" style="margin-bottom: 6px;">
                        <li>
                            <Link 
                                href="/palakasan" 
                                class="flex items-center py-2 px-3 text-md rounded-lg transition-all"
                                :class="{'bg-blue-800 text-white': currentRoute === '/palakasan', 'text-gray-700 hover:bg-blue-100 hover:text-blue-600': currentRoute !== '/palakasan'}"
                            >
                                <i class="fa-solid fa-square-poll-horizontal"></i>
                                <span class="ms-3">Palakasan</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main content -->
            <div class="flex-1 p-5 main-content">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const { url: currentRoute } = usePage();
</script>

<style scoped>
.main-content {
    margin-left: 256px;
}

</style>
