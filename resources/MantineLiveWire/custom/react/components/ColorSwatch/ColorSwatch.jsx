import React from 'react';
import { ColorSwatch as MantineColorSwatch } from '@mantine/core';

function ColorSwatch({ wire, mingleData, children }) {
    const {
        color,
        size,
        radius,
        withShadow,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineColorSwatch
            color={color}
            size={size}
            radius={radius}
            withShadow={withShadow}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineColorSwatch>
    );
}

export default ColorSwatch;
