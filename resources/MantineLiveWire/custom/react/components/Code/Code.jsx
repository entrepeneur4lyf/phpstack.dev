import React from 'react';
import { Code as MantineCode } from '@mantine/core';

function Code({ wire, mingleData, children }) {
    const {
        block,
        color,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCode
            block={block}
            color={color}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineCode>
    );
}

export default Code;
