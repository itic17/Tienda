<template>
    <div>
        <jet-dialog-modal :show="showModal" @close="closeModal">
            <template #title>
                Editar Proveedor
            </template>

            <template #content>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="name" value="Nombre" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
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
                            <jet-label for="phone" value="Teléfono" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="phone"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.phone"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="email" value="Correo Electrónico" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="email"
                                type="mail"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.email"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="address" value="Dirección" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="address"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.address"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <!--
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
                    -->
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
        provider:{
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
            this.form.post(route('provider.edit', {
                provider: this.provider.id
            }), {
                preserveScroll: true,
                onSuccess: () => this.closeModal()
            })
        }
    },
    watch: {
        provider: function(n, o){
            if( ! isEmpty(n) ){

                this.form = this.$inertia.form({
                    name: this.provider.name,
                    phone: this.provider.phone,
                    email: this.provider.email,
                    address: this.provider.address
                })

                this.showModal = true
            }
        }
    }
}

</script>
