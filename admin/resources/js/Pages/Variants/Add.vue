<template>
    <div>
        <jet-dialog-modal :show="showModal" @close="closeModal">
            <template #title>
                Nueva Variante
            </template>

            <template #content>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="name" value="Name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="name"
                                type="text"
                                :class="[$page.props.errors.name ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.name"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.name">{{ $page.props.errors.name }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="description" value="Description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <textarea v-model="form.description"
                                      :class="[$page.props.errors.description ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                      name="description" rows="5" cols="50"></textarea>
                            <div class="text-red-500" v-if="$page.props.errors.description">{{ $page.props.errors.description }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2 mt-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="product" value="Producto" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="product"
                                type="number"
                                :class="[$page.props.errors.product ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.product"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.product">{{ $page.props.errors.product }}</div>
                        </div>
                    </div>
                </form>
            </template>

            <template #footer>
                <jet-secondary-button v-on:click="closeModal">
                    Cancelar
                </jet-secondary-button>

                <jet-button
                    class="ml-2"
                    v-on:click="proceedToSave"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Crear
                </jet-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>

import { isEmpty } from 'lodash'
import JetInput from "@/Jetstream/Input"
import JetLabel from "@/Jetstream/Label"
import JetButton from '@/Jetstream/Button'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        JetButton,
        JetInput,
        JetLabel,
        JetDialogModal,
        JetSecondaryButton
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                description: '',
                product: ''
            }),
        }
    },
    props: {
        showModal:{
            type: Boolean,
            required: true,
        }
    },
    methods: {
        closeModal(){
            this.$emit('closeModal')
        },
        proceedToSave(){
            this.form.post(route('variant.add'), {
                preserveScroll: true,
                onSuccess: () => this.closeModal()
            })
        }
    }
}

</script>
