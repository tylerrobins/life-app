<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Finance',
        href: '/finance',
    },
    {
        title: 'Budget',
        href: '/finance/budget'
    },
    {
        title: 'Add',
        href: '/finance/budget/add'
    }
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1/2 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                <!--  <PlaceholderPattern /> -->
                <h1 class="text-xl font-bold">Add Budget</h1>
            </div>
            <div class="relative min-h-[100vh] flex-1/2 rounded-xl md:min-h-min">
                <!--  <PlaceholderPattern /> -->
                <div class="flex flex-col gap-4">
                    <div
                        class="relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                        <!--  <PlaceholderPattern /> -->
                        <h1 class="text-xl font-bold">Budgets</h1>
                    </div>
                    <div
                        class="relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                        <!--  <PlaceholderPattern /> -->
                        <h1 class="text-xl font-bold">Budgets</h1>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
