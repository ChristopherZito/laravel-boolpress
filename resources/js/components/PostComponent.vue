<template>
    <div class="container">
        <div class="card text-dark p-5" >
                <div v-for="post, i in posts" :key="i">
                    <!-- blocco nome - nome post  -->
                    <div class="d-flex justify-content-around">
                        Nickame: {{post.owner}} <br>
                        <span v-if="post.post_name != NULL">
                            PostName: {{post.post_name}} <br>
                        </span>
                        <span v-else><!-- nome del post non presente --></span>
                    </div>
                    <!-- testo e immagine -->
                    <div class="d-flex justify-content-around p-3">
                        <!-- testo -->
                        <span class="col text-start">
                            <p v-if="post.description != NULL" class="text-start">
                                Description: {{post.description}}
                            </p>
                            <p v-else><!-- testo assente --></p>
                            
                        </span>
                        <span class="col">
                            <!-- immagine -->
                            <div>
                                <img class="img-fluid" :src="post.immagine + rndNumber()" alt="">
                            </div>            
                            <div class="info">
                            
                        </div>
                        </span>
                    </div>
                    <div class="d-flex justify-content-around">
                        <span>Pubblicato: {{post.time_of_pubblication}}</span>
                        <span> Views: {{post.views}} - Like: {{post.like}}</span>
                    </div>
                    <div class="spacing"><!-- barra di separazione --></div>
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
                // console.log(data);
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
