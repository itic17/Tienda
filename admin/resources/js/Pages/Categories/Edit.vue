<template>
    <div>
        <jet-dialog-modal :show="showModal" @close="closeModal">
            <template #title>
                Editar Categoría
            </template>

            <template #content>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="name" value="Name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="name"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.name"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="description" value="Description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <textarea v-model="form.description" class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="description" rows="5" cols="50"></textarea>
                            <p class="text-gray-600 text-xs italic">Coloque la descripción del producto</p>
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
                    Guardar Cambios
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
            form: {},
            showModal: false
        }
    },
    props: {
        category:{
            type: Object,
            required: true,
        }
    },
    methods: {
        closeModal(){
            this.showModal = false
            this.$emit('closeModal')
        },
        proceedToSave(){
            this.form.post(route('category.edit', {
                category: this.category.id
            }), {
                preserveScroll: true,
                onSuccess: () => this.closeModal()
            })
        }
    },
    watch: {
        category: function(n, o){
            if( ! isEmpty(n) ){

                this.form = this.$inertia.form({
                    name: this.category.name,
                    description: this.category.description

                })

                this.showModal = true
            }
        }
    }
}

</script>
