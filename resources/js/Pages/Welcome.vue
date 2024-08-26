<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative min-h-screen overflow-hidden bg-gray-50 dark:bg-black">
        <img
            src="/p2.avif"
            alt="Image description"
            class="absolute inset-0 object-cover w-full h-full"
        />
        <div class="relative flex flex-col min-h-screen">
            <header class="fixed top-0 left-0 right-0 bg-transparent py-4 px-6 z-10 flex justify-between items-center">
                <div></div> <!-- Empty div for spacing -->
                <nav>
                    <Link
                        :href="route('login')"
                        class="inline-flex items-center px-4 py-2 text-white bg-gradient-to-r from-blue-500 to-teal-500 rounded-full shadow-md transition-transform transform hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400 dark:from-blue-600 dark:to-teal-600"
                    >
                        Connexion
                    </Link>
                </nav>
            </header>

            <main class="flex-1 pt-16">
                <!-- Main content here -->
            </main>
        </div>
    </div>
</template>
