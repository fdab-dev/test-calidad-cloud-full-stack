<template>
  <div>
    <form
      id="form-user"
      method="post"
      @submit.prevent="submitFormContact"
      class="row g-3"
    >
      <div class="col-md-12">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" v-model="USER_FORM.name" />
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" v-model="USER_FORM.email" />
      </div>
      <div class="col-md-6">
        <label class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          v-model="USER_FORM.password"
        />
      </div>
      <div class="col-md-6">
        <label class="form-label">Birthday</label>
        <input
          type="date"
          class="form-control"
          v-model="USER_FORM.birthday"
          data-date-format="YYYY-MM-DD"
        />
      </div>
      <div class="col-md-6">
        <label class="form-label">Estatus</label>
        <select id="inputState" class="form-select" v-model="USER_FORM.status">
          <option selected value="0">Selecciona......</option>
          <option value="1">Activo</option>
          <option value="2">Inactivo</option>
          <option value="3">Eliminado</option>
        </select>
      </div>

      <div v-if="msg_success" class="col-12">
        <div class="alert alert-success" role="alert">
          La información se guardo correctamente.
        </div>
      </div>

      <div v-if="msg_error" class="col-12">
        <div class="alert alert-danger" role="alert">
          Hubo un problema para guardar la información, intenta más tarde.
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-secondary" :disabled="btn_status">
          <span
            v-if="spin_status"
            class="spinner-border spinner-border-sm"
            role="status"
            aria-hidden="true"
          ></span>
          <span>GUARDAR</span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  data() {
    return {
      btn_status: false,
      spin_status: false,
      msg_success: false,
      msg_error: false,
    };
  },
  methods: {
    submitFormContact() {
      // habilitar elementos
      this.spin_contact = true;
      this.btn_contact = true;
      // ocultar mensajes
      this.msg_success = false;
      this.msg_error = false;

      if (this.USER_FORM.type == "update") {
        var action = "../update-user";
      } else {
        var action = "./save-user";
      }

      // mandar los datos al controlador
      axios.post(action, this.USER_FORM).then((res) => {
        if (this.USER_FORM.type == "insert") {
          // limpiar formulario
          this.cleanForm();
        }
        this.spin_contact = false;
        this.btn_contact = false;

        if (res.data === "success") {
          this.msg_success = true;
        } else {
          this.msg_error = true;
        }
      });
    },
    cleanForm() {
      this.USER_FORM.id = 0;
      this.USER_FORM.name = "";
      this.USER_FORM.email = "";
      this.USER_FORM.password = "";
      this.USER_FORM.birthday = "";
      this.USER_FORM.status = "1";
    },
  },
  computed: {
    ...mapGetters(["USER_FORM"]),
  },
};
</script>
<style scoped>
form {
  margin-top: 20px;
}
</style>