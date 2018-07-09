import React from 'react';
import PropTypes from 'prop-types';

const modalRoot = document.getElementById('modal-root');

class Button extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            labelText: 'Button'
        };
    }
    render() {
        return (
            <button  onClick={this.props.clickAction} className={this.props.classes} > {this.props.labelText} </button>
        );
      }
}

Button.propTypes = {
    labelText: PropTypes.string,
    clickAction: PropTypes.func,
    classes: PropTypes.string,
};

export default Button;
