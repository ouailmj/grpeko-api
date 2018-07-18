import axios from 'axios';

class HttpService {
    constructor(){

    }

    /**
     *
     * @returns { AxiosInstance }
     */
    static getHttpClient()
    {
        const $config = {};
        return axios.create($config);
    }
}

export default HttpService;
