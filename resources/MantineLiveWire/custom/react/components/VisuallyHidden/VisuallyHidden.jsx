import React from 'react';
import { VisuallyHidden as MantineVisuallyHidden } from '@mantine/core';

function VisuallyHidden({ wire, mingleData, children }) {
    const {
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineVisuallyHidden
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineVisuallyHidden>
    );
}

export default VisuallyHidden;
