import React from 'react';
import ReactDOM from 'react-dom';
import QuotationService from "../services/quotation";
import TypeMissions from "../components/TypeMissions";

const quotationService = new QuotationService()

quotationService.getTypeMission((res)=>{
    console.log('getTypeMission',res)
    ReactDOM.render(<TypeMissions typeMissions = {res} />, document.getElementById('eko-quotation-container'));
})
