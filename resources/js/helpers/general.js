export function initialize(store, router) {
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.state.currentUser;

        if(requiresAuth && !currentUser) {
            next('/login');
        } else if(to.path == '/login' && currentUser) {
            next('/');
        } else {
            next();
        }
    });

    axios.interceptors.request.use(function (config) {
        // Do something before request is sent
        store.commit('LOADER',true);
        return config;
      }, function (error) {
        // Do something with request error
        store.commit('LOADER',true);
        return Promise.reject(error);
    });

    // Add a response interceptor
    axios.interceptors.response.use(function (response) {
        // Do something with response data

        store.commit('LOADER',true);
        return response;
    }, function (error) {
        console.log(response.data);
        // Do something with response error
        if (error.code == 401) {
            store.commit('logout');
            router.push('/login');
        }
        return Promise.reject(error);
    });
    /*axios.interceptors.response.use(null, (error) => {
        if (error.resposne.status == 401) {
            store.commit('logout');
            router.push('/login');
        }
        return Promise.reject(error);
    });*/

    if (store.getters.currentUser) {
        console.log(store.getters.currentUser);
        setAuthorization(store.getters.currentUser.token);
    }

}
export async function setAuthorization(token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
}
