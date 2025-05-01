<script setup lang="ts">
import { Icon } from '@iconify/vue'
import { PaginationEllipsis, PaginationFirst, PaginationLast, PaginationList, PaginationListItem, PaginationNext, PaginationPrev, PaginationRoot } from 'reka-ui'
import { ref } from "vue";
import { type LinksType } from '@/types/Pagination';

interface Props {
    links: LinksType[],
    total: number,
    per_page: number,
    current_page: number,
    buttonStyle?: string
}

const props = withDefaults(
    defineProps<Props>(),
    {
        buttonStyle: 'icons'
    }
);
</script>

<template>
    <div class="w-full py-5">
        <p>{{ current_page }}</p>
        <div class="w-fit mx-auto">
            <PaginationRoot :total="total" :sibling-count="1" :items-per-page="per_page" show-edges :default-page="1"
                :page="current_page">
                <PaginationList v-slot="{ items }" class="flex items-center gap-1 text-stone-700 dark:text-white">
                    <PaginationFirst
                        class="h-9 flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg"
                        :class="buttonStyle === 'button' ? 'w-fit' : 'w-9'">
                        <button v-if="buttonStyle === 'button'" class="px-3 py-1">First</button>
                        <Icon v-else icon="radix-icons:double-arrow-left" />
                    </PaginationFirst>
                    <PaginationPrev
                        class="h-9 flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg"
                        :class="buttonStyle === 'button' ? 'w-fit mr-2' : 'w-9'">
                        <button v-if="buttonStyle === 'button'" class="px-3 py-1">Prev</button>
                        <Icon v-else icon="radix-icons:chevron-left" />
                    </PaginationPrev>
                    <template v-for="(page, index) in items">
                        <PaginationListItem v-if="page.type === 'page'" :key="index"
                            class="w-9 h-9 border dark:border-stone-800 rounded-lg bg-gray-100 dark:bg-transparent data-[selected]:!bg-white data-[selected]:shadow-sm dark:data-[selected]:text-black hover:bg-white dark:hover:bg-stone-700/70 transition"
                            :value="page.value">
                            {{ page.value }}
                        </PaginationListItem>
                        <PaginationEllipsis v-else :key="page.type" :index="index"
                            class="w-9 h-9 flex items-center justify-center">
                            &#8230;
                        </PaginationEllipsis>
                    </template>
                    <PaginationNext
                        class="h-9 flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg"
                        :class="buttonStyle === 'button' ? 'w-fit ml-2' : 'w-9'">
                        <button v-if="buttonStyle === 'button'" class="px-3 py-1">Next</button>
                        <Icon v-else icon="radix-icons:chevron-right" />
                    </PaginationNext>
                    <PaginationLast
                        class="h-9  flex items-center justify-center bg-transparent hover:bg-white dark:hover:bg-stone-700/70 transition disabled:opacity-50 rounded-lg"
                        :class="buttonStyle === 'button' ? 'w-fit' : 'w-9'">
                        <button v-if="buttonStyle === 'button'" class="px-3 py-1">Last</button>
                        <Icon v-else icon="radix-icons:double-arrow-right" />
                    </PaginationLast>
                </PaginationList>
            </PaginationRoot>
        </div>
    </div>
</template>
