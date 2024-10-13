<template>
    <Head title="Sports"/>
    <AppLayout>
        <template v-slot:default>
            <!-- Head -->
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">Palakasan</h1>
                <h1 class="text-sm font-normal text-gray-700">Description about Palakasan</h1>
            </div>
           <!-- Content -->
           <div class="mt-3 space-y-3">
                <!--Utility-->
                <div class="flex items-center justify-between">
                    <div class="flex p-1.5 bg-gray-100 rounded-lg ">
                        <button 
                            v-for="tab in tabs" 
                            :key="tab" 
                            @click="selectedTab = tab" 
                            :class="selectedTab === tab ? 'text-blue-700 bg-white border border-gray-300 rounded-md' : 'text-gray-500 border border-gray-100 rounded-lg hover:text-blue-700'" 
                            class="px-3 py-1.5 text-xs font-medium"
                        >
                            {{ tab }}
                        </button>
                    </div>
                    <div class="flex gap-2">
                        <button 
                            @click="openModal" 
                            :disabled="lastPalakasan && lastPalakasan.status" 
                            class="bg-blue-800 text-white py-2 px-3 rounded-lg text-sm font-medium shadow hover:bg-blue-800/90 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                        >
                            <i class="fa-solid fa-file-circle-plus mr-1"></i>
                            New                             
                        </button>
                        <button @click="openStatusModal" class="bg-white text-gray-800 py-2 px-3 rounded-lg text-sm font-medium shadow border border-gray-300 hover:bg-gray-100 transition-colors">
                            <i class="fa-solid fa-square-pen mr-2"></i>Status
                        </button>
                        <button class="bg-white text-gray-800 py-2 px-3 rounded-lg text-sm font-medium shadow border border-gray-300 hover:bg-gray-100 transition-colors">
                            <i class="fa-solid fa-book mr-2"></i>History
                        </button>

                    </div>

                </div>

                <!--Main content-->
                <!-- Tab Contents -->
                <div v-if="selectedTab === 'Details'">
                    <!--Deatils-->
                    <div v-if="lastPalakasan" class="grid grid-cols-5 gap-4">
                        <div class="col-span-3 bg-white rounded-lg border border-gray-300 shadow p-5">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="text-gray-800 font-bold text-2xl">Palakasan {{ lastPalakasan.year }}</h1>
                                    <span class="tagline text-gray-700 text-sm">{{ formatDateRange(lastPalakasan.startDate, lastPalakasan.endDate) }}</span>
                                </div>
                                <div>
                                    <span :class="lastPalakasan.status ? 'text-green-700 text-sm py-1 px-2.5 rounded-full bg-green-100' : 'text-red-700 text-sm py-1 px-2.5 rounded-full bg-red-100'">
                                        {{ lastPalakasan.status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                            <h1 class="text-gray-800 font-medium text-lg mt-4">{{ lastPalakasan.theme }}</h1>
                            <span class="tagline text-gray-700 text-sm">"{{ lastPalakasan.tagline }}"</span>
                            <article class="text-gray-700 text-sm text-justify">
                                {{ lastPalakasan.description }}
                            </article>

                            <div class="grid grid-cols-4 gap-3 mt-4">
                                <div>
                                    <a href="#" class="block max-w-sm p-4 bg-blue-50 rounded-lg hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                        <h5 class="mb-3 text-sm font-medium tracking-tight text-blue-800 dark:text-white">Sports </h5>
                                        <p class="font-semibold text-center text-2xl text-blue-700 dark:text-gray-400">0</p>
                                        <p class="mb-2 text-center text-xs text-blue-700 dark:text-gray-400">Total number <br> of sports</p>

                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="block max-w-sm p-4 bg-blue-50 rounded-lg hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                        <h5 class="mb-3 text-sm font-medium tracking-tight text-blue-800 dark:text-white">Teams </h5>
                                        <p class="font-semibold text-center text-2xl text-blue-700 dark:text-gray-400">0</p>
                                        <p class="mb-2 text-center text-xs text-blue-700 dark:text-gray-400">Total number <br> of teams</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="block max-w-sm h-full p-4 bg-blue-50 rounded-lg hover:bg-blue-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                        <h5 class="mb-3 text-sm font-medium tracking-tight text-blue-800 dark:text-white">Schedules </h5>
                                        <p class="font-semibold text-center text-2xl text-blue-700 dark:text-gray-400"><i class="fa-solid fa-file-lines"></i></p>
                                        <p class="mb-2 text-center text-xs text-blue-700 dark:text-gray-400 mt-3">List of Schedules</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="col-span-2  gap-4">
                            <div class="relative overflow-x-auto border border-gray-300 shadow rounded-lg p-4 h-full">
                                <h1 class="text-md font-medium text-gray-800 mb-3">Ranking</h1>
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100  rounded-lg dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                Team
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Rank
                                            </th>
                
                                        </tr>
                                    </thead>
                                    <tbody class="space-y-1">
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium rounded-s-lg text-gray-900 whitespace-nowrap dark:text-white">
                                                Team 1
                                            </th>
                                            <td class="px-6 py-4 rounded-e-lg">
                                                Silver
                                            </td>
                                        </tr>
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium rounded-s-lg text-gray-900 whitespace-nowrap dark:text-white">
                                                Team 1
                                            </th>
                                            <td class="px-6 py-4 rounded-e-lg">
                                                Silver
                                            </td>
                                        </tr>
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium rounded-s-lg text-gray-900 whitespace-nowrap dark:text-white">
                                                Team 1
                                            </th>
                                            <td class="px-6 py-4 rounded-e-lg">
                                                Silver
                                            </td>
                                        </tr>
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium rounded-s-lg text-gray-900 whitespace-nowrap dark:text-white">
                                                Team 1
                                            </th>
                                            <td class="px-6 py-4 rounded-e-lg">
                                                Silver
                                            </td>
                                        </tr>
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium rounded-s-lg text-gray-900 whitespace-nowrap dark:text-white">
                                                Team 1
                                            </th>
                                            <td class="px-6 py-4 rounded-e-lg">
                                                Silver
                                            </td>
                                        </tr>
        

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Teams-->
                <div v-if="selectedTab === 'Teams'">
                    <!--Content-->
                    <div class="mt-3 space-y-3">
                        <!--Utility-->
                        <div class="utility">
                            <div class="flex justify-between items-center">
                                <div class="search flex space-x-2 items-center">
                                    <!-- Search Input -->
                                    <div class="relative">
                                        <!-- Search Icon (Left) -->
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                            <i class="fas fa-search"></i>
                                        </span>

                                        <!-- Input Field -->
                                        <input
                                            v-model="searchQuery"
                                            type="text"
                                            placeholder="Search sport..."
                                            class="w-64 pl-10 pr-10 py-2 bg-white shadow-sm border border-gray-300 focus:border-blue-500 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                                        >

                                        <!-- Clear Button (Right) -->
                                        <button
                                            v-if="searchQuery"
                                            @click="clearSearch"
                                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200"
                                        >
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                </div>
                                <!--Buttons-->
                                <div class="flex items-center space-x-2.5">
                                    <button 
                                        @click="openAssignModal" 
                                        :disabled="lastPalakasan && lastPalakasan.status" 
                                        class="bg-blue-800 text-white py-2 px-3 rounded-lg text-sm font-medium shadow hover:bg-blue-800/90 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                                    >
                                        <i class="fa-solid fa-file-circle-plus mr-1"></i>
                                        Assign College                             
                                    </button>
                                    <Menu as="div" class="relative inline-block text-left">
                                            <MenuButton class="tooltip-btn inline-flex items-center justify-center w-full rounded-lg ring-1 ring-gray-300 shadow px-2.5 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50" data-tooltip="Sort">
                                            <i class="fa-solid fa-arrow-up-wide-short mr-2"></i>Sort                                 
                                            </MenuButton>
                                            <transition
                                            enter-active-class="transition ease-out duration-100"
                                            enter-from-class="transform opacity-0 scale-95"
                                            enter-to-class="transform opacity-100 scale-100"
                                            leave-active-class="transition ease-in duration-75"
                                            leave-from-class="transform opacity-100 scale-100"
                                            leave-to-class="transform opacity-0 scale-95"
                                            >
                                            <MenuItems class="origin-top-right absolute right-0 z-10 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1">
                                                <MenuItem v-slot="{ active }">
                                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                    Default
                                                    </a>
                                                </MenuItem>
                                                <MenuItem v-slot="{ active }">
                                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                    A-Z
                                                    </a>
                                                </MenuItem>
                                                <MenuItem v-slot="{ active }">
                                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                    Z-A
                                                    </a>
                                                </MenuItem>
                                                </div>
                                            </MenuItems>
                                            </transition>
                                    </Menu>
                                </div>
                            </div>
                        </div>

                        <!-- Main content -->
                        <div v-if="selectedTab === 'Teams'">
                                <!-- Content for Assigned Teams -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-2 gap-4">
                                    <div v-for="team in assignedTeams" :key="team.id" class="bg-white rounded-lg shadow hover:shadow-lg transition-all ring-1 ring-gray-300">
                                        <div class="p-4 relative">
                                            <div class="flex items-center justify-between mb-3">
                                                <h2 class="text-gray-800 text-2xl font-bold">{{ team.name }}</h2>
                                            </div>
                                            <p class="text-gray-600 text-sm mb-4">Assigned Colleges: {{ team.colleges.join(', ') }}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div v-if="selectedTab === 'Sports'">
                <!-- Sports Content -->
                <div>
                    <h1>Sports</h1>
                    <!-- Add Sports related content here -->
                </div>
                </div>

                <div v-if="selectedTab === 'Schedules'">
                <!-- Schedules Content -->
                <div>
                    <h1>Schedules</h1>
                    <!-- Add Schedules related content here -->
                </div>
                </div>
            </div>

            <!-- Modal for Add/Edit -->
            <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center z-50">
                <div class="fixed inset-0 bg-black bg-opacity-50" @click="closeModal"></div>
                <div class="bg-white p-6 rounded-xl shadow-lg z-50 max-w-xl w-full">
                    <h2 class="text-xl font-bold mb-4">New Palakasan</h2>
                    <form @submit.prevent="submitPalakasan">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm mb-1.5 font-medium">Year</label>
                            <input v-model="form.year" required type="number" min="2000" :max="new Date().getFullYear() + 10" class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm mb-1.5 font-medium">Theme</label>
                            <input v-model="form.theme" required placeholder="Enter the theme of the event..." type="text" class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm mb-1.5 font-medium">Tagline</label>
                            <input v-model="form.tagline" required placeholder="Enter the tagline..." type="text" class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2"/>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block mb-1.5 text-sm font-medium text-gray-700">Description</label>
                            <textarea v-model="form.description" id="description" rows="8" class="block p-2.5 transition w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter a brief description about the event..."></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-4">
                                <label for="start_date" class="block text-gray-700 text-sm mb-1.5 font-medium">Start Date</label>
                                <input v-model="form.startDate" id="start_date" type="date" required class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2"/>
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="block text-gray-700 text-sm mb-1.5 font-medium">End Date</label>
                                <input v-model="form.endDate" id="end_date" type="date" required class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2"/>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" @click="closeModal" class="mr-2 bg-gray-100 hover:bg-gray-200 px-4 py-2 text-sm rounded-lg transition">Cancel</button>
                            <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition relative">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal for Updating Status -->
            <div v-if="isStatusModalOpen" class="fixed inset-0 flex items-center justify-center z-50">
                <div class="fixed inset-0 bg-black bg-opacity-50" @click="closeStatusModal"></div>
                <div class="bg-white p-6 rounded-xl shadow-lg z-50 max-w-xl w-full">
                    <h2 class="text-xl font-bold mb-4">Update Palakasan Status</h2>
                    <form @submit.prevent="submitStatusUpdate">
                        <div>
                            <label class="block text-gray-700 text-sm mb-1.5 font-medium">Status</label>
                            <select v-model="form.status" class="border transition border-gray-300 rounded-lg bg-gray-50 text-sm w-full p-2">
                                <option :value="true">Enabled</option>
                                <option :value="false">Disabled</option>
                            </select>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" @click="closeStatusModal" class="mr-2 bg-gray-100 hover:bg-gray-200 px-4 py-2 text-sm rounded-lg transition">Cancel</button>
                            <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </template>
    </AppLayout>
</template>

 
<script setup>
    import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import { ChevronDownIcon } from '@heroicons/vue/20/solid'
    import { Head } from '@inertiajs/vue3';
    import { Link, usePage, useForm } from '@inertiajs/vue3';
    import { Inertia } from '@inertiajs/inertia';
    import { ref, onMounted, reactive, computed, watch } from 'vue';
    import AppLayout from '@/Layout/DashboardLayout.vue';


    const props = defineProps({
  lastPalakasan: Object,
  flash: Object,
});

// Tab labels
const tabs = ['Details', 'Teams', 'Sports', 'Schedules'];
const selectedTab = ref('Details');

const lastPalakasan = ref(props.lastPalakasan);
const isModalOpen = ref(false);

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    form.reset();
};

const form = useForm({
    year: new Date().getFullYear(),
    theme: '',
    tagline: '',
    startDate: '',
    endDate: '',
    description: '',
    status: true,
});

const submitPalakasan = () => {
    form.post(route('palakasan.store'), {
        preserveState: false,
        preserveScroll: true,
        onSuccess: (response) => {
            // Update the local state directly without reloading the page
            lastPalakasan.value = response.props.lastPalakasan; // Assuming the response contains the lastPalakasan
            closeModal();
        },
        onError: (errors) => {
            console.error('Validation errors:', errors);
        }
    });
};

const formatDateRange = (start, end) => {
    const startDate = new Date(start);
    const endDate = new Date(end);
    const options = { month: 'long', day: 'numeric' };
    return `${startDate.toLocaleDateString('en-US', options)} - ${endDate.toLocaleDateString('en-US', options)}`;
};
const isStatusModalOpen = ref(false);

const openStatusModal = () => {
    isStatusModalOpen.value = true;
};

const closeStatusModal = () => {
    isStatusModalOpen.value = false;
    form.status = lastPalakasan.value.status; // Reset to the current status
};

const submitStatusUpdate = () => {
    form.put(route('palakasan.update', lastPalakasan.value.id), {
        onSuccess: () => {
            lastPalakasan.value.status = form.status; // Update the status locally
            closeStatusModal();
        },
        onError: (errors) => {
            console.error('Update errors:', errors);
        }
    });
};
 </script>
 
 <style scoped>
    /* Home page specific styles */
 </style>
 