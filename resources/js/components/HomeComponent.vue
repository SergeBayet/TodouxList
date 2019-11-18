<template>
  <div>
    <h1>tasks</h1>
    <div class="row">
      <div class="col-md-10"></div>
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
          <th>Progress</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.id }}</td>
          <td>{{ task.name }}</td>
          <td>{{ task.description }}</td>
          <td>
            <div class="progress">
              <div
                class="progress-bar progress-bar-striped bg-success"
                role="progressbar"
                :style="{ 'width' : task.progress + '%'}"
                :aria-valuenow="task.progress"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </td>
          <td>
            <router-link :to="{name: 'edit', params: { id: task.id }}" class="btn btn-primary">Edit</router-link>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      width: "Width: ",
      percent: "%"
    };
  },

  created() {
    let uri = "api/tasks";
    this.axios.get(uri).then(response => {
      this.tasks = response.data;
      console.log(response.data);
    });
  }
};
</script>
