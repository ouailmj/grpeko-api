
import React from 'react'
import PropTypes from 'prop-types';

class MissionLine extends React.Component{

    constructor(props){
        super(props)
        this.state = {
            price: 0.00,
            numbers: 0
        }
        this.getResponse = this.getResponse.bind(this)

    }



    getResponse(event){
        this.setState({
            numbers: parseFloat(event.target.value, 10).toFixed(2),
            price: this.props.missionLine.time*parseFloat(event.target.value, 10).toFixed(2)
        })
    }

    render(){

        return(
            <tr>
                <td  style={{    width: '100%',
                    paddingRight: '5px !important',
                    paddingLeft: '10px !important'}}
                >{this.props.missionLine.title}</td>
                <td>
                    <input style={{width: '60px'}} type={'text'}  onChange={this.getResponse} />
                </td>
                <td>{this.props.missionLine.unitTime}</td>
                <td>{this.state.price}</td>
            </tr>

        )
    }
}


MissionLine.propTypes = {
    missionLine: PropTypes.object,
};

export default MissionLine;