import React from 'react';
import { Autocomplete as MantineAutocomplete } from '@mantine/core';

function Autocomplete({ wire, mingleData }) {
    const {
        data,
        value,
        defaultValue,
        label,
        description,
        error,
        variant,
        size,
        radius,
        withAsterisk,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        filter,
        limit,
        maxDropdownHeight,
        withScrollArea,
        renderOption,
        dropdownOpened,
        comboboxProps,
        readOnly,
        disabled,
        placeholder,
        'aria-label': ariaLabel,
        wrapperProps,
    } = mingleData;

    return (
        <MantineAutocomplete
            data={data}
            value={value}
            defaultValue={defaultValue}
            label={label}
            description={description}
            error={error}
            variant={variant}
            size={size}
            radius={radius}
            withAsterisk={withAsterisk}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            filter={filter}
            limit={limit}
            maxDropdownHeight={maxDropdownHeight}
            withScrollArea={withScrollArea}
            renderOption={renderOption}
            dropdownOpened={dropdownOpened}
            comboboxProps={comboboxProps}
            readOnly={readOnly}
            disabled={disabled}
            placeholder={placeholder}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
            onChange={(value) => wire.emit('change', value)}
            onDropdownClose={() => wire.emit('dropdownClose')}
            onDropdownOpen={() => wire.emit('dropdownOpen')}
        />
    );
}

export default Autocomplete;
