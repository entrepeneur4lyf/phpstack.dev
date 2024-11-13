import React from 'react';
import { Avatar as MantineAvatar } from '@mantine/core';

function Avatar({ wire, mingleData, children }) {
    const {
        src,
        alt,
        name,
        color,
        variant,
        radius,
        size,
        gradient,
        allowedInitialsColors,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineAvatar
            src={src}
            alt={alt}
            name={name}
            color={color}
            variant={variant}
            radius={radius}
            size={size}
            gradient={gradient}
            allowedInitialsColors={allowedInitialsColors}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineAvatar>
    );
}

Avatar.Group = function AvatarGroup({ wire, mingleData, children }) {
    const { spacing } = mingleData;

    return (
        <MantineAvatar.Group spacing={spacing}>
            {children}
        </MantineAvatar.Group>
    );
};

export default Avatar;
