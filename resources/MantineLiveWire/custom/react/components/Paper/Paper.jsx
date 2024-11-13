import React from 'react';
import { Paper as MantinePaper } from '@mantine/core';

function Paper({ wire, mingleData, children }) {
    const {
        shadow,
        radius,
        withBorder,
        p,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantinePaper
            shadow={shadow}
            radius={radius}
            withBorder={withBorder}
            p={p}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantinePaper>
    );
}

export default Paper;
