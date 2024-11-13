import React from 'react';
import { Image as MantineImage } from '@mantine/core';

function Image({ wire, mingleData, children }) {
    const {
        src,
        alt,
        height,
        width,
        radius,
        fit,
        fallbackSrc,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineImage
            src={src}
            alt={alt}
            height={height}
            width={width}
            radius={radius}
            fit={fit}
            fallbackSrc={fallbackSrc}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineImage>
    );
}

export default Image;
