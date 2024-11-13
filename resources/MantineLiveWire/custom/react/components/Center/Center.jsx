import React from 'react';
import { Center as MantineCenter } from '@mantine/core';

function Center({ wire, mingleData, children }) {
    const {
        inline,
    } = mingleData;

    return (
        <MantineCenter inline={inline}>
            {children}
        </MantineCenter>
    );
}

export default Center;
