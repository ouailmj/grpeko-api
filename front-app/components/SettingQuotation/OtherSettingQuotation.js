import React from 'react';
import QuotationService from "../../services/quotation";

export default class OtherSettingQuotation extends React.Component{

    constructor(props){
        super(props)

        this.state = {
            coefficientNumberWritingByInvoice: this.props.quotationSetting.coefficientNumberWritingByInvoice,
            numberWritingPerMinutes: this.props.quotationSetting.numberWritingPerMinutes,
        };

        this.handleChangeCoefficientNumberWritingByInvoice = this.handleChangeCoefficientNumberWritingByInvoice.bind(this);
        this.handleChangeNumberWritingPerMinutes = this.handleChangeNumberWritingPerMinutes.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChangeCoefficientNumberWritingByInvoice(event) {
        this.setState({coefficientNumberWritingByInvoice: parseInt(event.target.value, 10)});
    }

    handleChangeNumberWritingPerMinutes(event) {
        this.setState({numberWritingPerMinutes: parseInt(event.target.value, 10)});
    }

    handleSubmit(event) {
        console.log(this.props.quotationSetting.id);
        const quotationService = new QuotationService();
        const data =
            {
                "coefficientNumberWritingByInvoice":  this.state.coefficientNumberWritingByInvoice,
                "numberWritingPerMinutes": this.state.numberWritingPerMinutes
            }
        quotationService.updateQuotationSetting(data, this.props.quotationSetting.id, (res)=>{
            alert('Votre opération a été exécutée avec succès');
        })
        event.preventDefault();
    }
    render(){
        return (
            <form onSubmit={this.handleSubmit} className="form-horizontal col-md-6">
                <div className=" ">
                    <label className="control-label col-md-12">Coefficient de nombre écriture par facture : </label>
                    <div className="col-md-12">
                        <input type="number" value={this.state.coefficientNumberWritingByInvoice}  className="form-control col-md-12" onChange={this.handleChangeCoefficientNumberWritingByInvoice} />
                    </div>
                </div>
                <div className=" ">
                    <label className="control-label col-md-12">Nombre écriture par minutes : </label>
                    <div className="col-md-12">
                        <input type="number" value={this.state.numberWritingPerMinutes}  className="form-control col-md-12" onChange={this.handleChangeNumberWritingPerMinutes} />
                    </div>
                </div>

                <input type="submit" className="btn bg-blue heading-btn legitRipple"  style={{margin : '10px', float: 'left',backgroundColor: "#5d9d9c",borderColor: "#5d9d9c"}}  value="Submit" />
            </form>
        )
    }
}