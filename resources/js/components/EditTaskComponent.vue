
<template>
  <div>
    <h1>Edit Task</h1>
    <form @submit.prevent="updateTask">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" class="form-control" v-model="task.name" required />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Body:</label>
            <textarea class="form-control" v-model="task.description" rows="5"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <label>Actual progress</label>
          <input type="number" class="form-control" v-model="task.progress" min="0" max="100" />
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">Update</button>
        <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      task: {}
    };
  },
  created() {
    let uri = `api/task/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.task = response.data;
    });
  },
  methods: {
    updateTask() {
      let uri = `api/task/update/${this.$route.params.id}`;
      this.axios.post(uri, this.task).then(response => {
        this.$router.push({ name: "home" });
      });
    }
  }
};
</script>