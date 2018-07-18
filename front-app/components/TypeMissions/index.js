import React from 'react';
import PropTypes from 'prop-types';
import TypeMission from "./TypeMission";

class TypeMissions extends React.Component{

    constructor(props){
        super(props);
        this.state = {
            typeMissions : ''
        }
    }
    render() {
        const oo = this.props.typeMissions.map((item , i) =>
            <TypeMission  key={i} typeMission = {item}/>
        );
        console.log(oo)
        return (

            <div className="row">
                <div className="col-md-6" style={{margin: '1rem'}}>
                    <div className="panel panel-flat border-top-info ">
                        <div className="panel-heading">
                            <h5 className="panel-title">Basic layout<a className="heading-elements-toggle"><i className="icon-more"></i></a></h5>
                            <div className="heading-elements"></div>
                        </div>
                        <div className="panel-body"></div>

                        {oo}

            </div>

                </div>
            </div>



        );
    }
}

TypeMissions.propTypes = {
    typeMissions: PropTypes.array,
};
export default TypeMissions;