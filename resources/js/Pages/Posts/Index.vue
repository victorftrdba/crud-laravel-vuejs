<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { destroy } from '@/Services/posts';
import BreezeNavLink from '@/Components/NavLink.vue';
</script>

<script>
export default {
    props: {
        posts: Object
    },
    methods: {
        deleteNews(id, index)
        {
            destroy(id);

            this.posts.splice(index, 1);
        }
    }
}
</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="border-2 border-emerald-300 p-5 border-b-0 mt-5"
        v-for="(post, index) in posts" v-bind:key="index">
            <div>{{ post.title }}</div>
            <div>{{ post.description }}</div>
            <div>
                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="button" @click="deleteNews(post.id, index)">Excluir</button>
                <BreezeNavLink class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" :href="route('post.edit', post.id)" :active="route().current('post.edit')">
                    Editar post
                </BreezeNavLink>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
