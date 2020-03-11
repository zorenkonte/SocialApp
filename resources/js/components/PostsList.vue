<template>
    <div class="pt-3" v-if="posts">
        <div class="card mt-3" v-for="post in posts" :key="post.id">
            <div class="card-header">
                <img class="post-img" :src="post.user.img" alt="message user image">
                <strong class="post-msg mt-0">{{post.user.name}}</strong>
                <small class="post-msg mt-0 moment-ago">{{formatDate(post.created_at)}} · <i
                        class="fas fa-user-friends"></i></small>
            </div>
            <div class="card-body">
                {{post.description}}
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary btn-block"><i
                                class="fas fa-thumbs-up"></i></button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block"><i
                                class="fas fa-comments"></i></button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-block"><i class="fas fa-share"></i></button>
                    </div>
                </div>
            </div>
            <div class="p-3" v-if="post.comments.length != 0">
                <comments-list :comments="post.comments"></comments-list>
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="input-group">
                            <img class="post-img write-comment" :src="user.img" alt="message user image">
                            <input type="text" name="message" placeholder="Write a comment..." class="form-control comment-input">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from 'moment';
    export default {
        props: ['user'],
        data() {
            return {
                posts: {},
                postComments: {}
            }
        },
        mounted() {
            this.getPosts();
        },
        methods: {
            getPosts() {
                axios('/api/posts')
                    .then((r) => {
                        if (r.status == 200) {
                            this.posts = r.data;
                        }
                    })
                    .catch((e) => {
                        console.error(e);
                    });
            },
            formatDate(v) {
                return moment(v).startOf('second').fromNow();
            },
            appendPost(v) {
                this.posts.splice(0, 0, v);
            }
        },
    }
</script>
