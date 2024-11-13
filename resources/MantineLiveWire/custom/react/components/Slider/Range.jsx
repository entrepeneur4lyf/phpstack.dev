import React from 'react';
import { RangeSlider as MantineRangeSlider } from '@mantine/core';

function Range({ wire, mingleData }) {
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
        thumbFromLabel,
        thumbToLabel,
        onChangeEnd,
    } = mingleData;

    return (
        <MantineRangeSlider
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
            thumbFromLabel={thumbFromLabel}
            thumbToLabel={thumbToLabel}
            onChangeEnd={(value) => {
                wire.emit('changeEnd', value);
                if (onChangeEnd) onChangeEnd(value);
            }}
            onChange={(value) => wire.emit('change', value)}
        />
    );
}

export default Range;
