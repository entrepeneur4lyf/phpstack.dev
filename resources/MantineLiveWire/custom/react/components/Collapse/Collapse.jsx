import React from 'react';
import { Collapse as MantineCollapse } from '@mantine/core';

function Collapse({ wire, mingleData, children }) {
    const {
        in: opened,
        transitionDuration,
        transitionTimingFunction,
        onTransitionEnd,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCollapse
            in={opened}
            transitionDuration={transitionDuration}
            transitionTimingFunction={transitionTimingFunction}
            onTransitionEnd={onTransitionEnd}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineCollapse>
    );
}

export default Collapse;
