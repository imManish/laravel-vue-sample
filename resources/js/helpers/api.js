import Axios from "axios";
const BASE_URL = 'api/v1/';
export function list(page_url){
    return new Promise((res,rej) =>{
        Axios.get(BASE_URL+page_url)
        .then((response) => {
             res(response.data)
       })
        .catch((err) => {
            rej('Something went wrong!');
        })
    });
}
export function sampleMethod(post_body,method){
    return new Promise((res,rej) =>{
            if(method != 'put'){
                Axios.post(BASE_URL+'action',post_body)
                .then((response) => {
                    res(response);
                }).catch(err => {
                    rej('Something went wrong!');
                });
            } else {
                Axios.put(BASE_URL+'action',post_body)
                .then((response) => {
                     res(response);
                }).catch(err => {
                     rej('Something went wrong!');
                });
            }

    });
}
