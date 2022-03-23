<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { update_news } from '@/Services/posts';
import BreezeNavLink from '@/Components/NavLink.vue';
</script>

<script>
export default {
    data() {
        return {
            title: "",
            description: ""
        }
    },
    mounted() {
        this.title = this.post.title;
        this.description = this.post.description;
    },
    props: {
        post: Object
    },
    methods: {
        updateNews(id) {
            document.querySelector('#send_button').classList.add('cursor-not-allowed');

            update_news(id, this.title, this.description);
            this.post.title = this.title;
            this.post.description = this.description;

            document.querySelector('#send_button').classList.remove('cursor-not-allowed');
        }
    }
}
</script>

<template>
    <BreezeAuthenticatedLayout>
        <div class="text-center">
            <div class="font-bold">Autor: {{ post.user.name }}</div>
        </div>
        <div class="text-center">
            <label for="title">Título</label> <br/>
            {{ post.title }} <br/>
            <input type="text" class="p-2 mb-3" v-model="title" />
        </div>
        <div class="text-center mb-2">
            <label for="description">Descrição</label> <br/>
            {{ post.description }} <br/>
            <textarea type="text" class="p-2" v-model="description"></textarea>
        </div>
        <div class="text-center">
            <button id="send_button" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="button" @click="updateNews(post.id)">Clique</button>
            <BreezeNavLink class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" :href="route('post')" :active="route().current('post')">
                    Voltar
            </BreezeNavLink>
        </div>
    </BreezeAuthenticatedLayout>
</template>
