import React from 'react';
import PropTypes from 'prop-types';
import CostOfTheMissions from "./CostOfTheMissions";

class SettingQuotation extends React.Component{

    constructor(props){
        super(props)
    }

    render(){

        return(
            <div className="row">
                <div className="col-xs-12 col-md-12 mb-20">
                    <div className="table-responsive">
                    <CostOfTheMissions modes={this.props.modes} missions={this.props.missions} typeMissions={this.props.typeMissions}/>
                    </div>
                </div>
            </div>
        )
    }
}

SettingQuotation.propTypes = {
    missions: PropTypes.array,
    typeMissions: PropTypes.array,
    modes: PropTypes.array,
};
export default SettingQuotation;
