import React from 'react';
import { Combobox as MantineCombobox } from '@mantine/core';

function Combobox({ wire, mingleData, children }) {
    const {
        store,
        onOptionSubmit,
        resetSelectionOnOptionHover,
        position,
        middlewares,
        width,
        withArrow,
        shadow,
        transitionProps,
        dropdownPadding,
        withinPortal,
        hidden,
        zIndex,
        eventSource,
        loop,
        scrollBehavior,
    } = mingleData;

    return (
        <MantineCombobox
            store={store}
            onOptionSubmit={(val) => {
                if (onOptionSubmit) {
                    wire.emit('optionSubmit', val);
                }
            }}
            resetSelectionOnOptionHover={resetSelectionOnOptionHover}
            position={position}
            middlewares={middlewares}
            width={width}
            withArrow={withArrow}
            shadow={shadow}
            transitionProps={transitionProps}
            dropdownPadding={dropdownPadding}
            withinPortal={withinPortal}
            hidden={hidden}
            zIndex={zIndex}
            eventSource={eventSource}
            loop={loop}
            scrollBehavior={scrollBehavior}
        >
            {children}
        </MantineCombobox>
    );
}

Combobox.Target = function ComboboxTarget({ mingleData, children }) {
    return <MantineCombobox.Target {...mingleData}>{children}</MantineCombobox.Target>;
};

Combobox.EventsTarget = function ComboboxEventsTarget({ mingleData, children }) {
    return <MantineCombobox.EventsTarget {...mingleData}>{children}</MantineCombobox.EventsTarget>;
};

Combobox.DropdownTarget = function ComboboxDropdownTarget({ mingleData, children }) {
    return <MantineCombobox.DropdownTarget {...mingleData}>{children}</MantineCombobox.DropdownTarget>;
};

Combobox.Dropdown = function ComboboxDropdown({ mingleData, children }) {
    return <MantineCombobox.Dropdown {...mingleData}>{children}</MantineCombobox.Dropdown>;
};

Combobox.Options = function ComboboxOptions({ mingleData, children }) {
    return <MantineCombobox.Options {...mingleData}>{children}</MantineCombobox.Options>;
};

Combobox.Option = function ComboboxOption({ mingleData, children }) {
    return <MantineCombobox.Option {...mingleData}>{children}</MantineCombobox.Option>;
};

Combobox.Empty = function ComboboxEmpty({ children }) {
    return <MantineCombobox.Empty>{children}</MantineCombobox.Empty>;
};

Combobox.Group = function ComboboxGroup({ mingleData, children }) {
    return <MantineCombobox.Group {...mingleData}>{children}</MantineCombobox.Group>;
};

Combobox.Search = function ComboboxSearch({ wire, mingleData }) {
    return (
        <MantineCombobox.Search
            {...mingleData}
            onChange={(event) => wire.emit('change', event.currentTarget.value)}
            onKeyDown={(event) => wire.emit('keyDown', event.key)}
            onFocus={() => wire.emit('focus')}
            onBlur={() => wire.emit('blur')}
        />
    );
};

Combobox.Header = function ComboboxHeader({ children }) {
    return <MantineCombobox.Header>{children}</MantineCombobox.Header>;
};

Combobox.Footer = function ComboboxFooter({ children }) {
    return <MantineCombobox.Footer>{children}</MantineCombobox.Footer>;
};

export default Combobox;
