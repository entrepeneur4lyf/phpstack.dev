import React from 'react';
import { Text as MantineText } from '@mantine/core';

function Text({ wire, mingleData, children }) {
    const {
        size,
        fw,
        fs,
        td,
        tt,
        c,
        ta,
        variant,
        gradient,
        truncate,
        lineClamp,
        inherit,
        span,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineText
            size={size}
            fw={fw}
            fs={fs}
            td={td}
            tt={tt}
            c={c}
            ta={ta}
            variant={variant}
            gradient={gradient}
            truncate={truncate}
            lineClamp={lineClamp}
            inherit={inherit}
            span={span}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineText>
    );
}

export default Text;
