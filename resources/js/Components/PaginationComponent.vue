<template>
    <nav>
        <ul class="flex md:flex-row flex-col md:justify-between items-center mb-0 mt-4">
        <p class="text-gray-500 dark:text-gray-400 text-sm md:mb-0 mb-3">Results: {{ data.from }} - {{ data.to }} of {{ data.total }}</p>
        <div class="flex">
            <li class="nav-item"
                v-for="(link, index) in data.links" :key="index">
                <Link 
                    v-if="index === 0"
                    class="nav-link text-xs" 
                    :href="link.url === null ? '#' : link.url"
                    >
                    <i class="fa-solid fa-chevron-left" :class="link.url === null ? 'text-gray-400 cursor-default dark:text-gray-600' : 'dark:text-gray-400'"></i>
                </Link>
            </li>
            <li :class="[
                    'page-item', 
                    link.url == null ? 'disabled' : '',
                    link.active ? 'active' : '',
                ]" 
                v-for="(link, index) in data.links" :key="index">
                <Link 
                    v-if="index !== 0 && index !== data.links.length - 1"
                    class="page-link text-md dark:text-gray-400" 
                    :href="link.url === null ? '#' : link.url" 
                    v-html="link.label">
                </Link>
            </li>
            <li class="nav-item" 
                v-for="(link, index) in data.links" :key="index">
                <Link 
                    v-if="index === data.links.length - 1"
                    class="nav-link text-xs" 
                    :href="link.url === null ? '#' : link.url"
                    >
                    <i class="fa-solid fa-chevron-right" :class="link.url === null ? 'text-gray-400 cursor-default dark:text-gray-600' : 'dark:text-gray-400'"></i>
                </Link>
            </li>
        </div>
        </ul>
    </nav>
</template>

<script>

    //import Link
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        props: {
            data: Object,
        },

        components: {
            Link,
        },
    }
</script>

<style>
.page-item .page-link,
.nav-item .nav-link {
    @apply transition duration-300 px-1 py-1 mx-0.5 sm:px-2 sm:py-[2px] sm:mx-0.5;
}

.page-item .page-link:hover {
    @apply bg-fourth-color/30 rounded text-secondary-color; 
}

.page-item.active .page-link {
    @apply bg-fourth-color/30 rounded border border-secondary-color/60 text-secondary-color;
}

html.dark .page-item .page-link:hover {
    @apply bg-fourth-color/30 rounded text-gray-300; 
}

html.dark .page-item.active .page-link {
    @apply bg-fourth-color/30 rounded border-0 text-gray-300;
}
</style>