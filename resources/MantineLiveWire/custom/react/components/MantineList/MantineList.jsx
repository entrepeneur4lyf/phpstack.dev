import React from 'react';
import { List } from '@mantine/core';

function MantineList({ wire, mingleData, children }) {
    const {
        type, // "ordered" | "unordered"
        withPadding, // boolean
        size, // MantineSize
        spacing, // MantineSpacing
        center, // boolean
        icon, // React.ReactNode
        listStyleType, // ListStyleType
    } = mingleData;

    return (
        <List
            type={type}
            withPadding={withPadding}
            size={size}
            spacing={spacing}
            center={center}
            icon={icon}
            listStyleType={listStyleType}
        >
            {children}
        </List>
    );
}

MantineList.Item = function ListItem({ wire, mingleData, children }) {
    const {
        icon // React.ReactNode
    } = mingleData;

    return (
        <List.Item
            icon={icon}
        >
            {children}
        </List.Item>
    );
};

export default MantineList;
