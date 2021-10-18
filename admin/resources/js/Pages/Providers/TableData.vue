<template>
    <div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Teléfono
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                E-mail
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Dirección
            </th>
            <th scope="col" class="relative px-4 py-3">
                <span class="sr-only">Editar</span>
            </th>
            <th scope="col" class="relative px-4 py-3">
                <span class="sr-only">Remover</span>
            </th>
            </thead>
            <tbody>
            <tr v-for="(provider, key) in providers" :key="key">
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{provider.name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{provider.phone}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{provider.email}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{provider.address}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button v-on:click="showEditModal(provider)" class="bg-transparent hover:bg-indigo-500 text-indigo-700 font-semibold hover:text-white py-2 px-4 border border-indigo-500 hover:border-transparent rounded">
                        Editar
                    </button>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button v-on:click="deleteProduct(provider)" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                        Eliminar
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    methods: {
        showDetails(provider){
            this.$emit('showDetails', provider)
        },
        deleteProduct(provider){
            this.$emit('delete', provider)
        },
        showEditModal(provider){
            this.$emit('showEditModal', provider)
        }
    },
    props: {
        providers: Object,
    }
}
</script>
