import React from 'react';
import { Anchor as MantineAnchor } from '@mantine/core';

function Anchor({ wire, mingleData, children }) {
    const {
        component,
        href,
        target,
        rel,
        underline,
        variant,
        gradient,
        size,
        fw,
        fz,
        lh,
        fs,
        lts,
        ta,
        tt,
        td,
        onClick,
    } = mingleData;

    return (
        <MantineAnchor
            component={component}
            href={href}
            target={target}
            rel={rel}
            underline={underline}
            variant={variant}
            gradient={gradient}
            size={size}
            fw={fw}
            fz={fz}
            lh={lh}
            fs={fs}
            lts={lts}
            ta={ta}
            tt={tt}
            td={td}
            onClick={onClick ? () => wire.emit('click') : undefined}
        >
            {children}
        </MantineAnchor>
    );
}

export default Anchor;
