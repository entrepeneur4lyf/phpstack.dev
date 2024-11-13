import React from 'react';
import { Group as MantineGroup } from '@mantine/core';

function Group({ wire, mingleData, children }) {
    const {
        gap,
        justify,
        align,
        wrap,
        grow,
        preventGrowOverflow,
    } = mingleData;

    return (
        <MantineGroup
            gap={gap}
            justify={justify}
            align={align}
            wrap={wrap}
            grow={grow}
            preventGrowOverflow={preventGrowOverflow}
        >
            {children}
        </MantineGroup>
    );
}

export default Group;
