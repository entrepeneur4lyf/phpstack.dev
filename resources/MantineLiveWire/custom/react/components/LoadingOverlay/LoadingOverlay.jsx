import React from 'react';
import { LoadingOverlay as MantineLoadingOverlay } from '@mantine/core';

function LoadingOverlay({ wire, mingleData, children }) {
    const {
        visible,
        loaderProps,
        overlayProps,
        zIndex,
        transitionProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineLoadingOverlay
            visible={visible}
            loaderProps={loaderProps}
            overlayProps={overlayProps}
            zIndex={zIndex}
            transitionProps={transitionProps}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineLoadingOverlay>
    );
}

export default LoadingOverlay;
