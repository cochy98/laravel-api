<template>
  <div class="post-list container-fluid p-5">
    <div class="row">
      <div class="col-12">
        <h1>Latest Post</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-9">
        <Post v-for="(post, index) in posts" :key="index" :post="post" />
      </div>
      <div class="col-3">
        <div class="my-sidebar p-3">
          <h2>Categorie:</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Post from "./Post";
export default {
  name: "PostList",
  components: {
    Post,
  },
  data: function () {
    return {
      posts: [],
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://localhost:8000/api/posts")
        .then((response) => {
          this.posts = response.data.results.data;
          console.log(this.posts);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style>
</style>
