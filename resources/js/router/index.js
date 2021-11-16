routes = [
            {
                path: '/',
                name: 'user-home',
                component: require('../components/UserHome.vue').default,
            },
            {
                path: '/',
                name: 'user-list',
                component: require('../components/UserList.vue').default,
            },
            {
                path: '/',
                name: 'user-new',
                component: require('../components/UserNew.vue').default,
            },
            {
                path: '*',
                name: 'page-error',
                //component: require('../components/dashboard/Error.vue').default,
            }
        ]