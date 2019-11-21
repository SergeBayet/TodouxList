
<template>
  <div>
    <h1>Create A Task</h1>
    <form @submit.prevent="addTask">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Task name:</label>
            <input type="text" class="form-control" v-model="task.name" required />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Task description:</label>
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
        <button class="btn btn-primary">Create</button>
        <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      task: {
        name: "",
        description: "",
        progress: 0
      }
    };
  },
  methods: {
    addTask() {
      let uri = "api/task/create";
      this.axios.post(uri, this.task).then(response => {
        this.$router.push({ name: "home" });
      });
    }
  }
};
</script>
