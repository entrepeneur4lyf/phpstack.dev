import React from 'react';
import { ColorInput as MantineColorInput } from '@mantine/core';

function ColorInput({ wire, mingleData, children }) {
    const {
        label,
        description,
        error,
        placeholder,
        format,
        fixOnBlur,
        disallowInput,
        swatches,
        swatchesPerRow,
        withPicker,
        withEyeDropper,
        eyeDropperIcon,
        variant,
        size,
        radius,
        disabled,
        readOnly,
        leftSection,
        rightSection,
        leftSectionWidth,
        rightSectionWidth,
        value,
        defaultValue,
        closeOnColorSwatchClick,
    } = mingleData;

    return (
        <MantineColorInput
            label={label}
            description={description}
            error={error}
            placeholder={placeholder}
            format={format}
            fixOnBlur={fixOnBlur}
            disallowInput={disallowInput}
            swatches={swatches}
            swatchesPerRow={swatchesPerRow}
            withPicker={withPicker}
            withEyeDropper={withEyeDropper}
            eyeDropperIcon={eyeDropperIcon}
            variant={variant}
            size={size}
            radius={radius}
            disabled={disabled}
            readOnly={readOnly}
            leftSection={leftSection}
            rightSection={rightSection}
            leftSectionWidth={leftSectionWidth}
            rightSectionWidth={rightSectionWidth}
            value={value}
            defaultValue={defaultValue}
            closeOnColorSwatchClick={closeOnColorSwatchClick}
            onChange={(value) => wire.emit('change', value)}
            onChangeEnd={(value) => wire.emit('changeEnd', value)}
        >
            {children}
        </MantineColorInput>
    );
}

export default ColorInput;
