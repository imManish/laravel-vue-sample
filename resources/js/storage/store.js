import { getLocalUser } from "../helpers/auth";
import Axios from "axios";
const BASE_URL = 'api/v1';

const user = getLocalUser();

export default {
 state : {
     currentUser: user,
     isLoggedIn: !!user,
     loading: false,
     auth_error: null,
     profile: [],
     users:[],
     category:[],
     loader:false

 },
 getters :{
     isLoading(state){
       return state.loading;
     },
     isLoggedIn(state){
        return state.isLoggedIn;
    },
    currentUser(state){
        return state.currentUser;
    },
    authError(state){
        return state.auth_error;
    },
    profile(state){
        return state.profile;
    },
    users(state){
        return state.users
    },
    category(state){
        return state.category
    }

 },
 mutations:{
     login(state){
         state.loading = true;
         state.auth_error = null;
     },
     loginSuccess(state,payload){
         state.auth_error = null;
         state.isLoggedIn = true;
         state.loading = false;
         state.currentUser = Object.assign({}, payload.user, {token: payload.token});
         //state.currentUser= Object.assign({},payload.user,{token: payload.token});
         localStorage.setItem('user',JSON.stringify(state.currentUser));
     },
     loginFailed(state,payload){
        state.loading = false;
        state.auth_error = payload.error;
     },
     logout(state){
         localStorage.removeItem("user");
         state.isLoggedIn= false;
         state.currentUser = null;
     },
     updateUsers(state,payload){
        state.users = payload;
     },
     category(state,payload){
        state.category = payload;
     },
     LOADER(state,payload){
        state.loader=payload;
    },
 },

 actions: {
     login(context){
         context.commit("login");
     },
     getUsersList(context){
        axios.get(BASE_URL+'/users',{
            headers: {
                "Authorization" : `Bearer ${context.state.currentUser.token}`,
                "Accept" : 'application/json'
            }
        }).then((response) => {
            //console.log(response.data);
            context.commit('updateUsers', response.data.data);
        }).catch((error) => {
            console.log(error);
        });
     },
     category(context){
        context.commit('category');
     }
 }
};
