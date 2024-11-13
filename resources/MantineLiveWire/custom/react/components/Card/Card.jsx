import React from 'react';
import { Card as MantineCard } from '@mantine/core';

function Card({ wire, mingleData, children }) {
    const {
        padding,
        radius,
        withBorder,
        shadow,
        component,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCard
            padding={padding}
            radius={radius}
            withBorder={withBorder}
            shadow={shadow}
            component={component}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineCard>
    );
}

Card.Section = function CardSection({ wire, mingleData, children }) {
    const {
        withBorder,
        inheritPadding,
        component,
    } = mingleData;

    return (
        <MantineCard.Section
            withBorder={withBorder}
            inheritPadding={inheritPadding}
            component={component}
        >
            {children}
        </MantineCard.Section>
    );
};

export default Card;
