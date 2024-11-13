import React from 'react';
import { FloatingIndicator as MantineFloatingIndicator } from '@mantine/core';

function FloatingIndicator({ wire, mingleData, children }) {
    const {
        target,
        parent,
        transitionDuration,
        transitionTimingFunction,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineFloatingIndicator
            target={target}
            parent={parent}
            transitionDuration={transitionDuration}
            transitionTimingFunction={transitionTimingFunction}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineFloatingIndicator>
    );
}

export default FloatingIndicator;
