<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ComboBox } from '@/components/ui/combobox';
import { LoaderCircle } from 'lucide-vue-next';
import { computed } from 'vue'

interface category {
    name: string
    type: string
    updated_at: date
}

interface Props {
    types: string[]
    categories: category[]
}

const { types, categories } = defineProps<Props>();

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

const form = useForm({
    type: '',
    category: '',
    period: '',
    amount: '',
});

const submit = () => {
    form.post(route('budget.store'));
};

const periods = ['Daily', 'Weekly', 'Fortnightly', 'Monthly', 'Quarterly', 'Bi-annually', 'Annually', 'Custom'];

const isTypeSelected = computed(() => form.type !== '');
const filteredCategories = computed(() => {
    return categories
        .filter((cat) => cat.type === form.type)
        .map((cat) => cat.name)
})

</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 gap-4 rounded-xl p-4">
            <div
                class="relative min-h-[100vh] flex-1/2 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                <h1 class="text-xl font-bold mb-5">Add Budget</h1>
                <form @submit.prevent="submit" class="flex flex-col gap-6">
                    <div class="grid gap-6">
                        <div class="grid gap-2">
                            <Label for="type">Type</Label>
                            <ComboBox v-model="form.type" autofocus :tabindex="1" :options="types" />
                            <InputError :message="form.errors.type" />
                        </div>

                        <div class="grid gap-2">
                            <Label :class="isTypeSelected ? '' : 'text-neutral-300 dark:text-neutral-700'"
                                for="category">Category</Label>
                            <ComboBox v-model="form.category" autofocus :tabindex="2" :options="filteredCategories"
                                :disabled="!isTypeSelected" />
                            <InputError :message="form.errors.category" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="period">Period</Label>
                            <ComboBox v-model="form.period" autofocus :tabindex="3" :options="periods" />
                            <InputError :message="form.errors.period" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="amount">Budget Amount</Label>
                            <Input id="amount" type="text" required :tabindex="4" v-model="form.amount"
                                placeholder="$ 450.00" />
                            <InputError :message="form.errors.amount" />
                        </div>

                        <Button type="submit" class="mt-2 w-fit" tabindex="6" :disabled="form.processing">
                            <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                            Create account
                        </Button>
                    </div>
                </form>
            </div>
            <div class="relative min-h-[100vh] flex-1/2 rounded-xl md:min-h-min">
                <div class="flex flex-col gap-4">
                    <div
                        class="relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                        <h1 class="text-xl font-bold">Budgets</h1>
                        <h2>Categories</h2>
                        <div v-for="category in categories">
                            <p>{{ category.name }}</p>
                        </div>
                    </div>
                    <div
                        class="relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                        <h1 class="text-xl font-bold">Budgets</h1>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
