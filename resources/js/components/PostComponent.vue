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
                            <p>
                                Reaction:
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
                        <span>
                            <!-- post: {{post.categorie_id}} -->
                            Category: <span v-for="categoria,i in category" :key="i">
                                {{catAssoc(categoria.id,post.categorie_id,categoria.Title)}}
                                </span> 
                        </span>
                        <span> Views: {{post.views}} - Like: {{post.like}}</span>
                    </div>
                    <div class="my-5">
                            <a class="btn btn-secondary" href="#">EDIT</a> 
                            <a class="btn btn-danger" href="#">DELETE</a>
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
                reaction:[],
            };
        },
        mounted() {
            

            axios.get('/posts/category')
            .then(result => {
                const catdata = result.data;
                this.category = catdata;
                // console.log("Category: ",data);

                    axios.get('/posts/list')
                        .then(result => {
                            const resdata = result.data;
                            this.posts = resdata;
                            // console.log("Post: ",resdata);
                        }).catch(err => {
                            console.error(err);
                        });
            }).catch(err => {
                console.error(err);
            });

            // axios.get('/posts/reaction')
            // .then(result => {
            //     const data = result.data;
            //     this.reaction = data;
            //     console.log("reaction: ",data);
            // }).catch(err => {
            //     console.error(err);
            // });
        },
        
        methods:{
            rndNumber(){
                for(let n=0;n<this.posts.length;n++){
                    let num = Math.round(Math.random() * 1000);
                    return num;
                }
            },
            catAssoc(catId, postID,catTitle){
                if(catId == postID){
                    /* console.log("cat",catId ,"post", postID,"title:", catTitle); */
                    return  catTitle;
                }  
            },
        },
    }
</script>
