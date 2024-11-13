import React from 'react';
import { Highlight as MantineHighlight } from '@mantine/core';

function Highlight({ wire, mingleData, children }) {
    const {
        highlight,
        highlightStyles,
        component,
        color,
        fw,
        c,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineHighlight
            highlight={highlight}
            highlightStyles={highlightStyles}
            component={component}
            color={color}
            fw={fw}
            c={c}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineHighlight>
    );
}

export default Highlight;
