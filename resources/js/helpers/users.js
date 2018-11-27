import Axios from "axios";
const BASE_URL = 'api/v1';
export function getUserList(){
    return new Promise((res,rej) =>{
        Axios.get(BASE_URL+'/users')
        .then((response) => {
             res(response.data)
       })
        .catch((err) => {
            rej('Wrong Email and Password');
        })
    });
}
