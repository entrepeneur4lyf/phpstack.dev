import React from 'react';
import { Radio as MantineRadio } from '@mantine/core';

function Card({ wire, mingleData, children }) {
    const {
        radius,
        checked,
        value,
        defaultValue,
        name,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantineRadio.Card
            radius={radius}
            checked={checked}
            value={value}
            defaultValue={defaultValue}
            name={name}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
            onClick={() => wire.emit('click', checked)}
            onChange={(event) => wire.emit('change', event.currentTarget.checked)}
        >
            {children}
        </MantineRadio.Card>
    );
}

export default Card;
