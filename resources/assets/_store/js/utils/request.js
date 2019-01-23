import axios from 'axios'
import { Message } from 'element-ui'
import store from '../store'

let isAlreadyFetchingAccessToken = false;
let subscribers = [];

function onAccessTokenFetched(access_token) {
  subscribers = subscribers.filter(callback => callback(access_token))
}

function addSubscriber(callback) {
  subscribers.push(callback)
}

// create an axios instance
const service = axios.create({
  baseURL: process.env.BASE_API,
  //baseURL: 'http://127.0.0.1:8000/api', //
  timeout: (1000 * 60) * 2 // request timeout
});

// request interceptor
service.interceptors.request.use(config => {
  return config
}, error => {
  // Do something with request error
  Promise.reject(error)
});

// respone interceptor
service.interceptors.response.use(
  response => response,
  response => {
    const res = response;
    const error = response;

    if (res.code !== 200) {
      const { config, response: { status }} = error;
      const originalRequest = config;

      if (error.response.status === 500 && !originalRequest._retry) {
        return Promise.reject(error)
      }
      if (error.response.status === 403 && !originalRequest._retry) {
        Promise.reject(error);
      }
      // Do something with response error
      return Promise.reject(error)
    } else {
      return response.data
    }

  },
  error => {
    Message({
      message: error.message,
      type: 'error',
      duration: 5 * 1000
    });
    return Promise.reject(error)
  });

export default service
