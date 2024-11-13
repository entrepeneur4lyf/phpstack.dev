import React from 'react';
import { Progress as MantineProgress } from '@mantine/core';

function Progress({ wire, mingleData, children }) {
    const {
        value,
        color,
        radius,
        size,
        striped,
        animated,
        transitionDuration,
        'aria-label': ariaLabel,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineProgress
            value={value}
            color={color}
            radius={radius}
            size={size}
            striped={striped}
            animated={animated}
            transitionDuration={transitionDuration}
            aria-label={ariaLabel}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineProgress>
    );
}

Progress.Root = function ProgressRoot({ wire, mingleData, children }) {
    const {
        size,
        radius,
        transitionDuration,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineProgress.Root
            size={size}
            radius={radius}
            transitionDuration={transitionDuration}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineProgress.Root>
    );
};

Progress.Section = function ProgressSection({ wire, mingleData, children }) {
    const {
        value,
        color,
        striped,
        animated,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineProgress.Section
            value={value}
            color={color}
            striped={striped}
            animated={animated}
            aria-label={ariaLabel}
        >
            {children}
        </MantineProgress.Section>
    );
};

Progress.Label = function ProgressLabel({ children }) {
    return <MantineProgress.Label>{children}</MantineProgress.Label>;
};

export default Progress;
