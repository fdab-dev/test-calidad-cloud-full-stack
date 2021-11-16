<template>
  <div>
    <div>REGISTRO DE USUARIO</div>
    <form-user></form-user>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  computed: {
    ...mapGetters(["USER_FORM"]),
  },
  created() {
    this.USER_FORM.id=0;
    this.USER_FORM.type='insert';
    this.USER_FORM.name='';
    this.USER_FORM.email='';
    this.USER_FORM.password='';
    this.USER_FORM.birthday='0000-00-00';
    this.USER_FORM.status='1';
  },
};
</script>