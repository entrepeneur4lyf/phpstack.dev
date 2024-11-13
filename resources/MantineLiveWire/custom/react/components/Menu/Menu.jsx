import React from 'react';
import { Menu as MantineMenu } from '@mantine/core';

function Menu({ wire, mingleData, children }) {
    const {
        opened,
        onChange,
        trigger,
        openDelay,
        closeDelay,
        loop,
        closeOnItemClick,
        closeOnEscape,
        position,
        offset,
        withArrow,
        transitionProps,
        width,
        shadow,
        withinPortal,
        trapFocus,
        menuItemTabIndex,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineMenu
            opened={opened}
            onChange={onChange}
            trigger={trigger}
            openDelay={openDelay}
            closeDelay={closeDelay}
            loop={loop}
            closeOnItemClick={closeOnItemClick}
            closeOnEscape={closeOnEscape}
            position={position}
            offset={offset}
            withArrow={withArrow}
            transitionProps={transitionProps}
            width={width}
            shadow={shadow}
            withinPortal={withinPortal}
            trapFocus={trapFocus}
            menuItemTabIndex={menuItemTabIndex}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineMenu>
    );
}

Menu.Target = function MenuTarget({ wire, mingleData, children }) {
    return <MantineMenu.Target>{children}</MantineMenu.Target>;
};

Menu.Dropdown = function MenuDropdown({ wire, mingleData, children }) {
    return <MantineMenu.Dropdown>{children}</MantineMenu.Dropdown>;
};

Menu.Item = function MenuItem({ wire, mingleData, children }) {
    const { color, disabled, leftSection, rightSection, component } = mingleData;

    return (
        <MantineMenu.Item
            color={color}
            disabled={disabled}
            leftSection={leftSection}
            rightSection={rightSection}
            component={component}
        >
            {children}
        </MantineMenu.Item>
    );
};

Menu.Label = function MenuLabel({ wire, mingleData, children }) {
    return <MantineMenu.Label>{children}</MantineMenu.Label>;
};

Menu.Divider = function MenuDivider({ wire, mingleData }) {
    return <MantineMenu.Divider />;
};

export default Menu;
