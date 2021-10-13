<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Products
                </h2>
                <button
                    v-on:click="showModalAddCategory()"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-sm">
                    Agregar Categoria
                </button>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-data
                        :categories="categories.data"
                        @delete="deleteProduct"
                        @showEditModal="showEditModalEvent" />

                    <div class="p-3">
                        <pagination class="mt-6" :links="categories.links" />
                    </div>
                </div>
            </div>
        </div>

        <details-modal :product="productSelected" @closeModal="closeModal"/>
        <delete-action :product="productSelectedDelete" @closeConfirm="closeConfirm"/>
        <edit-action :product="productSelectedEdit" @closeModal="closeEditModalEvent" />
        <add-product :showModal="showModalAddProductVar" @closeModal="closeModalAddProduct" />

    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'
import TableData from './TableData'
import Pagination from '@/Components/Pagination'
import DeleteAction from './Delete'
import EditAction from './Edit'
import JetDropdown from '@/Jetstream/Dropdown'
import AddCategory from "./Add";

export default {
    data() {
        return {
            productSelected: {},
            productSelectedDelete: {},
            productSelectedEdit: {},
            showEditModal: false,
            showModalAddProductVar: false
        }
    },
    components: {
        AppLayout,
        TableData,
        Pagination,
        DeleteAction,
        EditAction,
        JetDropdown,
        AddCategory
    },
    props: {
        categories: Object,
    },
    methods: {
        showDetails(product){
            this.productSelected = product
        },
        closeModal(){
            this.productSelected = {}
        },
        closeConfirm(){
            this.productSelectedDelete = {}
        },
        deleteProduct(product){
            this.productSelectedDelete = product
        },
        closeEditModalEvent(){
            this.productSelectedEdit = {}
        },
        showEditModalEvent(product){
            this.productSelectedEdit = product
        },
        showModalAddCategory(){
            this.showModalAddProductVar = true
        },
        closeModalAddProduct(){
            this.showModalAddProductVar = false
        }
    }
}
</script>
