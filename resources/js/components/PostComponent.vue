<template>
    <div class="container">
        <div class="card text-dark p-5" >
                <div v-for="post, i in posts" :key="i">
                    <!-- blocco nome - nome post  -->
                    <div class="d-flex justify-content-around">
                        Nickame: {{post.owner}} <br>
                        <span v-if="post.post_name">
                            PostName: {{post.post_name}} <br>
                        </span>
                    </div>
                    <!-- testo e immagine -->
                    <div class="d-flex justify-content-around p-3">
                        <!-- testo -->
                        <span class="col text-start">
                            <p v-if="post.description" class="text-start">
                                Description: {{post.description}}
                            </p>                            
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
                        <!-- collegamento con le categorie -->
                        <span  v-for="categoria, i in category" :key="i">
                            <span v-if=" post.categorie_id == categoria.id">
                                Category:  {{categoria.Title}}
                            </span>
                        </span>
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
                category:[],
            };
        },
        mounted() {
            axios.get('/posts/list')
            .then(result => {
                const data = result.data;
                this.posts = data;
                console.log("Post: ",data);
            }).catch(err => {
                console.error(err);
            });

            axios.get('/posts/category')
            .then(result => {
                const data = result.data;
                this.category = data;
                console.log("Category: ",data);
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
