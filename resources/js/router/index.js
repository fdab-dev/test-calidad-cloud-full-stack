routes = [
            {
                path: '/',
                name: 'user-home',
                component: require('../components/user/UserHome.vue').default,
            },
            {
                path: '/list',
                name: 'user-list',
                component: require('../components/user/UserList.vue').default,
            },
            {
                path: '/new',
                name: 'user-new',
                component: require('../components/user/UserNew.vue').default,
            },
            {
                path: '/edit/:id',
                name: 'user-edit',
                component: require('../components/user/UserEdit.vue').default,
            },
            {
                path: '*',
                name: 'page-error',
                //component: require('../components/dashboard/Error.vue').default,
            }
        ]