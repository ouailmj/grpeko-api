import React from 'react';
import ReactDOM from 'react-dom';
import Button from "../components/Button";
import QuotationService from "../services/quotation";

const quotationService = new QuotationService()

quotationService.getTypeMission((res)=>{
    console.log('res',res.data)
    ReactDOM.render(<Button labelText='Hello Button'/>, document.getElementById('eko-quotation-container'));
})
 console.log(quotationService)
