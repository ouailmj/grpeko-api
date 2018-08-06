import React from 'react';
import ReactDOM from 'react-dom';
import QuotationService from "../services/quotation";
import SettingQuotation from "../components/SettingQuotation";
import OtherSettingQuotation from "../components/SettingQuotation/OtherSettingQuotation";

const quotationService = new QuotationService()

quotationService.initiliseSettingQuotation((res, quotationSetting)=>{
    ReactDOM.render(<SettingQuotation modes={res.modes} missions={res.mission} typeMissions={res.typeMission}/>, document.getElementById('eko-setting-quotation-container'));
    ReactDOM.render(<OtherSettingQuotation quotationSetting={quotationSetting} />, document.getElementById('eko-other-setting-quotation-container'));
})

