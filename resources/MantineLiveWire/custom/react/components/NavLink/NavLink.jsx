import React from 'react';
import { NavLink as MantineNavLink } from '@mantine/core';

function NavLink({ wire, mingleData, children }) {
    const {
        label,
        description,
        leftSection,
        rightSection,
        active,
        variant,
        color,
        autoContrast,
        disabled,
        childrenOffset,
        defaultOpened,
        opened,
        onChange,
        onClick,
        component,
        href,
        target,
        rel,
    } = mingleData;

    return (
        <MantineNavLink
            label={label}
            description={description}
            leftSection={leftSection}
            rightSection={rightSection}
            active={active}
            variant={variant}
            color={color}
            autoContrast={autoContrast}
            disabled={disabled}
            childrenOffset={childrenOffset}
            defaultOpened={defaultOpened}
            opened={opened}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            onClick={onClick ? () => wire.emit('click') : undefined}
            component={component}
            href={href}
            target={target}
            rel={rel}
        >
            {children}
        </MantineNavLink>
    );
}

export default NavLink;
