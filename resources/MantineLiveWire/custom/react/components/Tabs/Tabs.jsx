import React from 'react';
import { Tabs as MantineTabs } from '@mantine/core';

function Tabs({ wire, mingleData, children }) {
    const {
        value,
        defaultValue,
        onChange,
        orientation,
        color,
        variant,
        radius,
        placement,
        grow,
        inverted,
        activateTabWithKeyboard,
        allowTabDeactivation,
        keepMounted,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineTabs
            value={value}
            defaultValue={defaultValue}
            onChange={onChange ? (value) => wire.emit('change', value) : undefined}
            orientation={orientation}
            color={color}
            variant={variant}
            radius={radius}
            placement={placement}
            grow={grow}
            inverted={inverted}
            activateTabWithKeyboard={activateTabWithKeyboard}
            allowTabDeactivation={allowTabDeactivation}
            keepMounted={keepMounted}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTabs>
    );
}

Tabs.List = function TabsList({ wire, mingleData, children }) {
    const {
        grow,
        justify,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineTabs.List
            grow={grow}
            justify={justify}
            aria-label={ariaLabel}
        >
            {children}
        </MantineTabs.List>
    );
};

Tabs.Tab = function Tab({ wire, mingleData, children }) {
    const {
        value,
        leftSection,
        rightSection,
        color,
        disabled,
        'aria-label': ariaLabel,
    } = mingleData;

    return (
        <MantineTabs.Tab
            value={value}
            leftSection={leftSection}
            rightSection={rightSection}
            color={color}
            disabled={disabled}
            aria-label={ariaLabel}
        >
            {children}
        </MantineTabs.Tab>
    );
};

Tabs.Panel = function Panel({ wire, mingleData, children }) {
    const { value } = mingleData;

    return (
        <MantineTabs.Panel value={value}>
            {children}
        </MantineTabs.Panel>
    );
};

export default Tabs;
