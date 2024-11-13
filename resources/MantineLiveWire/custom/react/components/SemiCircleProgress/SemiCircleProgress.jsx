import React from 'react';
import { SemiCircleProgress as MantineSemiCircleProgress } from '@mantine/core';

function SemiCircleProgress({ wire, mingleData, children }) {
    const {
        value,
        size,
        thickness,
        label,
        labelPosition,
        fillDirection,
        orientation,
        filledSegmentColor,
        emptySegmentColor,
        transitionDuration,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineSemiCircleProgress
            value={value}
            size={size}
            thickness={thickness}
            label={label}
            labelPosition={labelPosition}
            fillDirection={fillDirection}
            orientation={orientation}
            filledSegmentColor={filledSegmentColor}
            emptySegmentColor={emptySegmentColor}
            transitionDuration={transitionDuration}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineSemiCircleProgress>
    );
}

export default SemiCircleProgress;
