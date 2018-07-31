
import React from 'react'
import PropTypes from 'prop-types';
import MissionLine from "./MissionLine";

class TypeMission extends React.Component{

    constructor(props){
        super(props)
    }

    render(){


        const listItems = this.props.typeMission.missions.map((item , i) =>
            // Correct! Key should be specified inside the array.
            <MissionLine key={i+item.title}
                      missionLine = {item} />
        );
         return(

             <div className="table-responsive" style={{marginBottom: '1rem'}}>
                 <table className="table">
                     <thead>
                     <tr>
                         <th colSpan="4" style={ {
                             textAlign: 'center',
                             backgroundColor: '#eef3fd',}}
                         >{this.props.typeMission.type}
                         </th>
                     </tr>
                     <tr>
                         <th>Mission</th>
                         <th>Nombre</th>
                         <th>temps</th>
                         <th>0,00€</th>
                     </tr>
                     </thead>
                     <tbody>
                     {listItems}
                     </tbody>
                 </table>
             </div>
         )
    }
}

TypeMission.propTypes = {
    typeMission: PropTypes.object,
};

export default TypeMission;