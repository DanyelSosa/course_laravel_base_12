<template>
  <div class="min-h-screen bg-gray-100 flex flex-col items-center p-8">
  
    <div class="w-full max-w-3xl bg-white shadow-lg rounded-lg p-6">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      urls:{
            postUpload:'/api/post/upload/',
            postPaginate:'/api/post/',
            postPatch:'/api/post/',
            postPost:'/api/post/',
            postDelete:'/api/post/',
            getPostBySlug:"/api/post/slug/",
            getCategoriesAll:'/api/category/all',
            




      }
    }
  },
}
</script>