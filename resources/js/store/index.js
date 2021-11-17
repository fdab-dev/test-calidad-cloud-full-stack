export default {
        state: {
                USER_PAG: {
                        'page': 1,
                        'total': 0,
                        'current_page': 1,
                        'per_page': 10,
                        'last_page': 0,
                        'from': 0,
                        'to': 0
                },
                USER_FORM: {
                        'type': 'insert',
                        'id': 0,
                        'name': '',
                        'email': '',
                        'password': '',
                        'birthday': '',
                        'status': 1,
                },
                USERS: [],
                USER: [],
        },
        getters: {
                USER_PAG: state => state.USER_PAG,
                USER_FORM: state => state.USER_FORM,
                USERS: state => state.USERS,
                USER: state => state.USER,
        },
        actions: {
                GET_USER_PAG({ commit }, data) {
                        commit('SET_USER_PAG', data)
                },
                GET_USER_FORM({ commit }, data) {
                        commit('SET_USER_FORM', data)
                },
                GET_USERS({ commit }, data) {
                        commit('SET_USERS', data)
                },
                GET_USER({ commit }, data) {
                        commit('SET_USER', data)
                },
        },
        mutations: {
                SET_USER_PAG(state, data) {
                        state.USER_PAG = data
                },
                /*SET_USER_FORM(state, data) {
                        state.USER_FORM = data
                },*/
                async SET_USERS(state, data) {
                        const response = await axios.get('/api/get-users?page='+data.current_page+'&per_page='+data.per_page,
                                {
                                        headers: {
                                                "x-ccloud-auth" : "prueba",
                                                }
                                }
                        );
                        state.USERS    = response.data.rows;
                        state.USER_PAG = response.data.pagination;
                },
                async SET_USER_FORM(state, data) {
                        const response = await axios.get('/api/get-user?id='+data,
                        {
                                headers: {
                                        "x-ccloud-auth" : "prueba",
                                        }
                        });

                        //state.USER_FORM = response.data.rows[0];
                        state.USER_FORM.id = response.data.rows[0].key;
                        state.USER_FORM.name = response.data.rows[0].usuario_nombre;
                        state.USER_FORM.email = response.data.rows[0].usuario_email;
                        state.USER_FORM.password = response.data.rows[0].password;
                        state.USER_FORM.birthday = response.data.rows[0].usuario_cumple;
                        state.USER_FORM.status = response.data.rows[0].usuario_estatus;
                        state.USER_FORM.type='update';
                },
        }
}