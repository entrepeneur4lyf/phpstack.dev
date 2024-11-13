import React from 'react';
import { AspectRatio as MantineAspectRatio } from '@mantine/core';

function AspectRatio({ wire, mingleData, children }) {
    const {
        ratio,
        maw,
        mx,
    } = mingleData;

    return (
        <MantineAspectRatio
            ratio={ratio}
            maw={maw}
            mx={mx}
        >
            {children}
        </MantineAspectRatio>
    );
}

export default AspectRatio;
