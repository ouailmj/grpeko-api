
import HttpService from "./http";
import axios from 'axios';
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
                if (callback) callback(response.data["hydra:member"]);
            })
            .catch((err) => console.error(err))
    }

    getTransmissionMode(callback){
        console.log(QuotationRoutes.apiTransmissionMode)
        this.http
            .get(QuotationRoutes.apiTransmissionMode)
            .then((response)=>{
                if (callback) callback(response.data["hydra:member"]);
            })
            .catch((err) => console.error(err))
    }

    getMission(callback){
        console.log(QuotationRoutes.apiMissions)
        this.http
            .get(QuotationRoutes.apiMissions)
            .then((response)=>{
                if (callback) callback(response.data["hydra:member"]);
            })
            .catch((err) => console.error(err))
    }
    initiliseSettingQuotation(callback){
        console.log(QuotationRoutes.apiMissions)
        axios.all([
            this.http.get(QuotationRoutes.apiMissions),
            this.http.get(QuotationRoutes.apiTypeMission),
            this.http.get(QuotationRoutes.apiTransmissionMode),
        ]).then(axios.spread((responseMission, responseTypeMission, responseTransmissionMode)=>{
            const typeMission= responseTypeMission.data["hydra:member"];
            const mission= responseMission.data["hydra:member"];
            const modes= responseTransmissionMode.data["hydra:member"];
            callback({mission,typeMission,modes });
        })).catch((err) => console.error(err))
    }

}