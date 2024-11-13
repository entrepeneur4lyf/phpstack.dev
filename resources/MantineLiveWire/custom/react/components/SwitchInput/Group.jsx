import React from 'react';
import { Switch } from '@mantine/core';

function Group({ wire, mingleData, children }) {
    const {
        value,
        defaultValue,
        label,
        description,
        error,
        withAsterisk,
        size,
        color,
        radius,
        labelPosition,
        wrapperProps,
    } = mingleData;

    return (
        <Switch.Group
            value={value}
            defaultValue={defaultValue}
            label={label}
            description={description}
            error={error}
            withAsterisk={withAsterisk}
            size={size}
            color={color}
            radius={radius}
            labelPosition={labelPosition}
            wrapperProps={wrapperProps}
            onChange={(value) => wire.emit('change', value)}
        >
            {children}
        </Switch.Group>
    );
}

export default Group;
