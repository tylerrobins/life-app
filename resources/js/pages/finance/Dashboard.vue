<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Finance',
        href: '/finance',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-auto rounded-xl border border-sidebar-border/70 dark:border-sidebar-border py-6 px-8">
                    <div class="flex flex-col space-y-2 xl:grid xl:grid-cols-2 xl:gap-2 xl:space-y-0">
                        <Link :href="route('finance.index')"
                            class="h-fit hover:bg-white/20 border border-white p-2 rounded">
                        View
                        Transactions
                        </Link>
                        <Link :href="route('finance.create')"
                            class="h-fit hover:bg-white/20 border border-white p-2 rounded">
                        Add
                        Transaction</Link>
                        <Link :href="route('budget.index')"
                            class="h-fit hover:bg-white/20 border border-white p-2 rounded">
                        Budget
                        </Link>
                    </div>
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
