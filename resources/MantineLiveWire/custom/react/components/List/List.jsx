import React from 'react';
import { List as MantineList } from '@mantine/core';

function List({ wire, mingleData, children }) {
    const {
        type,
        size,
        icon,
        spacing,
        center,
        withPadding,
        listStyleType,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineList
            type={type}
            size={size}
            icon={icon}
            spacing={spacing}
            center={center}
            withPadding={withPadding}
            listStyleType={listStyleType}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineList>
    );
}

List.Item = function ListItem({ wire, mingleData, children }) {
    const { icon } = mingleData;

    return (
        <MantineList.Item icon={icon}>
            {children}
        </MantineList.Item>
    );
};

export default List;
