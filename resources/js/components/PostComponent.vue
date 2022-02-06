<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-dark" >
                   
                       <div v-for="post, i in posts" :key="i">
                            Ninname: {{post.owner}} <br>
                            <span v-if="post.post_name != NULL">
                                PostName: {{post.post_name}} <br>
                            </span>
                            <span v-else>

                            </span>
                            
                            <p v-if="post.description != NULL">
                                Description: {{post.description}}
                            </p>
                            <p v-else>
                                
                            </p>
                            <img class="img-fluid" :src="post.immagine + rndNumber()" alt="">
                            <div class="info">
                                <span>Pubblicato: {{post.time_of_pubblication}}</span> -- <span> Views: {{post.views}}</span> -- <span> Like: {{post.like}}</span>
                            </div>
                            <hr>
                       </div>
                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                posts: [],
            };
        },
        mounted() {
            axios.get('/posts/list')
            .then(result => {
                const data = result.data;
                this.posts = data;
                console.log(data);
            }).catch(err => {
                console.error(err);
            });
        },
        methods:{
            rndNumber(){
                for(let n=0;n<this.posts.length;n++){
                    let num = Math.round(Math.random() * 1000);
                    return num;
                }
            }
        },
    }
</script>
