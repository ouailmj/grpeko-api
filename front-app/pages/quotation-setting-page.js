import React from 'react';
import ReactDOM from 'react-dom';
import QuotationService from "../services/quotation";
import SettingQuotation from "../components/SettingQuotation";

const quotationService = new QuotationService()

quotationService.initiliseSettingQuotation((res)=>{
    ReactDOM.render(<SettingQuotation modes={res.modes} missions={res.mission} typeMissions={res.typeMission}/>, document.getElementById('eko-setting-quotation-container'));
})

