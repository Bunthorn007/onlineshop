<template>
    <div class="md-form-group md-label-floating">
        <input class="md-form-control" type="text" v-model="content" v-on:keyup.enter="replyTo(comment)">
        <label class="md-control-label">Comment</label>
    </div>
</template>
<style>
</style>
<script>
    export default{
        props: ['comment'],
        data(){
            return{
                content: ''
            }
        },
        methods:{
            replyTo(comment){
                axios.post('/comment', {content: this.content, post_id: comment.post_id, parent_id: comment.id}).then(response => {
                   this.content = '';
                   if (!response.data.error) {
                    this.content = '';
                    let payLoad = {
                        post_id: comment.post_id,
                        comments: response.data.data
                    };
                    this.$store.commit('updateComments',payLoad);
                }
            });
            }
        }
    }
</script>