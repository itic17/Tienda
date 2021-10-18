<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Proveedores
                </h2>
                <button
                    v-on:click="showModalAddProvider()"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-sm">
                    Agregar Proveedor
                </button>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-data
                        :providers="providers.data"
                        @delete="deleteProvider"
                        @showEditModal="showEditModalEvent" />

                    <div class="p-3">
                        <pagination class="mt-6" :links="providers.links" />
                    </div>
                </div>
            </div>
        </div>

        <details-modal :provider="Selected" @closeModal="closeModal"/>
        <delete-action :provider="SelectedDelete" @closeConfirm="closeConfirm"/>
        <edit-action :provider="SelectedEdit" @closeModal="closeEditModalEvent" />
        <add-provider :showModal="showModalAdd" @closeModal="closeModalAddProvider" />

    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'
import TableData from './TableData'
import Pagination from '@/Components/Pagination'
import DeleteAction from './Delete'
import EditAction from './Edit'
import JetDropdown from '@/Jetstream/Dropdown'
import AddProvider from "./Add";

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
        AddProvider
    },
    props: {
        providers: Object,
    },
    methods: {
        showDetails(provider){
            this.Selected = provider
        },
        closeModal(){
            this.Selected = {}
        },
        closeConfirm(){
            this.SelectedDelete = {}
        },
        deleteProvider(provider){
            this.SelectedDelete = provider
        },
        closeEditModalEvent(){
            this.SelectedEdit = {}
        },
        showEditModalEvent(provider){
            this.SelectedEdit = provider
        },
        showModalAddProvider(){
            this.showModalAdd = true
        },
        closeModalAddProvider(){
            this.showModalAdd = false
        }
    }
}
</script>
