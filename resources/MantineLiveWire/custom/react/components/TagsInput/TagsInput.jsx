import React from 'react';
import { TagsInput as MantineTagsInput } from '@mantine/core';

function TagsInput({ wire, mingleData }) {
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
        searchValue,
        onSearchChange,
        maxTags,
        acceptValueOnBlur,
        allowDuplicates,
        splitChars,
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
        <MantineTagsInput
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
            searchValue={searchValue}
            onSearchChange={(value) => wire.emit('searchChange', value)}
            maxTags={maxTags}
            acceptValueOnBlur={acceptValueOnBlur}
            allowDuplicates={allowDuplicates}
            splitChars={splitChars}
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

export default TagsInput;
