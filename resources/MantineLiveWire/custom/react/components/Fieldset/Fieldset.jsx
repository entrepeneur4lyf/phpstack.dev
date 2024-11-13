import React from 'react';
import { Fieldset as MantineFieldset } from '@mantine/core';

function Fieldset({ wire, mingleData, children }) {
    const {
        legend,
        variant,
        radius,
        disabled,
    } = mingleData;

    return (
        <MantineFieldset
            legend={legend}
            variant={variant}
            radius={radius}
            disabled={disabled}
        >
            {children}
        </MantineFieldset>
    );
}

export default Fieldset;
