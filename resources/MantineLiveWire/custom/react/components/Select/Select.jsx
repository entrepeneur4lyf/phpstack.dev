import React from 'react';
import { Select as MantineSelect } from '@mantine/core';

function Select({ wire, mingleData }) {
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
        clearable,
        allowDeselect,
        searchable,
        searchValue,
        onSearchChange,
        nothingFoundMessage,
        checkIconPosition,
        withCheckIcon,
        filter,
        limit,
        renderOption,
        maxDropdownHeight,
        withScrollArea,
        dropdownOpened,
        comboboxProps,
        readOnly,
        disabled,
        placeholder,
        'aria-label': ariaLabel,
        wrapperProps,
        clearButtonProps,
    } = mingleData;

    return (
        <MantineSelect
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
            clearable={clearable}
            allowDeselect={allowDeselect}
            searchable={searchable}
            searchValue={searchValue}
            onSearchChange={(value) => wire.emit('searchChange', value)}
            nothingFoundMessage={nothingFoundMessage}
            checkIconPosition={checkIconPosition}
            withCheckIcon={withCheckIcon}
            filter={filter}
            limit={limit}
            renderOption={renderOption}
            maxDropdownHeight={maxDropdownHeight}
            withScrollArea={withScrollArea}
            dropdownOpened={dropdownOpened}
            comboboxProps={comboboxProps}
            readOnly={readOnly}
            disabled={disabled}
            placeholder={placeholder}
            aria-label={ariaLabel}
            wrapperProps={wrapperProps}
            clearButtonProps={clearButtonProps}
            onChange={(value, option) => wire.emit('change', value, option)}
            onDropdownClose={() => wire.emit('dropdownClose')}
            onDropdownOpen={() => wire.emit('dropdownOpen')}
        />
    );
}

export default Select;
