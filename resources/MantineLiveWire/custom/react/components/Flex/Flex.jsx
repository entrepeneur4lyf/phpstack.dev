import React from 'react';
import { Flex as MantineFlex } from '@mantine/core';

function Flex({ wire, mingleData, children }) {
    const {
        gap,
        justify,
        align,
        wrap,
        direction,
    } = mingleData;

    return (
        <MantineFlex
            gap={gap}
            justify={justify}
            align={align}
            wrap={wrap}
            direction={direction}
        >
            {children}
        </MantineFlex>
    );
}

export default Flex;
