import React from 'react';
import PropTypes from 'prop-types';
import ContentEditable from "react-sane-contenteditable";

class MissionLineQuotation extends React.Component{

    constructor(props){
        super(props)
        this.state={
            missionType: this.props.mission.typeMission,
            missionTitle: this.props.mission.title,
            mode: this.props.mission.mode,
            isCalculateFromTheTimeRetained: this.props.mission.isCalculateFromTheTimeRetained,
            defaultNumberPerYear: this.props.mission.defaultNumberPerYear,
            unitTime: this.props.mission.unitTime,
            fixedAmount: this.props.mission.fixedAmount,
        }
        this.handleChangeMissionTitle = this.handleChangeMissionTitle.bind(this)
        this.handleChangeDefaultNumberPerYear = this.handleChangeDefaultNumberPerYear.bind(this)
        this.handleChangeUnitTime = this.handleChangeUnitTime.bind(this)
        this.handleChangeFixedAmount = this.handleChangeFixedAmount.bind(this)
        this.handleChangeCalculateFromTheTimeRetained = this.handleChangeCalculateFromTheTimeRetained.bind(this)
        this.handleChangeMissionType = this.handleChangeMissionType.bind(this)
        this.handleChangeMode = this.handleChangeMode.bind(this)

    }

    handleChangeMissionTitle(evt , value){
        this.setState({ missionTitle: value });
    }

    handleChangeDefaultNumberPerYear(evt , value){
        this.setState({ defaultNumberPerYear: parseInt(value, 10)  });
    }

    handleChangeUnitTime(evt , value){
        this.setState({ unitTime: parseInt(value, 10) });
    }

    handleChangeFixedAmount(evt , value){
        this.setState({ fixedAmount: parseInt(value, 10) });
    }

    handleChangeMissionType(evt){
        this.setState({ missionType: evt.target.value });
    }

    handleChangeMode(evt){
        this.setState({ mode: evt.target.value });
    }

    handleChangeCalculateFromTheTimeRetained(event){
            const target = event.target;
            const value = target.type === 'checkbox' ? target.checked : target.value;
            this.setState({
                isCalculateFromTheTimeRetained: value
            });
    }

    render(){
        const listItemTypeMission = this.props.allTypeMission.map((item , i) =>
            // Correct! Key should be specified inside the array.
            <option  selected={item["@id"] == this.state.missionType["@id"]?true:false} key={i+item.type} value={item["@id"]}>{item.type}</option>
        );
        const listItemModes = this.props.allMode.map((item , i) =>
            // Correct! Key should be specified inside the array.
            <option  selected={ this.state.mode != null ?item["@id"] == this.state.mode["@id"]?true:false:false} key={i+item.id} value={item["@id"]}>{item.mode}</option>
        );
        return (
            <tr>
                <td><a href="#"><i className="glyphicon glyphicon-trash text-danger"></i></a></td>
                <td><a href="#"><i className="glyphicon glyphicon-edit text-info"></i></a></td>
                <td>
                    <select value={this.state.missionType} onChange={this.handleChangeMissionType}>
                        {listItemTypeMission}
                    </select>
                </td>
                <td>
                    <ContentEditable
                        tagName="span"
                        className=""
                        content={this.state.missionTitle}
                        editable={true}
                        maxLength={140}
                        multiLine={false}
                        onChange={this.handleChangeMissionTitle}
                    />
                </td>
                <td>
                    <select  onChange={this.handleChangeMode}>
                        <option></option>
                        {listItemModes}
                    </select>

                </td>
                <td className="text-center">

                    <input
                        name="isCalculateFromTheTimeRetained"
                        type="checkbox"
                        checked={this.state.isCalculateFromTheTimeRetained}
                        onChange={this.handleChangeCalculateFromTheTimeRetained} />
                </td>
                <td className="text-center">
                    <ContentEditable
                        tagName="span"
                        className=""
                        content={this.state.defaultNumberPerYear==null?"vide":""+this.state.defaultNumberPerYear}
                        editable={!this.state.isCalculateFromTheTimeRetained}
                        maxLength={140}
                        multiLine={false}
                        onChange={this.handleChangeDefaultNumberPerYear}
                    />
                </td>
                <td className="text-center">
                    <ContentEditable
                        tagName="span"
                        className=""
                        content={this.state.unitTime==null?"vide":""+this.state.unitTime}
                        editable={true}
                        maxLength={140}
                        multiLine={false}
                        onChange={this.handleChangeUnitTime}
                    />
                </td>
                <td className="text-center">
                    <ContentEditable
                        tagName="span"
                        className=""
                        content={this.state.fixedAmount==null?"vide":""+this.state.fixedAmount}
                        editable={true}
                        maxLength={140}
                        multiLine={false}
                        onChange={this.handleChangeFixedAmount}
                    />
                </td>
            </tr>
        );
    }
}

MissionLineQuotation.propTypes = {
    mission: PropTypes.object,
    allTypeMission: PropTypes.array,
    allMode: PropTypes.array,
};
export default MissionLineQuotation;