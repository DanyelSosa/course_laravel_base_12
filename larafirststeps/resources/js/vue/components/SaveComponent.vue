<template> 

<h1 v-if="post">Update Post <span class="font-bold">{{ post.title }}</span></h1>
<h1 v-else> Create Post </h1>


  <div class="grid grid-cols-2 gap-3">

  <div class="col-span-2">

    <o-field label="Title" :variant="errors.title ? 'danger' : ''" :message="errors.title"> 
      <o-input v-model="form.title"></o-input>
    </o-field>
  </div>

    <o-field label="Content" :variant="errors.content ? 'danger' : ''" :message="errors.content"> 
      <o-input v-model="form.content" type="textarea"></o-input>
    </o-field>

    <o-field label="Description" :variant="errors.description ? 'danger' : ''" :message="errors.description"> 
      <o-input v-model="form.description" type="textarea"></o-input>
    </o-field>

        <o-field label="Slug" :variant="errors.slug ? 'danger' : ''" :message="errors.slug"> 
      <o-input v-model="form.slug"></o-input>
    </o-field>

    <o-field label="Posted" :variant="errors.posted ? 'danger' : ''" :message="errors.posted"> 
      <o-select v-model="form.posted" placeholder="Selected a option">
        <option value="yes">Yes</option>
        <option value="no">No</option>  
      </o-select>
    </o-field>

    <o-field label="Category" :variant="errors.category_id ? 'danger' : ''" :message="errors.category_id"> 
      <o-select v-model="form.category_id" placeholder="Selected a option">
        <option :value="null"></option>
        <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
      </o-select>
    </o-field>

  </div>
  <div class="mt-3"></div>
  <o-button class="mt-3" variant="primary" @click="send">Send</o-button>

  <div class="flex gap-2 mt-5" v-if="post">
      <o-upload v-model="file">
      <o-button  tag='button' variant="primary">
          <o-icon icon="upload"></o-icon>
          <span>Click to upload</span>
      </o-button>
    </o-upload>

    <o-button icon-left="upload" @click="upload">
      Upload
    </o-button>
  </div>


</template>

<script>
export default {
  async mounted() {
    if(this.$route.params.slug){
        this.post = await this.$axios.get("/api/post/slug/"+this.$route.params.slug)
        this.post = this.post.data
        this.initPost()
    }

    this.getCategory()
  },

  data() {
    return {
        post: null,  // cambio mínimo
        form: {
        title: '',
        slug: '',
        description: '',
        content: '',
        category_id: null,
        posted: '',
      },
        errors:{         
                title: '',
                slug: '',
                description: '',
                content: '',
                category_id: null,
                posted: ''
            },
            file: null,
      categories: []
    }
  },

  methods: {
    initPost(){
        this.form.title = this.post.title
        this.form.content = this.post.content
        this.form.posted = this.post.posted
        this.form.description = this.post.description
        this.form.slug = this.post.slug
        this.form.category_id = this.post.category_id
    },

    upload(){
      const formData = new FormData()
      console.log(this.file)
      formData.append('image',this.file)
      this.$axios.post('/api/post/upload/'+this.post.id, formData,{
        headers: {
          'Content-Type' : 'multipart/form-data'
        }
      }).then((res)=>{
        console.log(res);
      }).catch((error)=>{
        console.log(error);
      })
    },





    cleanErrorsForm(){
        this.errors.title = ''
        this.errors.content = ''
        this.errors.posted = ''
        this.errors.description = ''
        this.errors.slug = ''
        this.errors.category_id = ''
    },
    getCategory() {
      this.$axios.get('/api/category/all').then((res)=> {
        this.categories = res.data     
      })
    },

    send() {
        this.cleanErrorsForm()

        const payload = { ...this.form }  // opcional: convertir posted si es boolean
        // payload.posted = payload.posted === 'yes' ? 1 : 0

        if (!this.post){
            this.$axios.post('/api/post/', payload).then(res => {
                console.log(res)

                   this.$oruga.notification.open({
                    message: 'Record create succes',
                    position: 'bottom-right',
                    duration: '4000',
                    closable: 'true'
                    
                })
            }).catch(error => {
                if(error.response.data && error.response.data.errors){
                    if(error.response.data.errors.title)
                        this.errors.title = error.response.data.errors.title[0]
                    if(error.response.data.errors.slug)
                        this.errors.slug = error.response.data.errors.slug[0]
                    if(error.response.data.errors.description)
                        this.errors.description = error.response.data.errors.description[0]
                    if(error.response.data.errors.posted)
                        this.errors.posted = error.response.data.errors.posted[0]
                    if(error.response.data.errors.content)
                        this.errors.content = error.response.data.errors.content[0]
                    if(error.response.data.errors.category_id)
                        this.errors.category_id = error.response.data.errors.category_id[0]
                }
            })
        } else {
            this.$axios.patch('/api/post/' + this.post.id, payload).then(res => {

                    this.$oruga.notification.open({
                    message: 'Record updated succes',
                    position: 'bottom-right',
                    duration: '4000',
                    closable: 'true'
                    
                })


                console.log(res)
            }).catch(error => {
                if(error.response.data && error.response.data.errors){
                    if(error.response.data.errors.title)
                        this.errors.title = error.response.data.errors.title[0]
                    if(error.response.data.errors.slug)
                        this.errors.slug = error.response.data.errors.slug[0]
                    if(error.response.data.errors.description)
                        this.errors.description = error.response.data.errors.description[0]
                    if(error.response.data.errors.posted)
                        this.errors.posted = error.response.data.errors.posted[0]
                    if(error.response.data.errors.content)
                        this.errors.content = error.response.data.errors.content[0]
                    if(error.response.data.errors.category_id)
                        this.errors.category_id = error.response.data.errors.category_id[0]
                }
            })
        }
    }
  }
}
</script>
