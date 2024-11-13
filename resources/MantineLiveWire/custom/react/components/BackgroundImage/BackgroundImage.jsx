import React from 'react';
import { BackgroundImage as MantineBackgroundImage } from '@mantine/core';

function BackgroundImage({ wire, mingleData, children }) {
    const {
        src,
        radius,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBackgroundImage
            src={src}
            radius={radius}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineBackgroundImage>
    );
}

export default BackgroundImage;
