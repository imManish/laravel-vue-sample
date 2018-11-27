import { setAuthorization } from "./general";
import Axios from "axios";
const BASE_URL = 'api/v1';
export function login(credentials){

    return new Promise((res,rej) =>{
        Axios.post(BASE_URL+'/login',credentials)
        .then((response) => {
             res(response.data)
       })
        .catch((err) => {
            rej('Wrong Email and Password');
        })
    });
}
export function getLocalUser(){
    const userStr = localStorage.getItem("user");
    if(!userStr){
        return null;
    }
    return JSON.parse(userStr);
}
