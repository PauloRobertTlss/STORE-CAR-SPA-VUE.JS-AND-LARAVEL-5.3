import axios from 'axios'
import { Message } from 'element-ui'
import store from '../store'
import { getAuthorizationHeader } from '../utils/auth'

let isAlreadyFetchingAccessToken = false;
let subscribers = [];

const logout = () => {
  // caso o usuario não tenha assinatura no middleware, é redirecionado para o login
  store.dispatch('clearAuth');
  store.dispatch('FedLogOut').then(() => {
    location.reload()
  })
};

function onAccessTokenFetched(access_token) {
  subscribers = subscribers.filter(callback => callback(access_token))
}

function addSubscriber(callback) {
  subscribers.push(callback)
}

// create an axios instance
const service = axios.create({
  // baseURL: process.env.BASE_API, //
  baseURL: 'http://127.0.0.1:8000/api', //
  timeout: (1000 * 60) * 2 // request timeout
});

// request interceptor
service.interceptors.request.use(config => {
  // Do something before request is sent
  if (store.getters.token) {
    config.headers.Authorization = getAuthorizationHeader()
    // config.headers['X-Token'] = getToken()
  }
  return config
}, error => {
  // Do something with request error
  console.log(error); // for debug
  Promise.reject(error)
});

// respone interceptor
service.interceptors.response.use(
  response => response,
  response => {
    const res = response;
    console.log('response [jwt]', res);
    const error = response;

    if (res.code !== 200) {
      const { config, response: { status }} = error;
      const originalRequest = config;
      if (status === 401) {
        if (!isAlreadyFetchingAccessToken) {
          isAlreadyFetchingAccessToken = true;
          store.dispatch('refreshByToken').then((access_token) => {
            isAlreadyFetchingAccessToken = false;
            onAccessTokenFetched(access_token)
          })
        }

        const retryOriginalRequest = new Promise((resolve) => {
          addSubscriber(access_token => {
            originalRequest.headers.Authorization = getAuthorizationHeader();
            resolve(service(originalRequest))
          })
        });
        return retryOriginalRequest
      }

      if (error.response.status === 500 && !originalRequest._retry) {
        return Promise.reject(error)
      }
      if (error.response.status === 403 && !originalRequest._retry) {
        Promise.reject(error);
        logout()
      }
      // Do something with response error
      return Promise.reject(error)
    } else {
      return response.data
    }

    /* const res = response.data;
     if (res.code !== 20000) {
       Message({
         message: res.message,
         type: 'error',
         duration: 5 * 1000
       })
       // 50008:非法的token; 50012:其他客户端登录了;  50014:Token 过期了;
       if (res.code === 50008 || res.code === 50012 || res.code === 50014) {
         // 请自行在引入 MessageBox
         // import { Message, MessageBox } from 'element-ui'
         MessageBox.confirm('你已被登出，可以取消继续留在该页面，或者重新登录', '确定登出', {
           confirmButtonText: '重新登录',
           cancelButtonText: '取消',
           type: 'warning'
         }).then(() => {
           store.dispatch('FedLogOut').then(() => {
             location.reload() // 为了重新实例化vue-router对象 避免bug
           })
         })
       }
       return Promise.reject('error')
     } else {
       return response.data
     }*/
  },
  error => {
    console.log('err' + error); // for debug
    Message({
      message: error.message,
      type: 'error',
      duration: 5 * 1000
    });
    return Promise.reject(error)
  });

export default service
