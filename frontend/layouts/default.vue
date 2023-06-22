<template>
    <div>
        <Navbar />
        <SearchBar />
        <Comment />
        <Nuxt />
    </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import SearchBar from "@/components/SearchBar.vue";
import Comment from "@/components/Comment.vue";

export default {
    components: {
        Navbar,
        SearchBar,
        Comment,
    },
};
</script>
