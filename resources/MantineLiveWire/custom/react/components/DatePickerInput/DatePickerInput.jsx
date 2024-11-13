import React from 'react';
import { DatePickerInput as MantineDatePickerInput } from '@mantine/dates';

function DatePickerInput({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        onChange,
        type,
        dropdownType,
        valueFormat,
        valueFormatter,
        clearable,
        disabled,
        size,
        label,
        description,
        error,
        variant,
        withAsterisk,
        radius,
        placeholder,
        required,
        readOnly,
        name,
        form,
        id,
        leftSection,
        leftSectionPointerEvents,
        rightSection,
        rightSectionPointerEvents,
        ref,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDatePickerInput
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            type={type}
            dropdownType={dropdownType}
            valueFormat={valueFormat}
            valueFormatter={valueFormatter}
            clearable={clearable}
            disabled={disabled}
            size={size}
            label={label}
            description={description}
            error={error}
            variant={variant}
            withAsterisk={withAsterisk}
            radius={radius}
            placeholder={placeholder}
            required={required}
            readOnly={readOnly}
            name={name}
            form={form}
            id={id}
            leftSection={leftSection}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSection={rightSection}
            rightSectionPointerEvents={rightSectionPointerEvents}
            ref={ref}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default DatePickerInput;
