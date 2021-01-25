import axios from 'axios'

const apiClient = axios.create({
  baseURL: `http://localhost:8000/api/`,
  withCredentials: false, // This is the default
/*  headers: {
    /!*Accept: 'application/json',
    'Content-Type': 'application/json'*!/
    'X-Requested-with':'XMLHttpRequest'
  },*/
 /* timeout: 2000*/
})

export default apiClient;
