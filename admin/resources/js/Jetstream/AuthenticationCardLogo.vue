<template>
    <Link :href="'/'">
        <h1 style="font-size: 2rem;font-weight: bold;">SHOES STORE</h1>
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
