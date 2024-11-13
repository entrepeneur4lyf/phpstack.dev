import React from 'react';
import { Overlay as MantineOverlay } from '@mantine/core';

function Overlay({ wire, mingleData, children }) {
    const {
        color,
        backgroundOpacity,
        gradient,
        blur,
        center,
        fixed,
        zIndex,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineOverlay
            color={color}
            backgroundOpacity={backgroundOpacity}
            gradient={gradient}
            blur={blur}
            center={center}
            fixed={fixed}
            zIndex={zIndex}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineOverlay>
    );
}

export default Overlay;
