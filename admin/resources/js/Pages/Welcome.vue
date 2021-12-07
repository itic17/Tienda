<template>
    <front-layout title="Welcome">
        <template #content>
            <div id="content"
                 class="bg-center bg-cover bg-no-repeat h-screen items-center justify-center flex flex-col">
                <div id="moka-w1wgf" class="items-center justify-center w-full p-8 flex flex-col">
                    <div id="moka-ix3cs"
                         style="min-height: 40vh;"
                         class="bg-gray-400 items-center justify-center md:w-1/2 w-full shadow-md p-5 h-auto rounded-lg blur-3 bg-opacity-50 flex flex-col col-span-12">
                        <h1 style="color: #ffffff; font-size:3rem; font-weight: bold">TU MEJOR ESTILO</h1>
                    </div>
                </div>
            </div>
        </template>
    </front-layout>
</template>

<script>
import {defineComponent} from 'vue'
import FrontLayout from '@/Layouts/FrontLayout.vue'

export default defineComponent({
    components: {
        FrontLayout
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
})
</script>

