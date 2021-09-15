<template>
  <div>
    <div class="container">
      <h2>Add cita</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add cita
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">cita List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addCita">
            <div class="form-group">
              <label>nota</label>
              <input type="text" class="form-control" v-model="cita.nota" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="cita.email"
              />
            </div>
            <div class="form-group">
              <label>fecha</label>
              <input
                type="date"
                class="form-control"
                v-model="cita.fecha"
              />
            </div>
           

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      cita: {},
    };
  },
  methods: {
    addCita() {
      this.axios
        .post("http://localhost:8000/api/citas", this.cita)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
