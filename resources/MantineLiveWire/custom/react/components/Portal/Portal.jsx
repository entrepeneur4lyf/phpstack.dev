import React from 'react';
import { Portal as MantinePortal, OptionalPortal as MantineOptionalPortal } from '@mantine/core';

function Portal({ wire, mingleData, children }) {
    const {
        target,
        withinPortal,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantinePortal
            target={target}
            withinPortal={withinPortal}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantinePortal>
    );
}

function OptionalPortal({ wire, mingleData, children }) {
    const {
        withinPortal,
        target,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineOptionalPortal
            withinPortal={withinPortal}
            target={target}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineOptionalPortal>
    );
}

Portal.Optional = OptionalPortal;

export default Portal;
