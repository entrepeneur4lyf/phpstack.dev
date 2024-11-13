import React from 'react';
import { Divider as MantineDivider } from '@mantine/core';

function Divider({ wire, mingleData, children }) {
    const {
        variant,
        size,
        label,
        labelPosition,
        orientation,
        my,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDivider
            variant={variant}
            size={size}
            label={label}
            labelPosition={labelPosition}
            orientation={orientation}
            my={my}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineDivider>
    );
}

export default Divider;
