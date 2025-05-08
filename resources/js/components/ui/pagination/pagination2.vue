<script setup lang="ts">
import { Icon } from '@iconify/vue'
import { PaginationEllipsis, PaginationFirst, PaginationLast, PaginationList, PaginationListItem, PaginationNext, PaginationPrev, PaginationRoot } from 'reka-ui'
import { type PaginationComponentType, LinksType } from '@/types/Pagination';
import { ref, onMounted } from "vue";
import { ArrowLeft, ArrowRight } from 'lucide-vue-next';

interface props {
    pagination: PaginationComponentType,
}

const { pagination } = defineProps<props>();

const showLinks = ref<LinksType[]>([]);

const visibleLinks = () => {
    const side = pagination.on_each_side;
    const current = pagination.current_page;

    const pages = pagination.links.filter(link => !isNaN(Number(link.label)) && link.label !== '...');

    // Filter the pages based on the `onEachSide` range
    const visiblePages = pages.filter(link => {
        const page = Number(link.label);
        return page >= current - side && page <= current + side;
    });

    // Add ellipsis logic:
    const result = [];
    result.push(pagination.links[0]);

    // If the first visible page is far from the current page, add an ellipsis at the start
    if (visiblePages[0] && Number(visiblePages[0].label) > 1) {
        result.push({ url: null, label: '...', active: false });
    }

    // Add the visible pages to the result
    result.push(...visiblePages);

    // If the last visible page is far from the current page, add an ellipsis at the end
    if (visiblePages[visiblePages.length - 1] && Number(visiblePages[visiblePages.length - 1].label) < pagination.last_page) {
        result.push({ url: null, label: '...', active: false });
    }

    result.push(pagination.links[pagination.links.length - 1]);
    return result;
};

onMounted(() => {
    if (pagination.on_each_side) {
        showLinks.value = visibleLinks();
    } else {
        showLinks.value = pagination.links;
    }
})

</script>

<template>

    <div class="w-full py-5">
        <div class="w-fit mx-auto hidden md:block mt-10">
            <a v-for="link in showLinks" :href="link.url" class="p-2 border rounded-md mx-1" :class="[
                link.active ?
                    'bg-black/80 text-white dark:bg-white dark:border-white dark:text-black border-black'
                    : [
                        link.label === '...'
                            ? 'border-transparent'
                            : 'border-neutral-300 dark:border-white/50',
                        link.url ? 'hover:bg-black/10 dark:hover:bg-neutral-700' : ''
                    ],
            ]">
                <span class="min-w-5 text-center inline-block px-1" v-html="link.label" />
            </a>
        </div>
        <div class="w-full px-3 md:hidden flex">
            <a :href="pagination.prev_page_url" class="border border-black/12 dark:border-white/50 rounded-md p-2">
                <ArrowLeft />
            </a>
            <div class="p-2 flex-1 text-center"><span class="w-fit">Page {{ pagination.current_page }}</span>
            </div>
            <a :href="pagination.next_page_url" class="border border-black/12 dark:border-white/50 rounded-md p-2">
                <ArrowRight />
            </a>
        </div>
        <hr class="my-10">
        <div class="w-fit mx-auto px-3 md:hidden flex">
            <a :href="pagination.prev_page_url" class="border border-black/12 dark:border-white/50 rounded-md p-2">
                <ArrowLeft />
            </a>
            <div class="p-2 flex-1 text-center mx-4"><span class="w-fit">Page {{ pagination.current_page }}</span>
            </div>
            <a :href="pagination.next_page_url" class="border border-black/12 dark:border-white/50 rounded-md p-2">
                <ArrowRight />
            </a>
        </div>
        <hr class="my-10">
        <div class="w-fit mx-auto px-3 md:hidden flex">
            <a :href="pagination.prev_page_url" class="border border-black/22 dark:border-white/50 rounded-md p-2">
                <span class="px-3">Prev</span>
            </a>
            <div class="p-2 flex-1 text-center mx-4"><span class="w-fit">Page {{ pagination.current_page }}</span>
            </div>
            <a :href="pagination.next_page_url" class="border border-black/22 dark:border-white/50 rounded-md p-2">
                <span class="px-3">Next</span>
            </a>
        </div>
    </div>
</template>
