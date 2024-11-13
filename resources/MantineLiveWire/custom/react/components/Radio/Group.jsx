import React from 'react';
import { Radio as MantineRadio } from '@mantine/core';

function Group({ wire, mingleData, children }) {
    const {
        name,
        label,
        description,
        error,
        withAsterisk,
        value,
        defaultValue,
        size,
        color,
        variant,
        labelPosition,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineRadio.Group
            name={name}
            label={label}
            description={description}
            error={error}
            withAsterisk={withAsterisk}
            value={value}
            defaultValue={defaultValue}
            size={size}
            color={color}
            variant={variant}
            labelPosition={labelPosition}
            aria-label={ariaLabel}
            onChange={(value) => wire.emit('change', value)}
        >
            {children}
        </MantineRadio.Group>
    );
}

export default Group;
