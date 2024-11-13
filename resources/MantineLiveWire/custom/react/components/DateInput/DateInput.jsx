import React from 'react';
import { DateInput as MantineDateInput } from '@mantine/dates';

function DateInput({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        onChange,
        valueFormat,
        dateParser,
        clearable,
        minDate,
        maxDate,
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
        <MantineDateInput
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            valueFormat={valueFormat}
            dateParser={dateParser}
            clearable={clearable}
            minDate={minDate}
            maxDate={maxDate}
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

export default DateInput;
