import React from 'react';
import { Title as MantineTitle } from '@mantine/core';

function Title({ wire, mingleData, children }) {
    const {
        order,
        size,
        textWrap,
        lineClamp,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTitle
            order={order}
            size={size}
            textWrap={textWrap}
            lineClamp={lineClamp}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTitle>
    );
}

export default Title;
