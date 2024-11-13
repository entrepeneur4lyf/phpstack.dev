import React from 'react';
import { Burger as MantineBurger } from '@mantine/core';

function Burger({ wire, mingleData, children }) {
    const {
        opened,
        size,
        color,
        lineSize,
        transitionDuration,
        onClick,
        'aria-label': ariaLabel,
        disabled,
    } = mingleData;

    return (
        <MantineBurger
            opened={opened}
            size={size}
            color={color}
            lineSize={lineSize}
            transitionDuration={transitionDuration}
            onClick={onClick ? () => wire.emit('click') : undefined}
            aria-label={ariaLabel}
            disabled={disabled}
        >
            {children}
        </MantineBurger>
    );
}

export default Burger;
