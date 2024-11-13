import React from 'react';
import { Skeleton as MantineSkeleton } from '@mantine/core';

function Skeleton({ wire, mingleData, children }) {
    const {
        visible,
        height,
        width,
        radius,
        circle,
        animate,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineSkeleton
            visible={visible}
            height={height}
            width={width}
            radius={radius}
            circle={circle}
            animate={animate}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineSkeleton>
    );
}

export default Skeleton;
