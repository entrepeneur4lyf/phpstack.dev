import React from 'react';
import { DateTimePicker as MantineDateTimePicker } from '@mantine/dates';

function DateTimePicker({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        onChange,
        valueFormat,
        withSeconds,
        clearable,
        dropdownType,
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
        ref,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDateTimePicker
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            valueFormat={valueFormat}
            withSeconds={withSeconds}
            clearable={clearable}
            dropdownType={dropdownType}
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
            ref={ref}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default DateTimePicker;
