<template>
    <div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre
            </th>
            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Descripcion
            </th>
            <th scope="col" class="relative px-4 py-3">
                <span class="sr-only">Edit</span>
            </th>
            <th scope="col" class="relative px-4 py-3">
                <span class="sr-only">Remove</span>
            </th>
            </thead>
            <tbody>
            <tr v-for="(category, key) in categories" :key="key">
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{category.name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 w-64 truncate ...">{{ category.description }}</div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button v-on:click="showEditModal(category)" class="bg-transparent hover:bg-indigo-500 text-indigo-700 font-semibold hover:text-white py-2 px-4 border border-indigo-500 hover:border-transparent rounded">
                        Editar
                    </button>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button v-on:click="deleteProduct(category)" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
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
        deleteProduct(product){
            this.$emit('delete', product)
        },
        showEditModal(product){
            this.$emit('showEditModal', product)
        }
    },
    props: {
        categories: Object,
    }
}
</script>
