import React from 'react';
import { TimeInput as MantineTimeInput } from '@mantine/dates';

function TimeInput({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        onChange,
        withSeconds,
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
        <MantineTimeInput
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            withSeconds={withSeconds}
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

export default TimeInput;
