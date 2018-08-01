
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
        axios.all([
            this.http.get(QuotationRoutes.apiMissions),
            this.http.get(QuotationRoutes.apiTypeMission),
            this.http.get(QuotationRoutes.apiTransmissionMode),
            this.http.get(QuotationRoutes.apiQuotationSetting),
        ]).then(axios.spread((responseMission, responseTypeMission, responseTransmissionMode, responseQuotationSetting)=>{
            const typeMission= responseTypeMission.data["hydra:member"];
            const mission= responseMission.data["hydra:member"];
            const modes= responseTransmissionMode.data["hydra:member"];
            callback({mission,typeMission,modes }, (responseQuotationSetting.data["hydra:member"] === undefined || responseQuotationSetting.data["hydra:member"].length == 0)?responseQuotationSetting.data["hydra:member"]:responseQuotationSetting.data["hydra:member"][0]);
        })).catch((err) => console.error(err))
    }


    updateMission(data,id ,callback){
        console.log(QuotationRoutes.apiMissions+"/"+id)
        this.http
            .put(QuotationRoutes.apiMissions+"/"+id, data)
            .then((response)=>{
                if (callback) callback(response.data);
            })
            .catch((err) => console.error(err))
    }

    updateQuotationSetting(data, id ,callback){
        console.log(QuotationRoutes.apiQuotationSetting+"/"+id)
        console.log(data)
        this.http
            .put(QuotationRoutes.apiQuotationSetting+"/"+id, data)
            .then((response)=>{
                if (callback) callback(response.data);
            })
            .catch((err) => console.error(err))
    }
}