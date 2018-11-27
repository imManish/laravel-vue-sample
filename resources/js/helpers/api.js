import Axios from "axios";
const BASE_URL = 'api/v1/';
export function categoryList(page_url){
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
export function addCategoryAPI(post_body,method){
    return new Promise((res,rej) =>{
            if(method != 'put'){
                Axios.post(BASE_URL+'admin_add_category',post_body)
                .then((response) => {
                    res(response);
                }).catch(err => {
                    rej('Something went wrong!');
                });
            } else {
                Axios.put(BASE_URL+'admin_add_category',post_body)
                .then((response) => {
                     res(response);
                }).catch(err => {
                     rej('Something went wrong!');
                });
            }

    });
}
export function addCountryAPI(post_body,method){
    return new Promise((res,rej) =>{
        if(method != 'put'){
            Axios.post(BASE_URL+'country',post_body)
            .then((response) => {
                res(response);
            }).catch(err => {
                rej('Something went wrong!');
            });
        } else {
            Axios.put(BASE_URL+'country',post_body)
            .then((response) => {
                 res(response);
            }).catch(err => {
                 rej('Something went wrong!');
            });
        }

});
}
export function userRole(page_url,header){
    // ye ek new promise return karega jo ki api se milega ha api code
    return new Promise((res,rej)=> {
        Axios.get('../'+BASE_URL+page_url,header)
        .then((response) => {
            res(response.data);
        }).catch((err) => {
            rej('Something went wrong!');
        });
    });
}
export function userRegister(post_body,method){
    if(method != 'put'){
        Axios.post('../'+BASE_URL+'register',post_body)
        .then((response) => {
            res(response);
        }).catch(err => {
            rej('Something went wrong!');
        });
    } else {
        Axios.put('../'+BASE_URL+'register',post_body)
        .then((response) => {
             res(response);
        }).catch(err => {
             rej('Something went wrong!');
        });
    }
}
