<template>
  <div>
    <div class="container">
      <h2>Update cita</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update cita
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">cita List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updatecita">
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
                type="text"
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
  created() {
    this.axios
      .get(`http://localhost:8000/api/citas/${this.$route.params.id}`)
      .then((res) => {
        this.cita = res.data;
      });
  },
  methods: {
    updatecita() {
      this.axios
        .patch(
          `http://localhost:8000/api/citas/${this.$route.params.id}`,
          this.cita
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>
           