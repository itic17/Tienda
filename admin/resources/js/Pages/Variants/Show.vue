<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Variantes
                </h2>
                <button
                    v-on:click="showModalAddVariant()"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-sm">
                    Agregar Variante
                </button>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-data
                        :variants="variants.data"
                        @delete="deleteCategory"
                        @showEditModal="showEditModalEvent" />

                    <div class="p-3">
                        <pagination class="mt-6" :links="variants.links" />
                    </div>
                </div>
            </div>
        </div>

        <details-modal :variant="Selected" @closeModal="closeModal"/>
        <delete-action :variant="SelectedDelete" @closeConfirm="closeConfirm"/>
        <edit-action :variant="SelectedEdit" @closeModal="closeEditModalEvent" />
        <add-variant :showModal="showModalAdd" @closeModal="closeModalAddVariant" />

    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'
import TableData from './TableData'
import Pagination from '@/Components/Pagination'
import DeleteAction from './Delete'
import EditAction from './Edit'
import JetDropdown from '@/Jetstream/Dropdown'
import AddVariant from "./Add";

export default {
    data() {
        return {
            Selected: {},
            SelectedDelete: {},
            SelectedEdit: {},
            showEditModal: false,
            showModalAdd: false
        }
    },
    components: {
        AppLayout,
        TableData,
        Pagination,
        DeleteAction,
        EditAction,
        JetDropdown,
        AddVariant
    },
    props: {
        variants: Object,
    },
    methods: {
        showDetails(variante){
            this.Selected = variante
        },
        closeModal(){
            this.Selected = {}
        },
        closeConfirm(){
            this.SelectedDelete = {}
        },
        deleteCategory(variante){
            this.SelectedDelete = variante
        },
        closeEditModalEvent(){
            this.SelectedEdit = {}
        },
        showEditModalEvent(variante){
            this.SelectedEdit = variante
        },
        showModalAddVariant(){
            this.showModalAdd = true
        },
        closeModalAddVariant(){
            this.showModalAdd = false
        }
    }
}
</script>
