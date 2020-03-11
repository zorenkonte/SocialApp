<template>
        <div class="card">
            <div class="card-header">
                <strong class="">Comments</strong>
            </div>
            <div class="card-body">
                <div class="comment-msg" v-for="comment in comments" :key="comment.id">
                    <div class="comment-infos clearfix">
                        <span class="comment-name float-left">{{comment.user.name}}</span>
                        <span class="comment-timestamp float-right">{{formatDate(comment.created_at)}}</span>
                    </div>
                    <img class="comment-img" :src="comment.user.img">
                    <div class="comment-text" v-html="formatComment(comment.description)" v-linkified>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
    import moment from 'moment';
    import linkify from 'vue-linkify';
    Vue.directive('linkified', linkify);
    export default {
        props: ['comments'],
        methods: {
            formatDate(v) {
                return moment(v).startOf('hour').fromNow();
            },
            formatComment(v) {
                return v;
            }
        },
    }

</script>
