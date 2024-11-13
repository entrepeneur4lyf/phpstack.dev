import React from 'react';
import { FileInput as MantineFileInput } from '@mantine/core';

function FileInput({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        placeholder,
        multiple,
        accept,
        clearable,
        valueComponent,
        disabled,
        variant,
        size,
        radius,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        value,
        defaultValue,
    } = mingleData;

    return (
        <MantineFileInput
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            multiple={multiple}
            accept={accept}
            clearable={clearable}
            valueComponent={valueComponent}
            disabled={disabled}
            variant={variant}
            size={size}
            radius={radius}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            value={value}
            defaultValue={defaultValue}
            onChange={(files) => wire.emit('change', files)}
        />
    );
}

export default FileInput;
