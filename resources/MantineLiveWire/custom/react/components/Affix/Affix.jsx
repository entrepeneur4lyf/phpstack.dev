import React from 'react';
import { Affix as MantineAffix } from '@mantine/core';

function Affix({ wire, mingleData, children }) {
    const {
        position,
        zIndex,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAffix
            position={position}
            zIndex={zIndex}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineAffix>
    );
}

export default Affix;
