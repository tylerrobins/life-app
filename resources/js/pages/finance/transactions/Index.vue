<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { type Transaction } from '@/types/transactions';
import { type PaginationType, PaginationComponentType } from '@/types/pagination';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { Pagination } from '@/components/ui/pagination';

interface Props {
    paginated_transactions: PaginationType<Transaction>;
}

const { paginated_transactions } = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Finance',
        href: '/finance',
    },
    {
        title: 'Transactions',
        href: '/finance/transactions',
    },
];

const pagination: PaginationComponentType = {
    per_page: paginated_transactions.per_page,
    total: paginated_transactions.total,
    current_page: paginated_transactions.current_page,
    links: paginated_transactions.links,
    last_page: paginated_transactions.last_page,
    next_page_url: paginated_transactions.next_page_url,
    prev_page_url: paginated_transactions.prev_page_url,
}

</script>

<template>

    <Head title="Finance" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col-reverse  xl:flex-row gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="relative overflow-x-auto rounded">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-neutral-300 overflow-y-scroll">
                        <thead
                            class="text-sm text-gray-700 uppercase bg-stone-200 dark:bg-stone-700 dark:text-neutral-200">
                            <tr>
                                <th scope="col" class="px-2 sm:px-6 py-3">Date</th>
                                <th scope="col" class="px-2 sm:px-6 py-3">Name</th>
                                <th scope="col" class="px-2 sm:px-6 py-3 hidden sm:table-cell">Category</th>
                                <th scope="col" class="px-2 sm:px-6 py-3">Type</th>
                                <th scope="col" class="pl-1 pr-2 sm:px-6 py-3 ">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="transaction in paginated_transactions.data" :key="transaction.id"
                                class="bg-stone-50 border-b dark:bg-stone-900 dark:border-neutral-700 border-gray-200">
                                <td class="pl-2 pr-0.5 sm:px-6 py-2 sm:py-2">
                                    <span class="block sm:hidden whitespace-nowrap">
                                        {{ new Date(transaction.date).toLocaleDateString('en-GB', {
                                            day: '2-digit',
                                            month: 'long',
                                        }) }}
                                        <br>
                                        {{ new Date(transaction.date).getFullYear() }}
                                    </span>
                                    <span class="hidden sm:inline">
                                        {{ new Date(transaction.date).toLocaleDateString() }}
                                    </span>
                                </td>
                                <th scope="row"
                                    class="px-0.5 sm:px-6 py-2 sm:py-2 text-gray-900 sm:whitespace-nowrap dark:text-white/85 sm:dark:text-white">
                                    {{ transaction.name }}
                                </th>
                                <td class="px-0.5 sm:px-6 py-2 sm:py-2 hidden sm:table-cell">
                                    {{ transaction.category?.name || '—' }}
                                </td>
                                <td class="px-0.5 sm:px-6 py-2 sm:py-2">
                                    {{ transaction.category?.type || '—' }}
                                </td>
                                <td class="pl-1 pr-2 sm:px-6 py-2 sm:py-3">
                                    <div class="flex">
                                        <span class="flex-1">
                                            $
                                        </span>
                                        <span class="pr-1">
                                            {{ (transaction.amount / 100).toFixed(2) }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination :pagination="pagination" />
            </div>
            <div
                class="relative min-h-[100vh] rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min space-y-2 p-4">
                <Link :href="route('transaction.create')"
                    class="border block py-2 px-4 rounded cursor-pointer drop-shadow-sx border-black/20 dark:border-white dark:hover:bg-white/20">
                Add
                <span class="hidden sm:inline-block">Transaction</span></Link>
                <div class="border border-white rounded w-52 p-2">Filter 1</div>
                <div class="border border-white rounded w-52 p-2">Filter 2</div>
                <div class="border border-white rounded w-52 p-2">Filter 3</div>
            </div>
        </div>
    </AppLayout>
</template>
