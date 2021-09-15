<template>
  <div>
    <div class="container">
      <h2>citas</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            citas
            <router-link to="/add" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Add cita</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>nota</th>
                <th>Email</th>
                <th>fecha</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cita in citas" :key="cita.id">
                <td>{{ cita.id }}</td>
                <td>{{ cita.nota }}</td>
                <td>{{ cita.email }}</td>
                <td>{{ cita.fecha }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'edit', params: { id: cita.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deletecita(cita.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      citas: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/citas").then((response) => {
      this.citas = response.data;
    });
  },
  methods: {
    deletecita(id) {
      this.axios
        .delete(`http://localhost:8000/api/citas/${id}`)
        .then((response) => {
          let i = this.citas.map((data) => data.id).indexOf(id);
          this.citas.splice(i, 1);
        });
    },
  },
};
</script>
                