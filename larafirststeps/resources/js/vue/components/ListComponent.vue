    <template>

        <router-link :to="{name:'save'}">Create</router-link>


        <div>
        <h1> Post List</h1>
        
        <o-table :data="posts.data" :loading="isLoading">
            <o-table-column field="id" label="ID" v-slot="p">
                {{ p.row.id }}
            </o-table-column>
            <o-table-column field="title" label="TITLE" v-slot="p">
                {{ p.row.title }}
            </o-table-column>
            <o-table-column field="posted" label="POSTED" v-slot="p">
                {{ p.row.posted }}
            </o-table-column>
            <o-table-column field="category" label="CATEGORIA" v-slot="p">
                {{ p.row.category.title }}
            </o-table-column>
            <o-table-column field="category" label="ACTIONS" v-slot="p">
             <router-link :to="{name:'save',params:{'slug': p.row.slug }}">EDIT</router-link>

             <o-button variant="danger" @click="deletePost(p)">DELETE</o-button>

            </o-table-column>
        </o-table>
        <o-pagination
        v-if="posts.data && posts.data.length > 0"
        @change="updatePage"
        :total="posts.total"
        v-model:current="currentPage"
        :range-before="2"
        :range-after="2"
        size="small"
        :simple="false"
        :rounded="true"
        :per-page="posts.per_page"




        >


        </o-pagination>

        </div>
    </template>
    <script>
    export default {

        data() {
            return {
                posts: [],
                isLoading: true,
                currentPage:1
            }
        },

        mounted() {
            this.listPage()
        },


        methods: {
            updatePage() {

                setTimeout(() => {
                    this.listPage()
                }, 100);

            },
            listPage(){

                
                this.isLoading = true
                this.$axios.get('/api/post?page='+this.currentPage).then(res => {
                    this.posts = (res.data)
                    this.isLoading = false
        })
            },
            deletePost(row){
                this.$axios.delete('/api/post/'+row.row.id)
                this.posts.data.splice(row.index,1)
            }


        }
    }
    </script>