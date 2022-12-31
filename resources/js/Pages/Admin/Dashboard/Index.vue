<template>
    <Head>
        <title>Dashboard - Aplikasi Ujian Online</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <h1>Haii</h1>
        <div class="row">

        </div>
    </div>
</template>

<script>
    //import layout Admin
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    //import Header from Inertia
    import {
        Head,
    } from '@inertiajs/inertia-vue3';

    export default {

        //layout
        layout: LayoutAdmin,

        //register components
        components: {
            Head
        },

        //props
        props: {
            cubers_count: Number,
            reports_count: Number,
            course_students_count: Number,
            course_revenue: Number
        }

    }

</script>

<style>

</style>