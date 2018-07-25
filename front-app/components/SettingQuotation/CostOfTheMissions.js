import React from 'react';
import PropTypes from 'prop-types';
import MissionLineQuotation from "./MissionLineQuotation";
import QuotationService from "../../services/quotation";

class CostOfTheMissions extends React.Component{
    constructor(props){
        super(props)
    }


    render(){

        let listItems = this.props.missions.map((item , i) =>
                // Correct! Key should be specified inside the array.
                <MissionLineQuotation  key={i+item.title}
                                      allMode={this.props.modes} allTypeMission={this.props.typeMissions} mission={item} />
            );

        return (
            <table className="table">
                <thead>
                <tr>
                    <th colSpan="9" style={{textAlign: 'center', backgroundColor: '#eef3fd'}}>Cout des
                        missions
                    </th>
                </tr>
                <tr className="text-center">
                    <th></th>
                    <th></th>
                    <th>catégorie</th>
                    <th>Mission</th>
                    <th>Mode de trasmission</th>
                    <th>calcule à partir des heures retenues</th>
                    <th>Nombre par an par défaut</th>
                    <th>Temps Unitaire (h)</th>
                    <th>Montant Fixe (€) </th>
                </tr>
                </thead>
                <tbody>
                {listItems}
                </tbody>
            </table>
        )
    }
}
CostOfTheMissions.propTypes = {
    missions: PropTypes.array,
    typeMissions: PropTypes.array,
    modes: PropTypes.array,
};
export default CostOfTheMissions;