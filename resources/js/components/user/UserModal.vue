<template>
  <div>
    <div class="modal fade" id="delete-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmación para eliminación de usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Estás seguro que deseas eliminar al usuario actual?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger btn-sm" @click.prevent="deleteUser()">ELIMINAR</button>
        </div>
        </div>
    </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  data() {
    return {
      spin_status: false,
      btn_status: false
    };
  },
  methods: {
      ...mapActions(["GET_USERS"]),
      deleteUser: function (){
        this.spin_status = true;
        this.btn_status = true;
        axios.delete("./api/delete-user?id="+this.USER_FORM.id,
                                    {
                                            headers: {
                                                    "x-ccloud-auth" : "prueba",
                                                    }
                                    }).then((res) => {
            this.spin_status = false;
            this.btn_status = false;                        
            $('#delete-user').modal('hide');

            console.log(this.USER_PAG);

            this.GET_USERS(this.USER_PAG);
        })
      }
  },
  computed: {
    ...mapGetters(["USER_FORM"]),
    ...mapGetters(["USER_PAG"]),
  },
};
</script>
<style scoped>

</style>