import React from 'react';
import { MultiSelect as MantineMultiSelect } from '@mantine/core';

function MultiSelect({ wire, mingleData }) {
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
        searchable,
        searchValue,
        onSearchChange,
        nothingFoundMessage,
        checkIconPosition,
        withCheckIcon,
        maxValues,
        hidePickedOptions,
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
        <MantineMultiSelect
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
            searchable={searchable}
            searchValue={searchValue}
            onSearchChange={(value) => wire.emit('searchChange', value)}
            nothingFoundMessage={nothingFoundMessage}
            checkIconPosition={checkIconPosition}
            withCheckIcon={withCheckIcon}
            maxValues={maxValues}
            hidePickedOptions={hidePickedOptions}
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
            onChange={(value) => wire.emit('change', value)}
            onDropdownClose={() => wire.emit('dropdownClose')}
            onDropdownOpen={() => wire.emit('dropdownOpen')}
        />
    );
}

export default MultiSelect;
