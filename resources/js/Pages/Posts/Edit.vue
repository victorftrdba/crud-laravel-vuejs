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
    props: {
        post: Object
    },
    methods: {
        updateNews(id) {
            update_news(id, this.title, this.description);

            this.title = "";
            this.description = "";
        }
    }
}
</script>

<template>
    <BreezeAuthenticatedLayout>
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
            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="button" @click="updateNews(post.id)">Clique</button>
            <BreezeNavLink class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" :href="route('post')" :active="route().current('post')">
                    Voltar
            </BreezeNavLink>
        </div>
    </BreezeAuthenticatedLayout>
</template>
