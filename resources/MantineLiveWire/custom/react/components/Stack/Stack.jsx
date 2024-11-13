import React from 'react';
import { Stack as MantineStack } from '@mantine/core';

function Stack({ wire, mingleData, children }) {
    const {
        align,
        justify,
        gap,
        h,
        bg,
    } = mingleData;

    return (
        <MantineStack
            align={align}
            justify={justify}
            gap={gap}
            h={h}
            bg={bg}
        >
            {children}
        </MantineStack>
    );
}

export default Stack;
