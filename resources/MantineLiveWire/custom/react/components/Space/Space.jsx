import React from 'react';
import { Space as MantineSpace } from '@mantine/core';

function Space({ wire, mingleData }) {
    const {
        h,
        w,
    } = mingleData;

    return (
        <MantineSpace
            h={h}
            w={w}
        />
    );
}

export default Space;
