<template>
    <div>
        <jet-dialog-modal :show="showConfirm" @close="closeConfirm">
            <template #title>
                Eliminar Proveedor
            </template>

            <template #content>
                ¿Estas seguro que quieres eliminar el proveedor: <strong>{{provider.name}}</strong>?
            </template>

            <template #footer>
                <jet-secondary-button v-on:click="closeConfirm">
                    Cancelar
                </jet-secondary-button>

                <jet-button
                    class="ml-2"
                    v-on:click="proceedToDelete"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    ELiminar
                </jet-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>

import { isEmpty } from 'lodash'
import JetButton from '@/Jetstream/Button'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        isEmpty,
        JetButton,
        JetDialogModal,
        JetSecondaryButton
    },
    data() {
        return {
            showConfirm: false,
            form: this.$inertia.form()
        }
    },
    props: {
        provider: {
            type: Object,
            required: true
        }
    },
    methods: {
        closeConfirm(){
            this.showConfirm = false
            this.$emit('closeConfirm')
        },
        proceedToDelete(){
            this.form.post(route('provider.delete', {
                provider: this.provider.id
            }), {
                preserveScroll: true,
                onSuccess: () => this.closeConfirm()
            })
        }
    },
    watch: {
        provider: function(n, o){
            if( ! isEmpty(n) ){
                this.showConfirm = true
            }
        }
    }
}

</script>
