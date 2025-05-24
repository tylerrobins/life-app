<script setup lang="ts">
import { ref, computed, withDefaults } from 'vue'
import { ComboboxAnchor, ComboboxContent, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxItemIndicator, ComboboxLabel, ComboboxRoot, ComboboxTrigger, ComboboxViewport } from 'reka-ui'
import { Icon } from '@iconify/vue'
import { useVModel } from '@vueuse/core'
import { cn } from '@/lib/utils'

interface Props {
    defaultValue?: string | number
    modelValue?: string | number
    disabled?: boolean
    options: string[]
}

const props = withDefaults(defineProps<Props>(), { disabled: false })

const emits = defineEmits<{
    (e: 'update:modelValue', payload: string | number): void
}>()

const modelValue = useVModel(props, 'modelValue', emits, {
    passive: true,
    defaultValue: props.defaultValue,
})

const isFocused = ref(false)

// Add this for debugging
console.log('disabled prop:', props.disabled)
console.log('typeof disabled:', typeof props.disabled)

</script>

<template>
    <ComboboxRoot v-model="modelValue" v-bind:disabled="props.disabled === true ? true : undefined"
        class="relative w-fit outline-none focus:outline-none focus:ring-0 focus:shadow-none"
        @focus="e => isFocused = e.target.matches(':focus-visible')" @blur="isFocused = false">
        <ComboboxAnchor class=""
            :class="cn(
                isFocused ? 'border-ring ring-ring/50 ring-[3px]' : '',
                props.disabled ? 'hover:bg-none' : 'hover:bg-neutral-50 dark:hover:bg-input/50'),
                'inline-flex items-center justify-between pl-[15px] text-[13px] leading-none h-[35px] gap-[5px] focus:shadow-[0_0_0_2px] outline-none rounded-md border bg-transparent dark:bg-input/30 shadow-xs'">
            <ComboboxInput :class="props.disabled ? 'text-neutral-400 dark:text-neutral-600' : ''"
                @focus="isFocused = true" @blur="isFocused = false" class="outline-none h-full"
                placeholder="Placeholder..." />
            <ComboboxTrigger class="px-[15px]">
                <Icon icon="radix-icons:chevron-down"
                    :class="cn(props.disabled && 'text-neutral-300 dark:text-neutral-700', 'h-4 w-4')" />
            </ComboboxTrigger>
        </ComboboxAnchor>

        <ComboboxContent
            class="absolute z-10 mt-2 min-w-[200px] bg-white dark:bg-neutral-900 overflow-hidden rounded shadow-[0px_10px_38px_-10px_rgba(22,_23,_24,_0.35),_0px_10px_20px_-15px_rgba(22,_23,_24,_0.2)] will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade"
            )>
            <ComboboxViewport class="p-[5px]">
                <ComboboxEmpty class="text-xs font-medium text-center py-2" />

                <ComboboxGroup>
                    <ComboboxItem v-for="(option, index) in options" :key="index"
                        class="text-[13px] leading-none rounded-[3px] flex items-center h-[25px] pr-[35px] pl-[25px] relative select-none data-[highlighted]:outline-none data-[highlighted]:bg-neutral-200 dark:data-[highlighted]:bg-neutral-600"
                        :value="option">
                        <ComboboxItemIndicator class="absolute left-0 w-[25px] inline-flex items-center justify-center">
                            <Icon icon="radix-icons:check" />
                        </ComboboxItemIndicator>
                        <span>
                            {{ option }}
                        </span>
                    </ComboboxItem>
                </ComboboxGroup>
            </ComboboxViewport>
        </ComboboxContent>
    </ComboboxRoot>
</template>
