<template> 
  <div>
    <o-field label="Title"> 
      <o-input v-model="form.title"></o-input>
    </o-field>

    <o-field label="Slug"> 
      <o-input v-model="form.slug"></o-input>
    </o-field>

    <o-field label="Content"> 
      <o-input v-model="form.content" type="textarea"></o-input>
    </o-field>

    <o-field label="Description"> 
      <o-input v-model="form.description" type="textarea"></o-input>
    </o-field>

    <o-field label="Posted"> 
      <o-select v-model="form.posted" placeholder="Selected a option">
        <option value="yes">Yes</option>
        <option value="no">No</option>  
      </o-select>
    </o-field>

    <o-field label="Category"> 
      <o-select v-model="form.category_id" placeholder="Selected a option">
        <option :value="null"></option>
        <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
      </o-select>
    </o-field>

    <o-button variant="primary" @click="send">Send</o-button>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getCategory()
  },

  data() {
    return {
      form: {
        title: '',
        slug: '',
        description: '',
        content: '',
        category_id: null,
        posted: ''
      },
      categories: []
    }
  },

  methods: {
    getCategory() {
      this.$axios.get('/api/category/all').then((res)=> {
        this.categories = res.data     
      })
    },

    send() {
      this.$axios.post('/api/post', this.form).then(res => {
        console.log(res)
      }).catch(error => {
        console.log('catch')
        console.log(error)
      })
    }
  }
}
</script>
