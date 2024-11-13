import React from 'react';
import { Loader as MantineLoader } from '@mantine/core';

function Loader({ wire, mingleData, children }) {
    const {
        type,
        color,
        size,
        loaders,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineLoader
            type={type}
            color={color}
            size={size}
            loaders={loaders}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineLoader>
    );
}

export default Loader;
