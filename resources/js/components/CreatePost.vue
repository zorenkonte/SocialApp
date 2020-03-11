<template>
    <div class="post">
        <img class="post-img" :src="user.img" alt="message user image">
        <div class="post-msg">
            <textarea placeholder="What's on your mind?" v-model="description"></textarea>
            <hr>
        </div>
        <div class="float-right pr-2">
            <button type="submit" class="btn btn-primary" @click="createPost()">Post</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user:{
                img: 'https://clikiads.com/static/images/blank_profile.png'  //temp placeholder
            },
            description: ''
        }
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios('/user')
            .then((r) => {
                if (r.status == 200) {
                    this.user = r.data;
                }
            })
            .catch((e) => {
                console.error(e);
            })
        },
        createPost() {
            axios.post('/api/posts', {
                user_id: this.user.id,
                description: this.description
            })
            .then((r) => {
                if (r.status == 200) {
                    this.description = '';
                    this.$root.$refs.postref.appendPost(r.data);
                }
            })
            .catch((e) => {
                console.error(e);
            });
        }
    }
}
</script>
