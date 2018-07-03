import React from 'react';
import Button from '../index';
import renderer from 'react-test-renderer';

test('Test button', () => {
    const component = renderer.create(
        <Button labelText='Just Button' classes='btn-primary btn-test' clickAction={(e)=> {}}/>,
    );
    let tree = component.toJSON();
    expect(tree).toMatchSnapshot();
});
