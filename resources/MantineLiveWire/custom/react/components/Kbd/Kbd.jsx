import React from 'react';
import { Kbd as MantineKbd } from '@mantine/core';

function Kbd({ wire, mingleData, children }) {
    const {
        size,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineKbd
            size={size}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineKbd>
    );
}

export default Kbd;
