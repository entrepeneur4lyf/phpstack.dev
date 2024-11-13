import React from 'react';
import { ColorPicker as MantineColorPicker } from '@mantine/core';

function ColorPicker({ wire, mingleData }) {
    const {
        format,
        swatches,
        swatchesPerRow,
        size,
        value,
        defaultValue,
        withPicker,
        fullWidth,
        onlyPicker,
        saturationLabel,
        hueLabel,
        alphaLabel,
    } = mingleData;

    return (
        <MantineColorPicker
            format={format}
            swatches={swatches}
            swatchesPerRow={swatchesPerRow}
            size={size}
            value={value}
            defaultValue={defaultValue}
            withPicker={withPicker}
            fullWidth={fullWidth}
            onlyPicker={onlyPicker}
            saturationLabel={saturationLabel}
            hueLabel={hueLabel}
            alphaLabel={alphaLabel}
            onChange={(value) => wire.emit('change', value)}
            onChangeEnd={(value) => wire.emit('changeEnd', value)}
        />
    );
}

export default ColorPicker;
