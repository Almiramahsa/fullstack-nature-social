<template>
    <div>
        <div v-if="comments">
            <div
                v-for="(comment, index) in visibleComments"
                :key="comment.id"
                class="max-w-screen-xl w-full mx-auto flex justify-center mb-10"
            >
                <div
                    class="max-w-[1050px] w-screen sm:max-w-sm md:max-w-[600px]"
                >
                    <div
                        class="border shadow-sm rounded-md border-gray-200 p-4 flex flex-col justify-between leading-normal"
                    >
                        <div class="flex items-center">
                            <img
                                class="w-10 h-10 rounded-full mr-4 hidden lg:block"
                                :src="comment.image"
                                :alt="comment.username"
                            />
                            <div class="text-md font-semibold">
                                <p class="text-gray-900 font-semibold">
                                    {{ comment.username }}
                                </p>
                                <p
                                    class="text-gray-600 text-md font-medium mt-1 md:block"
                                >
                                    {{ comment.comment }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mt-1 hidden">
                            {{ comment.comment }}
                        </p>
                    </div>
                </div>
            </div>
            <div v-if="!showAllComments" class="flex justify-center mb-24">
                <button class="btn" @click="loadMore">Load More</button>
            </div>
            <div v-if="showAllComments" class="flex justify-center mt-4 mb-24">
                <button class="btn-hide" @click="hideComments">
                    Hide Comments
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import api from "../../frontend/src/api/index";

const comments = ref(null);
const showAllComments = ref(false);
const initialCommentsToShow = 5;

const fetchData = async () => {
    try {
        const response = await api.get("/api/comments");
        comments.value = response.data.data;
    } catch (error) {
        console.error(error);
    }
};

const visibleComments = computed(() => {
    if (showAllComments.value) {
        return comments.value?.data || [];
    } else {
        return comments.value?.data?.slice(0, initialCommentsToShow) || [];
    }
});

const loadMore = () => {
    showAllComments.value = true;
    setTimeout(() => {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: "smooth",
        });
    }, 100);
};

const hideComments = () => {
    showAllComments.value = false;
    setTimeout(() => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }, 100);
};

fetchData();
</script>
