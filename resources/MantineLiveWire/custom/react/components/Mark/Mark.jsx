import React from 'react';
import { Mark as MantineMark } from '@mantine/core';

function Mark({ wire, mingleData, children }) {
    const {
        color,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineMark
            color={color}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineMark>
    );
}

export default Mark;
