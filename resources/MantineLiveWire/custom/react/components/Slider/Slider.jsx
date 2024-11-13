import React from 'react';
import { Slider as MantineSlider } from '@mantine/core';

function Slider({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        color,
        size,
        radius,
        marks,
        label,
        labelAlwaysOn,
        labelTransitionProps,
        min,
        max,
        step,
        minRange,
        thumbSize,
        thumbChildren,
        scale,
        inverted,
        disabled,
        thumbLabel,
        onChangeEnd,
    } = mingleData;

    return (
        <MantineSlider
            value={value}
            defaultValue={defaultValue}
            color={color}
            size={size}
            radius={radius}
            marks={marks}
            label={label}
            labelAlwaysOn={labelAlwaysOn}
            labelTransitionProps={labelTransitionProps}
            min={min}
            max={max}
            step={step}
            minRange={minRange}
            thumbSize={thumbSize}
            thumbChildren={thumbChildren}
            scale={scale}
            inverted={inverted}
            disabled={disabled}
            thumbLabel={thumbLabel}
            onChangeEnd={(value) => {
                wire.emit('changeEnd', value);
                if (onChangeEnd) onChangeEnd(value);
            }}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default Slider;
