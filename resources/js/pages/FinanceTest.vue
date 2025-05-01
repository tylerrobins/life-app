<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { type Transaction } from '@/types/transactions';
import { type PaginationType } from '@/types/pagination';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { Pagination } from '@/components/ui/pagination';

interface Props {
    paginated_transactions: PaginationType<Transaction>;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Finance',
        href: '/finance',
    },
];
</script>

<template>

    <Head title="Test Finance" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <div class="relative overflow-x-auto rounded">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Category</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="transaction in paginated_transactions.data" :key="transaction.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td class="px-6 py-4">
                                    {{ new Date(transaction.date).toLocaleDateString() }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ transaction.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ transaction.category?.name || '—' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ transaction.category?.type || '—' }}
                                </td>
                                <td class="px-6 py-4">
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
                <Pagination :per_page="paginated_transactions.per_page" :total="paginated_transactions.total"
                    :current_page="paginated_transactions.current_page" :links="paginated_transactions.links"
                    buttonStyle="button" />
            </div>
        </div>
    </AppLayout>
</template>
