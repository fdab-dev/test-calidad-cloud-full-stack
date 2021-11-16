<template>
  <div>
    <div>EDITAR USUARIO</div>
    <form-user></form-user>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  methods: {
    ...mapActions(["GET_USER_FORM"]),
  },
  computed: {
    ...mapGetters(["USER_FORM"]),
  },
  created() {
      this.GET_USER_FORM(this.$route.params.id);
  },
};
</script>