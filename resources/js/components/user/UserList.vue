<template>
  <div>
    <!-- pagination -->
    <nav>
      <ul class="pagination pagination-sm">
        <li class="page-item" v-if="USER_PAG.current_page > 1">
          <a
            href="#"
            class="page-link"
            @click.prevent="pagChange(USER_PAG.current_page - 1)"
          >
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li
          class="page-item"
          v-for="(page, index) in pagNumber"
          :key="index"
          v-bind:class="[page == pagActived ? 'active' : '']"
        >
          <a href="#" class="page-link" @click.prevent="pagChange(page)">
            {{ page }}
          </a>
        </li>
        <li class="page-item" v-if="USER_PAG.current_page < USER_PAG.last_page">
          <a
            href="#"
            class="page-link"
            @click.prevent="pagChange(USER_PAG.current_page + 1)"
          >
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- END pagination -->

    <table class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Cumpleaños</th>
        <th>Estatus</th>
        <th></th>
      </tr>
      <tbody>
        <tr v-for="(item, index) in USERS" :key="index">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.birthday }}</td>
          <td>
            {{
              item.status == 1
                ? "Activo"
                : item.status == 2
                ? "Inactivo"
                : "Eliminado"
            }}
          </td>
          <td class="text-right">
            <div v-if="item.status!=3">
              <router-link :to="{ name: 'user-edit', params: {id: item.id } }" class="btn btn-primary btn-sm" href="#">
                <i class="fa-solid fa-pen-to-square"></i>
              </router-link>
              <a class="btn btn-danger btn-sm" @click.prevent="confirmDel(item.id)">
                <i class="fa-solid fa-trash-can"></i>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  data() {
    return {
      pagination: []
    };
  },
  methods: {
    ...mapActions(["GET_USERS"]),
    ...mapActions(["GET_USER_PAG"]),
    // paginación
    pagChange: function (page) {
      this.pagination = this.USER_PAG;
      this.pagination.current_page = page;
      this.pagination.page = page;
      this.GET_USER_PAG(this.pagination);
      this.GET_USERS(this.USER_PAG);
      console.log(this.USER_PAG);
    },
    confirmDel: function (id) {
      this.USER_FORM.id = id;
      console.log(this.USER_PAG);
      $('#delete-user').modal('show');
    }
  },
  computed: {
    ...mapGetters(["USER_FORM"]),
    ...mapGetters(["USER_PAG"]),
    ...mapGetters(["USERS"]),
    // paginación
    pagActived: function () {
      return this.USER_PAG.current_page;
    },
    pagNumber: function () {
      // número de páginas a la derecha y a la izquierda
      var offset = 8;
      if (!this.USER_PAG.to) {
        return [];
      }
      var from = this.USER_PAG.current_page - offset;
      // evitar paginación menor a 1
      if (from < 1) {
        from = 1;
      }
      // evitar que la última página sobrepase el límite de paginación
      var to = from + offset * 2;
      if (to > this.USER_PAG.last_page) {
        to = this.USER_PAG.last_page;
      }
      // almacenar paginación
      var pages = [];
      while (from <= to) {
        pages.push(from);
        from++;
      }
      return pages;
    },
  },
  created() {
    this.GET_USERS(this.USER_PAG);
  },
};
</script>

<style scoped>
.page-item.active .page-link{
  background-color: #212529;
  border-color: #212529;
}
.page-link{
  color: #212529;
}
.text-right{
  text-align: right;
}
</style>