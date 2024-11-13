import React from 'react';
import { NumberInput as MantineNumberInput } from '@mantine/core';

function NumberInput({ wire, mingleData }) {
    const {
        label,
        description,
        error,
        placeholder,
        min,
        max,
        clampBehavior,
        prefix,
        suffix,
        allowNegative,
        allowDecimal,
        decimalScale,
        fixedDecimalScale,
        decimalSeparator,
        thousandSeparator,
        thousandsGroupStyle,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        leftSectionPointerEvents,
        rightSectionPointerEvents,
        hideControls,
        stepHoldDelay,
        stepHoldInterval,
        step,
        variant,
        size,
        radius,
        disabled,
        value,
        defaultValue,
        required,
        withAsterisk,
        handlersRef,
    } = mingleData;

    return (
        <MantineNumberInput
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            min={min}
            max={max}
            clampBehavior={clampBehavior}
            prefix={prefix}
            suffix={suffix}
            allowNegative={allowNegative}
            allowDecimal={allowDecimal}
            decimalScale={decimalScale}
            fixedDecimalScale={fixedDecimalScale}
            decimalSeparator={decimalSeparator}
            thousandSeparator={thousandSeparator}
            thousandsGroupStyle={thousandsGroupStyle}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            leftSectionPointerEvents={leftSectionPointerEvents}
            rightSectionPointerEvents={rightSectionPointerEvents}
            hideControls={hideControls}
            stepHoldDelay={stepHoldDelay}
            stepHoldInterval={stepHoldInterval}
            step={step}
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            value={value}
            defaultValue={defaultValue}
            required={required}
            withAsterisk={withAsterisk}
            handlersRef={handlersRef}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default NumberInput;
