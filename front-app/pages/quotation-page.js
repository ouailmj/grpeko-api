import React from 'react';
import ReactDOM from 'react-dom';
import QuotationService from "../services/quotation";
import TypeMissions from "../components/TypeMissions";

const quotationService = new QuotationService()

quotationService.getTypeMission((res)=>{
    console.log('getTypeMission',res["hydra:member"])

        ReactDOM.render(<TypeMissions typeMissions = {res["hydra:member"]} />, document.getElementById('eko-quotation-container'));
})
