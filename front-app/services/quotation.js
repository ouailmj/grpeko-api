
import HttpService from "./http";
import {QuotationRoutes} from "../routes/routes";

export default class  QuotationService {

    constructor(){
        this.http = HttpService.getHttpClient();
        this.getTypeMission = this.getTypeMission.bind(this);
    }

    getTypeMission(callback){
        console.log(QuotationRoutes.apiTypeMission)
        this.http
            .get(QuotationRoutes.apiTypeMission)
            .then((response)=>{
                if (callback) callback(response.data);
            })
            .catch((err) => console.error(err))
    }

    getTransmissionMode(callback){
        console.log(QuotationRoutes.apiTransmissionMode)
        this.http
            .get(QuotationRoutes.apiTransmissionMode)
            .then((response)=>{
                if (callback) callback(response.data);
            })
            .catch((err) => console.error(err))
    }
    
}