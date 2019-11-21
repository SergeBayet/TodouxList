<template>
  <div>
    <h1>Tasks</h1>
    <div class="row justify-content-start">
      <div class="col-md-2">
        <router-link :to="{ name: 'create' }" class="btn btn-primary">Create task</router-link>
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Task Name</th>
          <th>Task Description</th>
          <th>
            Creation Date
            <i class="fa fa-caret-up sort"></i>
          </th>
          <th>Progress</th>
          <th class="action">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.id }}</td>
          <td>{{ task.name }}</td>
          <td>{{ task.description }}</td>
          <td>{{ formatDate(task.created_at) }}</td>
          <td>
            <div class="progress mt-2" style="height: 20px;">
              <div
                class="progress-bar progress-bar-striped bg-success"
                role="progressbar"
                :style="{ 'width' : task.progress + '%'}"
                :aria-valuenow="task.progress"
                aria-valuemin="0"
                aria-valuemax="100"
              >{{ task.progress }}%</div>
            </div>
          </td>
          <td class="action">
            <router-link :to="{name: 'edit', params: { id: task.id }}" class="btn btn-primary">Edit</router-link>
            <button class="btn btn-danger" @click.prevent="deleteTask(task.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<style scoped lang="scss">
div.progress {
  margin: 0;
  .progress-bar {
    text-align: center;
  }
}
.action {
  text-align: center;
}
</style>

<script>
import $ from "jquery";

export default {
  data() {
    return {
      tasks: []
    };
  },

  mounted() {
    let uri = "api/tasks";
    this.axios.get(uri).then(response => {
      this.tasks = response.data;
    });
    $(document).ready(() => {
      $(".sort").on("click", e => {
        this.tasks.sort((a, b) => a.created_at > b.created_at);
      });
    });
  },
  methods: {
    deleteTask(id) {
      let uri = `api/task/delete/${id}`;
      console.log(this.tasks);

      console.log(this.tasks);
      this.axios.delete(uri).then(response => {
        let index = this.tasks.findIndex(x => x.id == id);
        this.tasks.splice(index, 1);
      });
    },
    formatDate(timestamp) {
      var today = new Date(timestamp).toLocaleDateString("en-GB", {
        day: "numeric",
        month: "short",
        year: "numeric",
        hour: "numeric",
        minute: "numeric"
      });
      return today;
    }
  },
  computed: {}
};
</script>
